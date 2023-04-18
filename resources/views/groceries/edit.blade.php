<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @extends('layouts.app')
        @section('title', 'Edit Grocery')
    </head>
    <body>
        @section('navbar')
            @parent
        @endsection

        @section('content')
            <form id="addGroceries" method="POST" action="{{route('groceries.update', ['grocery' => $grocery])}}">
                @csrf
                @method('PUT')

                <label for="Product">Product</label><br>
                <input type="text" name="Product" value="{{ $grocery->Product }}"><br><br>

                <label for="Category">Category</label><br>
                <input list="Category" name="Category" placeholder="{{ $grocery ->Category }}">
                    <datalist id="Category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->Category }}">
                        @endforeach
                    </datalist><br><br>

                <label for="Quantity">Quantity</label><br>
                <input type="number" name="Quantity" min="0" value="{{ $grocery->Quantity }}"><br><br>

                <label for="Price">Price</label><br>
                <input type="number" name="Price" min="0" step="0.01" value="{{ $grocery->Price }}"><br><br>
                
                <input type="submit" value="Update Grocery">
            </form>
        @endsection    
    </body>
</html>
