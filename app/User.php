<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
    ];

    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
