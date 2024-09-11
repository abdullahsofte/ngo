<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctet extends Model
{
    use HasFactory;

    public function ctetActive()
    {
        return $this->hasMany(CtetActivity::class);
    }
}
