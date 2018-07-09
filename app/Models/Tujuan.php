<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tujuan
 * @package App\Models
 * @version July 9, 2018, 7:58 pm UTC
 */
class Tujuan extends Model
{
    use SoftDeletes;

    public $table = 'tujuans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_pengirim',
        'alamat_pengirim',
        'no_hp_pengirim',
        'barang',
        'berat',
        'nama_penerima',
        'alamat_penerima',
        'no_hp_penerima',
        'longitude',
        'latitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_pengirim' => 'string',
        'alamat_pengirim' => 'string',
        'no_hp_pengirim' => 'string',
        'barang' => 'string',
        'berat' => 'double',
        'nama_penerima' => 'string',
        'alamat_penerima' => 'string',
        'no_hp_penerima' => 'string',
        'longitude' => 'double',
        'latitude' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_pengirim' => 'required',
        'alamat_pengirim' => 'required',
        'no_hp_pengirim' => 'required',
        'barang' => 'required',
        'berat' => 'required',
        'nama_penerima' => 'required',
        'alamat_penerima' => 'required',
        'no_hp_penerima' => 'required',
        'longitude' => 'required',
        'latitude' => 'required'
    ];

    
}
