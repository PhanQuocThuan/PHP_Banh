@extends('layouts.app')
@section('title', "Home Page")
@section('content')
<div class="container mt-3">
    <div class="btn-group" role="group">
      <a href="{{ route('kind.index') }}" class="btn btn-warning">All</a>
      @foreach ($viewData['types'] as $type)
        <a href="{{ route('kind.type', ['TypeID' => $type->TypeID]) }}" class="btn btn-outline-warning text-black">
          {{ $type->Name }}
        </a>
      @endforeach
    </div>
  </div>
  <div class="container">
    <div class="row d-flex justify-content-around">
      @foreach ($viewData['cakes'] as $cake)
      
          <div class="card border-0 my-5" style="width: 17rem;">
            <a href="{{ route('home.show', ['ProductID' => $cake['ProductID']]) }}">
              <img src="{{$cake ->Img}}" class="card-img-top img-fluid" alt="{{$cake ->Name}}">
            </a>
            <div class="card-body text-center">
              <a href="{{ route('home.show', ['ProductID' => $cake['ProductID']]) }}" class="text-decoration-none">
                <h5 class="card-title text-black">{{$cake ->Name}}</h5>
              </a>
              <p class="card-text">{{$cake ->Price}}$</p>
              <a href="#" class="btn border-warning boder-1"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
          </div>
        
          @endforeach
    </div>
</div>
@endsection
