<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("customerIndex")->with("customers", Customer::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("customerCreate")->with("customer", null);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'id_card_number' => 'required|numeric',
        ]);
    
        try {
            Customer::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('customer.create')->with('error', 'An error occurred while saving the customer');
        }
    
        return redirect()->route('customers.index')->with('success', 'Customer added successfully');
    }

    
    

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        return view("customerCreate")->with("customer", Customer::find($id));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
    
        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'id_card_number' => 'required|numeric',
        ]);
    
        try {
            $customer->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('customers.edit', $id)->with('error', 'An error occurred while updating the customer');
        }
    
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Customer $customer)
    {
       $customer->delete();
        return redirect()->route('customers.index')->with('success','');
    }
}
