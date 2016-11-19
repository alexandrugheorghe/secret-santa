<?php

namespace App\Repositories;

use App\Models\Pair;

class PairsRepository
{
    /**
     * @var Pair
     */
    private $model;

    public function __construct(Pair $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $giverId
     *
     * @return string
     */
    public function getReceiverIdByGiverId(string $giverId) : string
    {
        $result = $this->model
            ->where('giver_id', $giverId)
            ->first();

        if (!$result) {
            throw new RepositoryException("Receiver could not be retrieved by giver id: $giverId");
        }

        return $result->receiver_id;
    }
}
