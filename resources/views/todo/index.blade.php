@extends('todo.master')

@section('content')  
<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
      
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
              
                <div class="row">
                  <div class="col-md-7">
                    <p class="logout">Hi,<p>{{ Auth::user()->name }}</p></p>
                    <a href="{{route('logout')}}">Logout</a>
                  </div>
                </div>


          <div class="card rounded-3">
            <div class="card-body p-4">
    
              <h4 class="text-center my-3 pb-3">To Do App</h4>
    
              <form action="{{route('store')}}" method="POST" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                @csrf
                <div class="col-12">
                  <div class="form-outline">
                    <input type="text" id="form1" class="form-control" placeholder="Enter a task here" name="title" />
                  </div>
                </div>
    
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
    
                {{-- <div class="col-12">
                  <button type="submit" class="btn btn-warning">Get tasks</button>
                </div> --}}
              </form>
    
              <table class="table mb-4">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Todo item</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $counter=1 @endphp
                  @foreach($todos as $value)
                    <tr>
                      <th>{{$counter}}</th>
                      <td>{{$value->title}}</td>
                      <td>
                        @if($value->is_completed)
                          <div class="badge bg-success">Completed</div>
                        @else
                        <div class="badge bg-warning">Incompleted</div>
                        @endif

                      </td>
                      <td>
                        <a href="{{route('edit', $value->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{ route('destroy', $value->id)}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @php $counter++; @endphp
                  @endforeach
                </tbody>
              </table>
    
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection