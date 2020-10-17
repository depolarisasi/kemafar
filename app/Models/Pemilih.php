<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;
     /*
    **
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'pemilih';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'idpemilih';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */ 
    protected $fillable = 
       ['pemilih_npm',
        'pemilih_nama',
        'pemilih_email',
        'pemilih_angkatan',
        'pemilih_pilihan', 
        'pemilih_secretcode',  
        'created_at',
        'updated_at', ];
}
