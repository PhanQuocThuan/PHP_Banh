@extends('layouts.app')
@section('title', "Home Page")
@section('content')
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <img src="{{$viewData["product"] ->Img}}" class="card-img-top img-fluid w-50" alt="{{$viewData["product"] ->Name}}">
                </div>
                <div class="col">
                    <h1 class="fst-italic text-center text-decoration-underline text-warning">{{$viewData["product"] ->Name}}</h1>
                    <h4>Price: {{$viewData["product"] ->Price}} $</h4>
                    <h4>Ghi chú: </h4>
                    <h6>{{$viewData["product"] ->Description}}</h6>
                    <div class="form-group col-3">
                        <label for="Quantity">Số lượng:</label>
                        <input type="number" class="form-control mb-3" name="Quantity" min="1" required>
                    </div>
                    <a href="#" class="btn border-warning border-1"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
        </div>
@endsection