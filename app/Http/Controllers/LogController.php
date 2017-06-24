<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ads;
/**
 * Description of LogController
 *
 * @author Krzysztof
 */
class LogController extends Controller{
    
    public function index(){
        $ads = Ads::orderBy('created_at', 'desc')->get();
       
        $row_num = Ads::all()->count();
        
        return view('adsView', ["ads"=>$ads, "row_num" => $row_num, "location"=>"true"]);
    }
}
