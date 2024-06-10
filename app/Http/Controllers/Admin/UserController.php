<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function index(){
        $user = User::paginate(10);
        return view('admin.user.index',compact('user'));
    }
    public function create(){

         return view('admin.user.create');
    }
    public function store(UserFormRequest $request){
        $validateData = $request->validated();
        $user = new User();
        $user->name = $validateData['name'];
        $user->phone = $validateData['phone'];
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/user/',$fileName);
            $user->image = $fileName;
        }
        $user->save();
        return redirect('/admin/user')->with('message','User Added Successfully');
    }
    public function edit (User $user)
    {
        return view('admin.user.edit',compact('user'));
    }
    public function update(UserFormRequest $request, $user)
    {
    $validateData = $request->validated();
    $user = User::findOrFail($user);
    $user->name = $validateData['name'];
    $user->email = $validateData['email'];
    $user->phone = $validateData['phone'];

    if ($request->hasFile('image')) {
        $path = 'uploads/user/'.$user->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $file->move('uploads/user/', $fileName);
        $user->image = $fileName;
    }
    if (!empty($validateData['password'])) {
        $user->password = bcrypt($validateData['password']);
    }
    $user->save();
    return redirect('/admin/user')->with('message', 'User Updated Successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/user')->with('message', 'User Deleted Successfully');
    }
}
