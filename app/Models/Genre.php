<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Genre
 * @package App\Models
 * @version September 21, 2022, 9:24 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $teams
 * @property string $nama_genre
 */
class Genre extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'genre';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'biaya',
        'nama_genre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'biaya' => 'integer',
        'id' => 'integer',
        'nama_genre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_genre' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'biaya' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function teams()
    {
        return $this->hasMany(\App\Models\Team::class, 'id_genre');
    }
}
