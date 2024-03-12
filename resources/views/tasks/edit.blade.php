@extends('layout.app')

@section('content')
    <form method = 'post' action = '{{route('tasks.update',$task->id)}}' class = 'ms-3'>
    @csrf
    @method('PUT')
        <div class="mb-3 mt-3 col-3 ">
            <label for="exampleInputEmail1" class="form-label">Task Title</label>
            <input value='{{$task->title}}' type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea name="description" id="" cols="30"class="form-control"  rows="3">{{$task->description}}</textarea>
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputPassword1" class="form-label">Due Date</label>
            <input value='{{$task->due_date}}'  name="due_date" type="date" class="form-control" />
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection