<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request){
        $viewData = [];
        if ($request->has('search')) {
            $search = $request->query('search');
            $viewData["products"] = Product::where('Name', 'like', '%' . $search . '%')
                ->orWhere('Description', 'like', '%' . $search . '%')
                ->orWhere('Price', 'like', '%' . $search . '%')
                ->get();
        } 
        else {
            $viewData["products"] = Product::all();
        }
        
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function create()
    {
        $type = Type::all();
        $viewData = [
            "title" => "Add New product",
            "types" => $type
        ];
        return view('admin.product.create')->with("viewData", $viewData);
    }

    public function store(Request $request){
        $request->validate([
            "Type" => "required|in:",
            "Img" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "Name" => "required|max:255",
            "Description" => "required|max:255",
            "Price" => "required|integer",
            "Stock" => "required|integer",
        ]);
        if ($request->hasFile('Img')) {
            $imageName = time().'.'.$request->Img->getClientOriginalExtension();
            $request->Img->move(public_path('img'), $imageName);
            $imagePath = '\img\\' . $imageName;
            Product::create([
                "Type" => $request->TypeID,
                "Img" => $imagePath?? null,
                "Name" => $request->Name,
                "Description" => $request->Description,
                "Price" => $request->Price,
                "Stock" => $request->Stock,
            ]);
    
            return redirect()->route('admin.product.index')->with('Thành công', 'Đã thêm mới product!');
        }
        return redirect()->back()->with('error', 'File ảnh không được upload!');
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $viewData = [
            "title" => "product Details",
            "product" => $product
        ];
        return view('admin.product.show')->with("viewData", $viewData);
    }

    public function edit($id)
    {
        $type = Type::all();
        $product = Product::findOrFail($id);
        $viewData = [
            "title" => "Edit product",
            "types" => $type,
            "products" => $product
        ];
        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "Type" => "required|in:",
            "Img" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "Name" => "required|max:255",
            "Description" => "required|max:255",
            "Price" => "required|integer",
            "Stock" => "required|integer",
        ]);

        $product = Product::findOrFail($id);
        if ($request->hasFile('Img')) {
            if ($product->Img) {
                $oldImagePath = public_path($product->Img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imageName = time() . '.' . $request->Img->extension();
            $request->Img->move(public_path('img'), $imageName);
            $product->Img = '\img\\' . $imageName;
            Product::create([
                "Type" => $request->TypeID,
                "Img" => $imagePath?? null,
                "Name" => $request->Name,
                "Description" => $request->Description,
                "Price" => $request->Price,
                "Stock" => $request->Stock,
            ]); 
        }
        return redirect()->route('admin.product.index')->with('Thành công', 'Cập nhật product thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id); 
        $product->delete(); 
        return redirect()->route('admin.product.index')->with('Thành công', 'Đã thêm mới product!');
    }
}
