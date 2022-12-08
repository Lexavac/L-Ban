<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_rents');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
