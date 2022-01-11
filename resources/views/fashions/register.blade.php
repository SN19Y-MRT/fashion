<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MY FASHION ITEM</title>
    </head>
    <body>
        <h1>fahshion item</h1>
        <form action="/fashions" method="FASHION">
            @csrf
            <div class="fashion name">
                <h2>fahshion name</h2>
                <input type="text" name="fashion[name]" placeholder="名前"/>
                <p class="title__error" style="color:red">{{ $errors->first('fashion.fashion name') }}</p>
            </div>
            <div class="fashion overview">
                <h2>fahshion itemの概要</h2>
                <textarea name="fashion[fashion overview]" placeholder="登録したfashion itemの概要"></textarea>
                <p class="fashion overview__error" style="color:red">{{ $errors->first('fashion.fahshion overview') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>