@extends('voyager::master')
@section('content')
    @vite('resources/css/app.css')

    <div class="p-5">

        <div class="w-full">
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <label class="text-black px-3 border-b-2 w-full">Name</label> <br>
                <input class="rounded-md placeholder-gray-600 text-black w-full py-3 px-3 border-solid"type="text" name="name" value="{{old('name')}}" placeholder="Item name">
                <br>

                @error('name')
                    <span class="text-red-800 px-3">
                        {{ $message }} <br>
                    </span>
                @enderror

                <label class="text-black px-3 border-b-2 w-full">Category</label> <br>
                <select  class="rounded-md text-black w-full py-3 px-3 border-solid bg-white" name="category_id">
                    @foreach($categories as $category)
                        <option class="text-black" value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-red-800 px-3">
                        {{ $message }} <br>
                    </span>
                @enderror

                <label class="text-black px-3 border-b-2 w-full">Item image</label> <br>
               <input type="file" name="item_image"   placeholder="Upload image">
                @error('item_image')
                    <span class="text-red-800 px-3">
                        {{ $message }} <br>
                    </span>
                    </span>
                @enderror

                <label class="text-black px-3 border-b-2  w-full" >Price Per Unit</label> <br>
                <input class="rounded-md  placeholder-gray-600 text-black w-full py-3 px-3 border-solid"type="text" value="{{old('price_per_unit')}}" name="price_per_unit" placeholder="price per unit">
                <br>

                @error('price_per_unit')
                    <span class="text-red-800 px-3">
                        {{ $message }} <br>
                    </span>
                @enderror

                <label class="text-black px-3 border-b-2 w-full">Discount</label> <br>
                <input class="rounded-md w-full py-3 px-3 placeholder-gray-600 text-black border-solid"type="text" value="{{old('discount')}}" name="discount" placeholder="Item name">
                <br>

                @error('discount')
                    <span class="text-red-800 px-3">
                        {{ $message }} <br>
                    </span>
                @enderror


                <button class="bg-green-400 text-white py-2 px-3">Save</button>
            </form>
        </div>
    </div>
@endsection
