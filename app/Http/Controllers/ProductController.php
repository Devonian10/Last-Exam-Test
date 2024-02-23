<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produk = Product::all();

        return view('admin.produk', compact('produk'), ['title' => 'kopi', 'active' => 'create']);
        //"produk" => Product::all(), "tambah" => Product::all(),
        return view('admin.createProduk', ['title' => 'produk', 'active' => 'create']);
        return view('admin.produk', compact(["title" => "kopi", "produk" => Product::all(), "tambah" => Product::all()]));

        // ["title" => "kopi", "produk" => Product::all(), "tambah" => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $produk = Product::all();
        //
        return view('admin.createProduk', compact('produk'), ['title' => 'produk', 'active' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        // 

        $validatedData = $request->validate(
            [
                "nama_kopi" => "required|string|max:255",
                "harga" => "required|numeric|min:0",
                //"gambar"=>"required|string|mimes:jpg,jpeg,png|max:255",
                "gambar" => "required|images|file|max:1024658",
                "stock" => "required|numeric|min:0"
            ]
        );

        // if file name already exists 

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar');
        }
        $product = new Product();
        $product->nama_kopi = $validatedData['nama_kopi'];
        $product->harga = $validatedData['harga'];
        $product->gambar = $validatedData['gambar'];
        $product->stock = $validatedData['stock'];
        $product->save();
        Product::create($validatedData);
        return redirect()->route('produk.index')->with('success', 'Produk kopi has been added.');
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
    public function destroy(Product $product, $id)
    {
        //
        Product::destroy($id);

        if ($product) {
            return redirect()->route('produk.index')->with('success', 'Product Has been deleted');
        }
    }
}
