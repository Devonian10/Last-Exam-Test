<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller {
    /** 
    *Display a listing of the resources

    *@return \Iluuminate\Http\Response    
    */
    public function index($id){
        //Landing page
        return view('landing-page/landing-page', ['pageId' => $id]);
    }
    public function store(Request $request){

    }
    public function show($id){
        return view('landing-page/landing-shop', ['shopId'=> $id]);
    }
    public function about($id){
        return view('landing-page/landing-about', ['aboutId'=> $id]);
    }
}