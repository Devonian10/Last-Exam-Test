<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.produk.tambah');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // 
        $validatedData = $request->validate(
            ["nama_kopi"=> "required|string|max:255",
             "harga"=>"required|numeric|min:0",
             "gambar"=>"required|string|max",
             "stock"=>"required|numeric|min:0"
        ]);
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('Product');
            
        }
        return redirect('/produk/tambah')->with('success', 'Produk kopi has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
