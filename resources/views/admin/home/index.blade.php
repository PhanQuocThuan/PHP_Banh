@extends('layouts.admin')
@section('title', "Home Page")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card text-white bg-primary mb-3">
                  <div class="card-body">
                    <h5 class="card-title">Type</h5>
                    <p class="card-text">{{$viewData['types']}} loại</p>
                  </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card text-white bg-success mb-3">
                  <div class="card-body">
                    <h5 class="card-title">Product</h5>
                    <p class="card-text">{{$viewData['products']}} sản phẩm</p>
                  </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card text-white bg-danger mb-3">
                  <div class="card-body">
                    <h5 class="card-title">Type</h5>
                    <p class="card-text">{{$viewData['users']}} người dùng</p>
                  </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card text-white bg-warning mb-3">
                  <div class="card-body">
                    <h5 class="card-title">Order</h5>
                    <p class="card-text"> đơn</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection