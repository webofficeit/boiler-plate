<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partner = User::whereNotNull('latitude')->get();
        
        $partnerMap = [];
        foreach ($partner as $partnerkey => $partnervalue) {
            $profileavatar = 'img/64e1b8d34f425d19e1ee2ea7236d3028.png';
            if($partnervalue->avatar_location!='') {
                $profileavatar = 'storage/'.$partnervalue->avatar_location;
            }
            $tempMap = [
                'id'=>$partnervalue->first_name." ".$partnervalue->last_name,
                'color'=> "#000000",
                'svgPath'=> 'M40,0C26.191,0,15,11.194,15,25c0,23.87,25,55,25,55s25-31.13,25-55C65,11.194,53.807,0,40,0z     M40,38.8c-7.457,0-13.5-6.044-13.5-13.5S32.543,11.8,40,11.8c7.455,0,13.5,6.044,13.5,13.5S47.455,38.8,40,38.8z',
                 'showAsSelected'=> true,
                'latitude'=> $partnervalue->latitude,
                'longitude'=> $partnervalue->longitude,
                'zoomLevel'=> 5,        
                'scale'=> 0.5,
                'title'=> $partnervalue->first_name." ".$partnervalue->last_name,
                'description' => '<img src='.$profileavatar.' /><p>'.$partnervalue->bussiness_description.'</p>'    
            ];
            array_push($partnerMap, $tempMap);
           
        }
       
        $partner = json_encode($partnerMap);
        
        return view('frontend.index', compact('partner'));
    }
}
