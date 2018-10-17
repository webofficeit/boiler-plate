<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use App\Models\Auth\BussinessRegistrationDoc;
use App\Models\Backend\ProductOffer;
use App\Models\Backend\AccountTypes;
use App\Models\Auth\Country;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }
    
    /**
     * @return mixed
     */
    public function bussinessDoc()
    {
        return $this->hasMany(BussinessRegistrationDoc::class);
    }
    
    public function accounttype()
    {
        return $this->belongsTo(AccountTypes::class,'account_type','id');
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    
    
}
