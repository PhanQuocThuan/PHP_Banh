@extends('layouts.app')
@section('title', "Home Page")
@section('backgroup')
<img src="\img\bg_cake.jpg" class="card-img" alt="...">
        <div class="card-img-overlay  text-center">
          <h5 class="card-title text-white fs-1">Chào mừng bạn đến với TDK</h5>
        </div>
@endsection
@section('content')
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
                  <form action="{{ route('cart.add', ['ProductID' => $cake['ProductID']]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn border-warning border-1">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                </form>
                </div>
              </div>
              @endforeach
        </div>
    </div>
@endsection
