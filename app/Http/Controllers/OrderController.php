<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Vehicle;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve and display a list of orders
        return view("orderIndex")->with("orders", Order::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the order creation form with a null order and a list of vehicles
        return view("orderCreate")->with("order", null)->with("vehicles", Vehicle::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $request)
    {
        // Validate the incoming request data
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create a new order using the validated data
        Order::create([
            'customer_id' => $request->customer_id,
            'vehicle_id' => $request->vehicle_id,
            'quantity' => $request->quantity,
        ]);

        // Redirect to the order index and show a success message
        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    /**
     * Retrieve and return the price of a vehicle.
     */
    public function getVehiclePrice($id)
    {
        $vehicle = Vehicle::find($id);
        return response()->json(['price' => $vehicle->price]);
    }

    /**
     * Display the specified resource (order).
     */
    public function show(Order $order)
    {
        // Display order details (not implemented in this code)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // Show the order edit form with the selected order and a list of vehicles
        return view('orderCreate')->with('order', $order)->with('vehicles', Vehicle::all());
    }

    /**
     * Update the specified resource (order) in storage.
     */
    public function update(HttpRequest $request, Order $order)
    {
        // Validate the incoming request data
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Update the order with the provided data
        $order->update([
            'customer_id' => $request->input('customer_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'quantity' => $request->input('quantity'),
        ]);

        // Redirect to the order index and show a success message
        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource (order) from storage.
     */
    public function destroy(Order $order)
    {
        // Delete the order
        $order->delete();

        // Redirect to the order index and show a success message
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
