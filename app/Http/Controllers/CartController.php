<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ShopCount = Session::get('shop', []);
        $Shop=Product::all();
        return view('/shop', compact('Shop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $orders ;
    }

    /**
     * Display the specified resource.
     */
    public function show(ShopCart $shopCart)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShopCart $shopCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShopCart $shopCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShopCart $shopCart)
    {
        //
    }
}
