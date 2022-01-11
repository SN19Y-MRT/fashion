<?php

namespace App\Http\Controllers;

use App\fashion;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(fashion $fashion)
    {
        return view('fashions/index')->with(['fashions' => $fashion->get()]);  
    }
}
?>