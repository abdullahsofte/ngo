<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function reportImage()
    {
        return $this->hasMany(ReportMultiimage::class, 'report_id');
    }
}
