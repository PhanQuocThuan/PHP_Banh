@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<h2>{{ $viewData['title'] }}</h2>
<form action="{{ route('admin.type.update', ['type' => $viewData['type']->TypeID]) }}" method="POST" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" class="form-control" name="Name" value="{{ $viewData['type']->Name }}" required>
    </div>
    <div class="form-group">
        <label for="Description">Description</label>
        <input type="text" class="form-control" name="Description" value="{{ $viewData['type']->Description }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update Type</button>
</form>
@endsection
