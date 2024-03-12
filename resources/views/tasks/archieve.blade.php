@extends('layout.app')


@section('content')
    <table class="table mt-4">
    <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Task Name</th>
            <th scope="col">Description</th>
            <th scope="col">Due Date</th>
            </tr>
        </thead>
        <tbody>
  
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->due_date}}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection