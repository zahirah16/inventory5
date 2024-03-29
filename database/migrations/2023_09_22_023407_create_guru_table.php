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
        Schema::create('guru', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('nip'); 
            $table->string('name', 100);
            $table->string('slug', 255)->nullable();
            $table->string('mapel', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('guru', function (Blueprint $table) {
            if (Schema::hasColumn('guru', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
