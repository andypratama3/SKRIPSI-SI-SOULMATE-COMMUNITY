<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'team_member';
    protected $dates = ['deleted_at'];
    public function Anggota()
    {
        return $this->belongsTo(\App\Models\Anggota::class, 'id_member');
    }
}
