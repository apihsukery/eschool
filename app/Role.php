<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role'; 
    protected $primaryKey = 'id';
    public $incrementing = true;
    // protected $keyType = 'string';
    // public $timestamps = false;
    protected $fillable = [
        'name'      
    ];
}
