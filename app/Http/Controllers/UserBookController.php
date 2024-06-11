<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBook;
class UserBookController extends Controller
{
    public function index(){
        
        return view('users_books.index');
    }
    public function purchase(Request $request, $book){
        $userId = session()->get('userId');

        $userBook = new UserBook();
        $userBook->user_id = $userId;
        $userBook->book_id = $book;
        $userBook->date_loaned = now();
    
        $userBook->save();
        return redirect()->route('index', ['book' => $book])->with('purchased','Purchased succesfully');

}



}