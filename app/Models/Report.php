<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['reporter_id', 'reported_id'];

    function survivorInfected() {
        return $this->belongsTo(Survivor::class);
    }

    function survivorReporter() {
        return $this->belongsTo(Survivor::class);
    }
}
