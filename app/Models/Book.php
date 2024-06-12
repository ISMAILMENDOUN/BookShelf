<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
protected $fillable=[
    'title',
    'author',
    'isbn',
    'publication_date',
    'publisher',
    'language',
    'pages',
    'format',
    'price',
    'description',
    'cover_image',
    'pdf_link',

];
public function bookAccess(){
    $userId = session()->get('userId');
    $userBook = UserBook::where('user_id', $userId)
                        ->where('book_id', $this->id)
                        ->first();
                        if($userBook){
return $userBook->statut;}
else {

    return null;
}
}

    use HasFactory;
}
