<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fashion;

class fashionController extends Controller
{
    /**
 * fashiion一覧を表示する
 * 
 * @param fashion fashionモデル
 * @return array fashionモデルリスト
 */
public function index(fashion $fashion)
{
    return $fashion->get();
}
}
