<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use App\Models\Backend\ProductOffer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Crypt;
use Carbon\Carbon;
use App\Repositories\Frontend\HomeRepository;
use App\Repositories\Frontend\ProductRepository;

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
    public function index(Request $request,HomeRepository $homeRepository, ProductRepository $productRepository)
    {
        $partner = $homeRepository->getAllUserMap();
        $users = User::orderBy('id','desc')->limit(4)->get();
   
        $product = $productRepository->getHotOffers();
        
        $category = $productRepository->getLatestCategory();
        
        
        return view('frontend.index', compact('partner','users','product','category'));
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
