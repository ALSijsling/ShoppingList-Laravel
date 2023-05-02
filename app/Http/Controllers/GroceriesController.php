<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GroceriesRequest;
use App\Models\Grocery;
use App\Models\Category;

class GroceriesController extends Controller
{

    public function index()
    {
        $groceries = Grocery::all();
        $total = 0;
        
        foreach ($groceries as $grocery) {
            $subtotal = $grocery->quantity * $grocery->price;
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

    public function store(GroceriesRequest $request)
    {
        $validated = $request->validated();

        $grocery = new Grocery;
        $grocery->product = strtolower($validated['product']);
        $grocery->category = $validated['category'];
        $grocery->quantity = $validated['quantity'];
        $grocery->price = $validated['price'];
        // TODO: zet validation in aparte form validation class (zie laravel documentatie)
        $request->validate([
            'Product' => 'required|string|min:2',
            'Category' => 'required',
            'Quantity' => 'required|integer|min:0',
            'Price' => 'required|numeric'
        ]);

        $grocery = new Grocery;
        // TODO: haal bij voorkeur de data uit gevalideerde data door $validated = $request->validate te doen en de data daarna uit $validated te halen
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

    public function update(GroceriesRequest $request, Grocery $grocery)
    {
        $validated = $request->validated();
        
        $grocery->update ([
            'product' => strtolower($validated['product']),
            'category' => $validated['category'],
            'quantity' => $validated['quantity'],
            'price' => $validated['price'],
        ]);
        $request->validate([
            'Product' => 'required|string|min:2',
            'Category' => 'required',
            'Quantity' => 'required|integer|min:0',
            'Price' => 'required|numeric'
        ]);

        // TODOL waarom geen $grocery uit de route model-binding gebruiken? uit regel 66?
        $grocery = Grocery::find($request->segment(2));
        
        // TODO: je spaart regels code uit door de create functie te gebruiken voor de grocery en de mass-assignen 
        // (stop de gevalideerde data als array in de create functie)
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
