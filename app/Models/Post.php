<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            return $query->where(function ($query) use ($search)
            {
                $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters["kategori"] ?? false, function ($query, $kategori)
        {
            return $query->whereHas("kategori", function ($query) use ($kategori)
            {
                $query->where("slug", $kategori);
            });
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, "attachable");
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
