<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodDetail extends Controller
{
    public function index(){
        return view('FoodDetail');
    }
    public function info($id){
        
            $items = Food::find($id);
            return view('FoodDetail', compact('items'));

    }
}
