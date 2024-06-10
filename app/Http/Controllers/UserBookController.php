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
        $userId = session()->get('user_id');

        $userBook = new UserBook();
        $userBook->idUser = $userId;
        $userBook->idbook = $book;
        $userBook->purchaseDate = now();
    
        $userBook->save();
        return redirect()->route('index', ['book' => $book])->with('purchased','Purchased succesfully');

}
}