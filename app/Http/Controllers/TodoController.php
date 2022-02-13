<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create()
    {
        return view('todo.create');
    }

    // Request $request ===> Requestクラスをインスタンス化してものが$requestに入る
    // メソッドインジェクション
    // Controllerに定義するメソッドは自動的に使える
    public function store(Request $request)
    {
        dd($request->all());
    }

}
