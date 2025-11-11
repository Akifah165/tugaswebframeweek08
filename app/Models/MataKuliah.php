<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataKuliah extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class);
    }
}
