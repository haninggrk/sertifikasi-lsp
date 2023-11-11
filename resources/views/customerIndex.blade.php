<x-app title="Customer">


<section class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
<div class="flex justify-between">
        <h1 class="mb-5 text-2xl font-bold">Existing Customer</h1>
        <a
            class="self-center inline-block rounded border border-green-600 bg-green-600 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-green-600 focus:outline-none focus:ring active:text-indigo-500"
            href="{{route('customers.create')}}"
          >
            Add Customer
          </a>
</div>
<div class="overflow-x-auto rounded-lg border border-gray-200">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
      <thead class="ltr:text-left rtl:text-right">
        <tr>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            ID
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Name
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Address
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Phone
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Id Card Number
          </th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Action
          </th>
        </tr>
      </thead>
  
      <tbody class="divide-y divide-gray-200">
        @foreach($customers as $customer)
        <tr>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            {{$customer->id}}
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$customer->name}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$customer->address}}r</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$customer->phone}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$customer->id_card_number}}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700"><a
            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
            href="{{route('customers.edit',$customer->id)}}"
          >
            Edit
          </a>
          <form class="inline-block" method="POST" action="{{route('customers.destroy',$customer)}}">
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