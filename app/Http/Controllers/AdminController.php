<?php

namespace App\Http\Controllers;

use App\Models\authors;
use App\Models\Books;
use App\Models\likes;
use App\Models\Orders;
use App\Models\review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class AdminController extends Controller
{
    public function dashboard()
    {
        $all_books = Books::count();
        $all_users = User::count();
        if (session()->has('loginId')) {
            if (session()->has('usertype') == "admin") {
                $user = User::find(session()->has('loginId'));
                $loginuser = $user->name;
                $totalSale = DB::table('Orders')->sum('price');
                return view('admin.dashboard', compact('all_books', 'all_users', "loginuser", 'totalSale'));
            }
        }
        return redirect('/');
    }
    public function addbook()
    {
        $user = User::find(session()->has('loginId'));
        $loginuser = $user->name;
        $authors = authors::all();
        return view('admin.addbook', compact('loginuser','authors'));
    }
    public function users()
    {
        $all_users = User::all();
        $user = User::find(session()->has('loginId'));
        $loginuser = $user->name;
        return view('admin.users', compact('all_users', 'loginuser'));
    }
    public function books()
    {
        $all_books = Books::all();
        $user = User::find(session()->has('loginId'));
        $loginuser = $user->name;
        
        return view('admin.books', compact('all_books', 'loginuser'));
    }
    public function addBookinTable(Request $request)
    {
        $book = new Books();
        $book->name = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $image = $request->image;
        //here we mix image name with time library for make it unique
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('books', $imagename);
        //to store in database
        $book->image = $imagename;
        $book->save();
        return redirect()->back()->with('message', "product Added Successfully");
    }
    public function delete_book($id)
    {
        $book = Books::find($id);
        $book->delete();
        return redirect()->back()->with("message", "Book successfully deleted");
    }
    public function edit_book($id)
    {
        $book = Books::find($id);
        return view("admin.editbook", compact('book'));
    }

    public function addauthor()
    {
        $user = User::find(session()->has('loginId'));
        $loginuser = $user->name;
        return view("admin.addauthor", compact('loginuser'));
    }
    public function storeauthor(Request $request)
    {
        // validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:authors',
            'dob' => 'required|date',
        ]);
        // create a new author instance
        $author = new authors();
        $author->name = $request->name;
        $author->email = $request->email;
        $author->dob = $request->dob;

        // save the author instance to the database
        $author->save();

        // redirect to the author index page with success message
        return redirect('/admindashboard')->back()->with('message', "product Added Successfully");
    }

    public function likes()
    {
        $all_likes = likes::all();
        $user = User::find(session()->has('loginId'));
        $loginuser = $user->name;
        return view('admin.likes', compact('all_likes', 'loginuser'));
    }
    public function reviews()
    {
        $all_reviews = review::all();
        $user = User::find(session()->has('loginId'));
        $loginuser = $user->name;
        return view('admin.review', compact('all_reviews', 'loginuser'));
    }
    public function Orders()
    {
        $Orders = Orders::all();
        $user = User::find(session()->has('loginId'));
        $loginuser = $user->name;
        return view('admin.orders', compact('Orders', 'loginuser'));
    }
    public function changeDeliveryStatus($id)
    {
        $order = Orders::find($id);
        if ($order) {

            $order->delivery_status = "Delivered";

            $order->save();
        }
        return redirect("/OrdersView");
    }
}
