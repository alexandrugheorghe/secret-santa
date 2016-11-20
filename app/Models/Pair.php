<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    public $primaryKey = 'giver_id';

    protected $guarded = [];

    public $incrementing = false;
}
