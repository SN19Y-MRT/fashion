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
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/fashions/{{ $fashion->id }}" method="POST">
            @csrf
            @method('PUT')
            @if ($fashion->image_path)
                <img src="{{ $fashion->image_path }}" class="mw-100" width="200" height="250">
            @endif
            <div class='content__title'>
                <h2>ファッションアイテムネーム</h2>
                <input type='text' name='fashion[fashionName]' value="{{ $fashion->fashionName }}">
            </div>
            <div class='content__body'>
                <h2>ファッションアイテムの概要</h2>
                <input type='text' name='fashion[fashionOverview]' value="{{ $fashion->fashionOverview }}">
            </div>
            <div class='content_syuunou'>
                <h2>収納場所</h2>
                <input type='text' name='fashion[syuunou]' value="{{ $fashion->syuunou }}"> 
            </div>
            <div class="category">
                <h2>カテゴリー</h2>
                <select name="fashion[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="保存">
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
   
</body>
</html>
