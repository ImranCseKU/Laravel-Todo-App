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
        // return view('todos.index')->with('todos', $todos);
    }

    public function show( $todoId){
        
        $todo = Todo::find($todoId);

        return view('todos.show')->with('todo', $todo);
    }
}
