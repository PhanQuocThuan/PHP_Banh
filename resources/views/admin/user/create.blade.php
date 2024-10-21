@extends('layouts.admin')
@section('title', "Home Page")
@section('content')
<form action="{{ route('admin.user.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" class="form-control" name="Name" required>
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" name="Email" required>
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="Password" required>
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" name="Phone" required>
    </div>
    <div class="form-group">
        <label for="Address">Address</label>
        <input type="text" class="form-control" name="Address" required>
    </div>
    <div class="form-group">
        
    <label for="Role">Role</label>
    <select name="Role" class="form-control mb-3" required>
        <option value="client">Client</option>
        <option value="admin">Admin</option>
    </select>
    </div>
    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i></button>
</form>
@endsection