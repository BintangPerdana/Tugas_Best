<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['id_menu', 'jumlah_pesanan', 'total_harga'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
