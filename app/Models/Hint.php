<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    public $primaryKey = 'receiver_id';

    public $incrementing = false;

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function setContent(string $content) : self
    {
        $this->content = $content;

        return $this;
    }
}
