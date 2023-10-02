@extends('layout')
@section('content')
    <h1>Register</h1>
    <p style="color:red;">
        @isset($_GET['error'])
            {{ $_GET['error'] }}
        @endisset
    </p>
    <form action="{{ route('register_user') }}" method="post">
        @csrf
        <div>
            Name:
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div>
            Email:
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            Password:
            <input type="password" name="password" value="">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
@endsection
