<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            // Tambahkan kolom "kondisi_barang" dengan tipe data string
            $table->string('kondisi_barang')->after('slug');

            // Tambahkan kolom "jumlah_barang" dengan tipe data integer
            $table->integer('jumlah_barang')->after('kondisi_barang');
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
            $table->dropColumn('kondisi_barang');
            $table->dropColumn('jumlah_barang');
        });
    }
};
