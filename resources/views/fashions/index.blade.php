<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MY FASHION ITEM</title>
        <!-- Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    </head>

    <body>
        <h1>MY FASHION ITEM</h1>
        <form class="row g-3">
          <div class="col-auto">
            <input type="search" class="form-control" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
          </div>
          <div class="col-auto">
            <button type="submit" value="検索" class="btn btn-primary">検索</button>
          </div>
          <div class="col-auto">
            <a class="btn btn-warning" href="/fashions/register" role="button">登録</a>
          </div>
          
        </form>
        
          
        
        <div class='fashions' >
            @foreach ($fashions as $fashion)
                    
                    @if ($fashion->image_path)
                      <img src="{{ $fashion->image_path }}" class="mw-100" width="200" height="250">
                    @endif
                    
                <div class='fashion'>
                    カテゴリー名：　<a href="/categories/{{ $fashion->category->id }}">{{ $fashion->category->name }}</a>
                        <p>【ファッションアイテムネーム】</p>
                        <a href="/fashions/{{ $fashion->id }}">{{ $fashion->fashionName }}</a>
                    
                    <p>【概要】</p>
                    <p class='fashionOverview'>{{ $fashion->fashionOverview }}</p>
                    <p>【収納場所】</p>
                    <p class='syuunou'>{{ $fashion->syuunou }}</p>
            
                    <form action="/fashions/{{ $fashion->id }}" id="form_{{ $fashion->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button> 
                    </form>
                    
                </div>

                
            @endforeach
            <div class="d-flex justify-content-center ">
                {{ $fashions->links() }}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    </body>
</html>
