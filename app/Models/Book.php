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

];


    use HasFactory;
}
