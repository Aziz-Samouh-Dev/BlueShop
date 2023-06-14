<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //


    public function index()
    {
        return view('payment');
    }


    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'name_on_card' => 'required|string',
    //         'user_id' => 'required|integer',
    //         'card_number' => 'required|integer',
    //         'expiration_month' => 'required|integer',
    //         'expiration_year' => 'required|integer',
    //         'security_code' => 'required|integer',
    //     ]);

    //     // Create a new payment record
    //     $payment = new Payment();
    //     $payment->user_id = $validatedData['user_id'];
    //     $payment->name_on_card = $validatedData['name_on_card'];
    //     $payment->card_number = $validatedData['card_number'];
    //     $payment->expiration_month = $validatedData['expiration_month'];
    //     $payment->expiration_year = $validatedData['expiration_year'];
    //     $payment->security_code = $validatedData['security_code'];
    //     $payment->save();

    //     // Process the payment and perform any necessary actions

    //     // Redirect or return a response
    //     return redirect()->route('pro')->with('success', 'Payment successfully processed.');
    // }
}
