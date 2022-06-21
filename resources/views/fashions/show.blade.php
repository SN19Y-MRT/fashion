
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <title>MY FASHION ITEM</title>
        <!-- Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  

            
    </head>
    <body>
        
        @if ($fashion->image_path)
            <img src="{{ $fashion->image_path }}" class="mw-100" width="200" height="250">
        @endif
        
        <h2>【ファッションアイテムネーム】</h2>
        <h3 class="fashionName">
            {{ $fashion->fashionName }}
        </h3>
        <h2>【カテゴリー名】</h2>
        <a href="/categories/{{ $fashion->category->id }}">{{ $fashion->category->name }}</a>
        <div class="content">
            <div class="content__fashion">
                <h2>【ファッションアイテムの概要】</h2>
                <h3>{{ $fashion->fashionOverview }}</h3>    
            </div>
        </div>
        <h1 class="syuunou">
            <h2>【収納場所】</h2>
            <h3>{{ $fashion->syuunou }}</h3>
        </h1>

        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        
        <div class="col-auto">
            <a class="btn btn-warning" href="/fashions/{{ $fashion->id }}/edit" role="button">編集</a>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    </body>
</html>
