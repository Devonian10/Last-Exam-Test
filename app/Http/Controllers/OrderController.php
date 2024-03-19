<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
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
    public function indexAdmin(){
        $pesanan = Order::all();
        return view('admin.orderAdmin', compact('pesanan'));
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
            ["bukti_pembayaran"=>"required|images|file|max:2043",
            "Alamat_pengiriman"=>"required|string|max:255"             
        ]);
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('bukti_pembayaran');
            
        } return redirect('/order')->with('success', 'Bukti Pembayaran has sent to admin !');
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

        if($order){
            return redirect()->route('order.index')->with('success', 'Order Has been deleted');
        }
    }
}
