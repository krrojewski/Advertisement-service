<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * Description of LocationController
 *
 * @author Krzysztof
 */
class LocationController extends Controller
{
    public function setsession(Request $request)
    {
        $longitude = $request->input("longitude");
        $latitude = $request->input("latitude");
        
        $request->session()->put("longitude", $longitude);
        $request->session()->put("latitude", $latitude);
        
        return redirect()->route('ads');
    }
}
