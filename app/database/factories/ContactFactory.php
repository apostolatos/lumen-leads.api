<?php

namespace Database\Factories;

use App\ActiveCampaign\ActiveCampaignContact;

class ContactFactory
{
    /**
     * @param  array<string>  $attributes
     */
    public static function make(array $attributes): ActiveCampaignContact
    {
        return new ActiveCampaignContact(
            intval($attributes['id']),
            $attributes['email'],
            $attributes['phone'],
            $attributes['firstName'],
            $attributes['lastName'],
        );
    }
}