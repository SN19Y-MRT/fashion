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
         <form class="form-inline my-2 my-lg-0 ml-2">
              <div class="form-group">
              <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
              </div>
              <input type="submit" value="検索" class="btn btn-info">
          </form>

        <div class='fashions' >
 
            <a href='/fashions/register'> <button type="submit" class='btn btn-danger'>登録</button></a>


            @foreach ($fashions as $fashion)
            

                <div class='fashion'>
                    <img src="{{ $fashion->image_path }}" alt="画像">
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
            <div class="d-flex justify-content-center ">
                {{ $fashions->links() }}
            </div>
        </div>
        
    </body>
</html>
@endsection