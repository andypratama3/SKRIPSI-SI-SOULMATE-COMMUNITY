<?php

namespace App\Repositories;

use App\Models\Pemesanan;
use App\Repositories\BaseRepository;

/**
 * Class PemesananRepository
 * @package App\Repositories
 * @version September 21, 2022, 9:52 pm UTC
*/

class PemesananRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_admin',
        'id_team',
        'waktu_pemesanan',
        'lokasi'
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
        return Pemesanan::class;
    }
}
