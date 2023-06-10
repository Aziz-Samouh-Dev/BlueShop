<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('role', 'user')->get();
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.product.index', compact('products', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'photos.*' => ['required', 'image', function ($attribute, $value, $fail) use ($request) {
    //             if (count($request->file('photos')) > 4) {
    //                 $fail('You can upload a maximum of 4 images.');
    //             }
    //         }],
    //         'name' => 'required|string|max:250',
    //         'category' => 'required|string|max:250',
    //         'quantity' => 'required|integer',
    //         'price' => 'required|numeric',
    //         'description' => 'required|string|max:500',
    //     ]);

    //     $product = new Product;
    //     $product->name = $request->name;
    //     $product->category = $request->category;
    //     $product->quantity = $request->quantity;
    //     $product->price = $request->price;
    //     $product->description = $request->description;
    //     $product->save();

    //     $count = 0;
    //     if ($request->hasFile('photos')) {
    //         $photos = $request->file('photos');
    //         foreach ($photos as $photo) {
    //             if ($count < 4) {
    //                 $imageName = time() . '_' . $photo->getClientOriginalName();
    //                 $photo->move(public_path('images'), $imageName);

    //                 $image = new Image;
    //                 $image->product_id = $product->id;
    //                 $image->filename = $imageName;
    //                 $image->save();

    //                 $count++;
    //             }
    //         }
    //     }

    //     return redirect()->route('products.index')->withErrors($validatedData);
    // }


    public function store(Request $request)
    {
        $request->validate([
            'photos.*' => [
                'required',
                'image',
                function ($attribute, $value, $fail) use ($request) {
                    $files = $request->file('photos');

                    if ($files && is_array($files) && count($files) > 4) {
                        $fail('You can upload a maximum of 4 images.');
                    }
                }
            ],
            'name' => 'required|string|max:250',
            'category' => 'required|string|max:250',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string|max:500',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        $count = 0;
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            foreach ($photos as $photo) {
                if ($count < 4) {
                    $imageName = time() . '_' . $photo->getClientOriginalName();
                    $photo->move(public_path('images'), $imageName);

                    $image = new Image;
                    $image->product_id = $product->id;
                    $image->filename = $imageName;
                    $image->save();

                    $count++;
                }
            }
        }

        return redirect()->route('products.index')->withErrors(['success' => 'Product created successfully.']);
    }




    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required',
            'photos.*' => ['nullable', 'image', 'max:2048'], // Add validation rules for photos
        ]);

        // Update the product
        $product->name = $request->name;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;

        // Delete old images
        $product->images()->delete();

        // Save the product
        $product->save();

        // Handle the uploaded images
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');

            foreach ($photos as $photo) {
                $imageName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('images'), $imageName);

                $image = new Image;
                $image->product_id = $product->id;
                $image->filename = $imageName;
                $image->save();
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
