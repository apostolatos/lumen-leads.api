<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ActiveCampaign\ActiveCampaignService;
use App\ActiveCampaign\ActiveCampaign;

class ActiveCampaignServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ActiveCampaign::class, function () {
            return new ActiveCampaignService(
                config('active-campaign.base_url'),
                config('active-campaign.api_key'),
                config('active-campaign.timeout'),
                config('active-campaign.retry_times'),
                config('active-campaign.retry_sleep'),
            );
        });
    }

    public function boot(): void
    {
        $configPath = __DIR__.'/../config/active-campaign.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'config');
    }

    /**
     * Get the config path
     */
    protected function getConfigPath(): string
    {
        return $this->config_path('active-campaign.php');
    }

    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}