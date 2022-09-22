<?php

namespace App\Repositories;

use App\Models\Genre;
use App\Repositories\BaseRepository;

/**
 * Class GenreRepository
 * @package App\Repositories
 * @version September 21, 2022, 9:24 pm UTC
*/

class GenreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_genre'
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
        return Genre::class;
    }
}
