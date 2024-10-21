@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<form action="{{ route('admin.user.update', ['user' => $viewData['user']->UserID]) }}" method="POST">
    @csrf
    @method('PUT')
    <label>ID:</label>
    <input type="text" name="UserID" class="form-control" value="{{ $viewData['user']->UserID }}" disabled>
    <label>Name</label>
    <input type="text" name="Name" class="form-control" value="{{ $viewData['user']->Name}}" required>
    <label>Email</label>
    <input type="text" name="Email" class="form-control" value="{{ $viewData['user']->Email }}">
    <label>Password</label>
    <input type="text" name="Password" class="form-control" value="{{ $viewData['user']->Password }}">
    <label>Phone</label>
    <input type="text" name="Phone" class="form-control" value="{{ $viewData['user']->Phone }}" required>
    <label>Address</label>
    <input type="text" name="Address" class="form-control" value="{{ $viewData['user']->Address }}" required>
    <label>Role</label>
    <select name="Role" class="form-control">
        <option value="admin" @if($viewData['user']->Role) selected @endif>Admin</option>
        <option value="client" @if($viewData['user']->Role) selected @endif>Client</option>
    </select>
    <button type="submit" class="btn btn-primary mt-3">Update User</button>
</form>
@endsection
