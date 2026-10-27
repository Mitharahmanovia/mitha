<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Biodata_1115', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 30)->unique();
            $table->string('nama', 100);
            $table->string('prodi', 100);
            $table->string('email', 150)->unique();
            $table->string('no_hp', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Biodata_1115');
    }
};
