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
        Schema::table('rent', function (Blueprint $table) {
            $table->integer('kelas')->after('user_id');
            $table->string('guru')->after('kelas');
            $table->string('tambahan')->after('id_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rent', function (Blueprint $table) {
            $table->dropColumn(['kelas', 'guru', 'tambahan']);
        });
    }
};
