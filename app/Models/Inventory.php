<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['survivor_id', 'item_id', 'quantity'];

    public function survivors() {
        return $this->belongsTo(Survivor::class);
    }

    public function items() {
        return $this->belongsTo(Item::class);
    }
}
