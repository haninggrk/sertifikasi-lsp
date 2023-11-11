<x-app title="Vehicle: Input Data">
  <section class="bg-gray-100 h-full">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <a
      class="self-center inline-block rounded border border-red-600 bg-red-600 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-indigo-500"
      href="{{route('vehicles.index')}}"
    >
      < Cancel
    </a>



    @if ($errors->any())
    <div class="bg-red-100 mt-5 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1 class="mt-5 text-2xl font-bold">Add Vehicle</h1>
    <form  enctype="multipart/form-data" method="POST" action="{{ $vehicle ? route('vehicles.update',$vehicle) : route('vehicles.store') }}">
      @CSRF
      @if($vehicle)
      @method("PUT")
      @endif
    <div class="grid grid-cols-10 gap-4 mt-5">
      
      @if($vehicle)
      <div class="col-span-2">

        <label for="UserEmail" class="block text-xs font-medium text-gray-700">
          Current Image
        </label>
        <img src="{{asset($vehicle->image_url)}}" class="h-12 w-12">

      </div>
      @endif

      <div class="col-span-2">
        <div>

          <label for="UserEmail" class="block text-xs font-medium text-gray-700">
            @if($vehicle)
            Upload New Image (Optional)
            @else
            Image
            @endif
          </label>
          <input
            type="file"
            name="image_url"
            value="{{ $vehicle ? $vehicle->image_url : "" }}"
            id="UserEmail"
            placeholder="vehicle Name"
            class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
          />

        </div>
      </div>
      <div class="col-span-2">

          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Model
              </label>
            
              <input
                type="text"
                name="model"
                value="{{ $vehicle ? $vehicle->model : "" }}"
                id="UserEmail"
                placeholder="vehicle Name"
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Year
              </label>
            
              <input
                type="date"
                name="year"
                value="{{ $vehicle ?  \Carbon\Carbon::parse($vehicle->year)->format('Y-m-d') : "" }}"

                id="UserEmail"
                placeholder="Jl. Parikesi.."
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Passenger Count
              </label>
            
              <input
                type="number"
                name="passenger_count"
                id="UserEmail"
                value="{{ $vehicle ? $vehicle->passenger_count : "" }}"

                placeholder="3"
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Manufacturer
              </label>
            
              <input
              name="manufacturer"
                type="text"
                id="UserEmail"
                value="{{ $vehicle ? $vehicle->manufacturer : "" }}"

                placeholder="Random LTD"
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>

      <div class="col-span-2">
        <div>
            <label for="UserEmail" class="block text-xs font-medium text-gray-700">
              Price
            </label>
          
            <input
            name="price"
              type="number"
              id="UserEmail"
              value="{{ $vehicle ? $vehicle->price : "" }}"

              placeholder="10000000"
              class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
            />
          </div>
    </div>


    <div class="col-span-2">
      <div>

        
          <div>
            <label for="HeadlineAct" class="block text-xs font-medium text-gray-700">
              Vehicle Type
            </label>
          
            <select
              
              name="vehicleable_type"
              id="HeadlineAct"
              class="mt-1 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm"
              onchange="toggleFields(this.value)"
              {{$vehicle ? 'disabled':''}}
              >
              @if($vehicle)
              <option value="">Please select</option>
              <option value="App\Models\Truck" {{$vehicle->vehicleable_type == "App\\Models\\Truck" ? "selected":"" }} >Truck</option>
              <option value="App\Models\Motorcycle" {{$vehicle->vehicleable_type == "App\\Models\\Motorcycle" ? "selected":"" }} >Motorcycle</option>
              <option value="App\Models\Car" {{$vehicle->vehicleable_type == "App\\Models\\Car" ? "selected":"" }} >Car</option>
            @else
            <option value="">Please select</option>
            <option value="App\Models\Truck" >Truck</option>
            <option value="App\Models\Motorcycle" >Motorcycle</option>
            <option value="App\Models\Car" >Car</option>
            @endif
            </select>
          </div>
        </div>
  </div>
  <div class="col-span-2 motorcycleFields">
    <div>
        <label for="UserEmail" class="block text-xs font-medium text-gray-700">
          Luggage Size
        </label>
      
        <input
        name="luggage_size"
          type="number"
          id="UserEmail"
          value="{{ $vehicle ? $vehicle->vehicleable->luggage_size : "" }}"

          placeholder="20003123942"
          class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
        />
      </div>
