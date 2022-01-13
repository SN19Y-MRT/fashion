<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>fashion item</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="fashionName">
            {{ $fashion->fashionName }}
        </h1>
        <div class="content">
            <div class="content__fashion">
                <h3>本文</h3>
                <p>{{ $fashion->fashionOverview }}</p>    
            </div>
        </div>
        <a href="">{{ $fashion->category->name }}</a>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    <p class="edit">[<a href="/fashions/{{ $fashion->id }}/edit">編集</a>]</p>
</html>