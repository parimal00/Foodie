@extends('voyager::master')

@section('content')
    @vite('resources/css/app.css')

    <div class="p-5">
        <div class="sm:hidden md:block ">

            <div class="flex">
                <span class="font-2xl text-white  border-white p-3 rounded bg-green-500">{{ $orders[0]->user->email }}</span>

            </div>
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="text-left p-3 font-semibold tracking-wide">ID</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Item Name</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Item Image</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Price per unit</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Discount per unit</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Quantity</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Total</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Status</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Driver</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @if ($loop->index % 2 == 0)
                            <tr class="bg-white">
                            @else
                            <tr class="bg-gray-50">
                        @endif
                        <td class="text-sm w-24 font-bold hover:underline  p-3 text-blue-700">{{ $order->id }}
                        </td>
                        <td class="text-sm p-3 w-1/4 text-black">{{ $order->item_name }}</td>
                        <td class="text-sm p-3 text-black"><img style="width: 100px;height:100px"
                                src="{{ $order->image_url }}" alt=""></td>

                        <td class="text-sm p-3 text-black">{{ $order->price_per_unit }}</td>
                        <td class="text-sm p-3 text-black">{{ $order->discount_per_unit }}</td>
                        <td class="text-sm p-3 text-black">{{ $order->amount }}
                        </td>
                        <td class="text-sm p-3 text-black">
                            {{ $order->price_per_unit * $order->amount - $order->discount_per_unit * $order->amount }}
                        </td>
                        <td class="text-sm p-3 text-black">
                            {{ $order->status }}
                        </td>
                        <td class="text-sm p-3 text-black">
                            {{ $order->driver->email }}
                        </td>
                        <form action="{{ route('admin.orders.edit', [$order->id]) }}" method="GET">
                            <td class="text-sm p-3 text-black">
                                <button>Edit</button>
                            </td>
                        </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
