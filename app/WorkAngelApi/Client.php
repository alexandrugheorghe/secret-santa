<?php

namespace App\WorkAngelApi;

use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private $http;

    const VER_1_3 = 'application/vnd.wam-api-v1.3+json';
    const VER_1_4 = 'application/vnd.wam-api-v1.4+json';

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function getUserByToken(string $token) : array
    {
        $url = env('WORK_ANGEL_API_URL') . '/user/me';
        $params = [
            'headers' => [
                'Accept' => self::VER_1_3,
                'Wam-Token' => $token,
            ],
        ];

        $getUserResponse = $this->http->get($url, $params);
        $user = $this->decodeResponseBody($getUserResponse);

        return $user;
    }

    public function getUsersLastRecognition(string $token, string $receiverId) : array
    {
        $url = env('WORK_ANGEL_API_URL') . '/users/' . $receiverId . '/recognitions/received';
        $params = [
            'headers' => [
                'Accept' => self::VER_1_4,
                'Wam-Token' => $token,
            ],
        ];

        $getRecognitionsResponse = $this->http->get($url, $params);
        $recognitions = $this->decodeResponseBody($getRecognitionsResponse);

        dd($recognitions);
    }

    public function getUserIdByToken(string $token) : string
    {
        $user = $this->getUserByToken($token);

        if (!isset($user['user_id'])) {
            throw new ClientException('Could not retrieve user id from response body');
        }

        return $user['user_id'];
    }

    private function decodeResponseBody(ResponseInterface $response) : array
    {
        $decodedResponse = json_decode($response->getBody()->getContents(), true);

        return $decodedResponse['body'];
    }
}
