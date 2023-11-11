<x-app title="Vehicle">


<section class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
<div class="flex justify-between">
        <h1 class="mb-5 text-2xl font-bold">Existing Vehicle</h1>
        <a
            class="self-center inline-block rounded border border-green-600 bg-green-600 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-green-600 focus:outline-none focus:ring active:text-indigo-500"
            href="{{route('vehicles.create')}}"
          >
            Add Vehicle
          </a>
</div>

<h1 class="mb-5 mt-5 text-2xl text-blue-500 font-bold">Vehicle: Car</h1>

<div class="overflow-x-auto rounded-lg border border-gray-200">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
      <thead class="ltr:text-left rtl:text-right">
        <tr>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            ID
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
Image          </th>
<th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
  Model          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Year
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Passenger Count
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Manufacturer
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Price
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Fuel Type
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Trunk Size
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Action
          </th>
        </tr>
      </thead>
  
      <tbody class="divide-y divide-gray-200">
        @foreach($vehicles->where('vehicleable_type','App\\Models\\Car') as $vehicle)
        <tr>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            {{$vehicle->id}}
          </td>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            <img class="h-12 w-12" src="{{asset($vehicle->image_url)}}">
          </td>

          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->model}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ \Carbon\Carbon::parse($vehicle->year)->format('Y') }}
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->passenger_count}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->manufacturer}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->price}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->vehicleable->fuel_type}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->vehicleable->trunk_size}}</td>

          <td class="whitespace-nowrap px-4 py-2 text-gray-700"><a
            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
            href="{{route('vehicles.edit',$vehicle->id)}}"
          >
            Edit
          </a>
          <form class="inline-block" method="POST" action="{{route('vehicles.destroy',$vehicle)}}">
            @CSRF
            @method("DELETE")
          <input type="submit"
            class="inline-block rounded border border-red-600 bg-red-600 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500"
            value="Delete"
          >
          </form>
        
        </td>

        </tr>
        @endforeach

  

      </tbody>
    </table>


  </div>

  <h1 class="mb-5 mt-5 text-2xl text-blue-500 font-bold">Vehicle: Motorcycle</h1>

  <div class="overflow-x-auto rounded-lg border border-gray-200">

      <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="ltr:text-left rtl:text-right">
          <tr>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              ID
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Image 
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Model
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Year
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Passenger Count
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Manufacturer
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Price
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Fuel Capacity
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Luggage Size
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              Action
            </th>
          </tr>
        </thead>
    
        <tbody class="divide-y divide-gray-200">
          @foreach($vehicles->where('vehicleable_type','App\\Models\\Motorcycle') as $vehicle)
          <tr>
            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
              {{$vehicle->id}}
            </td>
            <td class="whitespace-nowrap  px-4 py-2 font-medium text-gray-900">
              <img class="h-12 w-12" src="{{asset($vehicle->image_url)}}">
            </td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->model}}</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ \Carbon\Carbon::parse($vehicle->year)->format('Y') }}
            </td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->passenger_count}}</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->manufacturer}}</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->price}}</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->vehicleable->fuel_capacity}}</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->vehicleable->luggage_size}}</td>
  
            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><a
              class="inline-block rounded border border-indigo-600 bg-indigo-600 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
              href="{{route('vehicles.edit',$vehicle->id)}}"
            >
              Edit
            </a>
            <form class="inline-block" method="POST" action="{{route('vehicles.destroy',$vehicle)}}">
              @CSRF
              @method("DELETE")
            <input type="submit"
              class="inline-block rounded border border-red-600 bg-red-600 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500"
              value="Delete"
            >
            </form>
          
          </td>
  
          </tr>
          @endforeach
  
    
  
        </tbody>
      </table>

  
    </div>
    <h1 class="mb-5 mt-5 text-2xl text-blue-500 font-bold">Vehicle: Truck</h1>

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
          <thead class="ltr:text-left rtl:text-right">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                ID
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Image
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Model
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Year
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Passenger Count
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Manufacturer
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Price
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Wheel Count
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Luggage Size
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Action
              </th>
            </tr>
          </thead>
      
          <tbody class="divide-y divide-gray-200">
            @foreach($vehicles->where('vehicleable_type','App\\Models\\Truck') as $vehicle)
            <tr>
              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                {{$vehicle->id}}
              </td>
              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                <img class="h-12 w-12" src="{{asset($vehicle->image_url)}}">
              </td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->model}}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ \Carbon\Carbon::parse($vehicle->year)->format('Y') }}
              </td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->passenger_count}}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->manufacturer}}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->price}}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->vehicleable->wheel_count}}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$vehicle->vehicleable->cargo_size}}</td>
    
              <td class="whitespace-nowrap px-4 py-2 text-gray-700"><a
                class="inline-block rounded border border-indigo-600 bg-indigo-600 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                href="{{route('vehicles.edit',$vehicle->id)}}"
              >
                Edit
              </a>
              <form class="inline-block" method="POST" action="{{route('vehicles.destroy',$vehicle)}}">
                @CSRF
                @method("DELETE")
              <input type="submit"
                class="inline-block rounded border border-red-600 bg-red-600 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500"
                value="Delete"
              >
              </form>
            
            </td>
    
            </tr>
            @endforeach
    
      
    
          </tbody>
        </table>
    
    
      </div>
    
            </div>
      </div>
    </div>
          </div>
          
    </div>
</div>





    </div>
  </section>
</x-app>