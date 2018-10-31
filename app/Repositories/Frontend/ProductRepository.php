<?php

namespace App\Repositories\Frontend;

use App\Models\Backend\ProductOffer;
use App\Models\Backend\Category;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    
    public function getCategory($param = null,$category = null) {
        
        if($param!='') {
        $paramId = \Crypt::decryptString($param);
        
        $productlist = ProductOffer::where([['user_id',$paramId],['confirmed',1],['deleted', 0]])->get();
        }
        else if($category!='') {
            $categoryDetails = Category::where([['seo',$category]])->get();
            
           $productlist = ProductOffer::where([['categoryid',$categoryDetails[0]->id],['confirmed',1],['deleted', 0]])->get(); 
        }
        else {
           $productlist = ProductOffer::where([['confirmed',1],['deleted', 0]])->get();  
        }
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
    
    public function getHotOffers() {
        $product0ffer = ProductOffer::where([
            ['confirmed',1],['deleted',0]
                ])->orderBy('id','DESC')->limit(4)->get();
        $product = [];
        $date = new Carbon;
        foreach($product0ffer as $productkey => $productvalue) {
             
            //if((isset($productvalue->Offertype[0]))&&($productvalue->Offertype[0]->type == 1)&&($date == $productvalue->Offertype[0]->datefrom)) {
            if((isset($productvalue->Offertype[0]))&&($productvalue->Offertype[0]->type == 1) && !($date->between(Carbon::parse($productvalue->Offertype[0]->datefrom), Carbon::parse($productvalue->Offertype[0]->dateto)->addDay()))) {
                continue; 
            }
            
              $product[$productkey]= [
                'id' => $productvalue->id,
                'name' => $productvalue->name,
                'descriptionoffer' => $productvalue->descriptionoffer,  
                'percentage' => $productvalue->girapercentage,
                'userid' => $productvalue->user_id,
                'categoryseo' =>  $productvalue->category->seo
            ];
           
            if((isset($productvalue->Offerimage[0])))
                $product[$productkey]['imagees'] = json_decode ($productvalue->Offerimage[0]->name)[0];
            
            
            
        }
        return $product;
    }
    
    public function getLatestCategory() {
         $categorylist = ProductOffer::selectRaw('productoffers.categoryid')->where([
            ['confirmed',1],['deleted',0]
                ])->groupBy('productoffers.categoryid')->orderBy('categoryid','DESC')->limit(5)->get();
        
        $category = [];
        foreach($categorylist as $categorykey => $categoryvalue) {
            $categoryDetails = Category::find($categoryvalue->categoryid);
            
             $productList = ProductOffer::where([
            ['confirmed',1],['deleted',0],['categoryid',$categoryvalue->categoryid]
                ])->orderBy('id','DESC')->limit(5)->get();
           foreach($productList as $productlistkey => $productlistvalue) {
               
               $category[$categorykey]['productid'][$productlistkey]['id'] = $productlistvalue->id;
               $category[$categorykey]['productid'][$productlistkey]['name'] = $productlistvalue->name;
               $category[$categorykey]['productid'][$productlistkey]['userid'] = $productlistvalue->user_id;
           }  
              if(count($productList)>0) {
               $category[$categorykey]['categoryid'] = $categoryDetails->id;
               $category[$categorykey]['categoryname'] = $categoryDetails->name;
               $category[$categorykey]['categorydescription'] = $categoryDetails->description;
               $category[$categorykey]['categoryimage'] = $categoryDetails->avathar;
               $category[$categorykey]['categoryseo'] = $categoryDetails->seo;
               $category[$categorykey]['userid'] = $categoryDetails->user_id;
              }
        }
        return $category;
    }
    
    public function getProducts($slug,$user=null) {
       
         $category = Category::where('seo',$slug)->get();
        if(($user!=null)) {
            $paramId = \Crypt::decryptString($user);
           $productlist = ProductOffer::where([
            ['categoryid',$category[0]->id],
            ['user_id',$paramId],   
            ['confirmed',1],['deleted', 0]
                ])->get(); 
        }
        else {
        $productlist = ProductOffer::where([
            ['categoryid',$category[0]->id],
            ['confirmed',1],['deleted', 0]
                ])->get();
        }
        
        $date = new Carbon;
        $product = [];
        foreach($productlist as $productkey => $productvalue) {
          
             
            if((isset($productvalue->Offertype[0]))&&($productvalue->Offertype[0]->type == 1)&& !($date->between(Carbon::parse($productvalue->Offertype[0]->datefrom), Carbon::parse($productvalue->Offertype[0]->dateto)->addDay()))) {
                continue; 
            }
            
              $product[$productkey]= [
                'id' => $productvalue->id,
                'name' => $productvalue->name,
                'percentage' => $productvalue->girapercentage,
                'userid' => $productvalue->user_id,
                'description' => $productvalue->descriptionoffer
            ];
           
            if((isset($productvalue->Offerimage[0])))
                $product[$productkey]['imagees'] = json_decode ($productvalue->Offerimage[0]->name)[0];
            
            
            
        }
        return $product;
        
    }
}
