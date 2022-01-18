@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!-- body内だけを表示しています。 -->
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/fashions/{{ $fashion->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class='content__title'>
                <h2>FashionItemの名前</h2>
                <input type='text' name='fashion[fashionName]' value="{{ $fashion->fashionName }}">
            </div>
            <div class='content__body'>
                <h2>概要</h2>
                <input type='text' name='fashion[fashionOverview]' value="{{ $fashion->fashionOverview }}">
            </div>
            <div class='content_syuunou'>
                <h2>収納場所</h2>
                <input type='text' name='fashion[syuunou]' value="{{ $fashion->syuunou }}"> 
            </div>

            <input type="submit" value="保存">
        </form>
    </div>
</body>
@endsection