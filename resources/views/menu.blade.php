@extends('layout.main')

@section('content')
    @vite('resources/css/app.css')

    <!-- menu -->
    <section class="portfolio">
        <div class="container py-xl-5 py-lg-3">
            <div class="title-section text-center mb-md-5 mb-4">
                <h3 class="w3ls-title mb-3">Our <span>Menu</span></h3>
                <p class="titile-para-text mx-auto">Inventore veritatis et quasi architecto beatae vitae dicta sunt
                    explicabo.Nemo
                    enim totam rem aperiam.</p>
            </div>
            {{-- <div class="row mt-4">
				<div class="col-md-4"> --}}

            @foreach ($categories as $category)
            @if (count($category->items) > 0)
                <div class="title-section text-center mb-md-5 mb-4">
                    <h3 class="w3ls-title mb-3"><span>{{ $category->name }}</span></h3>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-10">
                   
                        @foreach ($category->items as $item)
                            <div class="gallery-demo"
                                onclick="showModal('{{ $item->name }}','{{ $item->price_per_unit }}','{{ $item->discount }}','{{ $item->getFirstMediaUrl('item_image') }}','{{ $item->id }}')">
                                <a href="#gal1">
                                    <img src="{{ $item->getFirstMediaUrl('item_image') }}" alt=" "
                                        class="img-fluid h-48" />
                                    <h4 class="p-mask">{{ $item->name }} - <span>{{ $item->price_per_unit }}</span></h4>
                                </a>
                            </div>
                        @endforeach
                   
                </div>
                @endif
            @endforeach



        </div>

        {{-- </div>
			
		</div> --}}
    </section>
    <div id="jack">

    </div>

    <!-- gallery model-->
    {{-- <div class="modelWrap">
        <div id="gal1" class="pop-overlay">
			<div class="popup">
				<img class="img-fluid" src="images/blog1.jpg" alt="">
				<h4 class="p-mask">French Burger - - <span>$22</span></h4>
				<a href="login.html" class="button-w3ls active mt-3">Order Now
					<span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
				</a>
				<a class="close" href="#gallery">×</a>
			</div>
		</div>
    </div> --}}


    <script>
        showModal = (name, price, discount, image_url, item_id) => {
            modelWrap = document.getElementById("jack")
            modelWrap.innerHTML = `
		<div id="gal1" class="pop-overlay">
        <div class="popup">
            <form action="{{ route('user.carts.store') }}" method="POST">
            @csrf
            <img style="width:100%;height:200px" class="img-fluid " src="${image_url}" alt="">
            <div class="flex flex-column items-center">
              
            <h4 class="p-mask"> ${name}- <span>${price}</span></h4>
            <h4 class="p-mask"> Discount- <span>${discount}</span></h4>
            <h4 class="p-mask"> Total- <span>${price-discount}</span></h4>

            <h4 class="p-mask"> Quantity- <span> <input type="number" placeholder="quantity" name="quantity"/></span></h4>
            </div>
           
            <input type="hidden" value="${item_id}" name="item_id">
            <div class="button-w3ls active mt-3">
           <button class="bg-yellow-400 text-black px-3 py-2 rounded"> Add to Cart</button>
                <span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
            </div>
          
            <a class="close" href="#gallery">×</a>
        
        
        </form>
        </div>
    </div>`

        }
    </script>
    <script>
        $(document).ready(function() {
            @error('quantity')
                toastr.error('{{ $message }}')
            @enderror

            @error('item_id')
                toastr.error('{{ $message }}')
            @enderror
        });
    </script>
@endsection
