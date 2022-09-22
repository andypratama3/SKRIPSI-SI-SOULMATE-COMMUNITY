<?php

namespace App\Repositories;

use App\Models\Anggota;
use App\Repositories\BaseRepository;

/**
 * Class AnggotaRepository
 * @package App\Repositories
 * @version September 21, 2022, 9:22 pm UTC
*/

class AnggotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'nomor_hp',
        'alamat'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Anggota::class;
    }
}
