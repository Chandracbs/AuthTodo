@extends('todo.master')

@section('content')
    <div class="text-center mt-5">
        <h2>Edit Todo</h2>
    </div>

    <form  method="POST" action="{{route('update',$todos->id)}}">

        @csrf
        @method('PUT')

        <div class="row justify-content-center mt-5">

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Todo item</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$todos->title}}">
                </div>
                {{-- Code for Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_completed" class="form-control" id="">
                        <option value="1" @if($todos->is_completed==1) selected @endif>Completed</option>
                        <option value="0" @if($todos->is_completed==0) selected @endif>Incompleted</option>
                    </select>
                </div>
                {{-- Code for Status --}}

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </div>

    </form>

@endsection