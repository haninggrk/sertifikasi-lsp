<x-app title="Order">


<section class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
<div class="flex justify-between">
        <h1 class="mb-5 text-2xl font-bold">Existing Order</h1>
        <a
            class="self-center inline-block rounded border border-green-600 bg-green-600 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-green-600 focus:outline-none focus:ring active:text-indigo-500"
            href="{{route('orders.create')}}"
          >
            Add Order
          </a>
</div>
<div class="overflow-x-auto rounded-lg border border-gray-200">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
      <thead class="text-left">
        <tr>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
           Order ID
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Vehicle Image
           </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Customer Name
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Vehicle Type
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Vehicle Model Name
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
Quantity          </th>
<th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
  Individual Price          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Total Price
          </th>
          
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Action
          </th>
        </tr>
      </thead>
  
      <tbody class="divide-y divide-gray-200">
        @foreach($orders as $order)
        <tr>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            {{$order->id}}
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">
            <img src="  {{$order->vehicle->image_url}}" class="h-12 w-12">
          </td>

          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$order->customer->name}}r</td>
          @php
          $className = 'App\Models\Motorcycle';
preg_match('/[^\\\\]+$/', $order->vehicle->vehicleable_type, $matches);
$lastPart = $matches[0];
          @endphp
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$lastPart}}</td>

          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$order->vehicle->model}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$order->quantity}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$order->vehicle->price}}</td>

          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$order->vehicle->price * $order->quantity}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700"></td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700"><a
            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
            href="{{route('orders.edit',$order->id)}}"
          >
            Edit
          </a>
          <form class="inline-block text-left" method="POST" action="{{route('orders.destroy',$order)}}">
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
    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->


  </div>
 
          </div>
    </div>
</div>
    </div>
  </section>
</x-app>