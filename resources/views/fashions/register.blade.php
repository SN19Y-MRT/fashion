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
            <div class="fashionName">
                <h2>fahshion item Name</h2>
                <input type="text" name="fashion[fashionName]" placeholder="名前"/>
                <p class="fashionName__error" style="color:red">{{ $errors->first('fashion.fashionName') }}</p>
            </div>
            <div class="fashionOverview">
                <h2>fahshion itemの概要</h2>
                <textarea name="fashion[fashionOverview]" placeholder="登録したfashion itemの概要"></textarea>
                <p class="fashionOverview__error" style="color:red">{{ $errors->first('fashion.fashionOverview') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>