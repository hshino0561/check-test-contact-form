<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.05_register');
    }

    public function register(Request $request)
    {
        // $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

        // return redirect()->url('/login'); // 登録後にリダイレクトする先
        return redirect('/login'); // 登録後にリダイレクトする先
        // return view('/login'); // 登録後にリダイレクトする先
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
