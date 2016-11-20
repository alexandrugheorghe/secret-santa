<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Repositories\PairsRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class PairController extends Controller
{
    public function postRaffle(Request $request, PairsRepository $pairsRepository)
    {
        $receivers = $request->users;
        $givers = $request->users;
        $pairs = [];

        if (count($request->users) <= 1) {
            throw new Exception('Users must be 2 or more.');
        }

        while (count($pairs) <= count($givers)) {
            do {
                $giver = array_rand($givers);
                $receiver = array_rand($receivers);
            } while ($giver === $receiver);

            $pairs[] = new Pair(
                [
                    'receiver_id' => $receivers[$receiver]['user_id'],
                    'giver_id' => $givers[$giver]['user_id'],
                    'created_at' => new Carbon(),
                    'updated_at' => new Carbon(),
                ]
            );

            unset($givers[$giver]);
            unset($receivers[$receiver]);
        }

        $pairsRepository->savePairs(new Collection($pairs));

        return response()->json(Pair::all());
    }
}
