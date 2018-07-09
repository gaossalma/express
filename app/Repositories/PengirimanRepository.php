<?php

namespace App\Repositories;

use App\Models\Pengiriman;
use InfyOm\Generator\Common\BaseRepository;

class PengirimanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_tujuan',
        'id_kurir',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pengiriman::class;
    }
}
