@include('layouts.head')
@extends('layouts.app')
@section('title', '商品詳細')
@section('content')

<main class="l-main">
    <div class="c-container p-productDetail">
        <div id="app" class="p-productDetail__wrapper">
            <product-show
            :productid="{{ $product_id }}"
            >
            </product-show>
            
            <form method="POST" action="{{route('products.add', ['product_id' => $product->id]) }}">
                @csrf
                 <div class="p-btnContainer">
                     @if($product->sold_flg === 0)
                     <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit" class="c-btn p-btnContainer__btn">購入予約をする</button>
                    @endif
                </div>
            </form>

        </div>
    </div>
</main>

@endsection