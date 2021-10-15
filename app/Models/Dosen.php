<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = ["nama", "foto", "jabatan", "nip", "matakuliah_id"];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }

    public function struktur()
    {
        return $this->hasOne(StrukturOrganisasi::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($dosen)
        {
            if ($dosen->struktur)
            {
                $dosen->struktur->delete();
            }

            if ($dosen->foto)
            {
                Storage::delete($dosen->foto);
            }
        });
    }
}
