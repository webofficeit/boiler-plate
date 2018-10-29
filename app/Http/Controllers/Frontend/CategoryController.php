<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ProductOffer;
use App\Repositories\Frontend\ProductRepository;
use Carbon\Carbon;


/**
 * Description of CategoryController
 *
 * @author dell
 */
class CategoryController extends Controller {
    
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request, ProductRepository $productRepository)
    {
        
        $category = $productRepository->getCategory($request->id);
        
        
        return view('frontend.catalog.category', compact('category'));
        
    }
    
    public function getAllProduct(Request $request, ProductRepository $productRepository)
    {
        
         $slug = $request->slug;
        $category = Category::where('seo',$slug)->get();
   
        $productlist = ProductOffer::where([
            ['categoryid',$category[0]->id],
            ['confirmed',1],['deleted', 0]
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
    
    
}
