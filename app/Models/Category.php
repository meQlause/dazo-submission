<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'categories';
    protected $fillable = ['fieldname'];

    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id');
    }
}
