<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['name', 'surname', 'email','bio', 'personnalpage','picture'];
   
}
