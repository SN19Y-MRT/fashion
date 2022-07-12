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
        
        <h1 class="text-center font-italic">MY FASHION ITEM</h1>
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
        
        <div class='fashions'>
            @foreach ($fashions as $fashion)
            
            <div class="card" style="width: 18rem;">
              @if ($fashion->image_path)
                      <img src="{{ $fashion->image_path }}" class="mw-100" width="200" height="250">
                  
                    @endif
              <div class="card-body">
                <h5 class="card-title">ファッションアイテムネーム</h5>
                    <a href="/fashions/{{ $fashion->id }}" class="card-text">{{ $fashion->fashionName }}</a>
                <h5 class="card-title">概要</h5>
                    <p class='fashionOverview card-text'>{{ $fashion->fashionOverview }}</p>
                <h5 class="card-title">収納場所</h5>
                    <p class='syuunou card-text'>{{ $fashion->syuunou }}</p>
                <h5 class="card-title">カテゴリー名</h5>
                    <a href="/categories/{{ $fashion->category->id }}" class="card-text">{{ $fashion->category->name }}</a>
              </div>
                <form action="/fashions/{{ $fashion->id }}" id="form_{{ $fashion->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button> 
                </form>

                
            @endforeach
            <div class="d-flex justify-content-center ">
                {{ $fashions->links() }}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    </body>
</html>
