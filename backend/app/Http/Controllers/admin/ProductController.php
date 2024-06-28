<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'color' => 'required',
            'quantity' => 'required',
        ]);

        // save image logic here

        $data= [
            'name' => $request->name,
            'color' => $request->color,
            'quantity' => $request->quantity,
        ];

        $image_name = date('YmdHis').uniqid().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $image_name);
        $data['image'] = $image_name;

        Product::create($data);
        return redirect()->route('admin.product.index');
    }
}
