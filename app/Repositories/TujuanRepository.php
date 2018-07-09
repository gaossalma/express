<?php

namespace App\Repositories;

use App\Models\Tujuan;
use InfyOm\Generator\Common\BaseRepository;

class TujuanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Tujuan::class;
    }
}
