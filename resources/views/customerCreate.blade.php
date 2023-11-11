<x-app title="Customer: Input Data">
  <section class="bg-gray-100 h-full">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <a
      class="self-center inline-block rounded border border-red-600 bg-red-600 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-indigo-500"
      href="{{route('customers.index')}}"
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

    <h1 class="mt-5 text-2xl font-bold">Add Customer</h1>
    <form method="POST" action="{{ $customer ? route('customers.update',$customer) : route('customers.store') }}">
      @CSRF
      @method("PUT")
    <div class="grid grid-cols-10 gap-4 mt-5">
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Name
              </label>
            
              <input
                type="text"
                name="name"
                value="{{ $customer ? $customer->name : "" }}"
                id="UserEmail"
                placeholder="Customer Name"
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Address
              </label>
            
              <input
                type="text"
                name="address"
                value="{{ $customer ? $customer->address : "" }}"

                id="UserEmail"
                placeholder="Jl. Parikesi.."
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Phone
              </label>
            
              <input
                type="text"
                name="phone"
                id="UserEmail"
                value="{{ $customer ? $customer->phone : "" }}"

                placeholder="+62812345"
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>
      <div class="col-span-2">
          <div>
              <label for="UserEmail" class="block text-xs font-medium text-gray-700">
                Id Card Number
              </label>
            
              <input
              name="id_card_number"
                type="number"
                id="UserEmail"
                value="{{ $customer ? $customer->id_card_number : "" }}"

                placeholder="20003123942"
                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
              />
            </div>
      </div>
  
          <div class="col-span-2 flex">
          <div class="flex">
          
            
              <input type="submit" value="Add User"
    class="self-end inline-block rounded bg-black px-8 py-2 text-sm font-medium text-white transition  active:bg-black"
  >
  
  </form>
    </div>
  </section>
</x-app>