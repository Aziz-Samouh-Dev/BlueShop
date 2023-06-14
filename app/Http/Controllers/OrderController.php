<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = order::orderBy('id' , 'desc')->get();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Calculate total price based on the product's price and quantity
        $product = Product::findOrFail($validatedData['product_id']);
        $totalPrice = $product->price * $validatedData['quantity'];

        // Create a new order record
        $order = new Order();
        $order->user_id = Auth::id();
        $order->product_id = $validatedData['product_id'];
        $order->quantity = $validatedData['quantity'];
        $order->total_price = $totalPrice;
        $order->save();

        // Process the payment and perform any necessary actions

        // Redirect or return a response
        return redirect()->route('payment.index')->with('success', 'Order placed successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //

        return view('admin.order.show' , compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // Perform any additional checks or validation before deleting the order

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

}
