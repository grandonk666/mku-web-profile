<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSupport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function supportable()
    {
        return $this->morphTo();
    }
}
