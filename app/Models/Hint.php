<?php

namespace App\Models;

use App\ValueObjects\HintType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    public $primaryKey = 'receiver_id';

    public $incrementing = false;

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function setReceiverId(string $receiverId) : self
    {
        $this->receiver_id = $receiverId;

        return $this;
    }

    public function setContent(string $content) : self
    {
        $this->content = $content;

        return $this;
    }

    public function setType(HintType $type) : self
    {
        $this->type = $type;

        return $this;
    }

    public function setRevealedAt(Carbon $revealedAt) : self
    {
        $this->revealed_at = $revealedAt;

        return $this;
    }

    public function setCreatedAt(Carbon $createdAt) : self
    {
        $this->created_at = $createdAt;

        return $this;
    }

    public function setUpdatedAt(Carbon $updatedAt) : self
    {
        $this->updated_at = $updatedAt;

        return $this;
    }
}
