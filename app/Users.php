<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users'; 
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    // public $timestamps = false;
    protected $fillable = [
        'id'
        ,'ic'
        ,'name'
        ,'email'
        ,'password'
        ,'role_id'
        ,'remember_token'         
    ];
    // protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
