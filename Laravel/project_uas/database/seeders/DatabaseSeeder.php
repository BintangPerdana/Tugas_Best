<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "id" => "1",
            "name" => "admin",
            "email" => "admin@test.com",
            "isAdmin" => "1",
            "password" => bcrypt('admin')
        ]);
        User::create([
            "id" => "2",
            "name" => "User",
            "email" => "user@test.com",
            "isAdmin" => "0",
            "password" => bcrypt('user')
        ]);

        Kategori::create([
            "nama_kategori" => "Appetizer",
            "deskripsi" => "Variasi menu appetizer untuk melengkapi hidangan utama yang lezat."
        ]);
        Kategori::create([
            "nama_kategori" => "Main Course",
            "deskripsi" => "Sajian utama yang menggugah selera dan memuaskan nafsu makan."
        ]);
        Kategori::create([
            "nama_kategori" => "Dessert",
            "deskripsi" => "Kenikmatan manis sebagai penutup sempurna setelah santap istimewa."
        ]);
        Kategori::create([
            "nama_kategori" => "Makanan",
            "deskripsi" => "Sajian lezat yang memanjakan lidah dengan keharmonisan cita rasa."
        ]);
        Kategori::create([
            "nama_kategori" => "Minuman",
            "deskripsi" => "Minuman istimewa yang menghadirkan sensasi kenikmatan yang tiada tara."
        ]);
    }
}
