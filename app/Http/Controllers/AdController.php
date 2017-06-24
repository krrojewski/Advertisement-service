<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Ads;

/**
 * Description of AdController
 *
 * @author Krzysztof
 */
class AdController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    
    public function showall(Request $request){
        $ads = "";
        $row_num = "";
        //wyszukiwanie
        if($request->exists('searching'))
        {
        $ads = Ads::where('name', 'like', '%' . $request->input('searching') . '%')->get();
        
        $row_num = Ads::where('name', 'like', '%' . $request->input('searching') . '%')->count();
        }
        //filtrowanie
        elseif($request->exists('category')){
        $ads = Ads::where('category', $request->input('category'))->get();
        
        $row_num = Ads::where('category', $request->input('category'))->count();
        }
        else{
        $ads = Ads::orderBy('created_at', 'desc')->get();
       
        $row_num = Ads::all()->count();
        }
        return view('adsView', ["ads"=>$ads, "row_num" => $row_num]);
    }
    
    public function showmyads(){
        $user = Auth::user();
        
        $ads = Ads::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        $row_num = Ads::where('user_id', $user->id)->count();
        
        return view('myAds', ["ads"=>$ads, "row_num" => $row_num]);
    }
    
    public function show(Request $request, $id){
        $user = Auth::user();
        
        $ad = Ads::where("id", $id)->first();
        
        $latitude = $request->session()->get("latitude");
        $longitude = $request->session()->get("longitude");
        
        $name = $user->name;
        $surname = $user->surname;
        $email = $user->email;
        
        return view('adView', ["ad"=>$ad, "latitude"=>$latitude, "longitude"=>$longitude, 
            "name"=>$name, "surname"=>$surname, "email"=>$email]);
        //przekazujemy wspolrzedne z tabeli cities i wspolrzedne z sesji
    }
    
    public function newad(Request $request){
        //validation
        $this->validate($request,[
            'name' => 'required|min:3|max:60',
            'category' => 'required',
            'price' => 'required|min:1|max:7|regex:/^[0-9]+$/',
            'contact_nr' => 'required|min:9|max:15|regex:/^[0-9]+$/',
            'input-file1' => 'required|image',
            'input-file2' => 'required|image',
            'input-file3' => 'required|image',
            'description' => 'required',
            
        ]);
        
        $user = Auth::user();
        
        $name = $request->input('name');
        $price = $request->input('price');
        $category = $request->input('category');
        $contact_nr = $request->input('contact_nr');
        $description = $request->input('description');
        $latitude = $request->session()->get("latitude");
        $longitude = $request->session()->get("longitude");
        
        $user_id = $user->id;
        
        //zdjecie1
        $photo1 = $request->file('input-file1');
        $photo1name = 'adphoto1'. 'id-' . uniqid() . '.jpg';
        Storage::disk('local')->put($photo1name, File::get($photo1));
        
        //zdjecie2
        $photo2 = $request->file('input-file2');
        $photo2name = 'adphoto2'. 'id-' . uniqid() . '.jpg';
        Storage::disk('local')->put($photo2name, File::get($photo2));
        
        //zdjecie3
        $photo3 = $request->file('input-file3');
        $photo3name = 'adphoto3'. 'id-' . uniqid() . '.jpg';
        Storage::disk('local')->put($photo3name, File::get($photo3));
        
        $ad = new Ads();
        $ad->name=$name;
        $ad->price=$price;
        $ad->description=$description;
        $ad->category=$category;
        $ad->contact_nr=$contact_nr;
        $ad->latitude=$latitude;
        $ad->longitude=$longitude;
        $ad->photo1=$photo1name;
        $ad->photo2=$photo2name;
        $ad->photo3=$photo3name;
        $ad->user_id=$user_id;
        $ad->save();
        
        return redirect()->route('myads');
    }
    
    public function newadform(){
        return view('newAd');
    }
}
