@extends('layout')
@section('content')
    <h1>Login to your account</h1>
    <form action="{{ route('login_user') }}" method="post">
        @csrf
        <div>
            Email:
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            Password:
            <input type="password" name="password">
        </div>
        <div><input type="submit" value="Login"></div>
    </form>
@endsection
