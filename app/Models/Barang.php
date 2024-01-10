<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barang extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    public $table = "barang";
    protected $fillable = [
        'nama_barang', 'slug', 'kode_barang', 'layak', 'tidak_layak' ,'jumlah_barang'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_barang'
            ]
        ];
    }
    // public function getJumlahBarangAttribute()
    // {
    //     return $this->layak + $this->tidak_layak;
    // }

    protected static function boot()
{
    parent::boot();

    static::saving(function ($barang) {
        $barang->jumlah_barang = $barang->layak + $barang->tidak_layak;
    });
}

    /**
     * The roles that belong to the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_barang', 'barang_id', 'categories_id');
    }

}
        