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
        $partner = User::whereNotNull('latitude')->whereNull('deleted_at')->where([['confirmed',1],['active',1]])->get();
   
        $partnerMap = [];
        foreach ($partner as $partnerkey => $partnervalue) {
            if(count(ProductOffer::where([['user_id', $partnervalue->id],['deleted',0]] )->get()) > 0 ) {
         
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
        }
       
       
        $partner = json_encode($partnerMap);
        $users = User::orderBy('id','desc')->paginate(4);
        $product0ffer = ProductOffer::where([
            ['confirmed',1],['deleted',0]
                ])->orderBy('id','DESC')->limit(4)->get();
        $product = [];
        $date = new Carbon;
        foreach($product0ffer as $productkey => $productvalue) {
             
            //if((isset($productvalue->Offertype[0]))&&($productvalue->Offertype[0]->type == 1)&&($date == $productvalue->Offertype[0]->datefrom)) {
            if((isset($productvalue->Offertype[0]))&&($productvalue->Offertype[0]->type == 1) && !($date->between(Carbon::parse($productvalue->Offertype[0]->datefrom), Carbon::parse($productvalue->Offertype[0]->dateto)->addDay()))) {
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
        
  
        $categorylist = ProductOffer::selectRaw('productoffers.categoryid')->where([
            ['confirmed',1],['deleted',0]
                ])->groupBy('productoffers.categoryid')->orderBy('categoryid','DESC')->limit(5)->get();
        
        $category = [];
        foreach($categorylist as $categorykey => $categoryvalue) {
            $categoryDetails = Category::find($categoryvalue->categoryid);
            
             $productList = ProductOffer::where([
            ['confirmed',1],['deleted',0],['categoryid',$categoryvalue->categoryid]
                ])->orderBy('id','DESC')->limit(5)->get();
           foreach($productList as $productlistkey => $productlistvalue) {
               
               $category[$categorykey]['productid'][$productlistkey]['id'] = $productlistvalue->id;
               $category[$categorykey]['productid'][$productlistkey]['name'] = $productlistvalue->name;
               $category[$categorykey]['productid'][$productlistkey]['userid'] = $productlistvalue->user_id;
           }  
              if(count($productList)>0) {
               $category[$categorykey]['categoryid'] = $categoryDetails->id;
               $category[$categorykey]['categoryname'] = $categoryDetails->name;
               $category[$categorykey]['categorydescription'] = $categoryDetails->description;
               $category[$categorykey]['categoryimage'] = $categoryDetails->avathar;
               $category[$categorykey]['categoryseo'] = $categoryDetails->seo;
               $category[$categorykey]['userid'] = $categoryDetails->user_id;
              }
        }
        
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
