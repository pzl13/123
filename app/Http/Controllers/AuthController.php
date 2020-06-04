<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;


    public function register(Request $request)
    {
        $message = 'Error user not create';
        $validatedData = $request->validate([
            'name' => 'required|string|unique:users,name|max:10',
            'age' => 'required|numeric|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:16',
            'img.*' => 'required|file|mimes:jpeg,jpg,png,gif|max:1000',
        ]);



        $user = new Users();
        $user->name=$request->name;
        $user->age=$request->age;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        if ($request->file('img')) {
            $user->image=$request->file('img');
        }

        if ($user->save()) {
            $message='Успешное создание';
        }

        return $message;

    }
        public function showRegisterForm ()
        {
            return view('registrationForm');
        }
}
