<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function front(){
        return view ('front');
    }
    public function mypage(){
        return view ('mypage');  
    }
}
