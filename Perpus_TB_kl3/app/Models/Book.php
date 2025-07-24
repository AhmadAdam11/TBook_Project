<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'gambar', 'kategori_id', 'stok'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
