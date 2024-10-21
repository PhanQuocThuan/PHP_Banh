<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request){
        $viewData = [];
        if ($request->has('search')) {
            $search = $request->query('search');
            $viewData["users"] = User::where('Name', 'like', '%' . $search . '%')
                ->orWhere('Email', 'like', '%' . $search . '%')
                ->orWhere('Phone', 'like', '%' . $search . '%')
                ->orWhere('Role', 'like', '%' . $search . '%')
                ->orWhere('Address', 'like', '%' . $search . '%')
                ->get();
        } 
        else {
            $viewData["users"] = User::all();
        }
        
        return view('admin.user.index')->with("viewData", $viewData);
    }

    public function create()
    {
        $viewData = [
            "title" => "Add New User"
        ];
        return view('admin.user.create')->with("viewData", $viewData);
    }

    public function store(Request $request){
        $request->validate([
            "Name" => "required|max:255",
            "Email" => "required|max:255|unique:users",
            "Password" => "required|max:255",
            "Phone" => "required|max:255",
            "Address" => "required|max:255",
            "Role" => "required|in:admin,client",
        ]);
    
        User::create([
            "Name" => $request->Name,
            "Email" => $request->Email,
            "Password" => bcrypt($request->Password),
            "Phone" => $request->Phone,
            "Address" => $request->Address,
            "Role" => $request->Role,
        ]);
    
        return redirect()->route('admin.user.index')->with('Thành công', 'Đã thêm mới User!');
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        $viewData = [
            "title" => "User Details",
            "user" => $user
        ];
        return view('admin.user.show')->with("viewData", $viewData);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $viewData = [
            "title" => "Edit user",
            "user" => $user
        ];
        return view('admin.user.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "Name" => "required|max:255",
            "Email" => "required|max:255",
            "Password" => "required|max:255",
            "Phone" => "required|max:255",
            "Address" => "required|max:255",
            "Role" => "required|in:admin,client",
        ]);
    
        $user = User::findOrFail($id);
        $user->update($request->only([
            "UserID",
            "Name", 
            "Email", 
            "Password", 
            "Phone", 
            "Address", 
            "Role", 
            "created_at" => now(), 
        ]));
    
        return redirect()->route('admin.user.index')->with('Thành công', 'Đã thêm mới User!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); 
        $user->delete(); 
        return redirect()->route('admin.user.index')->with('Thành công', 'Đã thêm mới User!');
    }
}
