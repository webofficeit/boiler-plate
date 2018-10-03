<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\DeliveryMethod;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Repositories\Backend\ProductRepository;
/**
 * Description of ProductController
 *
 * @author dell
 */
class ProductController extends Controller {
   
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        echo "product"; exit();
        
    }
    
    public function store()
    {
        $categorylist = Category::all();
        $Acategorys=[];
        foreach($categorylist as $keycategory => $valuecategory) {
            $Acategorys[$keycategory]=[
                'id'=> $valuecategory->id,
                'name' => $valuecategory->name
            ];
            
        }
        
        $deliverylist = DeliveryMethod::all();
        $Adeliverys=[];
        foreach($deliverylist as $keydelivery => $valuedelivery) {
            $Adeliverys[$keydelivery]=[
                'id'=> $valuedelivery->id,
                'name' => $valuedelivery->name
            ];
            
        }
         
        //echo "<pre>"; print_r($Adelivery); exit();
        
        return view('backend.catalog.product.create', compact('Acategorys','Adeliverys'));
        
    }
    
    public function update(UpdateProductRequest $request)
    {
       //echo "<pre>"; print_r($request->rangeslider); exit();
        $output = $this->productRepository->update(
            $request->only('name', 'descriptionoffer', 'category', 'descriptionbussiness','imagelist','rangeslider','delivery','pricelist','toggle_option','datepickerfrom','datepickerto')
            
        );

        

        return redirect()->route('admin.product')->withFlashSuccess(__('strings.frontend.user.profile_updated'));
    }
}
