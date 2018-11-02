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
use App\Repositories\Frontend\HomeRepository;
use Carbon\Carbon;


/**
 * Description of CategoryController
 *
 * @author dell
 */
class CategoryController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request, ProductRepository $productRepository)
    {

        $category = $productRepository->getCategory($request->id);


        return view('frontend.catalog.category', compact('category'));

    }

    public function listDetails(Request $request, HomeRepository $homeRepository, ProductRepository $productRepository)
    {


        $partner = $homeRepository->getAllUserMap($request->id);
        $category = $productRepository->getCategory($request->id);
        $product = [];
        $slug = '';
        
        if (count($category) > 0) {

            $product = $productRepository->getProducts($category[0]['seo'], $request->id);
            $slug = $category[0]['seo'];
        }
        $user = ($request->id != null) ? $request->id : '';

        return view('frontend.catalog.listview', compact('partner', 'category', 'product', 'slug', 'user'));
    }

    public function getAllProduct(Request $request, ProductRepository $productRepository)
    {


        $slug = ($request->searchdata != '') ? $request->searchdata : $request->slug;
        $product = $productRepository->getProducts($slug, $request->serachdetails);
        return view('frontend.catalog.productlist', compact('product', 'slug'))->render();

    }

    public function getParticularCategory(Request $request, HomeRepository $homeRepository, ProductRepository $productRepository)
    {
        
        $user = ($request->id != null) ? $request->id : '';
         $partner = $homeRepository->getAllUserMap();
         $category = $productRepository->getCategory(null,$request->slug);
         if(count($category)>0) {
           
           $product = $productRepository->getProducts($category[0]['seo']);
           $slug = $category[0]['seo'];
       }
       $user = '';
       return view('frontend.catalog.listview', compact('partner','category','product','slug','user')); 
       
    }


}
