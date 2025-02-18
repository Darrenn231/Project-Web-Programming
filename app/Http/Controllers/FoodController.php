<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AddFood');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string',
            'bdesc' => 'required|string',
            'desc' => 'required|string',
            'item_category' => 'required|string',
            'item_price' => 'required|integer',
            'item_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
       
        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('foodImages'), $imageName);
        }
    
        
        $foodItem = new Food([
            'item_name' => $request->input('item_name'),
            'bdesc' => $request->input('bdesc'),
            'desc' => $request->input('desc'),
            'item_category' => $request->input('item_category'),
            'item_price' => $request->input('item_price'),
            'item_image' => $imageName ?? null,
        ]);
    
        
        $foodItem->save();
    
        return redirect('/')->with('success', 'Food successfully added');
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
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Food::find($id);
        return view('update', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required|string|min:5',
            'bdesc' => 'required|string|max:100',
            'desc' => 'required|string|max:255',
            'item_category' => 'required|string',
            'item_price' => 'required|integer|min:1',
            'item_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ],
            [
                'item_name' => 'Must be greater than 5 Characters',
                'bdesc' => 'Brief Description must not be greater than 100 Characters',
                'desc' => 'Description must not be greater than 255 Characters',
                'item_category' => 'Food Category is required',
                'item_price' => 'price must be greater than 0',
                'item_image' => 'iamge must be chosen'
            ]
        );
    
        $food = Food::find($id);
        
        $imagePath = public_path('foodImages/') . $food->item_image;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        $food->update([
            'item_name' => $request->input('item_name'),
            'bdesc' => $request->input('bdesc'),
            'desc' => $request->input('desc'),
            'item_category' => $request->input('item_category'),
            'item_price' => $request->input('item_price'),
        ]);
    
       
        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('foodImages'), $imageName);
    
            
            $food->update(['item_image' => $imageName]);
        }
    

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return redirect()->route('manageFood')->with('error', 'Food item not found.');
        }

        $imagePath = public_path('foodImages/') . $food->item_image;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $food->delete();

        return redirect('/');
    }

    

}
