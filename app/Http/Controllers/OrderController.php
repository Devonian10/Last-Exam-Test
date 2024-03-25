<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pesanan = Order::All();
        return view('order', compact('pesanan'), ["title" => "kopi"]);
    }
    public function indexAdmin()
    {
        $pesanan = Order::all();
        return view('admin.orderAdmin', compact('pesanan'), ["title" => "kopi"]);
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
    public function destroy(Order $order, $id)
    {
        Order::destroy($id);

        if ($order) {
            return redirect()->route('order.index')->with('success', 'Order Has been deleted');
        }
    }
    public function updateOrder(Request $request, string $id): RedirectResponse
    {
        $pesanan =  Order::findOrFail($id);
        // dd($request->status);
        $pesanan->update(['status' => $request->status]);
        return redirect()->route('orderAdmin.indexAdmin')->with('success', 'data telah diperbarui');
    }
    public function editOrder($id): View
    {
        $pesanan = Order::findOrFail($id);
        return view('admin.order.editOrderAdmin', compact('pesanan'), ['title' => 'kopi']);
    }
}
