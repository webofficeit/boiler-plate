<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories\Backend;

use App\Models\Backend\ProductOffer;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Models\Backend\Offerimage;
use App\Models\Backend\Offertype;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User; 
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
    
    
    /**
     * @param array $data
     *
     * @return User
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(array $data) 
    {
        try {
            
            $current_user = Auth::user()->id;
            
            if (isset($data['pricelist'])) {
            
                
                $filename = $data['pricelist']->getClientOriginalName();
            $path = $data['pricelist']->storeAs('/public/category/product/'.$current_user.'/doc', $filename);
            $filedetails = $filename; 
            
             }
            
            
        $productoffer = parent::create([
                'name'        => $data['name'],
                'descriptionoffer'         => $data['descriptionoffer'],
                'categoryid'             => $data['category'],
                'descriptionbussiness'           => $data['descriptionbussiness'],
                'girapercentage'           => $data['rangeslider'],
            'deliverymethodid'           => $data['delivery'],
            'pricelistdocument'           => isset($data['pricelist'])?$filedetails:'',
            'user_id' => $current_user,
            'toggle_option'           => $data['toggle_option'],
            'confirmed' => isset($data['toggle_option_confirm'])?$data['toggle_option_confirm']:0,
                
            ]);
        if (isset($data['imagelist'])) {
            
            foreach($data['imagelist'] as $imagefile) {
                
                $filename = $imagefile->getClientOriginalName();
            $path = $imagefile->storeAs('/public/category/product/'.$current_user.'/images', $filename);
            $imagedetails[] = $filename; 
            }
            Offerimage::create([

'name' => json_encode($imagedetails),
'product_offer_id' => $productoffer->id
 
]);
        }
       
        if (isset($data['toggle_option'])) {
             Offertype::create([

'type' => $data['toggle_option'],
'datefrom' =>($data['datepickerfrom']!='')?Carbon::createFromFormat('d/m/Y', $data['datepickerfrom'])->toDateString():null,
 'dateto' => ($data['datepickerto']!='')?Carbon::createFromFormat('d/m/Y', $data['datepickerto'])->toDateString():null,
 'product_offer_id' =>  $productoffer->id               
 
]);   
        }
        }
        catch (Exception $e) {
            
        }
    }
    
    public function setDelete($productId) {
        
        $productoffer = ProductOffer::find($productId);
        $productoffer->deleted = 1;
        $productoffer->save();
        return '';
    }
    
    public function saveProduct($request) {
        
        $productoffer = ProductOffer::find($request->prodid);
        $current_user = $productoffer->user_id;
            
            if (isset($request->pricelist)) {
            
                
                $filename = $request->pricelist->getClientOriginalName();
            $path = $request->pricelist->storeAs('/public/category/product/'.$current_user.'/doc', $filename);
            $filedetails = $filename; 
            
             }
        
        
        $productoffer->name = $request->name;
        $productoffer->descriptionoffer = $request->descriptionoffer;
        $productoffer->descriptionbussiness = $request->descriptionbussiness;
        $productoffer->girapercentage = $request->rangeslider;
        $productoffer->categoryid = $request->category;
        $productoffer->deliverymethodid = $request->delivery;
        $productoffer->pricelistdocument = isset($request->pricelist)?$filedetails:'';
        if (User::find($current_user)->isAdmin()) {
        $productoffer->confirmed = $request->toggle_option_confirm;
        }
        $productoffer->save();
        
        if (isset($request->imagelist)) {
            
            foreach($request->imagelist as $imagefile) {
                
                $filename = $imagefile->getClientOriginalName();
            $path = $imagefile->storeAs('/public/category/product/'.$current_user.'/images', $filename);
            $imagedetails[] = $filename; 
            }
            $Offerimage = Offerimage::where('product_offer_id', $request->prodid)->get();
            
            if((isset($Offerimage))&&(count($Offerimage)>0)) {
               $offername = json_decode($Offerimage[0]->name); 
               $offermerge = array_merge($offername,$imagedetails);
               $Offerimage[0]->name = json_encode($offermerge);
               $Offerimage[0]->save();
            }
            else {
                
                    Offerimage::create([

'name' => json_encode($imagedetails),
'product_offer_id' => $productoffer->id
 
]);
            }
            
           
            
        }
        
        if (isset($request->toggle_option)) {
            $Offertype = Offertype::where('product_offer_id', $request->prodid)->get(); 
            $Offertype[0]->type = $request->toggle_option;
            $Offertype[0]->datefrom = ($request->toggle_option==1)?Carbon::createFromFormat('d/m/Y', $request->datepickerfrom)->toDateString():null;
            $Offertype[0]->dateto = ($request->toggle_option==1)?Carbon::createFromFormat('d/m/Y', $request->datepickerto)->toDateString():null;
            $Offertype[0]->save();
        }
        
    }
}
