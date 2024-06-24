<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BookController;
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



public function myBooks(){
    $userId = session()->get('userId');
    $bookIds = UserBook::where('user_id', $userId)->select('book_id')->get();
    $bookController = new BookController();
    $myBooks = $bookController->books($bookIds);
    return view('users.index', ['myBooks' =>$myBooks,'buttonClicked' => true]);
}

public function allUserBooks(){
    $userBooks = UserBook::all();
    return view('users.allUserBooks', compact('userBooks'));

}



public function changeStatut(UserBook $userBook,Request $request){
    
    $userBook->statut = 'accepted';
    $userBook->save();
    return redirect()->route('admin.allUserBooks')->with('success', 'UserBook updated successfully!');
    
       
        }
}