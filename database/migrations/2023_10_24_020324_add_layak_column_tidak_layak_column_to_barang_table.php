<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            // Tambahkan kolom "layak" dengan tipe data string
            $table->string('layak')->after('slug');

            // Tambahkan kolom "tidak layak" dengan tipe data integer
            $table->string('tidak_layak')->after('layak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang', function (Blueprint $table) {
            // Untuk rollback migrasi, Anda dapat menghapus kolom-kolom yang telah ditambahkan.
            $table->dropColumn('layak');
            $table->dropColumn('tidak_layak');
        });
    }
};
