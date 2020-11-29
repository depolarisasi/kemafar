<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;   /*
    **
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'laporan';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'idlaporan';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */ 
    protected $fillable = 
       ['laporan_pelapor',
        'laporan_terlapor',
        'laporan_isi',  
        'laporan_status',
        'created_at',
        'updated_at', ];
}
