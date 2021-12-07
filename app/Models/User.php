<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasFactory;

    protected $table='users';

    protected $fillable=[
        'name',
        'email',
        'cpf',
        'password',
        'role'
    ];

    protected $hidden=[
        'password'
    ];


    //relationships

    public function address()
    {
        return $this->hasOne(Address::class);

    }
    public function phones()
    {
        return $this->hasMany(Phone::class);

    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    //mutators

    public function setPasswordAttribute($valeu)
    {
        $this->attributes['password']=bcrypt($valeu);
    }
}
