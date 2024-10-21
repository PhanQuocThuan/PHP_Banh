@extends('layouts.admin')
@section('title', "Home Page")
@section('content')
<form action="{{ route('admin.product.index') }}" method="GET" class=" mb-3 ">
    <input type="text" name="search" class="form-control" placeholder="Search Product..." value="{{ request()->query('search') }}">
    <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
<a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
<table class="table table-striped table-border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['products'] as $product)
        <tr>         
            <th>{{$product->ProductID}}</th>
            <th><img src="{{$product->Img}}" alt="{{$product->Name}}" style="width: 50px"></th>
            <th>{{$product->Name}}</th>
            <th>{{$product->Description}}</th>
            <th>{{$product->Price}}</th>
            <th>{{$product->Stock}}</th>
            <th>
                <a href="{{ route('admin.product.show', ['product' => $product->ProductID]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.product.edit', ['product' => $product->ProductID]) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                <form action="{{ route('admin.product.destroy', ['product' => $product->ProductID]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa Product này chứ?');"><i class="fa-solid fa-xmark"></i></button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection