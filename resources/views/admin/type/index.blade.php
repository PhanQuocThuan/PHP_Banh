@extends('layouts.admin')
@section('title', "Home Page")
@section('content')
<form action="{{ route('admin.type.index') }}" method="GET" class=" mb-3 ">
    <input type="text" name="search" class="form-control" placeholder="Search Type..." value="{{ request()->query('search') }}">
    <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
<a href="{{ route('admin.type.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
<table class="table table-striped table-border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Descripton</th>
            <th class="col-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['types'] as $type)
        <tr>         
            <th>{{$type->TypeID}}</th>
            <th>{{$type->Name}}</th>
            <th>{{$type->Description}}</th>
            <th>
                <a href="{{ route('admin.type.show', ['type' => $type->TypeID]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.type.edit', ['type' => $type->TypeID]) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                <form action="{{ route('admin.type.destroy', ['type' => $type->TypeID]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa Type này chứ?');"><i class="fa-solid fa-xmark"></i></button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection