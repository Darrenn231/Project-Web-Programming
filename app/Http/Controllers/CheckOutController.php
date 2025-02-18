<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function checkout(Request $request){
        $user = Auth::user()->id;
        
        $request->validate([
            'fullName' => 'required|string|min:5',
            'phone_number' => 'required|string|size:12',
            'country' => 'required',
            'city' => 'required|string|min:5',
            'cardName' => 'required|string|min:3',
            'card_number' => 'required|string|size:16',
            'address' => 'required|string|min:5',
            'zip' => 'required|string',
        ],[
            'fullName' => 'Full Name needs to be at least 5 characters',
            'phone_number' => 'Phone number needs to be 12 characters',
            'country' => 'need to select country',
            'city' => 'city needs to be at least 5 characters',
            'cardName' => 'Card Name needs to be at least 3 characters',
            'card_number' => 'Card number needs to 16 characters',
            'address' => 'Address needs to be at least 5 characters',
            'zip' => 'need to be filled',
        ]);

        $th = new Transaction();
        $th->user_id = $user;
        $th->fullName = $request->input('fullName');
        $th->address = $request->input('address');
        $th->phone_number = $request->input('phone_number');
        $th->country = $request->input('country');
        $th->city  = $request->input('city');
        $th->cardName = $request->input('cardName');
        $th->cardNumber = $request->input('card_number');
        $th->PostalCode = $request->input('zip');
        $th->save();

        $carts = Cart::all()->where('user_id', $user);

        

        foreach($carts as $cart){
            Transaction_detail::create([
                'transaction_id' => $th->id,
                'food_id' => $cart->food_id,
                'quantity' => $cart->quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        Cart::truncate();
        return redirect('/');
    }
}
