<?php

namespace App\Strategies;

use App\Factories\HintFactory;
use App\Repositories\HintsRepository;
use App\ValueObjects\HintType;
use App\WorkAngelApi\Client as WorkAngelApiClient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class TemporaryHintsStrategy
{
    /**
     * @var WorkAngelApiClient
     */
    private $workAngelApiClient;

    /**
     * @var HintsRepository
     */
    private $hintsRepository;

    /**
     * @var HintFactory
     */
    private $hintFactory;

    public function __construct(
        WorkAngelApiClient $workAngelApiClient,
        HintsRepository $hintsRepository,
        HintFactory $hintFactory
    ) {
        $this->workAngelApiClient = $workAngelApiClient;
        $this->hintsRepository = $hintsRepository;
        $this->hintFactory = $hintFactory;
    }

    public function populate(string $token) {
        $user = $this->workAngelApiClient->getUserByToken($token);
        $this->getLatestRecognition($token, $user['user_id']);
    }

    private function getLatestRecognition(string $token, string $userId) {
        $this->workAngelApiClient->getUsersLastRecognition($token, $userId);
    }
}
