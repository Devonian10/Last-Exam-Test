<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShopCart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Bagian Controller Keranjang
    public function indexCart()
    {
        $cartItem = ShopCart::instance('carts')->content();
        return view('resipembayaran', ['cartItem' => $cartItem]);
    }
    public function addToCart(Request $request)
    {
        $produk = Product::find($request->id);
        //$harga = $produk->Total_harga ? $produk->Total_harga->harga;
    }

    //Bagian Controller belanja (Shop)
    public function index()
    {
        //

        $Shop = Product::all();
        return view('/shop', compact('Shop'));
    }
    public function increaseStock(Product $Shop)
    {
        if ($Shop->stock < 0) {
            $Shop->increment('stock');

            return redirect()->route('resipembayaran.store', ['product_id' => $Shop->id]);
        } else {
            return back()->with('error', 'Stock sudah mencapai batas tertentu');
        }
        // $buktiPath = public_path('gambar/bukti_pembayaran');
        // $request->gambar->move($buktiPath);
        // $buktiName = 'payment_proof' . time() . '.jpg';
        // $buktiContent = file_get_contents($buktiPath, public_path('gambar/bukti_pembayaran' . $buktiName));


        return redirect()->route('shop.index')->with('success', 'Pembelian berhasil. Terima kasih!');
    }
    public function buy(Product $Shop, $operasi)
    {
        if ($operasi === 'decrement') {
            # code...
            if ($Shop->stock > 0) {
                $Shop->decrement('stock');

                return redirect()->route('resipembayaran.store', ['product_id' => $Shop->id]);
            } else {
                return redirect()->back()->with('error', 'Stock sudah habis');
            }
            // $buktiPath = public_path('gambar/bukti_pembayaran');
            // $request->gambar->move($buktiPath);
            // $buktiName = 'payment_proof' . time() . '.jpg';
            // $buktiContent = file_get_contents($buktiPath, public_path('gambar/bukti_pembayaran' . $buktiName));
            return redirect()->route('shop.index')->with('success', 'Pembelian berhasil. Terima kasih!');
        } elseif ($operasi === 'increment') {
            if ($Shop->stock < 0) {
                $Shop->increment('stock');
                return redirect()->route('resipembayaran.store', ['product_id' => $Shop->id]);
            } else {
                return redirect()->back()->with('error', 'Stok produk sudah mencapai batas');
            }
        } else {
            return redirect()->back()->with('error', 'Operasi tidak Valid');
        }
    }

    public function getCartById()
    {
    }
    public function Orderan($id)
    {
        User::findOrFail($id);
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
    public function show($id)
    {
        //
        $cart = Order::findOrFail($id);
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
