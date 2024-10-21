<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminTypeController extends Controller
{
    public function index(Request $request){
        $viewData = [];
        if ($request->has('search')) {
            $search = $request->query('search');
            $viewData["types"] = Type::where('Name', 'like', '%' . $search . '%')
                ->orWhere('Description', 'like', '%' . $search . '%')
                ->get();
        } 
        else {
            $viewData["types"] = Type::all();
        }
        
        return view('admin.type.index')->with("viewData", $viewData);
    }

    public function create()
    {
        $viewData = [
            "title" => "Add New Type"
        ];
        return view('admin.type.create')->with("viewData", $viewData);
    }

    public function store(Request $request){
        $request->validate([
            "Name" => "required|max:255",
            "Description" => "required|max:255",
        ]);
    
        Type::create([
            "Name" => $request->Name,
            "Description" => $request->Description,
        ]);
    
        return redirect()->route('admin.type.index')->with('Thành công', 'Đã thêm mới Type!');
    }
    
    public function show($id)
    {
        $type = Type::with('products')->findOrFail($id);
        
        $viewData = [
            "title" => "Type in " .$type->Name,
            "type" => $type,
        ];
        

        return view('admin.type.show')->with("viewData", $viewData);
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        $viewData = [
            "title" => "Edit Type",
            "type" => $type
        ];
        return view('admin.type.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "Name" => "required|max:255",
            "Description" => "required|max:255",
        ]);
    
        $type = Type::findOrFail($id);
        $type->update($request->only([
            "Name",
            "Description", 
        ]));
    
        return redirect()->route('admin.type.index')->with('Thành công', 'Đã thêm mới type!');
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id); 
        $type->delete(); 
        return redirect()->route('admin.type.index')->with('Thành công', 'Đã xóa type!');
    }
}
