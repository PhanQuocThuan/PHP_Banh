@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Type">Type</label>
            <select name="Type" class="form-control" required>
                @foreach ($viewData['types'] as $type)
                <option value="{{$type->TypeID}}">{{$type->Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Img">Img</label>
            <input type="file" class="form-control" name="Img" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="Name" required>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <input type="text" class="form-control" name="Description" required>
        </div>
        <div class="form-group">
            <label for="Price">Price</label>
            <input type="number" class="form-control" name="Price" required>
        </div>
        <div class="form-group">
            <label for="Stock">Stock</label>
            <input type="number" class="form-control mb-3" name="Stock" required>
        </div>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
    </form>
</div>
@endsection
