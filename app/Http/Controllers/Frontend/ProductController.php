<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use App\Models\Backend\ProductOffer;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\Frontend\ProductRepository;


/**
 * Description of ProductController
 *
 * @author dell
 */
class ProductController extends Controller {
    
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $slug = $request->slug;
        $category = Category::where('seo',$slug)->get();
        $paramId = \Crypt::decryptString($request->userid);
        $productlist = ProductOffer::where([
            ['categoryid',$category[0]->id],
            ['confirmed',1],['user_id',$paramId],['deleted', 0]
                ])->get();
        
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
                'userid' => $productvalue->user_id
            ];
           
            if((isset($productvalue->Offerimage[0])))
                $product[$productkey]['imagees'] = json_decode ($productvalue->Offerimage[0]->name)[0];
            
            
            
        }
        
        return view('frontend.catalog.product', compact('product','slug'));
        
    }
    
    public function detailview(Request $request,ProductRepository $productRepository) {
        
        $paramId = \Crypt::decryptString($request->id);
        
        $productlist = ProductOffer::find($paramId);
        $relatedProduct = ProductOffer::where([
            ['confirmed',1],['user_id',$productlist->user_id],['deleted', 0]
                ])->whereNotIn('id', [$productlist->id])->orderBy('id','DESC')->limit(4)->get();
        $user = User::find($productlist->user_id);
        
        $category = $productRepository->getLatestCategory();
        return view('frontend.catalog.productdetailview', compact('productlist','relatedProduct','category','user'));
    }
}
