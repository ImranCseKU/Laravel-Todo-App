<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index(){

        //fatch all todos from database
        $todos = Todo::all();

        //display them in the todos.index page
        return view('todos.index', compact('todos'));

        // return view('todos.index')->with('todos', Todo::all() );
    }

    public function show( $todoId){
        
        $todo = Todo::find($todoId);

        return view('todos.show')->with('todo', $todo);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(){
        
        $data = request()->except('_token');

        // Todo::create($data);     //execute if and only if the form field and database tabel field matched

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        return redirect()->to('/todos');

    }
}
