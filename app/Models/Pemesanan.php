<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pemesanan
 * @package App\Models
 * @version September 21, 2022, 9:52 pm UTC
 *
 * @property \App\Models\User $idAdmin
 * @property \App\Models\Team $idTeam
 * @property integer $id_admin
 * @property integer $id_team
 * @property string|\Carbon\Carbon $waktu_pemesanan
 * @property string $lokasi
 */
class Pemesanan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pemesanan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_pelanggan',
        'id_team',
        'waktu_pemesanan',
        'id_genre',
        'nomor_hp',
        'metode_pembayaran',
        'lokasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_admin' => 'integer',
        'id_team' => 'integer',
        'lokasi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_admin' => 'nullable|integer',
        'id_team' => 'nullable|integer',
        'waktu_pemesanan' => 'nullable',
        'lokasi' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idAdmin()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_admin');
    }
    public function Genre()
    {
        return $this->belongsTo(\App\Models\Genre::class, 'id_genre');
    }
    public function Pelanggan()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_pelanggan');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idTeam()
    {
        return $this->belongsTo(\App\Models\Team::class, 'id_team');
    }
}
