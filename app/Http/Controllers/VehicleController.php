<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Truck;
use App\Models\Vehicle;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view("vehicleIndex", compact("vehicles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("vehicleCreate", ["vehicle"=>null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $request)
    {
        // Validate the form data
        $request->validate([
            'model' => 'required|string',
            'year' => 'required|date',
            'image_url'=>'required|image|mimes:jpeg,png,jpg,gif|max:6024',
            'passenger_count' => 'required|integer',
            'manufacturer' => 'required|string',
            'price' => 'required|integer',
            'vehicleable_type' => 'required|string',
            'luggage_size' => 'required_if:vehicleable_type,App\\Models\\Motorcycle|nullable|integer',
            'fuel_capacity' => 'required_if:vehicleable_type,App\\Models\\Motorcycle|nullable|integer',
            'wheel_count' => 'required_if:vehicleable_type,App\\Models\\Truck|nullable|integer',
            'cargo_size' => 'required_if:vehicleable_type,App\\Models\\Truck|nullable|integer',
            'fuel_type' => 'required_if:vehicleable_type,App\\Models\\Car|nullable|string',
            'trunk_size' => 'required_if:vehicleable_type,App\\Models\\Car|nullable|integer',
        ]);

        
        
        try {
            $vehicleable = null;
            if ($request->vehicleable_type === 'App\\Models\\Motorcycle') {
               $vehicleable =  Motorcycle::create(
                    $request->validate([
                        'luggage_size' => 'required_if:vehicleable_type,App\\Models\\Motorcycle|nullable|integer',
                        'fuel_capacity' => 'required_if:vehicleable_type,App\\Models\\Motorcycle|nullable|integer',
                    ])
                );
            } elseif ($request->vehicleable_type === 'App\\Models\\Truck') {
                $vehicleable = Truck::create(
                    $request->validate([
                        'wheel_count' => 'required_if:vehicleable_type,App\\Models\\Truck|nullable|integer',
                        'cargo_size' => 'required_if:vehicleable_type,App\\Models\\Truck|nullable|integer',
                    ])
                );
            } elseif ($request->vehicleable_type === 'App\\Models\\Car') {
                $vehicleable =  Car::create(
                    $request->validate([
                        'fuel_type' => 'required_if:vehicleable_type,App\\Models\\Car|nullable|string',
                        'trunk_size' => 'required_if:vehicleable_type,App\\Models\\Car|nullable|integer',
                    ])
                );
            }

            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
    
            // Create a new vehicle
            $vehicle = new Vehicle([
                'model' => $request->model,
                'year' => $request->year,
                'passenger_count' => $request->passenger_count,
                'manufacturer' => $request->manufacturer,
                'price' => $request->price,
                'vehicleable_type' => $request->vehicleable_type,
                'vehicleable_id'=>$vehicleable->id,
                'image_url'=> 'img/'.$imageName
            ]);
    
            // Handle vehicleable specific fields
            
            $vehicle->save();
            $vehicleable->vehicle()->save($vehicle);
            return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
        } catch (\Exception $e) {
            // Handle any unexpected errors here
            dd($e);
            return redirect()->back()->withInput()->with('error', 'An error occurred while creating the vehicle.');
        }
    }
    




    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view("vehicleCreate", ["vehicle"=>$vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $request, $id)
    {
        // Validate the form data
        $request->validate([
            'model' => 'required|string',
            'year' => 'required|date',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6024',
            'passenger_count' => 'required|integer',
            'manufacturer' => 'required|string',
            'price' => 'required|integer',
            'luggage_size' => 'required_if:vehicleable_type,App\\Models\\Motorcycle|nullable|integer',
            'fuel_capacity' => 'required_if:vehicleable_type,App\\Models\\Motorcycle|nullable|integer',
            'wheel_count' => 'required_if:vehicleable_type,App\\Models\\Truck|nullable|integer',
            'cargo_size' => 'required_if:vehicleable_type,App\\Models\\Truck|nullable|integer',
            'fuel_type' => 'required_if:vehicleable_type,App\\Models\\Car|nullable|string',
            'trunk_size' => 'required_if:vehicleable_type,App\\Models\\Car|nullable|integer',
        ]);
    
        try {
            $vehicle = Vehicle::find($id);
    
            if (!$vehicle) {
                return redirect()->back()->with('error', 'Vehicle not found.');
            }
    
            $vehicle->model = $request->model;
            $vehicle->year = $request->year;
            $vehicle->passenger_count = $request->passenger_count;
            $vehicle->manufacturer = $request->manufacturer;
            $vehicle->price = $request->price;
            // Update vehicleable specific fields based on the vehicleable type
            if ($vehicle->vehicleable_type == 'App\Models\Motorcycle') {
                $moto = Motorcycle::find($vehicle->vehicleable->id);
                $moto->luggage_size = $request->luggage_size;
                $moto->fuel_capacity = $request->fuel_capacity;
                $moto->save();
            } elseif ($vehicle->vehicleable_type == 'App\Models\Truck') {
                $truck = Truck::find($vehicle->vehicleable->id);
                $truck->wheel_count = $request->wheel_count;
                $truck->cargo_size = $request->cargo_size;
                $truck->save();
            } elseif ($vehicle->vehicleable_type == 'App\Models\Car') {

                $car = Car::find($vehicle->vehicleable->id);
              $car->fuel_type = $request->fuel_type;
                $car->trunk_size = $request->trunk_size;
                $car->save();
            }
    
            if ($request->hasFile('image_url')) {
                // Handle image upload and update
                $image = $request->file('image_url');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img'), $imageName);
                $vehicle->image_url = 'img/' . $imageName;
            }
    
            $vehicle->save();
            $vehicle->vehicleable->save();
    
            return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'An error occurred while updating the vehicle.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success','');
    }
}
