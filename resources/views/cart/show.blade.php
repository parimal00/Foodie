<h1>Show page</h1>

<form action="{{route('cart.store')}} method="post">
@csrf
<img src="{{$item->getFirstMediaUrl()}}">

<Span>Name :{{$item->name}}</Span> <br>
<Span>Price :{{$item->price_per_unit}}</Span> <br>
<Span>Name :{{$item->}}</Span> <br>

<Span>Name :{{$item->name}}</Span> <br>

</form>