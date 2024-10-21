<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function count(){
        $type = Type::count();
        $product = Product::count();
        $user = User::count();
        $viewData =[
            'types' => $type,
            'products' =>$product,
            'users' => $user,
        ];
        return view('admin.home.index') -> with('viewData', $viewData);
    }
}
