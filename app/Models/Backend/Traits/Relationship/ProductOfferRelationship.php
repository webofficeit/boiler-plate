<?php

namespace App\Models\Backend\Traits\Relationship;

use App\Models\Backend\Offertype;
use App\Models\Backend\Offerimage;
use App\Models\Auth\User;
use App\Models\Backend\Category;


/**
 * Class UserRelationship.
 */
trait ProductOfferRelationship
{
    /**
     * @return mixed
     */
    public function Offertype()
    {
        return $this->hasMany(Offertype::class);
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
    
    public function category()
    {
        return $this->belongsTo(Category::class,'categoryid','id');
    }

    
}
