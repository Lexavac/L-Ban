<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['name', 'dec', 'stok', 'distributor', 'price'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
