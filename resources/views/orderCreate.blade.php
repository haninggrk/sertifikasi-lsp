<x-app title="Customer: Input Data">
  <section class="bg-gray-100 h-full">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <a
      class="self-center inline-block rounded border border-red-600 bg-red-600 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-indigo-500"
      href="{{route('orders.index')}}"
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

    <h1 class="mt-5 text-2xl font-bold">Add Order</h1>
    <h1 class="mt-5 mb-2 text-md font-bold">Order Details</h1>

    <form method="POST" action="{{ $order ? route('orders.update',$order) : route('orders.store') }}">
      @CSRF
      @if($order)
      @method("PUT")
      @else
      @endif
    <div class="grid grid-cols-10 gap-4 mt-5">
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Customer Name
              </label>
              @if($order)
              <input
                type="text"
                readonly
                name=""
                value="{{ $order ? $order->customer->name : "" }}"
                id="UserEmail"
                placeholder="Customer"
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
              <input
              type="hidden"
              readonly
              name="customer_id"
              value="{{ $order->customer->id}}"
              id="UserEmail"
              placeholder="Customer"
              class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
            />
              @else
              <select
              
              name="customer_id"
              id="HeadlineAct"
              class="mt-1 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm"
              onchange="toggleFields(this.value)"
              >
              @foreach(App\Models\Customer::all() as $customer)
              <option value="{{$customer->id}}" >{{$customer->name}}</option>
              @endforeach
            </select>
              @endif
            </div>
      </div>
     

  
          <div class="col-span-2 flex">
          <div class="flex">
          
          </div>
          </div>
    </div>
    <h1 class="mt-5 mb-2 text-md font-bold">Order Item</h1>
    <div class="cart-container">
    </div>
    <div class="grid grid-cols-10 gap-4 mt-5">
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Vehicle Model Name
              </label>
              
              <select
              
              name="vehicle_id"
              id="vehicleable_model_name"
              class="mt-1 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm"
              onchange="getVehiclePrice(this.value)"              >
              @foreach($vehicles as $vehicle)
              @if($order)
              <option {{$order->vehicle_id == $vehicle->id ? 'selected' : ''}} value="{{$vehicle->id}}" >{{$vehicle->model}}</option>
              @else
              <option  value="{{$vehicle->id}}" >{{$vehicle->model}}</option>
              @endif
              @endforeach
            </select>
            </div>
      </div>
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Individual Price
              </label>
            
              <input
              id="individual_price"
              readonly
                type="text"
                name="price"
                value=""

                id="UserEmail"
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>
      <div class="col-span-2">
        <div>
            <label for="UserEmail" class="block text-xs font-medium text-gray-700">
              Buy Amount
            </label>
          
            <input
            id="amount"
              type="number"
              name="quantity"
              value="{{$order ? $order->quantity: ''}}"
              id="UserEmail"
              class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
            />
          </div>
          
    </div>

    <div class="col-span-2">
      <div>
          <label for="UserEmail" class="block text-xs font-medium text-gray-700">
            Total Price
          </label>
        
          <input
          id="total"
          readonly
            type="number"
            name="total"

            id="UserEmail"
            class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
          />
        </div>
        
  </div>
     
  

  
    </div>

  <div class="text-right">
  <input style="cursor: pointer;" type="submit" value="{{$order ?"Save Changes":"Add Order"}}"
  class="self-end inline-block rounded bg-black px-8 py-2 text-sm font-medium text-white transition  active:bg-black"
>
  </div>

  </section>




</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function getVehiclePrice(vehicleId) {
      $.ajax({
          url: '/get-vehicle-price/' + vehicleId,
          method: 'GET',
          success: function (data) {
              // Update the input field with the retrieved price
              $('#individual_price').val(data.price);
              calculateTotalPrice();

          },
          error: function () {
              console.log('Error fetching vehicle price');
          }
      });
  }

  function calculateTotalPrice() {
        var individualPrice = parseFloat($('#individual_price').val()) || 0;
        var amount = parseFloat($('#amount').val()) || 0;
        var total = individualPrice * amount;
        $('#total').val(total);
    }
    calculateTotalPrice();
    $('#individual_price, #amount').on('input', calculateTotalPrice);

  getVehiclePrice(document.getElementById('vehicleable_model_name').value)
  </script>
</x-app>