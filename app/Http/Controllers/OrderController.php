<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth::user();
        $cartItems = Cart::where('users_id', auth()->user()->id)->get();
        //$cartItems = Cart::where('users_id', $users->id)->get();
        $cartItemCount = $cartItems->count();
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->jumlah * $item->product->harga;
        }
        $pesanan = Order::where('users_id', auth()->user()->id)->get();
        $pesanan = Order::where('users_id', $users->id)->whereNotNull('bukti_pembayaran')->get();
        // $pesanan = DB::select(
        //     'SELECT 
        //     order_id, 
        //     u.username as username,  
        //     GROUP_CONCAT(CONCAT(o.jumlah, " x ", p.nama_kopi) SEPARATOR ", ") AS nama_kopi, 
        //     SUM(p.harga * o.jumlah) AS total_harga, 
        //     o.bukti_pembayaran as bukti_pembayaran, 
        //     o.Alamat_Pengiriman as Alamat_Pengiriman, 
        //     o.`status` as status, 
        //     o.Alasan_cancel as Alasan_cancel, 
        //     o.updated_at as updated_at
        // FROM orders o
        // JOIN users u ON u.id = o.users_id
        // JOIN products p ON p.id = o.product_id
        // GROUP BY 
        //     order_id, 
        //     u.username, 
        //     o.bukti_pembayaran, 
        //     o.Alamat_Pengiriman, 
        //     o.`status`, 
        //     o.Alasan_cancel, 
        //     o.created_at,
        //     o.updated_at',
        // );
        return view('order', compact('pesanan', 'cartItemCount', 'total'), ["title" => "kopi", "cartItemCount" => $cartItemCount, "total" => $total]);
    }
    public function indexAdminDetail($id)
    {
        $pesanan = Order::where('order_id', $id)->get();
        $total = 0;

        foreach ($pesanan as $item) {
            $total += $item->jumlah * $item->product->harga;
        }
        return view('admin.order.detailPesanan', ["title" => "kopi", "pesanan" => $pesanan, "total" => $total]);
    }
    public function indexAdmin()
    {
        $pesanan = DB::select(
            'SELECT 
            order_id, 
            u.username as username,  
            GROUP_CONCAT(CONCAT(o.jumlah, " x ", p.nama_kopi) SEPARATOR ", ") AS nama_kopi, 
            SUM(p.harga * o.jumlah) AS total_harga, 
            o.bukti_pembayaran as bukti_pembayaran, 
            o.Alamat_Pengiriman as Alamat_Pengiriman, 
            o.`status` as status, 
            o.Alasan_cancel as Alasan_cancel, 
            o.updated_at as updated_at
        FROM orders o
        JOIN users u ON u.id = o.users_id
        JOIN products p ON p.id = o.product_id
        GROUP BY 
            order_id, 
            u.username, 
            o.bukti_pembayaran, 
            o.Alamat_Pengiriman, 
            o.`status`, 
            o.Alasan_cancel, 
            o.updated_at'
        );

        return view('admin.orderAdmin', compact('pesanan'))->with(["title" => "kopi"]);
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

        $validatedData = $request->validate(
            [
                "bukti_pembayaran" => "required|image|file|max:2048",
                "Alamat_pengiriman" => "required|string|max:255"
            ]
        );

        $order = new Order();
        $order->bukti_pembayaran = $request->bukti_pembayaran;
        $order->Alamat_pengiriman = $request->Alamat_pengiriman;
        $order->status('pending');
        $order->save();

        if ($request->hasFile('bukti_pembayaran')) {
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
        }
        return redirect('/order')->with('success', 'Bukti Pembayaran has sent to admin !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, $order_id)
    {
        $pesanan = Order::where('order_id', $order_id)->get();
        foreach ($pesanan as $order) {
            $order->delete();
        }

        if ($order) {
            return redirect()->route('orderAdmin.indexAdmin')->with('success', 'Order Has been deleted');
        }
    }
    public function updateOrder(Request $request, string $order_id): RedirectResponse
    {
        $pesanan = Order::where('order_id', $order_id)->get();
        foreach ($pesanan as $order) {
            $order->update(['status' => $request->status]);
        }

        return redirect()->route('orderAdmin.indexAdmin')->with('success', 'Data telah diperbarui');
    }

    public function editOrder($order_id): View
    {
        $pesanan = Order::where('order_id', $order_id)->get();
        return view('admin.order.editOrderAdmin', compact('pesanan'), ['title' => 'kopi']);
    }
    public function Orderlist(Request $request)
    {
        $userId = auth()->id(); // Ambil ID pengguna saat ini dengan metode yang lebih singkat
        $cartItems = Cart::where('users_id', $userId)->get(); // Menggunakan 'user_id' sesuai konvensi Laravel
        $total = 0;
        $orderId = Uuid::uuid1()->toString();

        // Get authenticated user
        $user = Auth::user();

        $cartItems = Cart::whereIn('product_id', $request->cartItem)->get();
        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->product->harga;
        }
        return view('order', ['cartItemCount' => $cartItems->count()]);
    }
    public function batal($id)
    {
        $pesanan = Order::findOrFail($id);
        $pesanan->status='cancel';
        $pesanan->save();
        
        return redirect()->back()->with('success', 'Pesanan Berhasil Dibatalkan.');
    }
}
