<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable=[
        'item',
        'points'
    ];
    public function inventory()
    {
    	return $this->belongsTo('App\Suvivor', 'id','suvivor_id');
    }

}
