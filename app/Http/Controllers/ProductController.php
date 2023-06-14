<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'user')->get();
        $products = Product::orderBy('id', 'DESC')->with('images')->paginate(10);
        return view('admin.product.index', compact('products', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorys = Category::all();
        return view('admin.product.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'photos.*' => [
                'required',
                'image',
                function ($attribute, $value, $fail) use ($request) {
                    $files = $request->file('photos');

                    if ($files && is_array($files) && count($files) > 6) {
                        $fail('You can upload a maximum of 4 images.');
                    }
                }
            ],
            'name' => 'required|string|max:250',
            'category' => 'required|string|max:250',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        $count = 0;
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            foreach ($photos as $photo) {
                if ($count < 6) {
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
        return view('show', compact( 'product'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categorys = Category::all();
        $product->with('category');
        return view('admin.product.edit', compact('product', 'categorys'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'photos.*' => [
                'nullable',
                'image',
                function ($attribute, $value, $fail) use ($request) {
                    $files = $request->file('photos');

                    if ($files && is_array($files) && count($files) > 6) {
                        $fail('You can upload a maximum of 4 images.');
                    }
                }
            ],
            'name' => 'required|string|max:250',
            'category' => 'required|string|max:250',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->hasFile('photos')) {
            // Delete old images
            $product->images()->delete();

            $count = 0;
            $photos = $request->file('photos');
            foreach ($photos as $photo) {
                if ($count < 6) {
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

        return redirect()->route('products.index')->withErrors(['success' => 'Product updated successfully.']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }




    public function checkout(Product $product)
    {
        return view('checkout', compact('product'));
    }


}
