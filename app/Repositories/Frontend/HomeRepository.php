<?php

namespace App\Repositories\Frontend;

use App\Models\Auth\User;
use App\Models\Backend\ProductOffer;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Crypt;



/**
 * Description of HomeRepository
 *
 * @author dell
 */
class HomeRepository extends BaseRepository {
    
     /**
     * @return string
     */
    public function model()
    {
        return User::class;
    }
    
    public function getAllUserMap($userId=null) {
        if($userId==null) {
            $partner = User::whereNotNull('latitude')->whereNull('deleted_at')->where([['confirmed',1],['active',1]])->get();
        }
        else {
            $paramId = Crypt::decryptString($userId);
            $partner = User::where([['id',$paramId]])->get(); 
  
        }
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
                'title'=> '<a href="/list/'.Crypt::encryptString($partnervalue->id).'">'.$partnervalue->first_name." ".$partnervalue->last_name.'</a>',
                'description' => '<a href="/list/'.Crypt::encryptString($partnervalue->id).'"><img src='.$this->profileavatar.' /><p>'    
            ];
            array_push($partnerMap, $tempMap);
            }
        }
       
       
        return json_encode($partnerMap);
    }
}
