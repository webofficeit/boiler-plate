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
        
        $productlist = ProductOffer::where([['user_id',$paramId],['confirmed',1],['deleted', 0]])->get();
        $category = [];
        $catname = [];
        
        foreach($productlist as $productkey => $productvalue) {
            
            if ((in_array($productvalue->category->name, $catname))||($productvalue->category->deleted==1)) {
                
                continue;
            }
           $category[$productkey]['name'] = $productvalue->category->name;
           $category[$productkey]['seo'] = $productvalue->category->seo;
           $category[$productkey]['picture'] = $productvalue->category->avathar;
           $category[$productkey]['userid'] = $productvalue->category->user_id;
           $category[$productkey]['userparam'] = $param;
            $catname[$productkey] = $productvalue->category->name;
        }
         
        return array_values($category);
    }
}
