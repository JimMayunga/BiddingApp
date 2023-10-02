@extends('layout')

@section('content')
    <h4>Welcome Login/ Register to view products</h4>

    <a href="{{ route('goto_login') }}">Login</a>
    <a href="{{ route('goto_register') }}">Register</a>
@endsection
