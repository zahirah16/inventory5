<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->nama);
        });
    }

    protected $fillable = [
        'nis', 'nama', 'slug', 'kelas'
    ];

     /**
     * The roles that belong to the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function siswa(): BelongsToMany
    {
        return $this->belongsToMany(Siswa::class, 'nis', 'nama', 'kelas');
    }




}
