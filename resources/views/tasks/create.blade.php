@extends('layout.app')

@section('content')
<form method = 'post' action = '{{route('tasks.store')}}' class = 'ms-3'>
@csrf
    <div class="mb-3 mt-3 col-3 ">
        <label for="exampleInputEmail1" class="form-label">Task Title</label>
        <input  type="text" name="title" class="@error('title') is-invalid @enderror form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('title')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror   
    </div>
    <div class="mb-3 col-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea name="description" id="" cols="30"class="@error('description') is-invalid @enderror form-control"  rows="3"></textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-3">
        <label for="exampleInputPassword1" class="form-label">Due Date</label>
        <input  name="due_date" type="date" class="@error('due date') is-invalid @enderror form-control" />
        @error('due date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror       
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection