<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRentSlugColumn extends Migration
{
    public function up()
    {
        // Mengisi kolom slug yang asalnya null dengan nilai dari kolom nama
        DB::table('rent')->whereNull('slug')->get()->each(function ($row) {
            DB::table('rent')->where('id', $row->id)->update([
                'slug' => Str::slug($row->user_id),
            ]);
        });
    }

    public function down()
    {
        // Tidak perlu melakukan rollback untuk operasi ini
    }
}
