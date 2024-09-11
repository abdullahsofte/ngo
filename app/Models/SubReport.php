<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubReport extends Model
{
    use HasFactory;

    public function report()
    {
        return $this->belongsTo(CtetReport::class);
    } 

    public function subreportImage()
    {
        return $this->hasMany(CtetMultiimage::class, 'subreport_id');
    }

    
}
