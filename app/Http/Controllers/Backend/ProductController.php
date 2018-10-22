<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\ProductOffer;
use App\Models\Backend\Offerimage;
use App\Models\Backend\DeliveryMethod;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Repositories\Backend\ProductRepository;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function index(User $user)
    { 
        if ($user::find(Auth::user()->id)->isAdmin()) {
           $productlists = ProductOffer::where([
            ['deleted', 0]
            ])->orderBy('id','desc')->paginate(15); 
        } else {
        $productlists = ProductOffer::where([
            ['user_id', Auth::user()->id],
            ['deleted', 0]
            ])->orderBy('id','desc')->paginate(15);
        }
        return view('backend.catalog.product.index', compact('productlists'));
        
    }
    
     public function confirmindex(User $user)
    { 
        if ($user::find(Auth::user()->id)->isAdmin()) {
           $productlists = ProductOffer::where([['confirmed', 0],['deleted', 0]])->orderBy('id','desc')->paginate(15); 
        } 
        return view('backend.catalog.product.confirm', compact('productlists'));
        
    }
    
    public function store(User $user)
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
       
        $output = $this->productRepository->update(
            $request->only('name', 'descriptionoffer', 'category', 'descriptionbussiness','imagelist','rangeslider','delivery','pricelist','toggle_option','datepickerfrom','datepickerto','toggle_option_confirm')
            
        );

        

        return redirect()->route('admin.product')->withFlashSuccess(__('strings.frontend.catalog.product_updated'));
    }
    
    public function edit(Request $request)
    {
        $isconfirm = '';
        if (strpos(url()->previous(), 'product/confirm') !== false) {
          $isconfirm  = 'productconfirm';
     }
      
       $paramId = \Crypt::decryptString($request->product);
       $product = ProductOffer::where('id',$paramId)->first();
      
       
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
       
       
       return view('backend.catalog.product.edit', compact('product','Adeliverys','Acategorys','isconfirm'));
        
    }
    
    public function updateimage(Request $request)
    {
        
        $Offerimage = Offerimage::find($request->imgid);
        $AproductImg = json_decode($Offerimage->name);
        unset($AproductImg[$request->dataid]);
        $AproductImg = json_encode(array_values($AproductImg));
        $Offerimage->name = $AproductImg;
       $Offerimage->save();
       return response()->json('deleted');
        
    }
    
    public function destroy(Request $request)
    {
        
        
        $this->productRepository->setDelete($request->product);

        

        return redirect()->route('admin.product')->withFlashSuccess(__('alerts.backend.product.deleted'));
        
    }
    
    public function editupdate(Request $request)
    {
       
      $this->productRepository->saveProduct($request); 
     
      if ($request->prevoiusurl  == 'productconfirm') {
          
        return redirect()->route('admin.product.confirm')->withFlashSuccess(__('strings.frontend.catalog.product_updated'));
}
      return redirect()->route('admin.product')->withFlashSuccess(__('strings.frontend.catalog.product_updated'));
    }
}
