<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MyAcCountController extends Controller
{
    public function index()
    {
       $user = User::where('id', auth()->user()->id)->first();
       return view('users.myaccount', compact('user'));
    }
}
