@extends('voyager::master')

@section('content')
    @vite('resources/css/app.css')
    <div class="p-5">

        <div class="flex ">
            <form action="{{ route('admin.notifications.markAllAsRead') }}" method="POST">
                @csrf
                <button class="py-2 px-4 mr-3 rounded-md bg-green-500 text-white">Mark all as Read</button>
            </form>

            <form action="{{ route('admin.notifications.index') }}" method="GET">
                <select name="type" class="py-2 px-4 rounded-md bg-green-500 text-white" onchange="this.form.submit()">
                    <option value="unread" {{request('type')=="uread"?'selected':''}}>UnRead</option>
                    <option value="read" {{request('type')=="read"?'selected':''}}>Read</option>
                    <option value="all" {{request('type')=="all"?'selected':''}}>All</option>
                </select>
            </form>
        </div>

        @foreach ($notifications as $notification)
            @if ($notification->read_at == null)
                <div class="w-full bg-green-200 p-3 m-2 rounded-md">
                @else
                    <div class="w-full bg-gray-100 p-3 m-2 rounded-md">
            @endif
            <p class="text-black">{{ $notification->data['order_id'] }} Parimal@gmail.com has a new order.</p>
            <span class="text-sm text-gray-700">{{ $notification->created_at }}</span>
    </div>
    @endforeach
    </div>
@endsection
