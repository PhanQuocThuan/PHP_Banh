@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <form action="{{ route('admin.type.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="Name" required>
        </div>
        <div class="form-group mb-3">
            <label for="Description">Description</label>
            <input type="text" class="form-control" name="Description" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
    </form>
</div>
@endsection
