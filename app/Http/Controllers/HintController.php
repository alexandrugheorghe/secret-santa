<?php

namespace App\Http\Controllers;

use App\Factories\HintFactory;
use App\Models\Hint;
use App\Repositories\RepositoryException;
use App\Strategies\InitialHintsStrategy;
use App\Strategies\TemporaryHintsStrategy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\WorkAngelApi\Client as WorkAngelApiClient;
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
     * Returns hints for given user
     * @param InitialHintsStrategy $initialHints
     * @param TemporaryHintsStrategy $temporaryHintsStrategy
     * @return Hint[]
     */
    public function index(InitialHintsStrategy $initialHints, TemporaryHintsStrategy $temporaryHintsStrategy)
    {
        $wamToken = $this->request->header('Wam-Token');
        $userId = $this->workAngelApiClient->getUserIdByToken($wamToken);
        $receiverId = $this->pairsRepository->getReceiverIdByGiverId($userId);

        try {
            $hints = $this->hintsRepository->getByReceiverId($receiverId);
        } catch (RepositoryException $e) {
            $initialHints->populate($wamToken, $receiverId);
//            $temporaryHintsStrategy->populate($wamToken);
            $hints = $this->hintsRepository->getByReceiverId($receiverId);
        }

        return $hints;
    }

    /**
     * Returns fake hints (mocks index action)
     */
    public function indexMock(HintFactory $factory)
    {
        $numHints = rand(1, 12);
        $hints = new Collection();

        for ($i = 0; $i < $numHints; $i++) {
            $hints->add($factory->createRandomHint());
        }

        return $hints;
    }
}
