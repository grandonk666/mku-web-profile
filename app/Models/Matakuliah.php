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
        return $this->belongsToMany(Dosen::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, "attachable");
    }

    public function file_support()
    {
        return $this->morphOne(FileSupport::class, "supportable");
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($matakuliah) {
            if ($matakuliah->listDosen) {
                $matakuliah->listDosen->each(function ($dosen) use ($matakuliah) {
                    $dosen->matakuliah()->detach($matakuliah->id);
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
