<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\ActiveCampaign\ActiveCampaign;

class Lead extends Eloquent
{
    protected $table = 'Leads';
    
    public static function boot()
    {
        parent::boot();

        // Will fire everytime an Lead is created
        static::creating(function (Lead $lead) {
            $contactId = app(ActiveCampaign::class)->contacts()->create($lead->email, [
                'firstName' => $lead->first_name,
                'lastName' => $lead->last_name
            ]);
        });
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['first_name', 'last_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 
        'email_address',
        'industry',
    ];
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the user's first name.
     */
    protected function getFirstNameAttribute(): string
    {   
        return explode(' ', $this->full_name)[0];
    }

    /**
     * Get the user's last name.
     */
    protected function getLastNameAttribute(): string
    {   
        return explode(' ', $this->full_name)[1];
    }
}
