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
        $productoffer = parent::create([
                'name'        => $data['name'],
                'descriptionoffer'         => $data['descriptionoffer'],
                'category'             => $data['category'],
                'descriptionbussiness'           => $data['descriptionbussiness'],
                'rangeslider'           => $data['rangeslider'],
            'delivery'           => $data['delivery'],
            'pricelist'           => isset($data['pricelist'])?$data['pricelist']:'',
            'toggle_option'           => $data['toggle_option'],
                
            ]);
        if (isset($data['imagelist'])) {
            foreach($data['imagelist'] as $imagefile) {
                $filename = $imagefile->getClientOriginalName();
            $path = $media->storeAs('category/product/images', $filename);
            $imagedetails[] = $path; 
            }
            Offerimage::create([

'name' => json_encode($imagedetails),
'productofferid' => $productoffer->id
 
]);
        }
        }
        catch (Exception $e) {
            
        }
    }
}
