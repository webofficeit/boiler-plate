<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Backend;

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
        $path = storage_path('app/public/userinfo/'.$request->datapath);

return response()->download($path);
       
        
    }
}
