@extends('layouts.app')
@section('title', "Home Page")
@section('content')
    @if(session('cart'))
        <table class="table table-bordered border-warning">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $item)
                <tr>
                    <td><img src="{{ $item['Img'] }}" style="width: 50px;" alt="{{ $item['Name'] }}"></td>
                    <td>{{ $item['Name'] }}</td>
                    <td>{{ $item['Price'] }}$</td>
                    <td>
                        <form action="{{ route('cart.update', ['ProductID' => $id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="Quantity" value="{{ $item['Quantity'] }}" min="1">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('cart.remove', ['ProductID' => $id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <h4>Total: ${{ array_reduce(session('cart'), function ($carry, $item) {
                return $carry + ($item['Price'] * $item['Quantity']);
            }, 0) }}</h4>
        </div>
        <form action="{{ route('order.create') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success mt-3">Order</button>
        </form>
    @else
        <p>Your cart is empty!</p>
    @endif
@endsection