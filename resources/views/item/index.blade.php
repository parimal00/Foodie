@extends('voyager::master')

@section('content')
    @vite('resources/css/app.css')

    <div class="p-5">

        <div>
            <form action="{{ route('admin.items.create') }}" method="get">
                <button class="bg-green-400 text-white rounded-md py-2 px-3">Create Item</button>
            </form>
        </div>

        <div class="sm:hidden md:block ">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="text-left p-3 font-semibold tracking-wide">ID</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Item Name</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Item Image</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Price per unit</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Discount</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Category</th>
                        <th class="text-left p-3 font-semibold tracking-wide">Action</th>

                    </tr>

                </thead>
                <tbody>
                    @forelse($items as $item)
                        @if ($loop->index % 2 == 0)
                            <tr class="bg-white">
                            @else
                            <tr class="bg-gray-50">
                        @endif
                        <td class="text-sm w-24 font-bold hover:underline  p-3 text-blue-700">{{ $item->id }}</td>
                        <td class="text-sm p-3 w-1/3 text-gray-700">{{ $item->name }}</td>
                        <td class="text-sm p-3 text-gray-700"><img style="width: 100px;height:100px" src="{{$item->getFirstMediaUrl('item_image')}}" alt=""></td>

                        <td class="text-sm p-3 text-gray-700">{{ $item->price_per_unit }}</td>
                        <td class="text-sm p-3 text-gray-700">{{ $item->discount }}</td>
                        <td class="text-sm p-3 text-gray-700">{{ $item->category->name }}</td>

                        <td class="text-sm p-3 text-gray-700">
                            <form action="{{ route('admin.items.edit', [$item->id]) }}" method="get"><button>Edit</button></form>
                            <form action="{{ route('admin.items.destroy', [$item->id]) }} " method="POST">@csrf
                                @method('DELETE')<button>Delete</button></form>
                        </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="">Item Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


        </div>

        <div class="sm:grid sm:grid-col-1 sm:gap-4 md:hidden lg:hidden">
            <div class="bg-white p-4 space-y-3 rounded-lg shadow">
                <div class="flex jusify-center space-x-2 font-sm">
                    <div> <span class="text-blue-500 font-bold hover:underline">#1003</span></div>
                    <div><span class="text-gray-500">10-10-10</span></div>
                    <div><span class="bg-yellow-200 text-yellow-700 rounded-sm uppercase text-sm font-bold"> Shipped</span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">kring new fit office chair</div>
                <div class="text-md ">$2000</div>
            </div>

            <div class="bg-white p-4 space-y-3 rounded-lg shadow">
                <div class="flex jusify-center space-x-2 font-sm">
                    <div> <span class="text-blue-500 font-bold hover:underline">#1003</span></div>
                    <div><span class="text-gray-500">10-10-10</span></div>
                    <div><span class="bg-green-200 text-green-500 rounded-sm uppercase text-sm font-bold"> Delivered</span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">kring new fit office chair</div>
                <div class="text-md ">$2000</div>
            </div>
            <div class="bg-white p-4 space-y-3 rounded-lg shadow">
                <div class="flex jusify-center space-x-2 font-sm">
                    <div> <span class="text-blue-500 font-bold hover:underline">#1004</span></div>
                    <div><span class="text-gray-500">10-10-10</span></div>
                    <div><span class="bg-red-200 text-red-500 rounded-sm uppercase text-sm font-bold"> Cancelled</span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">kring new fit office chair</div>
                <div class="text-md ">$2000</div>
            </div>
        </div>
    </div>
@endsection
