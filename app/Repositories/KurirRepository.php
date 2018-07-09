<?php

namespace App\Repositories;

use App\Models\Kurir;
use InfyOm\Generator\Common\BaseRepository;

class KurirRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'no_hp',
        'email',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kurir::class;
    }
}
