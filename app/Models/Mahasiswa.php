<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function mataKuliah()
    {
        return $this->belongsToMany(MataKuliah::class);
    }
}
