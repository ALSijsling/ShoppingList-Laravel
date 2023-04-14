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

    public function edit(Request $request)
    {
        $id = $request->segment(2);
        $grocery = Grocery::find($id);
        return view('groceries.edit')
                    ->with('grocery', $grocery);
    }

    public function update(Request $request)
    {
        $id = $request->segment(2);
        $grocery = Grocery::find($id);
        $grocery->Product = $request->Product;
        $grocery->Quantity = $request->Quantity;
        $grocery->Price = $request->Price;
        $grocery->save();
        return redirect('/groceries');
    }

    public function destroy(Request $request)
    {
        $id = $request->segment(2);
        Grocery::destroy($id);
        return redirect('/groceries');
    }
}
