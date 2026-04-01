<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "category_id";
    public $timestamps = false; // Aktifkan timestamps 
    protected $fillable = [
        'category_id',
        'category_name'
    ]; // Kolom yang bisa diisi

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
