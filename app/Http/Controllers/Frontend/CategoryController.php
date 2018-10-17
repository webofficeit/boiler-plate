<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ProductOffer;
use App\Repositories\Frontend\ProductRepository;


/**
 * Description of CategoryController
 *
 * @author dell
 */
class CategoryController extends Controller {
    
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request, ProductRepository $productRepository)
    {
        
        $category = $productRepository->getCategory($request->id);
        
        
        return view('frontend.catalog.category', compact('category'));
        
    }
    
    
}
