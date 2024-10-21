@extends('layouts.admin')
@section('title', 'User Details')
@section('content')
<div class="container mt-5">
    <h2>User Details</h2>
    <div class="card mb-4">
        <div class="card-header">
            User Information
        </div>
        <div class="card-body">
            <p><strong>ID: </strong>{{$viewData['user']->UserID}}</p>
            <p><strong>Name: </strong> {{ $viewData['user']->Name }}</p>
            <p><strong>Email: </strong> {{ $viewData['user']->Email }}</p>
            <p><strong>Password: </strong>{{$viewData['user']->Password}}</p>
            <p><strong>Phone: </strong>{{$viewData['user']->Phone}}</p>
            <p><strong>Address: </strong> {{ $viewData['user']->Address }}</p>
            <p><strong>Role: </strong> {{ $viewData['user']->Role}}</p>
            <p><strong>Create: </strong> {{ $viewData['user']->created_at}}</p>
            <p><strong>Update: </strong> {{ $viewData['user']->updated_at}}</p>
        </div>
    </div>

    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
    <a href="{{ route('admin.user.edit', ['user' => $viewData['user']->UserID]) }}" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i></a>
</div>
@endsection
