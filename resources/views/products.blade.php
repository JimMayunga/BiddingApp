@extends('layout')

@section('content')
    <h1>
        Product Requests</h1>
    <p style="color:red;">
        @isset($message)
            {{ $message }}
        @endisset
    </p>
    <p style="color:red;">
        @isset($error)
            {{ $error }}
        @endisset
    </p>

    <table border=1>
        <tr>
            <th>Product type</th>
            <th>Description</th>
            <th>Location</th>
            <th>Created at</th>
            <th>Closing time</th>

        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->product_type }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->location }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->closing_time }}</td>
            </tr>
        @endforeach
    </table>
@endsection
