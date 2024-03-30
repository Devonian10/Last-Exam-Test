<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request; // Import the Request class
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;
use Symfony\Component\Uid\UuidV4;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Bagian Controller Keranjang
    public function indexCart()
    {
        $userId = auth()->id(); // Ambil ID pengguna saat ini dengan metode yang lebih singkat
        $cartItems = Cart::where('users_id', $userId)->get(); // Menggunakan 'user_id' sesuai konvensi Laravel
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->product->harga;
        }
        return view('resipembayaran', ['cartItem' => $cartItems, 'total' => $total]); // Mengubah 'cartItem' menjadi 'cartItems'
    }



    public function addToCart(Request $request)
    {
        // Cek apakah item sudah ada di keranjang untuk pengguna yang sedang login
        $existingCartItem = Cart::where('users_id', auth()->id())
            ->where('product_id', $request->productId)
            ->first();

        if ($existingCartItem) {
            // Jika item sudah ada, tambahkan kuantitasnya
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();
        } else {
            // Jika item belum ada, tambahkan item baru ke keranjang
            $cartItem = new Cart();
            $cartItem->users_id = auth()->id();
            $cartItem->product_id = $request->productId;
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        // Update stok produk
        $produk = Product::findOrFail($request->productId);
        $produk->stock = $produk->stock - $request->quantity;
        $produk->save();

        return redirect()->back()->with('success', 'Item berhasil ditambahkan ke keranjang');
    }

    public function clearItem()
    {
        $userId = auth()->user()->id; // Ambil ID pengguna saat ini untuk melakukan 
        Cart::where('users_id', $userId)->delete();
        return redirect()->back()->with('success', 'Item telah dihapus');
    }
    public function removeItem($cartItemId)
    {
        $cartItem = Cart::findOrfail($cartItemId);
        $productId = $cartItem->product_id;
        $quantityId = $cartItem->quantityId;

        $cartItem->delete();
    }
    public function removeFromCart($cartItemId)
    {
        // Temukan item keranjang berdasarkan ID

        $cartItem = Cart::find($cartItemId);

        // Hapus item jika ditemukan
        if ($cartItem) {
            $produk = Product::find($cartItem->product_id);
            if ($produk) {
                $produk->stock += $cartItem->quantity;
                $produk->save();
            }

            $cartItem->delete();
            return redirect()->route('cartItem')->with('success', 'Item has been removed from cart.');
        }
        return redirect()->route('cartItem')->with('error', 'Item not found in cart.');
    }


    //Bagian Controller belanja (Shop)
    public function index()
    {
        //

        $Shop = Product::all();
        return view('cart.shop', compact('Shop'));
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
    public function bukti()
    {
        $userId = auth()->id(); // Ambil ID pengguna saat ini dengan metode yang lebih singkat
        $cartItems = Cart::where('users_id', $userId)->get(); // Menggunakan 'user_id' sesuai konvensi Laravel
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->product->harga;
        }
         
        return view('bukti-pembayaran',['cartItem' => $cartItems, 'total' => $total, 'cartItemCount'=>$cartItems->count()]);
        
    }
    public function uploadPayment(Request $request)
    {

        // Generate UUID for order
        $orderId = Uuid::uuid1()->toString();

        // Get authenticated user
        $user = Auth::user();

        $cartItems = Cart::whereIn('product_id', $request->cartItem)->get();
        // Simpan bukti pembayaran ke direktori public/images
        $imageName = time() . '.' . $request->bukti_pembayaran->extension();
        $request->bukti_pembayaran->move(public_path('gambar/bukti_pembayaran'), $imageName);
        
        foreach ($cartItems as $product) { // Menggunakan findOrFail untuk mencari produk dengan ID yang sesuai
            $order = new Order();
            $order->users_id = $user->id;
            $order->bukti_pembayaran = $imageName;
            $order->Alamat_pengiriman = $request->Alamat_pengiriman;
            $order->order_id = $orderId;
            $order->product_id = $product->product_id; // Menggunakan product_id untuk mendapatkan ID produk
            $order->Total_harga = $product->product->harga * $product->quantity; // Menggunakan product->harga untuk mendapatkan harga produk
            $order->status = 'pending';
            $order->save();
        }
        // dd()

        Cart::whereIn('product_id', $request->cartItem)->delete();



        return redirect()->route('cartItem')->with('success', 'Bukti Pembayaran has been sent to admin!');
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
    public function edit(Cart $shopCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $shopCart)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $shopCart)
    {
        //
    }
}
