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
            @if($errors->any()) 
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif


            <form id="addGroceries" method="POST" action="{{route('groceries.store')}}">
                @csrf

                <label for="product">Product</label><br>
                <input type="text" name="product" value=""><br><br>

                <label for="category">Category</label><br>
                <input list="category" name="category">
                    <datalist id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->category }}">
                        @endforeach
                    </datalist><br><br>

                <label for="quantity">Quantity</label><br>
                <input type="number" name="quantity" min="0" value=""><br><br>

                <label for="price">Price</label><br>
                <input type="number" name="price" min="0" step="0.01" value=""><br><br>
                
                <input type="submit" value="Add to Shopping List">
            </form>
        @endsection
    </body>
</html>
