<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Produk extends Model
{
    use Sortable;

    protected $table = 'produk';
    protected $fillable = [
        'kategori_id',
        'user_id',
        'kode_produk',
        'nama_produk',
        'slug_produk',
        'deskripsi_produk',
        'foto',
        'qty',
        'satuan',
        'harga',
        'status',
    ];
    public $sortable = [
        'nama_produk', 
        'harga', 
        'created_at'
    ];

    public function kategori() {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function images() {
        return $this->hasMany('App\Models\ProdukImage', 'produk_id');
    }

    public function promo() {
        return $this->hasOne('App\Models\ProdukPromo', 'produk_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}