<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $fillable = [
        'image',
        'nama_produk',
        'kategori_id',
        'sku',
        'stok_produk',
        'active',
        'variants',
        'type',
        'stok',
        'harga_modal',
        'harga_jual',
        'harga_spesial',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id',  '_id');
    }
}
