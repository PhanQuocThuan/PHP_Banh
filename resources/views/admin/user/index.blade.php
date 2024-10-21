@extends('layouts.admin')
@section('title', "Home Page")
@section('content')
<form action="{{ route('admin.user.index') }}" method="GET" class=" mb-3 ">
    <input type="text" name="search" class="form-control" placeholder="Search User..." value="{{ request()->query('search') }}">
    <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
<a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i></a>
<table class="table table-striped table-border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['users'] as $user)
        <tr>         
            <th>{{$user->UserID}}</th>
            <th>{{$user->Name}}</th>
            <th>{{$user->Email}}</th>
            <th>{{$user->Phone}}</th>
            <th>{{$user->Address}}</th>
            <th>{{$user->Role}}</th>
            <th>
                <a href="{{ route('admin.user.show', ['user' => $user->UserID]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.user.edit', ['user' => $user->UserID]) }}" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i></a>
                <form action="{{ route('admin.user.destroy', ['user' => $user->UserID]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa User này chứ?');"><i class="fa-solid fa-xmark"></i></button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection