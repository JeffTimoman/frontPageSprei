<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\isNotLogin;
use App\Models\Product;
use App\Models\ProductDepartement;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WebVariable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $departement = auth()->user()->departement;

    $productDepartements = ProductDepartement::where('departement_id', $departement->id)->get();
    // only get productDepartements where user->
    // sort by product name
    $productDepartements = $productDepartements->sortBy(function ($productDepartement) {
        return $productDepartement->product->name;
    });
    // $transactions = Transaction::whereHas('user', function($query) use ($departement){
    //     $query->where('departement_id', $departement->id);
    // })->get();
    // $quantity_of_all_product = ProductDepartement::where('departement_id', $departement->id)->sum('quantity');

    return view('index', ['productDepartements' => $productDepartements, 'departement' => $departement]);
})->name('user.index')->middleware(isLogin::class);

Route::get('/login', function () {
    return view('login');
})->name('user.login')->middleware(isNotLogin::class);

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    $allow_login = WebVariable::where('name', 'AllowLogin')->first();
    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();
        auth()->user()->ip = $request->ip();
        auth()->user()->save();
        if(auth()->user()->role == 'admin'){
            return redirect()->route('admin.users')->with('success', 'Login success');
        }

        if (auth()->user()->role != 'admin' && $allow_login->value == '0') {
            auth()->logout();
            return back()->with('error', 'The application is closed for now.');
        }

        return redirect()->route('user.index')->with('success', 'Login success');
    }

    return back()->with('error', 'Login failed');
})->name('user.login')->middleware(isNotLogin::class);

Route::get('/logout', function () {
    auth()->logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect()->route('user.login')->with('success', 'Logout success');
})->name('user.logout')->middleware(isLogin::class);

Route::post('/claim', function (Request $request) {
    $productDepartement = ProductDepartement::findOrFail($request->id);

    $block_claim_time = WebVariable::where('name', 'BlockClaimTime')->first();
    if ($block_claim_time && $block_claim_time->value) {
        // Set the current time to the desired timezone (Asia/Jakarta for Western Indonesia Time)
        $current_time = Carbon::now('Asia/Jakarta');

        // Parse the block claim time value in the same timezone
        $block_claim_time_parsed = Carbon::createFromFormat('Y-m-d H:i:s', $block_claim_time->value, 'Asia/Jakarta');

        // Compare the parsed block claim time with the current time
        if ($block_claim_time_parsed->lessThan($current_time)) {
            return redirect(route('user.index'))->with('error', 'Claim failed due to time running out.');
        }

        // Proceed with your logic if the current time has not passed the BlockClaimTime
    }
    if (auth()->user()->buying_limit <= 0) {
        return redirect(route('user.index'))->with('error', 'Claim failed because you have claimed two products.');
    }

    $departement = auth()->user()->departement;
    if ($productDepartement->departement_id != $departement->id) {
        return redirect(route('user.index'))->with('error', 'Claim failed');
    }

    $transactions = Transaction::where('product_departement_id', $productDepartement->id)->get();
    if ($productDepartement->quantity <= $transactions->count()) {
        return redirect(route('user.index'))->with('error', 'Claim failed because the product is out of stock');
    }

    //transactions of all user in this departement
    $transactions = Transaction::whereHas('user', function ($query) use ($departement) {
        $query->where('departement_id', $departement->id);
    })->get();
    $quantity_of_all_product = ProductDepartement::where('departement_id', $departement->id)->sum('quantity');
    $check2 = $quantity_of_all_product - $transactions->count();

    $check = Transaction::where('product_departement_id', $productDepartement->id)->where('user_id', auth()->id())->first();

    if ($check && $check2 != 1) {
        return redirect(route('user.index'))->with('error', 'Claim failed because you have claimed this product.');
    }


    Transaction::create([
        'product_departement_id' => $productDepartement->id,
        'user_id' => auth()->id()
    ]);

    auth()->user()->buying_limit -= 1;
    auth()->user()->save();

    return redirect(route('user.index'))->with('success', 'Claim success');
})->name('user.claim')->middleware(isLogin::class);

Route::get('/{id}/detail', function ($id) {
    $productDepartement = ProductDepartement::findOrFail($id);
    $transactions = Transaction::where('product_departement_id', $productDepartement->id)->get();
    return view('product_departement.detail', ['productDepartement' => $productDepartement, 'transactions' => $transactions]);
})->name('product_departement.detail')->middleware(isLogin::class);

Route::get('/class', function () {
    $departement = auth()->user()->departement;
    // sort by user.name
    return view('user.departement', ['departement' => $departement]);
})->name('departement.detail')->middleware(isLogin::class);




Route::get('/search', function () {
    return redirect()->back()->with('error', 'Search feature is not available yet.');
})->name('user.search')->middleware(isLogin::class);

Route::get('/claimed', function () {
    $transactions = Transaction::where('user_id', auth()->id())->get();
    return view('user.claimed', ['transactions' => $transactions]);
})->name('user.info')->middleware(isLogin::class);

Route::prefix('admin')->group(function () {
    Route::get('/', function (Request $request) {
        $users = User::all();
        if ($request->has('departement') && $request->departement != '') {
            $users = User::where('departement_id', $request->departement)->get();
        }

        // only get users who is not admin
        $users = $users->filter(function ($user) {
            return $user->role != 'admin';
        });
        // sort by departement name then by user name
        $users = $users->sortBy(function ($user) {
            return $user->departement->name . $user->name;
        });
        return view('admin.index', ['users' => $users]);
    })->name('admin.index')->middleware([isLogin::class, isAdmin::class]);

    Route::get('/index2', function (Request $request) {
        $name = $request->name;
        if ($name == '' || $name == null) {
            $name = Product::orderBy('name')->first()->name;
        }

        // get transactions which has the product name in the request
        $transactions = Transaction::whereHas('productDepartement', function ($query) use ($name) {
            $query->whereHas('product', function ($query) use ($name) {
                $query->where('name', $name);
            });
        })->get();


        // sort transactions by user departement name then by user name
        $transactions = $transactions->sortBy(function ($transaction) {
            return $transaction->user->departement->name . $transaction->user->name;
        });
        return view('admin.index2', ['transactions' => $transactions, 'name' => $name]);
    })->name('admin.index2')->middleware([isLogin::class, isAdmin::class]);
    Route::get('/users', function (Request $request){
        $users = User::all();
        if ($request->has('departement') && $request->departement != '') {
            $users = User::where('departement_id', $request->departement)->get();
        }
        $users = $users->sortBy(function ($user) {
            return $user->departement->name . $user->name;
        });
        return view('admin.users', ['users' => $users]);
    })->name('admin.users')->middleware([isLogin::class, isAdmin::class]);
    Route::get('/env', function () {
        return view('admin.edit_env_variables');
    })->name('admin.edit_env_variables')->middleware([isLogin::class, isAdmin::class])->name('admin.edit_env_variables');

    Route::post('/env', function (Request $request) {
        $WebVariables = WebVariable::all();
        foreach ($WebVariables as $WebVariable) {
            $WebVariable->value = $request[$WebVariable->name];
            $WebVariable->save();
        }
        return redirect()->back();
    })->middleware([isLogin::class, isAdmin::class]);
})->middleware([isLogin::class, isAdmin::class]);
