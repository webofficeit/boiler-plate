<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of Offerimage
 *
 * @author dell
 */
class Offerimage extends Model {
    
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offer_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'product_offer_id'];
}
