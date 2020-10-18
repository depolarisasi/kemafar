<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonBem extends Model
{
    
    use HasFactory;

      /*
    **
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'calonbem';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'idcalonbem';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */ 
    protected $fillable = 
       [
        'calon_namapasangan', 
        'calon_slogan',   
        'calon_nourut', 
         'calon_npmketua',
        'calon_namaketua',
        'calon_angkatanketua', 
        'calon_npmwakil',
        'calon_namawakil',
        'calon_angkatanwakil', 
        'calon_biografi',
        'calon_prokervisimisi',
        'calon_pasfoto',  
        'created_at',
        'updated_at', ];
 
}
