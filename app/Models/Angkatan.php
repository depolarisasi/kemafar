<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;

     /*
    **
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'angkatan';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'idangkatan';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = 
       ['angkatan_nama',
        'angkatan_tahun', 
        'created_at',
        'updated_at', ];
}
