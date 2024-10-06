<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller {
    /** 
    *Display a listing of the resources

    *@return \Iluuminate\Http\Response    
    */
    public function index(){
        //Landing page
        return view('landing-page/landing-page');
    }
    public function store(Request $request){

    }
    public function show(){
        return view('landing-page/landing-shop');
    }
    public function about(){
        return view('landing-page/landing-about');
    }
}