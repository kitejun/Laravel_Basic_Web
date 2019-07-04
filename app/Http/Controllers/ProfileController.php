<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return '<br><br><br><h1>ProfileController.profile()로 <br> 호출한 내 프로필이야!!</h1>';
    }
}