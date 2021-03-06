<?php

namespace App\Repositories;

use App\Models\Hint;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

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
     * @return Hint[]
     * @throws RepositoryException
     */
    public function getByReceiverId(string $receiverId)
    {
        $result = $this->model
            ->where('receiver_id', $receiverId)
            ->where('revealed_at', '<', Carbon::now()->getTimestamp())
            ->get(['content', 'revealed_at AS created_at']);

        if ($result->isEmpty()) {
            throw new RepositoryException('Result is empty');
        }

        return $result;
    }

    /**
     * @param Hint $hint
     *
     * @return bool
     */
    public function save(Hint $hint)
    {
        return $hint->save();
    }

    /**
     * @param Collection $hints
     *
     * @return mixed
     */
    public function saveCollection(Collection $hints)
    {
        return $this->model->insert($hints->toArray());
    }
}
