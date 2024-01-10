<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    

    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('kode_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            if (Schema::hasColumn('barang', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
