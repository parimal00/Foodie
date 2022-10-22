@extends('voyager::master')

@section('content')
    @vite('resources/css/app.css')
    <div class="p-5">
        <form action="{{ route('admin.orders.update', [$user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="text-black text-md font-bold">#{{ $user->orders[0]->order_id }}</label> <br>
            <label class="text-black font-semibold">Ordered By </label><br>
            <label class="text-black border rounded-md border-gray-600 w-full py-3 px-2">{{ $user->email }}</label> <br>
            <br>

            <label class="text-black font-semibold">Items</label><br>
            @foreach ($user->orders as $order)
                <label class="text-black border rounded-md border-gray-600 w-full py-3 px-2">{{ $order->item_name }}</label>
                <br>
            @endforeach
            <br>

            <label class="text-black font-semibold">Delivery Address </label><br>
            <label class="text-black border rounded-md border-gray-600 w-full py-3 px-2">{{ $user->email }}</label> <br>
            <br>

            <label class="text-black font-semibold">Choose Driver</label><br>
            <select name="driver_id" class="text-black border rounded-md border-gray-600 w-full py-3 px-2">
                @foreach ($drivers as $driver)
                    <option {{ $user->orders[0]->driver_id == $driver->id ? 'selected' : '' }} value="{{$driver->id}}">
                        {{ $driver->email }}</option>
                @endforeach
            </select>
            @error('driver_id')
                <span class="text-red-900 font-bold"> {{ $message }} </span>
            @enderror
            <br> <br>

            <label class="text-black font-semibold">Choose Status</label><br>
            <select name="STATUS" class="text-black border rounded-md border-gray-600 w-full py-3 px-2">
                @foreach (App\Models\Order::STATUS as $status)
                    <option {{ $order->status == $status ? 'selected' : '' }} value="{{ $status }}">
                        {{ $status }}</option>
                @endforeach
            </select>
            @error('status')
                <span class="text-red-800 font-bold"> {{ $message }} </span>
            @enderror
            <br> <br>

            <button class=" w-full py-3 px-2 font-semibold bg-green-500 text-white">Update</button><br>

        </form>
    </div>
@endsection
