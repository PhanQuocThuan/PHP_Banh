@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<h2>{{ $viewData['title'] }}</h2>
<form action="{{ route('admin.product.update', ['product' => $viewData['products']->ProductID]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Type">Type</label>
        <select name="Type" class="form-control" required>
            @foreach ($viewData['types'] as $type)
                <option value="{{ $type->TypeID }}">
                    {{ $type->Name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Img">Img</label>
        <input type="file" class="form-control" name="Img" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
    </div>
    <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" class="form-control" name="Name" value="{{ $viewData['products']->Name }}" required>
    </div>
    <div class="form-group">
        <label for="Description">Description</label>
        <input type="text" class="form-control" name="Description" value="{{ $viewData['products']->Description }}" required>
    </div>
    <div class="form-group">
        <label for="Price">Price</label>
        <input type="number" class="form-control" name="Price" value="{{ $viewData['products']->Price }}" required>
    </div>
    <div class="form-group">
        <label for="Stock">Stock</label>
        <input type="number" class="form-control mb-3" name="Stock" value="{{ $viewData['products']->Stock }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update Product</button>
</form>
@endsection
