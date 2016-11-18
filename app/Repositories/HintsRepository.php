<?php

namespace App\Repositories;

use App\Hint;

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
    public function getHintsByReceiverId(string $receiverId)
    {
        $result = $this->model
            ->where('receiver_id', $receiverId)
            ->get(['content', 'created_at']);

        return $result;
    }

}
