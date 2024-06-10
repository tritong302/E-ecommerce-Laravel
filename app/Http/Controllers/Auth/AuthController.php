<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('admin.user.register');
    }
    public function login()
    {

        return view('admin.user.login');
    }
    public function Checklogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role_as == '1') {
                return redirect('/admin/dashboard')->with('success', 'Signed in as admin');
            } else {
                return redirect('/')->with('success', 'Signed in as user');
            }
        }
        return redirect()->route('login')->withErrors('Email hoặc mật khẩu không đúng!');
    }
    public function postUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'unique:users', 'max:11', 'regex:/^(0|\+84)[3|5|7|8|9][0-9]{8}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i'],
            'name' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ], [
            'email.regex' => "Gmail không hợp lệ",
            'email.required' => "Gmail không được để trống",
            'email.unique' => "gmail này đã tồn tại trên hệ thống",
            'email.max' => "gmail không đúng",

            'phone.required' => "số điện thoại không được để trống",
            'phone.unique' => "số điện thoại đã tồn tại",
            'phone.regex' => "số điện thoại không hợp lệ",
            'phone.max' => "số điện thoại không đúng",
            'name.required' => "Họ và tên không được để trống",
            'name.max' => "Họ và tên quá dài",
            'password.required' => "mật khẩu không được để trống",
            'password.min' => "Mật khấu phải ít nhất 6 ký tự",
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);
        $errors = [];

        if ($validator->fails()) {

            if ($validator->errors()->has('phone')) {
                $errors['phone'] = $validator->errors()->first('phone');
            }
            if ($validator->errors()->has('email')) {
                $errors['email'] = $validator->errors()->first('email');
            }

            if ($validator->errors()->has('name')) {
                $errors['name'] = $validator->errors()->first('name');
            }

            if ($validator->errors()->has('password')) {
                $errors['password'] = $validator->errors()->first('password');
            }
            return redirect()->route('register')
                ->withErrors($errors)
                ->withInput();
        }
        if ($request->hasFile('image')) {
            $avatar = $request->file('image');
            $avatarName = time() . '_' . $avatar->getClientOriginalName();
            $avatar->move(public_path('uploads/user/'), $avatarName);
            $data['image'] = $avatarName;
        }
        $user = new User([

            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'image' => $data['image'] ?? null,
            'password' => Hash::make($request->input('password')),
        ]);

        $user->save();
        // Chuyển hướng tới trang đăng nhập
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
    public function logOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
