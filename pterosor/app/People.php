<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['name', 'firstname', 'email','bio', 'personnalpage','picture','HALNumber'];
   
}
