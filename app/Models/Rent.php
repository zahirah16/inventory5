<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Rent extends Model
{
    use HasFactory;


    protected $table = 'rent';

    protected $fillable = [
        'user_id', 'kelas', 'id_guru', 'id_barang', 'slug', 'tambahan','rent_date','status','return_date'
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rent) {
            $rent->slug = Str::slug($rent->user_id);
        });

        
    }

    
    /**
     * Get the user that owns the Rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'user_id', 'id');
    }

    /**
     * Get the user that owns the Rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'kelas', 'kelas');
    }

    /**
     * Get the user that owns the Rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }

    

    /**
     * Get the user that owns the Rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }

    /**
     * Get the user that owns the Rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function slug(): BelongsTo
    {
        return $this->belongsTo(Rent::class, 'slug', 'id');
    }

    /**
     * Get the user that owns the Rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tambahan(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'tambahan', 'id');
    }

}
