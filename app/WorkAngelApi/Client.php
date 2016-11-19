<?php

namespace App\WorkAngelApi;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Response;

class Client
{
    private $http;

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function getUserIdByToken(string $token) : string
    {
        $url = env('WORK_ANGEL_API_URL') . '/user/me';
        $params = [
            'headers' => [
                'Accept' => 'application/vnd.wam-api-v1.3+json',
                'Wam-Token' => $token,
            ]
        ];

        $getUserResponse = $this->http->get($url, $params);
        $user = $this->decodeResponseBody($getUserResponse);

        if (!isset($user['user_id'])) {
            throw new ClientException('Could not retrieve user id from response body');
        }

        return $user['user_id'];
    }

    private function decodeResponseBody(Response $response) : array
    {
        $decodedResponse = json_decode($response->getBody()->getContents(), true);

        return $decodedResponse['body'];
    }
}
