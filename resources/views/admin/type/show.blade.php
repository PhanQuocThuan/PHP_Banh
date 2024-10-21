@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<h2>Products:</h2>
<ul>
    <table class="table table-striped table-border">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData['type']->products as $product)
                <tr>
                    <th><img src="{{$product->Img}}" alt="{{$product->Name}}" style="width: 50px"></th>
                    <th>{{$product ->Name}}</th>
                    <th>{{$product ->Description}}</th>
                    <th>{{$product ->Price}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</ul>
<a href="{{ route('admin.type.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
@endsection
