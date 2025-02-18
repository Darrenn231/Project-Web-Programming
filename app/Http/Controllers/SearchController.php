<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $items = Food::all();
        return view('Search', compact('items'));
    }
    public function search(Request $request){
        if($request->input('button') === '1'){
            $search = $request->input('search');
            $items = DB::table('food')
            ->select('*')
            ->Where('item_name', 'like', '%' .$search. '%')
            ->get();

            return view('Search', compact('items'));
        }
    }
    public function submitForm(Request $request)
    {
        
        $category = $request->except('_token');

        
        $items = Food::whereIn('item_category', $category)->get();

        return view('Search', compact('items'));
    }
   
}
