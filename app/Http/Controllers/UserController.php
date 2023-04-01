<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Cart;
use App\Models\likes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PgSql\Lob;

class UserController extends Controller
{
    public function dashboard()
    {
        $all_books = Books::all();
        $total_cart_item = Cart::count();
        $likes =  likes::all();
        if (session()->has('loginId')) {
            if (session()->has('usertype') == "user") {
                return view('dashboard', compact('all_books', 'total_cart_item', 'likes'));
            }
        }
        return view('dashboard', compact('all_books', 'likes'));
    }
    public function cart()
    {
        $cart_books = Cart::all();
        $totalprice = 0;
        foreach ($cart_books as $item) {
            $totalprice = $totalprice + $item->price;
        }
        $total_cart_item = Cart::count();
        return view('cart', compact('cart_books', 'totalprice', 'total_cart_item'));
    }
    public function addtocart(Request $request, $id)
    {
        if (session()->has('loginId')) {
            if (session()->has('usertype') == "user") {
                $user = User::find(session()->has('loginId'));
                $book = Books::find($id);
                $cart = new Cart();
                $cart->name = $book->name;
                $cart->email = $user->email;
                $cart->address = $user->address;
                $cart->image = $book->image;
                $cart->quantity = $request->quantity;
                $book->quantity = $book->quantity - $request->quantity;
                $price = (($request->quantity) * ($book->price));
                $cart->price = $price;
                $cart->product_id = $book->id;
                $cart->user_id = $user->id;
                $cart->save();
                $total_cart_item = Cart::count();
                $all_books = Books::all();
                return redirect("/dashboard");
            } else {
                $all_books = Books::count();
                $all_users = User::count();
                return view('admin.dashboard', compact('all_books', 'all_users'));
            }
        }
        return redirect("/login");
    }

    public function removechartItem($id)
    {

        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect('/cart');
        }

        return redirect('/cart');
    }
    public function like_book($id)
    {
        if (session()->has('loginId')) {
            if (session()->has('usertype') == "user") {
                $user1 = User::find(session()->has('loginId'));
                $liked_book = Books::find($id);
                $like_found = DB::table('likes')->where('user_id', $id)->first();
                $likes = likes::all();
                $foundid = 0;
                foreach ($likes as $item) {
                    if ($item->user_id == $user1->id && $item->book_id == $id) {
                        $foundid = $item->id;
                    }
                }
                if ($foundid != 0) {
                    $likeFound = likes::find($foundid);
                    $likeFound->delete();
                    return redirect('/');
                } else {
                    $like = new likes();
                    $like->book_id = $liked_book->id;
                    $like->user_id = $user1->id;
                    $like->save();
                    return redirect('/');
                }
            } else {
                return redirect('/login');
            }
        }
        return redirect('/login');
    }
}