</div>

<div class="col-span-2 motorcycleFields">
  <div>
      <label for="UserEmail" class="block text-xs font-medium text-gray-700">
        Fuel Capacity
      </label>
    
      <input
      name="fuel_capacity"
        type="number"
        id="UserEmail"
        value="{{ $vehicle ? $vehicle->vehicleable->fuel_capacity : "" }}"

        placeholder="20003123942"
        class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
      />
    </div>
</div>


<div class="col-span-2 truckFields">
  <div>
      <label for="UserEmail" class="block text-xs font-medium text-gray-700">
        Wheel Count
      </label>
    
      <input
      name="wheel_count"
        type="number"
        id="UserEmail"
        value="{{ $vehicle ? $vehicle->vehicleable->wheel_count : "" }}"

        placeholder="20003123942"
        class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
      />
    </div>
</div>

<div class="col-span-2 truckFields">
  <div>
      <label for="UserEmail" class="block text-xs font-medium text-gray-700">
        Cargo Size
      </label>
    
      <input
      name="cargo_size"
        type="number"
        id="UserEmail"
        value="{{ $vehicle ? $vehicle->vehicleable->cargo_size : "" }}"

        placeholder="20003123942"
        class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
      />
    </div>
</div>
<div class="col-span-2 carFields">
  <div>
      <label for="UserEmail" class="block text-xs font-medium text-gray-700">
        Fuel Type
      </label>
    
      <input
      name="fuel_type"
        type="text"
        id="UserEmail"
        value="{{ $vehicle ? $vehicle->vehicleable->fuel_type : "" }}"

        placeholder="20003123942"
        class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
      />
    </div>
</div>

<div class="col-span-2 carFields">
  <div>
      <label for="UserEmail" class="block text-xs font-medium text-gray-700">
        Trunk Size
      </label>
    
      <input
      name="trunk_size"
        type="number"
        id="UserEmail"
        value="{{ $vehicle ? $vehicle->vehicleable->trunk_size : "" }}"

        placeholder="20003123942"
        class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
      />
    </div>
</div>


  
          <div class="col-span-2 flex">
          <div class="flex">
          
            
              <input type="submit" value="{{ $vehicle ? "Save Changes" : " Add Vehicle" }}""
    class="self-end inline-block rounded bg-black px-8 py-2 text-sm font-medium text-white transition  active:bg-black"
  >
          </div>
          </div>
  
  </form>
    </div>
  </section>





  <script>
    function toggleFields(selectedValue) {
      console.log("Hi")
    const motorcycleFields = document.getElementsByClassName('motorcycleFields');
    const carFields = document.getElementsByClassName('carFields');
    const truckFields = document.getElementsByClassName('truckFields');
    for (var i = 0; i < motorcycleFields.length; i++) {
        motorcycleFields[i].style.display = 'none';
}
for (var i = 0; i < motorcycleFields.length; i++) {
        carFields[i].style.display = 'none';
}
for (var i = 0; i < motorcycleFields.length; i++) {
        truckFields[i].style.display = 'none';
}


    if (selectedValue === 'App\\Models\\Motorcycle') {
      for (var i = 0; i < motorcycleFields.length; i++) {
        motorcycleFields[i].style.display = 'inline-block';
}
    } else if (selectedValue === 'App\\Models\\Car') {
      for (var i = 0; i < carFields.length; i++) {
        carFields[i].style.display = 'inline-block';
}    } else if (selectedValue === 'App\\Models\\Truck') {
  for (var i = 0; i < truckFields.length; i++) {
        truckFields[i].style.display = 'inline-block';
}    }
}

// Initial check when the page loads
toggleFields(document.getElementById('HeadlineAct').value);

    </script>
</x-app>