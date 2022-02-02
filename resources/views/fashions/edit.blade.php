@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!-- body内だけを表示しています。 -->
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/fashions/{{ $fashion->id }}" method="POST">
            @csrf
            @method('PUT')
            @if ($fashion->image_path)
                <img src="{{ $fashion->image_path }}" class="fashions">
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
</body>
@endsection