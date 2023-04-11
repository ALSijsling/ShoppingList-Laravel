<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grocery;

class GroceriesController extends Controller
{

    public function index()
    {
        $groceries = grocery::all();
        $total = 0;
        foreach ($groceries as $grocery) {
            $subtotal = $grocery->Quantity * $grocery->Price;
            $total = $total + $subtotal;
        }
        return view('groceries.index')
                    ->with('groceries', grocery::all())
                    ->with('total', $total);
    }

    public function create()
    {
        
    }

    public function store()
    {
        
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
