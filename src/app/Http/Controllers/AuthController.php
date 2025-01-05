<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function register()
  {
    return view('auth.05_register');
  }

  public function login()
  {
    return view('auth.06_login');
  }
}
