<?php

namespace App\Repositories;

use App\Pair;

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
        // @todo

        return '002';
    }

}
