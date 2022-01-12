<?php

namespace App\Http\Controllers;

use App\fashion;
use App\Http\Requests\fashionRequest;

class fashionController extends Controller
{
    public function index(Fashion $fashion)
    {
        return view('fashions/index')->with(['fashions' => $fashion->getPaginateByLimit()]);
    } 

    /**
     * 特定IDのpostを表示する
     *
     * @params Object fashion // 引数の$fashionはid=1のfashionインスタンス
     * @return Reposnse fashion view
     */
    public function show(fashion $fashion)
    {
        return view('fashions/show')->with(['fashion' => $fashion]);
    }
    
    public function register()
    {
        return view('fashions/register');
        


    }
    
    public function store(fashionRequest $request, Fashion $fashion)
    {
        $input = $request['fashion'];
        $fashion->fill($input)->save();
        return redirect('/fashions/' . $fashion->id);
    }
    
    public function edit(fashion $fashion)
    {
        return view('fashions/edit')->with(['fashion' => $fashion]);
    }
    
    public function update(fashionRequest $request, fashion $fashion)
    {
        $input_fashion = $request['fashion'];
        $fashion->fill($input_fashion)->save();
        return redirect('/fashions/' . $fashion->id);
    }
    
    public function delete(fashion $fashion)
    {
        $fashion->delete();
        return redirect('/');
    }
    
    
    

}
?>