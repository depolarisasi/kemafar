<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonBPM extends Model
{
    use HasFactory;

    
      /*
    **
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'calonbpm';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'idcalonbpm';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */   
    protected $fillable = 
       [ 
        'calon_slogan',   
        'calon_nourut', 
         'calon_npmcalon',
        'calon_namacalon',
        'calon_angkatancalon',  
        'calon_biografi',
        'calon_prokervisimisi',
        'calon_pasfoto',  
        'created_at',
        'updated_at', ];
 
}
