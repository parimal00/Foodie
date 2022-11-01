@extends('layout.main')
@section('content')
    @vite('resources/css/app.css')

    <div class="p-5">
        @if (count($carts) > 0)
            <div class="sm:hidden md:block ">
                <div class="flex">
                    <button class="py-2 px-4 mr-2 bg-gray-400 rounded-md" onclick="checkAll()">Check All</button>
                    <button class="py-2 px-4 mr-2 bg-gray-400 rounded-md" onclick="uncheckAll()">Uncheck All</button>
                </div>

                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="text-left p-3 font-semibold tracking-wide">Check</th>
                            <th class="text-left p-3 font-semibold tracking-wide">ID</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Item Name</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Item Image</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Price per unit</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Discount</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Quantity</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Total</th>
                            <th class="text-left p-3 font-semibold tracking-wide">Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            @if ($loop->index % 2 == 0)
                                <tr class="bg-white">
                                @else
                                <tr class="bg-gray-50">
                            @endif
                            <td> <input type="checkbox" name="cart_ids[]" value="{{ $cart->id }}" form="store_form"
                                    class="wack"> </td>
                            <td class="text-sm w-24 font-bold hover:underline  p-3 text-blue-700">{{ $cart->id }}
                                {{-- <input type="hidden" name="item_ids[]" value="{{ $cart->item->id }}"> --}}

                            </td>
                            <td class="text-sm p-3 w-1/3 text-gray-700">{{ $cart->item->name }}</td>
                            <td class="text-sm p-3 text-gray-700"><img style="width: 100px;height:100px"
                                    src="{{ $cart->item->getFirstMediaUrl('item_image') }}" alt=""></td>

                            <td class="text-sm p-3 text-gray-700">{{ $cart->item->price_per_unit }}</td>
                            <td class="text-sm p-3 text-gray-700">{{ $cart->item->discount }}</td>
                            <td class="text-sm p-3 text-gray-700">{{ $cart->amount }}
                                {{-- <input type="text" name="quantities[]" value="{{ $cart->amount }}"> --}}
                            </td>
                            <td class="text-sm p-3 text-gray-700">
                                {{ $cart->item->price_per_unit * $cart->amount - $cart->item->discount * $cart->amount }}
                            </td>



                            <td class="text-sm p-3 text-gray-700">
                                {{-- <form action="{{ route('carts.edit', [$cart->id]) }}" method="get"><button>Edit</button>
                                </form>
                                <form action="{{ route('carts.destroy', [$cart->id]) }} " method="POST">@csrf
                                    @method('DELETE')<button>Delete</button></form> --}}
                            </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form id="store_form" action="{{ route('user.orders.store',[auth()->id()]) }}" method="POST">
                    @csrf
                    <button>Submit</button>
                </form>


            </div>
          
            @else
            <div class="w-full py-3 px-2 text-center border-2 border-red-400">Cart is empty</div>
            @endif
    </div>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000
            @error('cart_ids')
                toastr.error('{{ $message }}')
            @enderror
        });
    </script>
    <script>
        function checkAll() {
            carts = document.getElementsByClassName("wack").length
            for (i = 0; i < carts; i++) {
                document.getElementsByClassName("wack")[i].checked = true;
            }
        }

        function uncheckAll() {
            carts_length = document.getElementsByClassName("wack").length
            for (i = 0; i < carts_length; i++) {
                document.getElementsByClassName("wack")[i].checked = false;
            }
        }
    </script>
@endsection
