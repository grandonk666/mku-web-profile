<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = ["nama", "foto", "jabatan", "nip"];

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class);
    }

    public function struktur()
    {
        return $this->hasOne(StrukturOrganisasi::class);
    }
}
