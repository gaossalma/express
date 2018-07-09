<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kurir
 * @package App\Models
 * @version July 9, 2018, 8:01 pm UTC
 */
class Kurir extends Model
{
    use SoftDeletes;

    public $table = 'kurirs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'no_hp',
        'email',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'no_hp' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'no_hp' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    
}
