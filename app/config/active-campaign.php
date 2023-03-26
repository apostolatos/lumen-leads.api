<?php

return [

    'base_url' => env('ACTIVE_CAMPAIGN_BASE_URL'),

    'api_key' => env('ACTIVE_CAMPAIGN_API_KEY'),

    'timeout' => 100,

    'retry_times' => 3,

    'retry_sleep' => 5,

    'custom_fields' => [
        // 'is_email_verified' => 50,
    ],

];