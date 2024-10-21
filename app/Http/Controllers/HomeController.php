<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData['cakes'] = Product::all();
        return view('home.index')-> with('viewData', $viewData);
    }

    public function show($ProductID)
    {
    $viewData = [];
    $product = Product::where('ProductID', $ProductID)->firstOrFail();
    $viewData["product"] = $product;
    return view('home.show')->with("viewData", $viewData);
    }
}
