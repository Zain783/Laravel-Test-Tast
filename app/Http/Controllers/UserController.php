<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Cart;
use App\Models\likes;
use App\Models\Orders;
use App\Models\review;
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
            $user = User::find(session()->has('loginId'));
            if ($user) {
                if ($user->usertype == "admin") {
                    $all_users = User::count();
                    return redirect("/admindashboard");
                } else {
                    return view('dashboard', compact('all_books', 'total_cart_item', 'likes'));
                }
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
    public function addratings(Request $request, $id)
    {
        if (session()->has('loginId')) {
            if (session()->has('usertype') == "user") {
                $user = User::find(session()->has('loginId'));
                $rating = new review();
                $rating->book_id = $id;
                $rating->user_id = $user->id;
                $rating->rating = $request->rating;
                $rating->save();
                return redirect('/');
            }
        }
        return redirect('/login');
    }
    public function CashOnDelivery()
    {
        $order = new Orders();
        $user = User::find(session()->has('loginId'));
        $data = Cart::where('user_id', '=', $user->id)->get();
        foreach ($data as $data) {
            $order = new Orders();
            $order->name = $data->name;
            $order->email = $data->email;
            $order->address = $user->address;
            $order->user_id = $data->user_id;
            $order->book_id = $data->product_id;
            $order->booktitle = $data->name;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();
            //note that after save order we are deleting products from cart table one by one
            $card_id = $data->id;
            $cart = Cart::find($card_id);
            $cart->delete();
        }
        return redirect("/dashboard");
    }
}
