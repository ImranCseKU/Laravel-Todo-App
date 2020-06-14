@extends('layout.app')

@section('title')
    Todo list
@endsection

@section('content')
    <h1 class="text-center my-5">Todo Page</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo</div>
                
                <div class="card-body">
                    <ul class="list-group">
                        @foreach( $todos as $todo )
                            <li class="list-group-item">
                                {{ $todo->name }}

                                @if ( !$todo->completed)
                                <a href="/todos/{{$todo->id }}/complete" class="btn btn-warning btn-sm float-right" style="color:white">complete</a>
                                @endif
                                
                                <a href="/todos/{{$todo->id }}" class="btn btn-primary btn-sm float-right mr-2">View</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
