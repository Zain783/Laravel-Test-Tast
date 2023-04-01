<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class AdminController extends Controller
{
    public function dashboard()
    {
        $all_books = Books::count();
        $all_users = User::count();
        return view('admin.dashboard', compact('all_books', 'all_users'));
    }
    public function addbook()
    {

        return view('admin.addbook');
    }
    public function users()
    {
        $all_users = User::all();

        return view('admin.users', compact('all_users'));
    }
    public function books()
    {
        $all_books = Books::all();
        return view('admin.books', compact('all_books'));
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
}
