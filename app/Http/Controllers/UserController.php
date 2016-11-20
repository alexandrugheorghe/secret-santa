<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postRaffle(Request $request){

        return json_encode($request);

        $groups = [];

        foreach ($request->users as $user) {
            $groups[$user['country_code']][] = ['id' => $user['user_id'], 'gender' => $user['gender']];
        }

        return response()->json($groups);
    }
}
