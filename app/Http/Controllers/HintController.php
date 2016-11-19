<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InvalidArgumentException;
use App\WorkAngel\WorkAngelApiClient;
use App\Repositories\PairsRepository;
use App\Repositories\HintsRepository;

class HintController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var WorkAngelApiClient
     */
    private $workAngelApiClient;

    /**
     * @var PairsRepository
     */
    private $pairsRepository;

    /**
     * @var HintsRepository
     */
    private $hintsRepository;

    public function __construct(
        Request $request,
        WorkAngelApiClient $workAngelApiClient,
        PairsRepository $pairsRepository,
        HintsRepository $hintsRepository
    ) {
        $this->request = $request;
        $this->workAngelApiClient = $workAngelApiClient;
        $this->pairsRepository = $pairsRepository;
        $this->hintsRepository = $hintsRepository;
    }

    /**
     * Mocks the index action (returns dummy hints)
     */
    public function getDummies()
    {
        $faker = \Faker\Factory::create();

        $numHints = rand(4, 24);
        $dummyHints = [];

        for ($i = 1; $i < $numHints; $i++) {
            $dummyHints[] = [
                'content' => $faker->realText($maxNbChars = 120, $indexSize = 2),
                'created_at' => $faker->dateTime->getTimestamp()
            ];
        }

        return response()->json($dummyHints);
    }

    /**
     * Returns hints for given user
     */
    public function index()
    {
        $userToken = $this->request->header('userToken');

        if (!$userToken) {
            throw new InvalidArgumentException('Missing header: userToken');
        }

        $userId = $this->workAngelApiClient->getUserIdByToken($userToken);
        $receiverId = $this->pairsRepository->getReceiverIdByGiverId($userId);
        $hints = $this->hintsRepository->getByReceiverId($receiverId);

        return $hints;
    }
}
