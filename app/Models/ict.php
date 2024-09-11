<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ict extends Model
{
    use HasFactory;

    public function ictImage()
    {
        return $this->hasMany(ictMultiImage::class, 'ict_id');
    }
}
