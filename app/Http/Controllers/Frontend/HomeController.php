<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use App\Models\Backend\ProductOffer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    protected $profileavatar = '';
    
    public function __construct()
    {
        $this->profileavatar = 'img/64e1b8d34f425d19e1ee2ea7236d3028.png';
    }
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partner = User::whereNotNull('latitude')->get();
        
        $partnerMap = [];
        foreach ($partner as $partnerkey => $partnervalue) {
            
            if($partnervalue->avatar_location!='') {
                $this->profileavatar = 'storage/public/'.$partnervalue->avatar_location;
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
                'description' => '<img src='.$this->profileavatar.' /><p>'.$partnervalue->bussiness_description.'</p>'    
            ];
            array_push($partnerMap, $tempMap);
           
        }
       
        $partner = json_encode($partnerMap);
        $users = User::orderBy('id','desc')->paginate(5);
        
        return view('frontend.index', compact('partner','users'));
    }
    
    public function searchmap(Request $request) {
        $serarchdate = $request['searchdata'];
        $partnerMap = [];
        $productresult = ProductOffer::where('name', 'like', '%' . $serarchdate. '%')->get();
        foreach($productresult as $prodkey => $prodvalue) {
            $userDetails = $productresult->find($prodvalue->id)->users;
            if($userDetails->avatar_location!='') {
                $this->profileavatar = 'storage/public/'.$userDetails->avatar_location;
            }
            $tempMap = [
                'id'=>$userDetails->first_name." ".$userDetails->last_name,
                'color'=> "#000000",
                'svgPath'=> 'M40,0C26.191,0,15,11.194,15,25c0,23.87,25,55,25,55s25-31.13,25-55C65,11.194,53.807,0,40,0z     M40,38.8c-7.457,0-13.5-6.044-13.5-13.5S32.543,11.8,40,11.8c7.455,0,13.5,6.044,13.5,13.5S47.455,38.8,40,38.8z',
                 'showAsSelected'=> true,
                'latitude'=> $userDetails->latitude,
                'longitude'=> $userDetails->longitude,
                'zoomLevel'=> 5,        
                'scale'=> 0.5,
                'title'=> $userDetails->first_name." ".$userDetails->last_name,
                'description' => '<img src='.$this->profileavatar.' /><p>'.$userDetails->bussiness_description.'</p>'    
            ];
            array_push($partnerMap, $tempMap);
        }
         return json_encode($partnerMap);
    }
}
