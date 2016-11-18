<?php

namespace App\Http\Controllers;

use App\Pair;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use InvalidArgumentException;

class HintController extends Controller
{
    /**
     * Mocks
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

    public function index(Request $request)
    {
        $userToken = $request->header('userToken');

        if (!$userToken) {
            throw new InvalidArgumentException('Missing header: userToken');
        }

        return Pair::all();
    }
}
