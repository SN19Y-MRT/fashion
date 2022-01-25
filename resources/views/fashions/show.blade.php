@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
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
        <img src="{{ $fashion->image_path }}" alt="画像">
        <h1 class="fashionName">
            {{ $fashion->fashionName }}
        </h1>
        <a href="/categories/{{ $fashion->category->id }}">{{ $fashion->category->name }}</a>
        <div class="content">
            <div class="content__fashion">
                <h3>概要</h3>
                <p>{{ $fashion->fashionOverview }}</p>    
            </div>
        </div>
        <h1 class="syuunou">
            <h3>収納場所</h3>
            <p>{{ $fashion->syuunou }}</p>
        </h1>

        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    <p class="edit">[<a href="/fashions/{{ $fashion->id }}/edit">編集</a>]</p>
</html>
@endsection