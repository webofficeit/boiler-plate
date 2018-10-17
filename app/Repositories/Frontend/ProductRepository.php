<?php

namespace App\Repositories\Frontend;

use App\Models\Backend\ProductOffer;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Description of ProductRepository
 *
 * @author dell
 */
class ProductRepository extends BaseRepository {
    
     /**
     * @return string
     */
    public function model()
    {
        return ProductOffer::class;
    }
    
    public function getCategory($param) {
        
        $paramId = \Crypt::decryptString($param);
        
        $productlist = ProductOffer::where([['user_id',$paramId],['confirmed',1]])->get();
        
        $category = [];
        foreach($productlist as $productkey => $productvalue) {
           $category[$productkey]['name'] = $productvalue->category->name;
           $category[$productkey]['seo'] = $productvalue->category->seo;
           $category[$productkey]['picture'] = $productvalue->category->avathar;
           $category[$productkey]['userid'] = $productvalue->category->user_id;
        }
        
        return $category;
    }
}
