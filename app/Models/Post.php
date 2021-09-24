<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["judul", "slug", "ketegori_id", "excerpt", "body", "sampul"];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
