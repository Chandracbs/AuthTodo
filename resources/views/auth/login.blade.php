@extends('auth.master')
@section('content')
<div class="login">
    <form action="{{ route('authenticate')}}" method="POST">
        @csrf
            <h2>Login</h2>
            Email:<input type="email" name="email" value="" placeholder="Enter your email" required><br><br>
            Password:<input type="password" name="password" placeholder="Enter your password" required><br><br>
            <input type="submit" name="submit" value="Login">&nbsp;&nbsp;&nbsp;
            <a href="{{ route('register')}}">New User?</a>   
    </form>
</div>
@endsection