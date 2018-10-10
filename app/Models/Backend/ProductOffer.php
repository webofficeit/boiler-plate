<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Traits\Relationship\ProductOfferRelationship;
use App\Models\Backend\Traits\Attribute\ProductAttribute;

/**
 * Description of ProductOffer
 *
 * @author dell
 */
class ProductOffer extends Model {
    use ProductOfferRelationship;
    use ProductAttribute;
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productoffers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'descriptionoffer', 'descriptionbussiness', 'categoryid', 'deliverymethodid', 'girapercentage', 'pricelistdocument','deleted','confirmed','user_id'];
}
