<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = [
        'id'
    ];

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function item() {
        return $this->hasMany(Item::class);
    }
}
