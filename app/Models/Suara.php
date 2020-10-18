<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    use HasFactory;
    
      /*
    **
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'suara';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'idsuara';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */   
    protected $fillable = 
       [ 
        'suara_calidbem',
        'suara_calidbpm',
        'suara_idpemilih',
        'suara_tanggal',   
        'suara_jam',
        'suara_secretcode',
        'suara_cookies',  
        'created_at',
        'updated_at', ];

} 