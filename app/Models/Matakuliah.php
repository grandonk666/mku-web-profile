<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = ["nama", "kode", "dosen_id"];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
