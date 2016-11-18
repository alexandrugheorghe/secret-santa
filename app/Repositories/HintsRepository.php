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
    public function getHintsByReceiverId(string $receiverId) : string
    {
        // @todo

        return 'hints collection';
    }

}
