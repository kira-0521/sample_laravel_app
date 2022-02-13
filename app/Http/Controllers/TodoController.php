<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    // コンストラクタインジェクション
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function create()
    {
        return view('todo.create');
    }

    // Request $request ===> Requestクラスをインスタンス化してものが$requestに入る
    // メソッドインジェクション
    // Controllerに定義するメソッドは自動的に使える
    public function store(Request $request)
    {
        $inputs = $request->all();
        // dd($this->todo);
        $this->todo->fill($inputs);
        dd($this->todo);
        $this->todo->save();
    }

}
