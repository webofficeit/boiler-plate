<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Category;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;


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
        $category = parent::create([
                'name'        => $data['name'],
                'description'         => $data['description'],
                'seo'             => $data['seo'],
                'avatar'           => isset($data['avatar'])?$data['avatar']:''
                
            ]);
        if (isset($data['avatar'])) {
                $filename = $media->getClientOriginalName();
            $path = $media->storeAs('category', $filename);
            $filedetails[] = $path; 
            
        }
        }
        catch (Exception $e) {
            
        }
    }
}
