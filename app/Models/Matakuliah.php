<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Matakuliah extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ["nama", "detail", "slug"];

    public function listDosen()
    {
        return $this->hasMany(Dosen::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, "attachable");
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($matakuliah) {
            if ($matakuliah->listDosen) {
                $matakuliah->listDosen->each(function ($dosen) {
                    $dosen->update(["matakuliah_id" => null]);
                });
            }

            if ($matakuliah->attachments) {
                $matakuliah->attachments->each(function ($attachment) {
                    Storage::delete($attachment->filename);
                    $attachment->delete();
                });
            }
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
