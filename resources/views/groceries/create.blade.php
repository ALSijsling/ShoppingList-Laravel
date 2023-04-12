<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @extends('layouts.app')
        @section('title', 'Add Groceries')
    </head>
    <body>
        @section('navbar')
            @parent
        @endsection
    
        @section('content')
            <form id="addGroceries" method="POST" action="{{route('groceries.store')}}">
                @csrf

                <label for="Product">Product</label><br>
                <input type="text" name="Product" value=""><br><br>

                <label for="Quantity">Quantity</label><br>
                <input type="number" name="Quantity" min="0" value=""><br><br>

                <label for="Price">Price</label><br>
                <input type="number" name="Price" min="0" step="0.01" value=""><br><br>
                
                <input type="submit" value="Add to Shopping List">
            </form>
        @endsection
    </body>
</html>
