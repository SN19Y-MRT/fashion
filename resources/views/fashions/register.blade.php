<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MY FASHION ITEM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    
    </head>
    <body>
        <h1>ファッションアイテム登録画面</h1>
        <form action="/fashions" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            
            <div class="fashionName">
                <h2>ファッションアイテムネーム</h2>
                <input type="text" name="fashion[fashionName]" placeholder="ファッションアイテムネーム"/>
                <p class="fashionName__error" style="color:red">{{ $errors->first('fashion.fashionName') }}</p>
            </div>
            <div class="fashionOverview">
                <h2>ファッションアイテムの概要</h2>
                <textarea name="fashion[fashionOverview]" placeholder="登録したファッションアイテムの概要" ></textarea>
                <p class="fashionOverview__error" style="color:red">{{ $errors->first('fashion.fashionOverview') }}</p>
            </div>
            <div class="syuunou">
                <h2>収納場所</h2>
                <textarea name="fashion[syuunou]" placeholder="クローゼット等"></textarea>
                <p class="syuunou_error" style="color:red">{{ $errors->first('fashion.syuunou') }}</p>
            </div>

            <div class="category">
                <h2>カテゴリー</h2>
                <select name="fashion[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="保存"/>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    </body>
        </form>
        <div class="back">[<a href="/">戻る</a>]</div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    </body>
</html>