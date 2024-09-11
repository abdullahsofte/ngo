<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtetActivity extends Model
{
    use HasFactory;

    public function ctet(){
        return $this->belongsTo(Ctet::class);
    }
}
