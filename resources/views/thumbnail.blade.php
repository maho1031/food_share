@if($product->pic1)
<img src="/storage/uploads/{{$product->pic1}}" alt="userIcon" class="js-prev">
@else
<img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="js-prev">
@endif