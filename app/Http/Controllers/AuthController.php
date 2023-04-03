<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Cart;
use App\Models\likes;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function Register()
    {
        return view('auth.registration');
    }
    public function varifyregisterUser(Request $request)
    {
        $request->validate(['name' => 'required', "email" => "required|email|unique:users", "password" => "required|min:5|max:12"]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->usertype = "user";
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {

            return back()->with('success', 'you have register successfully');
        } else {


            return back()->with('fail', 'something');
        }
    }
    public function loginUser(Request $request)
    {
        $request->validate(["email" => "required|email", "password" => "required|min:5|max:12"]);
        $user = User::where('email', "=", $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                $request->session()->put("loginId", $user->id);
                $request->session()->put("name", $user->name);
                $request->session()->put("email", $user->email);
                $request->session()->put("usertype", $user->usertype);
                $request->session()->put("address", $user->address);
                $all_books = Books::all();
                if ($user->usertype == "user") {
                    $all_books = Books::all();
                    $total_cart_item = Cart::count();
                    $likes =  likes::all();
                    return view('dashboard', compact('all_books', 'total_cart_item', 'likes'));
                } else {

                    return redirect('/admindashboard');
                }
            } else {


                return back()->with('fail', 'password is not matches.');
            }
        } else {

            return back()->with('fail', 'This email is not registered');
        }
    }
    public function logout()
    {
        if (session()->has("loginId")) {
            session()->flush();
            return redirect('/dashboard');
        }
    }
}
