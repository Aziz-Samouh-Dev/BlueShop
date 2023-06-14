<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorys = Category::all();
        $products = Product::all();

        return view('welcome', compact('categorys', 'products'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function products(Request $request)
    {
        //
        $categorys = Category::all();
        $query = $request->input('query');
        $products = Product::orderBy('id', 'DESC')
            ->with('images')
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%');
            })
            ->paginate(10);

        return view('products', compact('categorys', 'products'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
