<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use App\Models\Backend\ProductOffer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Crypt;
use Carbon\Carbon;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    protected $profileavatar = '';
    
    public function __construct()
    {
        $this->profileavatar = '';
    }
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partner = User::whereNotNull('latitude')->where('confirmed',1)->get();
        $partnerMap = [];
        foreach ($partner as $partnerkey => $partnervalue) {
            $this->profileavatar = 'img/avatar.png';
            if($partnervalue->avatar_location!='') {
                $this->profileavatar = 'storage/'.$partnervalue->avatar_location;
            }
            $tempMap = [
                'id'=>$partnervalue->first_name." ".$partnervalue->last_name,
                'color'=> config('deal.ammap.color'),
                'svgPath'=> config('deal.ammap.svgPath'),
                 'showAsSelected'=> config('deal.ammap.showAsSelected'),
                'latitude'=> $partnervalue->latitude,
                'longitude'=> $partnervalue->longitude,
                'zoomLevel'=> config('deal.ammap.zoomLevel'),        
                'scale'=> config('deal.ammap.scale'),
                'title'=> '<a href="/user/'.Crypt::encryptString($partnervalue->id).'">'.$partnervalue->first_name." ".$partnervalue->last_name.'</a>',
                'description' => '<a href="/user/'.Crypt::encryptString($partnervalue->id).'"><img src='.$this->profileavatar.' /><p>'    
            ];
            array_push($partnerMap, $tempMap);
           
        }
       
       
        $partner = json_encode($partnerMap);
        $users = User::orderBy('id','desc')->paginate(5);
        $product0ffer = ProductOffer::where([
            ['confirmed',1]
                ])->orderBy('id','DESC')->limit(4)->get();
        $product = [];
        $date = new Carbon;
        foreach($product0ffer as $productkey => $productvalue) {
          
             
            if((isset($productvalue->Offertype[0]))&&($productvalue->Offertype[0]->type == 1)&&($date >= $productvalue->Offertype[0]->datefrom)) {
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
        
      
        return view('frontend.index', compact('partner','users','product'));
    }
    
    public function searchmap(Request $request) {
        $serarchdate = $request['searchdata'];
        $partnerMap = [];
        
         $result = ProductOffer::where('name', 'like', '%' . $serarchdate. '%')->get();  
        
        foreach($result as $catkey => $catvalue) {
            $userDetails = User::find($catvalue->user_id);
            if($userDetails->avatar_location!='') {
                $this->profileavatar = 'storage/'.$userDetails->avatar_location;
            }
            $tempMap = [
                'id'=>$userDetails->first_name." ".$userDetails->last_name,
                'color'=> config('deal.ammap.color'),
                'svgPath'=> config('deal.ammap.svgPath'),
                 'showAsSelected'=> config('deal.ammap.showAsSelected'),
                'latitude'=> $userDetails->latitude,
                'longitude'=> $userDetails->longitude,
                'zoomLevel'=> config('deal.ammap.zoomLevel'),        
                'scale'=> config('deal.ammap.scale'),
                'title'=> '<a href="/user/'.Crypt::encryptString($userDetails->id).'">'.$userDetails->first_name." ".$userDetails->last_name.'</a>',
                'description' => '<a href="/user/'.Crypt::encryptString($userDetails->id).'"><img src='.$this->profileavatar.' /><p>'     
            ];
            array_push($partnerMap, $tempMap);
        }
         return json_encode($partnerMap);
    }
}
