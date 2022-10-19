@extends('voyager::master')

@section('content')
    @vite('resources/css/app.css')

    <div class="p-5">

        <div class="w-full">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <label class="text-black px-3 border-b-2 w-full">Name</label> <br>
                <input class="rounded-md w-full py-3 px-3 border-solid"type="text" name="name"
                    placeholder="category name"> <br>
               
                    @error('name')
                    <span class="text-red-800 px-3">
                        {{ $message }} <br>
                    </span>
                    @enderror
        

                <button class="bg-green-400 text-white py-2 px-3">Save</button>
            </form>
        </div>
    </div>
@endsection
