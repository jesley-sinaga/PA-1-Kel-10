<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 20)->change(); // Memperpanjang VARCHAR menjadi 20 karakter
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 10)->change(); // Kembalikan ke 10 jika rollback
        });
    }
};
