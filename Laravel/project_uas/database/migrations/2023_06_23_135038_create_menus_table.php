<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_menu');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
