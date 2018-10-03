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
        $this->categoryRepository = $categoryRepository;
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        echo "aaaa"; exit();
        
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
       // echo "<pre>"; print_r($request->name); exit();
        $output = $this->categoryRepository->update(
            $request->only('name', 'description', 'seo', 'avatar'),
            $request->has('avatar') ? $request->file('avatar') : false
        );

        

        return redirect()->route('admin.category')->withFlashSuccess(__('strings.frontend.user.profile_updated'));
    }
}
