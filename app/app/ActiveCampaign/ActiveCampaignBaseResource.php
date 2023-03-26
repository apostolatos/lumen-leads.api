<?php

namespace App\ActiveCampaign;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use App\ActiveCampaign\ActiveCampaignService;
use Exception;

class ActiveCampaignBaseResource
{
    protected PendingRequest $client;

    public function __construct(
        ActiveCampaignService $service
    ) {
        $this->client = $service->makeRequest();
    }

    public function request(string $method, string $path, array $data = [], ?string $responseKey = null): array
    {
        /** @var Response $response */
        $response = $this->client->$method($path, $data);

        if ($response->failed()) {
            throw new Exception($response->getBody());
        }

        return $response->throw()->json($responseKey);
    }
}