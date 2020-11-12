<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crud Estudante (CodeLoop)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
        <div id="app">
          <example-component></example-component>
        </div>
        
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>