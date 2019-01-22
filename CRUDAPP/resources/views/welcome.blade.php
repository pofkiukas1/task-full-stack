<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content = "{{csrf_token()}}">
        <script>window.Laravel = {csrfToken: '{{csrf_token()}}'}</script>
        <title>CRUD App</title>
        <link rel="stylesheet" type="text/css" href="css/app.css"/>
    </head>
    <body>
            <div class="jumbotron jumbotron-fluid text-sm-center title">
                <div class="container">
                    <h1 class="text-light titlefont font"> CRUD </h1>
                </div>
            </div>

            <div id ="app">
                    <users></users>
            </div>
            
        <script src="{{asset('js/app.js')}}"></script>
        </body>

</html>
