<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Category;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;


/**
 * Description of CategoryRepository
 *
 * @author dell
 */
class CategoryRepository extends BaseRepository {
    
    /**
     * @return string
     */
    public function model()
    {
        return Category::class;
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
            $filedetails = '';
        if (isset($data['avatar'])) {
                $filename = time().'.'.$data['avatar']->getClientOriginalName();
            $path = $data['avatar']->storeAs('/public/category/'.$current_user, $filename);
            $filedetails = $filename; 
            
        }
        
        $category = parent::create([
                'name'        => $data['name'],
                'description'         => $data['description'],
                'seo'             => $data['seo'],
                'avathar'           => $filedetails,
                'user_id'          => $current_user
                
            ]);
        }
        catch (Exception $e) {
            
        }
    }
    
     public function saveCategory($request) {
        
        $category = Category::find($request->catgid); 
        $current_user = $category->user_id;
            
            if(((isset($request->avatar))&&($request->avatar!=''))) {
              
                $filename = time().'.'.$request->avatar->getClientOriginalName();
            $path = $request->avatar->storeAs('/public/category/'.$current_user, $filename);
            $filedetails = $filename; 
            
             }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->seo = $request->seo;
        if(((isset($request->avatar))&&($request->avatar!=''))) {
        $category->avathar = $filedetails;
        }
        $category->save();
        
        
        
    }
    
    public function setDelete($categoryId) {
        
        $category = Category::find($categoryId);
        $category->deleted = 1;
        $category->save();
        return '';
    }
}
