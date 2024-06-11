<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    protected $fillable=[
       'user_id',
       'book_id',
       'date_loaned',
       
    ];
    
    use HasFactory;
}
