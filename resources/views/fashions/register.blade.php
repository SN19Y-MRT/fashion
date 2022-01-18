@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MY FASHION ITEM</title>
    </head>
    <body>
        <h1>fahshion item</h1>
        <form action="/fashions" method="POST">
            @csrf
            
<div id="image">
 <form enctype="multipart/form-data" @submit.prevent="send">
   @csrf
     
   <p v-if="errors.length">
     <b>入力内容に不備があります</b>
     <ul>
       <li v-for="error in errors">@{{ error }}</li>
     </ul>
   </p>
   <div class="form-group">
     <div>
       <h2>Select an image</h2>
       <label for="select_image">写真を選択</label>
       <input type="file" @change="onFileChange" id="select_image" hidden>
     </div>
     <div v-if="images">
         <ol>
           <li v-for="(image, index) in images">
             <h5>@{{image.name}}</h5>
             <img :src="image.thumbnail" style="width: 100px; height: 100px;" />
             <input type="hidden" v-model="image.name">
             <div>
               <label for="edit_image">Edit image</label>
               <input type="file" @change="edit(image, index, $event)" id="edit_image" hidden>
             </div>
             <div @click="remove(index)">Remove image</div>
           </li>
         </ol>
     </div>
     <div class="form-group">
     　<label for="exampleFormControlTextarea1">メモ</label>
     　<textarea name="content" v-model="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('content')}}</textarea>
   　</div>
   </div>
   <button type="submit">作成する</button>
 </form>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script>
 new Vue({
           el: '#image',
           data() {
             return {
               images: [],
               content: "",
               errors: []
             }
           },
           methods: {
             onFileChange(e) {
               let files = e.target.files
               // 0は今取得したものを指している
               this.createImage(files[0])
             },
             createImage(file) {
               // FileReaderでinputのfileが所有する中身を読み取ることができる。
               // resultは読み込んだ後に、中身のデータを取得してインスタンス化。詳しくは下記リンク。
               // https://hakuhin.jp/js/file_reader.html
               const reader = new FileReader();
               // 読み込みが成功した際に走るイベント。eには読み込んだ値が入っている。
               reader.onload = (e) => {
                   // プレビュー表示用
                   file.thumbnail = e.target.result;
                   this.images.push(file)
               };
               // base64形式にエンコードされたURLに変換
               reader.readAsDataURL(file);
             },
             edit(img, i, e) {
               // 新しく入力された写真を取得する
               let edit_image = e.target.files[0]

               // 新しく入力された写真をプレビュー表示させるための処理
               const reader = new FileReader();
               reader.onload = (e) => {
                   // プレビュー表示用
                   edit_image.thumbnail = e.target.result;
                   // 配列の置き換えも出来る。詳しくは https://ginpen.com/2018/12/07/array-splice-to-insert-replace/
                   this.images.splice(i, 1, edit_image);
               };
               // base64形式にエンコードされたURLに変換
               reader.readAsDataURL(edit_image);
             },
             remove(i) {
               this.images.splice(i, 1);
             },
             send(e){

               this.errors = []

               if(!this.content){
                 this.errors.push("メモを入力してください");
               }

               if(this.images.length === 0){
                 this.errors.push("写真を選択してください");
               } else if(this.images.length > 4){
                 this.errors.push("写真は4枚以内で選択してください");
               }

               e.preventDefault();
               

               // エラーが無かったら送信する
               if(this.errors.length === 0) {
                 console.log('kiteru')
                 images = this.images

                 let list = [];
                 images.forEach(function(val) {
                   list.push(val) 
                 })
                 
                 dataform = new FormData();
                 dataform.append('content', this.content);

                 // 以下の形にしないと配列で送れなくなってしまう
                 list.forEach(function(img) {
                   dataform.append('images[]', img);
                 })
                 axios.post('http://127.0.0.1:8000/me/create', dataform).then(res => {
                   // vue-routerを使わない場合
                   window.location.href = "http://127.0.0.1:8000/post/index"
                 }).catch(function(error){
                   console.log(error)
                 })
               }
             }
           },
         })
</script>
            <div class="fashionName">
                <h2>fashion item Name</h2>
                <input type="text" name="fashion[fashionName]" placeholder="名前"/>
                <p class="fashionName__error" style="color:red">{{ $errors->first('fashion.fashionName') }}</p>
            </div>
            <div class="fashionOverview">
                <h2>fashion itemの概要</h2>
                <textarea name="fashion[fashionOverview]" placeholder="登録したfashion itemの概要" ></textarea>
                <p class="fashionOverview__error" style="color:red">{{ $errors->first('fashion.fashionOverview') }}</p>
            </div>
            <div class="syuunou">
                <h2>収納場所</h2>
                <textarea name="fashion[syuunou]" placeholder="クローゼット等"></textarea>
                <p class="syuunou_error" style="color:red">{{ $errors->first('fashion.syuunou') }}</p>
            </div>

            <div class="category">
                <h2>Category</h2>
                <select name="fashion[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    </body>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection