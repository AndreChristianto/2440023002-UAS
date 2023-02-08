<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Account extends Model implements Authenticatable
{
    use HasFactory;
    use Notifiable;
    use \Illuminate\Auth\Authenticatable;
    use SoftDeletes;

        public $remember_token;
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
