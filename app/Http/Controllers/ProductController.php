<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Product::all();
        return view('admin.produk', compact('produk'), ['title' => 'kopi', 'active' => 'create']);
    }

    /**
     * Show the form for creating a new resource.
     */

    
    public function create(): View
    {
        $produk = Product::all();
        return view('admin.produk.createProduk', compact('produk'), ['title' => 'produk', 'active' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kopi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:50432', // Sesuaikan dengan kebutuhan validasi gambar
            'stock' => 'required|numeric',
        ]);

        // Simpan gambar
        $gambarName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('gambar'), $gambarName);

        // Buat produk baru
        $produk = new Product();
        $produk->nama_kopi = $request->nama_kopi;
        $produk->harga = $request->harga;
        $produk->gambar = asset("gambar/$gambarName");
        $produk->stock = $request->stock;
        $produk->status = $request->status;
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dibuat.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $produk = Product::findOrFail($id);
        return view('resipembayaran', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $produk = Product::findOrFail($id);
        return view('admin.produk.editProduk', compact('produk'), ['title' => 'kopi']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $produk = Product::findOrFail($id);
        $produk->update($request->except('gambar'));
        if ($request->has('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar) {
                $gambarPath = public_path('gambar/') . basename($produk->gambar);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }
        $gambarName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('gambar'), $gambarName);
        $produk->gambar = asset("gambar/$gambarName");
    } else {
        $produk->gambar = $produk->gambar;
    }
        $produk->save();
        return redirect()->route('produk.index')->with('success', 'Product has been updated.');
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
