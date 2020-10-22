<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
//table name
    protected $table = 'companies';
//primary key
    protected $primaryKey = 'company_id';

    protected $guarded = [];
    
}
