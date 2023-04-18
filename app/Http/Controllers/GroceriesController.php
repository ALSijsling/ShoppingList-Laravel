<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grocery;
use App\Models\Category;

class GroceriesController extends Controller
{

    public function index()
    {
        $groceries = Grocery::all();
        $total = 0;
        
        foreach ($groceries as $grocery) {
            $subtotal = $grocery->Quantity * $grocery->Price;
            $total = $total + $subtotal;
        }
        
        return view('groceries.index')
                    ->with('groceries', $groceries)
                    ->with('total', $total);
    }

    public function create()
    {
        $categories = Category::all();

        return view('groceries.create')
                    ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Product' => 'required|string|min:2',
            'Category' => 'required',
            'Quantity' => 'required|integer|min:0',
            'Price' => 'required|numeric'
        ]);

        $grocery = new Grocery;
        $grocery->Product = strtolower($request->Product);
        $grocery->Category = $request->Category;
        $grocery->Quantity = $request->Quantity;
        $grocery->Price = $request->Price;
        $grocery->save();

        return redirect('/groceries');        
    }

    public function edit(Request $request, Grocery $grocery)
    {
        $grocery = Grocery::find($request->segment(2));
        $categories = Category::all();
        
        return view('groceries.edit')
                    ->with('grocery', $grocery)
                    ->with('categories', $categories);
    }

    public function update(Request $request, Grocery $grocery)
    {
        $request->validate([
            'Product' => 'required|string|min:2',
            'Category' => 'required',
            'Quantity' => 'required|integer|min:0',
            'Price' => 'required|numeric'
        ]);

        $grocery = Grocery::find($request->segment(2));
        
        $grocery->Product = strtolower($request->Product);
        $grocery->Category = $request->Category;
        $grocery->Quantity = $request->Quantity;
        $grocery->Price = $request->Price;
        $grocery->save();
        
        return redirect('/groceries');
    }

    public function destroy(Request $request, Grocery $grocery)
    {
        Grocery::destroy($request->segment(2));
        
        return redirect('/groceries');
    }
}
