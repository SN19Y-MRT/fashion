@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!-- body内だけを表示しています。 -->
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/fashions/{{ $fashion->id }}" method="POST">
            @csrf
            @method('PUT')
            <div id="image" v-cloak>
 <form enctype="multipart/form-data" @submit.prevent="send">
   @csrf
     
   <p v-if="errors.length">
     <b>入力内容に不備があります</b>
     <ul>
       <li v-for="error in errors">@{{ error }}</li>
     </ul>
   </p>
   <div class="form-group">
     <label for="exampleFormControlInput1">お知らせメール送信日</label>
     <input type="date" name="send_day"　v-model="send_day">
   </div>
   <div class="form-group">
     <div>
       <h2>Select an image</h2>
       <label for="select_image">写真を選択</label>
       <input type="file" @change="onFileChange" id="select_image" hidden>
     </div>
     <div v-if="images">
       <ol>
         <div>
           <li v-for="(image, index) in images">
             <h5>@{{image.name}}</h5>
             <div v-if="!image.thumbnail">
               <img :src="getImgUrl(image)" style="width: 100px; height: 100px;" alt="">
             </div>
             <div v-else>
               <img :src="image.thumbnail" style="width: 100px; height: 100px;" />
               <input type="hidden" v-model="image.name">
             </div>
             <div>
               <label :for="['edit_img_' + index]">Edit image</label>
               <input type="file" @change="edit(image, index, $event)" :id="['edit_img_' + index]">
             </div>
             <div @click="remove(image, index, $event)">Remove image</div>
           </li>
         </div>
       </ol>
     </div>
   </div>
   <div class="form-group">
     <label for="exampleFormControlTextarea1">メモ</label>
     <textarea name="content" v-model="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
   </div>
   <button type="submit">更新する</button>
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
               me_id: "",
               images: [],
               send_day: "",
               content: "",
               box: [],
               remove_image_list: [],
               errors: []
             }
           },
           mounted() {
             this.images = @json($edit_me->images);
             this.send_day = @json($edit_me->send_day);
             this.content = @json($edit_me->content);
             this.me_id = @json($edit_me->id);
           },
           methods: {
             getImgUrl(img) {
               // すでに存在している写真を表示させる
               let path = ["http://127.0.0.1:8000/", img.src];
               let path_link = path.join("");
               return path_link
             },
             onFileChange(e) {
               let files = e.target.files
               this.createImage(files[0])
             },
             createImage(file) {

               // boxに追加
               let test = {
                 file_name: file.name,
                 edit_id: null
               }
               this.box.push(test)

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

               // boxに追加
               let test = {
                 file_name: edit_image.name,
                 edit_id: img.id
               }
               this.box.push(test)

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
             remove(img, i, e) {
               // 削除するリストに追加
               this.remove_image_list.push(img.id)
               this.images.splice(i, 1);
             },
             send(e){

               this.errors = []

               if(!this.send_day){
                 this.errors.push("送信日を入力してください");
               }

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
                 dataform = new FormData();
                 dataform.append('send_day', this.send_day);
                 dataform.append('content', this.content);
                 dataform.append('remove_image_list', this.remove_image_list);

                 this.box.forEach(function(ele, i) {
                   let koko = JSON.stringify(ele)
                   dataform.append('box[]', koko);
                 })

                 // 以下の形にしないと配列で送れなくなってしまう
                 this.images.forEach(function(img) {
                   if(img.thumbnail) {
                     dataform.append('images[]', img);
                   } else {
                     return false;
                   }
                 })

                 // 現在編集中のmeのidを取得
                 let id = this.me_id
                 // 編集まで飛ぶパスを作成
                 var array = ["http://127.0.0.1:8000/me/", id, "/update"];
                 // パスをjoinで結合
                 let path = array.join('')
                 axios.post(path, dataform).then(res => {
                   console.log('back')
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