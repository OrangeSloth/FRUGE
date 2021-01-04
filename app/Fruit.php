<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;

class Fruit extends Model
{
    //
    protected $fillable = ['name', 'quantity','image'];

    public $timestamps = false;
}
