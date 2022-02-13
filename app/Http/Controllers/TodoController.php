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
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }

    public function index()
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }

}
