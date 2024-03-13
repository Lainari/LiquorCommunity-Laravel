<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return Product::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required|decimal',
        ]);

        return Product::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);
        // 아래와 같은 방법으로도 가능
        // return Product::create($request->all());
    }
    public function show($id)
    {
        return Product::find($id);
    }
}
