@extends('layout.main')
@section('content')
    @vite('resources/css/app.css')

    <div class="p-5">
        <div class="sm:hidden md:block ">
            <form action="{{ route('carts.update',[$cart->id]) }}" method="POST">
                @method('PUT')
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
                    </tr>

                </thead>
                <tbody>
                    <tr class="bg-white">
                        <td class="text-sm w-24 font-bold hover:underline  p-3 text-blue-700">{{ $cart->item->id }}

                        </td>

                        <td class="text-sm p-3 w-1/3 text-gray-700">{{$cart->item->name }}
                        </td>

                        <td class="text-sm p-3 text-gray-700"><img style="width: 100px;height:100px"
                                src="{{ $cart->item->getFirstMediaUrl('item_image') }}" alt=""></td>

                        <td class="text-sm p-3 text-gray-700"><input type="text"
                                value="{{ $cart->item->price_per_unit }}"></td>

                        <td class="text-sm p-3 text-gray-700">{{ $cart->item->discount }}"
                        </td>
                        
                        <td class="text-sm p-3 text-gray-700">
                            <input type="text" name="quantity" value="{{ $cart->amount }}">
                        </td>
                        
                        <td class="text-sm p-3 text-gray-700">
                            {{ $cart->item->price_per_unit * $cart->amount - $cart->item->discount * $cart->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <button>Submit</button>
            </form>
        </div>
    </div>

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000
        @error('item_id')
       
            toastr.error('{{$message}}');
       @enderror
       @error('quantity')
            toastr.error('{{$message}}');
       @enderror
         
    });
</script>
@endsection