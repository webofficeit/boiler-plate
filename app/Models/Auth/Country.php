<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country.
 */
class Country extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['country_code','country_name'];
}
