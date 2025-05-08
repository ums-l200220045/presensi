<?php

// database/migrations/xxxx_xx_xx_create_pegawais_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('jabatan');
            $table->string('bidang');
            $table->timestamps();
        });

        DB::table('pegawais')->insert([
        [
            'name' => 'Yakub Firman Mustofa',
            'email' => 'pegawai@example.com',
            'password' => Hash::make('pegawai1'), // Hash yang disarankan
            'jabatan' => 'Staf',
            'bidang' => 'Keuangan',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    
    }

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}