<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Team
 * @package App\Models
 * @version September 21, 2022, 9:25 pm UTC
 *
 * @property \App\Models\Genre $idGenre
 * @property \Illuminate\Database\Eloquent\Collection $pemesanans
 * @property \Illuminate\Database\Eloquent\Collection $teamMembers
 * @property integer $id_genre
 * @property string $nama_tim
 */
class Team extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'team';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_genre',
        'nama_tim'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_genre' => 'integer',
        'nama_tim' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_genre' => 'nullable|integer',
        'nama_tim' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idGenre()
    {
        return $this->belongsTo(\App\Models\Genre::class, 'id_genre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pemesanans()
    {
        return $this->hasMany(\App\Models\Pemesanan::class, 'id_team');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function teamMembers()
    {
        return $this->hasMany(\App\Models\TeamMember::class, 'id_team');
    }
}
