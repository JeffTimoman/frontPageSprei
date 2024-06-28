<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index(){
        $departements = Departement::all();
        return view('admin.departement.index', ['departements' => $departements]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name
        ];

        Departement::create($data);

        return redirect()->route('admin.departement.index');
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'id' => 'required'
        ]);

        $departement = Departement::findOrfail($request->id);
        $departement->name = $request->name;
        $departement->save();

        return redirect()->route('admin.departement.index');
    }

    public function destroy($id){
        Departement::destroy($id);

        return redirect()->route('admin.departement.index');
    }
}
