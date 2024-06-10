<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        if (Auth::check()) {
            return view('users.index', compact('books'));
        }
        else{
         return view('books.index', compact('books'));}
     }
     public function indexBook(Request $request, $book){
        $book=Book::find($book);
        return view('books.book')->with('book', $book);
    }

    
}
