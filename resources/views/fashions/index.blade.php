<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MY FASHION ITEM</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>My fashion item</h1>
        <div class='fashions'>
            @foreach ($fashions as $fashion)
                <div class='fashion'>
                    <h2 class='fashion name'>{{ $fashion->title}}</h2>
                    <p class='fashion overview'>{{ $fashion->body }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>