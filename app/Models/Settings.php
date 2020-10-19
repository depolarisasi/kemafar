<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

     /*
    **
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'setting';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'idsetting';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */ 
    protected $fillable = 
       ['setting_name',
        'setting_value', 
        'created_at',
        'updated_at', ];
}
