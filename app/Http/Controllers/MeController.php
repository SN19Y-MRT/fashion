<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeController extends Controller
{
    public function create(CreateMe $request)
   {
       $user = Auth::user();
       $me = new Me();

       $me->user_id = $user->id;
       $me->content = $request->content;

       $image_list = [];
       if($request->has('images')) {
           foreach($request->images as $image) {
               $img = new Image();
               $path = $image->store('public');
               $read_temp_path = str_replace('public/', 'storage/', $path);
               $img->src = $read_temp_path;
               array_push($image_list, $img);
           }
       }

       $me->save();
       $me->images()->saveMany($image_list);
       
       return redirect()->route('post_index');

   }
   
   public function edit($me) 
   {
       $user = Auth::user();
       $edit_me = Me::findOrFail($me);
       if($user->id === $edit_me->user_id){
           return view('me.edit', ['edit_me' => $edit_me]);
       }
   }

   public function update(CreateMe $request, $me)
   {
       $user = Auth::user();
       $edit_me = Me::findOrFail($me);

       if($user->id === $edit_me->user_id){
           $edit_me->send_day = $request->send_day;
           $edit_me->content = $request->content;
           $edit_me->update();

           $image_list = [];

           if($request->has('images')) {
               foreach($request->box as $ele) {

                   // json_decodeでjsonの形にデータを変形している
                   $test = json_decode($ele, true);

                   // file名を取得
                   $file_name = $test['file_name'];

                   // 編集されるimageのidを取得
                   $file_id = $test['edit_id'];
                   
                   // 編集されるimageのidを持っている場合。つまり更新処理。
                   if($file_id !== null) {
                       // 送られてきているfileオブジェクトをeachで回す。
                       foreach($request->images as $image) {

                           // file名取得
                           $name_file = $image->getClientOriginalName();

                           // 更新される予定のimageのカラムsrcを変更していく。それが更新される予定の$file_nameと一致しているかを確認
                           if($name_file === $file_name) {

                               // 更新される予定のimageを取得
                               $edit_image = Image::find($file_id);

                               // 新しく入ってきている写真fileで保存処理
                               $path = $image->store('public');
       
                               // srcカラムに保存するパスを作成
                               $read_temp_path = str_replace('public/', 'storage/', $path);
       
                               // 元からある写真のsrcに新しく作成したscrのパスを入れる
                               $edit_image->src = $read_temp_path;
                               array_push($image_list, $edit_image);
                           } else {
                               // 更新処理でない場合は普通に新規作成と同じ流れ
                               $img = new Image();
                               $path = $image->store('public');
                               $read_temp_path = str_replace('public/', 'storage/', $path);
                               $img->src = $read_temp_path;
                               array_push($image_list, $img);
                           }
                       }
                   }
               }
           }

           $list = $request->remove_image_list;
           $ee = explode(',', $list);
           foreach($ee as $id) {
               // 数字に変換している、数字以外だとエラーになるので注意。https://teratail.com/questions/276973
               $i = (int)$id;
               foreach($edit_me->images as $img) {
                   if($img->id === $i) {
                       $img->delete();
                   }
               }
           }

           $edit_me->images()->saveMany($image_list);
           return redirect()->route('post_index');
       }
   }
}
