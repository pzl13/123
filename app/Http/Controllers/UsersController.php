<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    public function creatUser(Request $request, Users $user)
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
        $user->user_id = Auth::user()->id;
        if ($request->file('img')) {
            $user->image=$request->file('img');
        }

        if ($user->save()) {
            $message='Успешное создание';
//            return redirect('main');
        }

//        return $message;
        $user->save();
//        return $user;
    }



    public function showAllUsers()
    {
        $users = Users::sortable()->paginate(5);
        return view('showall', ['users' => $users]);
    }

    public function showCreateUser(Users $user)
    {

        $user = Users::all();

//        return view ('createUsers', compact('$user'));
        return view ('createUsers', ['user' => $user]);
    }

    public function usersId(Request $request)
    {
        $user = DB::table('users')->where('id', $request->id)->first();
        return view('user', ['user' => $user]);
    }

    public function ShowImageMain(Users $user)
    {
        $user = Users::all();
        return view('main', ['user' => Auth::user()] );
    }


    public function updateUser(Request $request, Users $user)
    {
        $user = Users::find($request->id);

        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = $request->password;
        if ($request->file('image_file')) {
            $user->image=$request->file('image_file');
//        }
//            $file = $request->file('image_file');
//            $filename = $file->getClientOriginalName();
//            $request['image'] = $filename;
//            dd($filename);
//            $user->update($request->all());
        }

        $user->update($request->all());
        return view('user', ['user' => $user]);
    }

    public function deleteUser(Request $request)
    {
        $user = Users::find($request->id);
        $user->delete();
        return redirect('showAllUsers');
    }
//    public function test(){
//
//        function year ($y)
//        {
//            if ($y >0 and $y<9999)
//            {
//                $a=$y%4;
//                $b= $y%100;
//                $c= $y%400;
//            }
//
//
//            else
//            {echo "Введите корректные данные";
//                exit;
//            }
//
//            if (($a==0 and $b!==0) or ($c==0))
//            {
//                echo " Високосный год";
//            }
//            else
//            {
//                echo "Невисокосный";
//            }
//
//        }
//
//        year (1900);
//    }


//    public function Users(){
//        $user = Users::find(1);
//        $firstName = $user->imagedef;
//
//        dd($firstName);
//    }
}
