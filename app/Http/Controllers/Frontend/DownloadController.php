<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * Description of DownloadController
 *
 * @author dell
 */
class DownloadController extends Controller {
    
    public function downloadfile(Request $request)
    {
        $path = storage_path('app/public/category/product/'.$request->userid.'/doc/'.$request->filename);
        return response()->download($path);
        
    }
}
