<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guru extends Model
{
    use HasFactory;
    // use Sluggable;

 
    protected $table = 'guru';

    protected $fillable = [
        'nip', 'name', 'slug', 'mapel'
    ];
    
    /**
     * The roles that belong to the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guru(): BelongsToMany
    {
        return $this->belongsToMany(Guru::class, 'nip', 'name', 'mapel');
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'name'
    //         ]
    //     ];
    // }


}
