<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['nama_menu','id_kategori', 'deskripsi', 'harga', 'foto'];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
