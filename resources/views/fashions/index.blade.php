@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
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
        [<a href='/fashions/register'>登録</a>]
        <div class='fashions'>
            @foreach ($fashions as $fashion)
                <div class='fashion'>
                    <h2 class='fashionName'>
                        <a href="/fashions/{{ $fashion->id }}">{{ $fashion->fashionName }}</a>
                    </h2>
                    
                    <p class='fashionOverview'>{{ $fashion->fashionOverview }}</p>
                    <p class='syuunou'>{{ $fashion->syuunou }}</p>
                    
                    <form action="/fashions/{{ $fashion->id }}" id="form_{{ $fashion->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button> 
                    </form>
                    <a href="/categories/{{ $fashion->category->id }}">{{ $fashion->category->name }}</a>
                </div>
                
            @endforeach
            <div class='paginate'>
                {{ $fashions->links() }}
            </div>
        
        </div>    
    </body>
</html>
@endsection