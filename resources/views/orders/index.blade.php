@extends('layout.main')
@section('content')
    @vite('resources/css/app.css')

    <div class="p-5">
        <div class="sm:hidden md:block ">
           
            <form action="{{ route('user.orders.store',[auth()->id()]) }}" method="POST">
                @csrf
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="text-left p-3 font-semibold tracking-wide">ID</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Item Name</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Item Image</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Price per unit</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Discount</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Quantity</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Total</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Status</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($orders as $order)

                            @if ($loop->index % 2 == 0)
                                <tr class="bg-white">
                                @else
                                <tr class="bg-gray-50">
                            @endif
                            <td class="text-sm w-24 font-bold hover:underline  p-3 text-blue-700">{{ $order->id}}
                            </td>
                            <td class="text-sm p-3 w-1/3 text-gray-700">{{ $order->item_name }}</td>
                            <td class="text-sm p-3 text-gray-700"><img style="width: 100px;height:100px"
                                    src="{{ $order->image_url }}" alt=""></td>

                            <td class="text-sm p-3 text-gray-700">{{ $order->price_per_unit }}</td>
                            <td class="text-sm p-3 text-gray-700">{{ $order->discount_per_unit }}</td>
                            <td class="text-sm p-3 text-gray-700">{{ $order->amount }}
                            </td>
                            <td class="text-sm p-3 text-gray-700">
                                {{ $order->total_price }}
                            </td>
                            <td class="text-sm p-3 text-gray-700">
                                {{ $order->status }}
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button>Submit</button>
            </form>
        </div>

    </div>
    <script>
        function checkAll(){
            console.log("jck is sexy")
            carts=document.getElementsByClassName("cart_id")
            carts.setAttribute("checked")
            console.log(carts)
        }
        </script>
@endsection
