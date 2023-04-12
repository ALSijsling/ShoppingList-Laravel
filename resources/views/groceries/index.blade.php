<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @extends('layouts.app')
        @section('title', 'Groceries')
    </head>
    <body>
        @section('navbar')
            @parent
        @endsection

        @section('content')
            <table id="ShoppingList">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groceries as $grocery)
                    <tr>
                        <td class="product">{{ ucwords($grocery->Product) }}</td>
                        <td class="quantity">{{ $grocery->Quantity }}</td>
                        <td class="price">{!! "&euro; " !!} {{ $grocery->Price }}</td>
                        <td class="subtotal">{!! "&euro; " !!} {{ $grocery->Quantity * $grocery->Price }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td id="total" colspan="3">Total</td>
                        <td id="totalCost">{!! "&euro; " !!} {{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        @endsection
    </body>
</html>
