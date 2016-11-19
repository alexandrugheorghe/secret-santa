<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    public $primaryKey = 'giver_id';

    public $incrementing = false;
}
