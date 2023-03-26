<?php

namespace App\ActiveCampaign;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use App\ActiveCampaign\ActiveCampaignContactsResource;

class ActiveCampaignService
{
    public string $key;
    public string $baseUrl;
    public int $timeout;
    public int $retryTimes;
    public int $retrySleep;

    public function __construct(
        $baseUrl,
        $key,
        $timeout,
        $retryTimes = null,
        $retrySleep = null
    ) {
        $this->key = $key;
        $this->baseUrl = $baseUrl;
        $this->timeout = $timeout;
        $this->retryTimes = $retryTimes;
        $this->retrySleep = $retrySleep;
    }

    public function makeRequest(): PendingRequest
    {
        $request = Http::withHeaders([
            'Api-Token' => $this->key,
        ])
            ->acceptJson()
            ->baseUrl($this->baseUrl);
            //->timeout($this->timeout);

        // if ($this->retryTimes != null && $this->retrySleep != null) {
        //     $request->retry($this->retryTimes, $this->retrySleep);
        // }

        return $request;
    }

    public function contacts(): ActiveCampaignContactsResource
    {
        return new ActiveCampaignContactsResource($this);
    }
}