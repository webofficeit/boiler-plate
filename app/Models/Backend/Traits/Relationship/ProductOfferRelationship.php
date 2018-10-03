<?php

namespace App\Models\Backend\Traits\Relationship;

use App\Models\Backend\Offerexpire;
use App\Models\Backend\Offerimage;


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

    
}
