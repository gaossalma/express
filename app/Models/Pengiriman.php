<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pengiriman
 * @package App\Models
 * @version July 9, 2018, 8:04 pm UTC
 */
class Pengiriman extends Model
{
    use SoftDeletes;

    public $table = 'pengirimen';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_tujuan',
        'id_kurir',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_tujuan' => 'integer',
        'id_kurir' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_tujuan' => 'required',
        'id_kurir' => 'required',
        'status' => 'required'
    ];

    
}
