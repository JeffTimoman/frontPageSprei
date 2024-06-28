<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.user.index', ['users' => $users]);
    }

    function destroy(Request $request)
    {
        $user = User::findOrfail($request->id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    function create()
    {
        return view('admin.user.create');
    }
    function store(Request $request){
        $data = explode("\n", $request->data);
        $errors = [];

        foreach ($data as $key => $value) {
            try {
                $value = trim($value); // Trim any whitespace including \r
                $user = explode(",", $value);

                if (count($user) != 4) {
                    throw new Exception("Invalid data format for row: $value");
                }

                $departement = Departement::where('name', $user[3])->first();

                if (!$departement) {
                    throw new Exception("Department not found for name: " . $user[3]);
                }

                User::create([
                    'name' => $user[0],
                    'email' => $user[1],
                    'dob' => $user[2],
                    'departement_id' => $departement->id,
                    'password' => bcrypt(strtolower(str_replace(' ', '_', $departement->name.$user[0]))),
                ]);
            } catch (Exception $e) {
                // Log the error message along with the row that caused it
                $errors[] = "Error processing row $key: " . $e->getMessage();
            }
        }

        if (!empty($errors)) {
            // Return with errors if any
            return redirect()->back()->with('error', 'Some users could not be created: ' . implode(', ', $errors));
        }

        return redirect()->back()->with('success', 'User created successfully');
    }


}
