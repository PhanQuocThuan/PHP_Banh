<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class KindController extends Controller
{
    public function index()
{
    $viewData = [];
    $viewData['title'] = "Home Page";
    $viewData['cakes'] = Product::all();
    $viewData['types'] = Type::all();
    return view('kind.index')->with('viewData', $viewData);
}

public function filterByType($TypeID)
{
    $viewData = [];
    $viewData['title'] = "Home Page - Filter by Type";
    $viewData['cakes'] = Product::where('TypeID', $TypeID)->get();
    $viewData['types'] = Type::all();
    return view('kind.index')->with('viewData', $viewData);
}

}
