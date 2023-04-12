<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping List - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        @section('navbar')
            <nav>
                <ul id="navBar">
                    <li><a href="{{route('groceries.index')}}">Shopping List</a></li>
                    <li><a href="{{route('groceries.create')}}">Add Groceries</a></li>
                </ul>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
