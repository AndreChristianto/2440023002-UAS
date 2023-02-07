<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function role() {
        return $this->hasOne(Role::class);
    }

    public function gender() {
        return $this->hasOne(Gender::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }
}
