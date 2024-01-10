<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Categories::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
             'infokus', 'hdmi','vga', 'power', 'terminal'
        ];

        foreach ($data as  $value) {
            Categories::insert([
                'name'=> $value
            ]);
        }
    }
}
