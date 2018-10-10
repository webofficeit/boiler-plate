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


/**
 * Description of CategoryController
 *
 * @author dell
 */
class CategoryController extends Controller {
    
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $paramId = \Crypt::decryptString($request->id);
        $category = Category::where('user_id',$paramId)->get();
        return view('frontend.catalog.category', compact('category'));
        
    }
}
