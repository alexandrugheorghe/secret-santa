<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postRaffle(Request $request){

        $groups = [];

        foreach ($request->users as $user) {
            $groups[$user['country_id']][] = ['id' => $user['_id'], 'gender' => $user['gender']];
        }

        return response()->json($groups);
    }
}
