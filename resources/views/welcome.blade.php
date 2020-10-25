<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div id="app">
            <ul>                
            @forelse($customers as $customer)
                <li class="d-flex">
                    {{$customer->id}} - {{$customer->name}} - {{$customer->phone}}
                </li>
                @empty
                <li colspan="4">{{ __('No customers!') }}</li>
                @endforelse
            </ul>
            <example-component></example-component>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
