<?php

namespace App\Models\Backend\Traits\Relationship;

use App\Models\Backend\Offerexpire;
use App\Models\Backend\Offerimage;
use App\Models\Auth\User;


/**
 * Class UserRelationship.
 */
trait ProductOfferRelationship
{
    /**
     * @return mixed
     */
    public function Offerexpire()
    {
        return $this->hasMany(Offerexpire::class);
    }

    /**
     * @return mixed
     */
    public function Offerimage()
    {
        return $this->hasMany(Offerimage::class);
    }
    
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    
}
