<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';
    protected $fillable = ['amount', 'is_accepted','user_id', 'fruit_id'];

    public $timestamps = false;


}

