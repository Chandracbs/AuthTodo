@extends('auth.master')
@section('content')
    <div class="register">
        <form action="{{ route('store_auth')}}" method="POST">
            @csrf
                <h2>User Registration</h2>
                Name:<input type="text" name="name" value="" placeholder="Enter your name" required><br><br>
                Email:<input type="email" name="email" value="" placeholder="Enter your email" required><br><br>
                Password:<input type="password" name="password" placeholder="Enter your password" required><br><br>
                <input type="submit" name="submit" value="Register"><br><br>
                <a href="{{ route('login')}}">Already have an account?</a><br>       
        </form>
    </div>
@endsection