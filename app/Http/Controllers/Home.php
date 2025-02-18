<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    public function index()
    {
        $items = Food::all();
        $cat = '';
        return view('Home', compact('items', 'cat'));
    }

    public function category(Request $request)
{
    if ($request->input('button1') === '1'){
         $items = DB::table('food')
        ->select('*')
        ->Where('item_category', '=', 'Main Course')
        ->get();

        $cat = 'Main Course';
        return view('Home', compact('items','cat'));

    }
    if ($request->input('button2') === '1'){
        $items = DB::table('food')
        ->select('*')
        ->Where('item_category', '=', 'Beverage')
        ->get();

        $cat = 'Beverage';
        return view('Home', compact('items','cat'));
   }


   if ($request->input('button3') === '1'){
        $items = DB::table('food')
        ->select('*')
        ->Where('item_category', '=', 'Dessert')
        ->get();

        $cat = 'Dessert';
        return view('Home', compact('items','cat'));
   }
    
}


}
