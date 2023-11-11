<!DOCTYPE html>
<html class="bg-gray-100 h-full" lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <title>{{$title}}</title>
</head>
<body class="bg-gray-100 h-full">
    <div class="flex justify-center rounded-lg border border-gray-200 bg-gray-300 p-1">
       <a href="{{route('customers.index')}}">
        <button class="{{ request()->routeIs('customers.index') ? 'inline-block rounded-md bg-white px-4 py-2 text-sm text-blue-500 shadow-sm focus:relative' : 'inline-block rounded-md px-4 py-2 text-sm text-gray-500 hover:text-gray-700 focus:relative' }}">
          Customer
        </button>
       </a>
       <a href="{{route('vehicles.index')}}">

        <button class="{{ request()->routeIs('vehicles.index') ? 'inline-block rounded-md bg-white px-4 py-2 text-sm text-blue-500 shadow-sm focus:relative' : 'inline-block rounded-md px-4 py-2 text-sm text-gray-500 hover:text-gray-700 focus:relative' }}">
          Vehicle
        </button>
       </a>
       <a href="{{route('orders.index')}}">

        <button class="{{ request()->routeIs('orders.index') ? 'inline-block rounded-md bg-white px-4 py-2 text-sm text-blue-500 shadow-sm focus:relative' : 'inline-block rounded-md px-4 py-2 text-sm text-gray-500 hover:text-gray-700 focus:relative' }}">
          Order
        </button>
       </a>
      </div>
      
    {{$slot}}
</body>
</html>