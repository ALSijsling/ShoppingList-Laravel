<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grocery;

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
        return view('groceries.create');
    }

    public function store(Request $request)
    {
        $grocery = new Grocery;
        $grocery->Product = $request->Product;
        $grocery->Quantity = $request->Quantity;
        $grocery->Price = $request->Price;
        $grocery->save();

        return redirect('/groceries');        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
