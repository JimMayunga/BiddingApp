@extends('layout')
@section('content')
    <h1>New Product Request</h1>
    <form action="{{ route('create_product') }}" method="post">
        @csrf
        <div>
            Product type:
            <input type="text" name="product_type">
        </div>
        <br>
        <div>
            Product description:<br>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div>
            Location:
            <input type="text" name="location">
        </div>
        <br>
        <div><input type="submit" value="Create product request"></div>
    </form>
@endsection
