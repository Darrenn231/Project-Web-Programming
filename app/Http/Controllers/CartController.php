<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {  
        $user = Auth()->user();
        $items = Cart::with('food', 'user')->where('user_id', $user->id)->get();
    
        return view('Cart', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addCart($id){
        $user = Auth::user()->id;
        $food = Food::find($id);

        $cartItem = Cart::where('food_id', $id)
                    ->where('user_id', $user)
                    ->first();
        
        if ($cartItem) {
            $cartItem->increment('quantity');
            
        }
        else{
            $cart = new Cart;
            $cart->food_id = $id;
            $cart->user_id = $user;
            $cart->quantity = '1';
            $cart->save();
        }

        return redirect('/')->with('success', 'Food Succesfully added to cart');
        
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Food::find($id);

        if (!$cart) {
            return redirect()->route('/cart')->with('error', 'Food item not found.');
            
        }
        else{
            DB::table('carts')
            ->select('*')
            ->Where('food_id', 'like', '%' .$id. '%')
            ->delete();
            return redirect('/cart');
        }
    }
}
