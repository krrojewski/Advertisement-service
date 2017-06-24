<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ads;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ads = Ads::orderBy('created_at', 'desc')->limit(6)->get();
        $row_num = 6;


        return view('home', ['ads'=>$ads, 'row_num'=>$row_num, "dl"=>$request->session()->get("longitude"),
            "sz"=>$request->session()->get("latitude")]);
    }

    public function cutName($name, $setLength){
        $length = strlen($name);
        
        if($length >= $setLength){
            $cut = substr($name, 0, $setLength);
            
            $newName = $cut."...";
        }else{
            $newName = $name;
        }
        return $newName;
    }
}
