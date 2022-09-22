<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Anggota
 * @package App\Models
 * @version September 21, 2022, 9:22 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $teamMembers
 * @property string $nama
 * @property string $nomor_hp
 * @property string $alamat
 */
class Anggota extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'anggota';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'nomor_hp',
        'alamat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'nomor_hp' => 'string',
        'alamat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'nullable|string|max:50',
        'nomor_hp' => 'nullable|string|max:50',
        'alamat' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function teamMembers()
    {
        return $this->hasMany(\App\Models\TeamMember::class, 'id_member');
    }
}
