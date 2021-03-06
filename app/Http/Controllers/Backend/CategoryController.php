<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UpdateCategoryRequest;
use App\Repositories\Backend\CategoryRepository;
use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Auth\User; 
use Storage;
use Response;
use App\Http\Middleware\SectionOwner;


/**
 * Description of CategoryController
 *
 * @author dell
 */
class CategoryController extends Controller {
    
    /**
     * @var UserRepository
     */
    protected $categoryRepository;
    

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware(SectionOwner::class);
        $this->categoryRepository = $categoryRepository;
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        
        if ($user::find(Auth::user()->id)->isAdmin()) {
           $catogorylists = Category::where([['user_id', Auth::user()->id],['deleted',0]])->orderBy('id','desc')->paginate(15); 
        }
        
        return view('backend.catalog.category.index', compact('catogorylists'));
                
        
    }
    
    public function store()
    {
        return view('backend.catalog.category.create');
        
    }
    
    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdateCategoryRequest $request)
    {
       
        $output = $this->categoryRepository->update(
            $request->only('name', 'description', 'seo', 'avatar'),
            $request->has('avatar') ? $request->file('avatar') : false
        );

        

        return redirect()->route('admin.category')->withFlashSuccess(__('strings.frontend.catalog.category_updated'));
    }
    
    public function edit(Request $request)
    {
       $paramId = \Crypt::decryptString($request->category);
       $category = Category::where('id',$paramId)->first();
       
       return view('backend.catalog.category.edit', compact('category'));
        
    }
    
    public function updateimage(Request $request)
    {
        $category = Category::find($request->imgid);
        $category->avathar = '';
        $category->save();
       return response()->json('deleted');
        
    }
    
    public function destroy(Category $category)
    {
        $this->categoryRepository->setDelete($category->id);

        

        return redirect()->route('admin.category')->withFlashSuccess(__('alerts.backend.category.deleted'));
        
    }
    
    public function editupdate(Request $request)
    {
        
      $this->categoryRepository->saveCategory($request);  
      return redirect()->route('admin.category')->withFlashSuccess(__('strings.frontend.catalog.category_updated'));
    }
}
