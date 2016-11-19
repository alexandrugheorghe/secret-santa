<?php

namespace App\Repositories;

use App\Models\Hint;

class HintsRepository
{
    /**
     * @var Hint
     */
    private $model;

    public function __construct(Hint $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $receiverId
     *
     * @return string
     */
    public function getByReceiverId(string $receiverId)
    {
        $result = $this->model
            ->where('receiver_id', $receiverId)
            ->get(['content', 'created_at']);

        return $result;
    }
}
