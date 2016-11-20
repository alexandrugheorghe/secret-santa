<?php

namespace App\Strategies;

use App\Factories\HintFactory;
use App\Repositories\HintsRepository;
use App\ValueObjects\HintType;
use App\WorkAngelApi\Client as WorkAngelApiClient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class InitialHintsStrategy
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

    /**
     * @param string $token
     * @param string $receiverId
     *
     * @return self
     */
    public function populate(string $token, string $receiverId) : self
    {
        $user = $this->workAngelApiClient->getUserByToken($token);
        $hints = new Collection();

        if (isset($user['first_name'])) {
            $firstLetter = $user['first_name'][0];

            $hint = $this->hintFactory->createHint(
                $receiverId,
                "Your Secret Santa's first name starts with $firstLetter",
                HintType::firstNameStartsWith(),
                Carbon::now()->subSecond()
            );

            $hints->add($hint);
        }

        if (isset($user['last_name'])) {
            $firstLetter = $user['last_name'][0];

            $hint = $this->hintFactory->createHint(
                $receiverId,
                "Your Secret Santa's last name starts with $firstLetter",
                HintType::lastNameStartsWith(),
                Carbon::now()->subSecond()
            );
            $hints->add($hint);
        }

        $this->hintsRepository->saveCollection($hints);

        return $this;
    }
}
