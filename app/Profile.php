<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //table name
    protected $table = 'api_employees';
    protected $timestamp = false;

//primary key
    protected $primaryKey = 'id';
    protected $guarded = [];
    
}
