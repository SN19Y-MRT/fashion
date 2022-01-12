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
 * @return Reposnse fahsion view
 */
public function show(Fashion $fashion)
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
    

}
?>