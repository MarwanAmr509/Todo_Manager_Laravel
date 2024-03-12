@extends('layout.app')



@section('content')
    <table class="table mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Task Name</th>
            <th scope="col">Description</th>
            <th scope="col">Due Date</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

        

            @foreach ($tasks as $task)
               <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->due_date}}</td>
                    <td>
                    
                        <a href ='{{route('tasks.edit',$task->id)}}' type="button" class="btn btn-primary">Edit</a>
                        <form action="{{route('tasks.destroy',$task->id)}}" method = 'post' class = 'd-inline'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Complete</button>
                        </form>
                        <form action="{{route('tasks.forceDelete',$task->id)}}" method = 'post'  class = 'd-inline'>
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
