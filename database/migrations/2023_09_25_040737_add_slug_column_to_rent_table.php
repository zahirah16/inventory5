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
        Schema::table('rent', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('id_barang');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('rent', function (Blueprint $table) {
            if (Schema::hasColumn('rent', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};

