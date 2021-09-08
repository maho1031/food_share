@include('layouts.head')
@extends('layouts.app')
@section('title', 'マイページ')
@section('content')

<div class="l-main">
    <section class="c-container">
        <div class="p-prof">
            <p class="c-title">マイページ</p>
            <div class="p-prof__conent">
                <p class="p-prof__name">{{auth()->user()->name}}さん</p>
                <div class="p-btnContainer">
                    <a href="{{route('users.edit')}}" class="c-btn p-btnContainer__btn is-prof">ユーザー情報の編集</a>
                </div>
            </div>
        </div>

        <div class="p-productContainer">
                <div class="p-product__header">
                    <p class="c-title u-mt60">購入した商品</p>
                </div>
                <div class="p-product__list">
                    @foreach($products as $product)
                    <div class="p-product__item">
                        <span class="c-tag">{{$product->category->name}}</span>
                            <div class="p-product__image">
                            @if($product->pic1)
                                <img src="{{asset('storage/uploads/'. $product->pic1) }}" alt="" >
                                @else
                                <img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="">
                            @endif
                            @if($product->sold_flg === 1)
                                <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            @endif
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">{{$product->name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">{{$product->price}}円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">{{$product->shop->conveni->name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">{{$product->shop->name}}</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <form method="POST" action="{{route('products.cancel', ['product_id' => $product->id]) }}">
                            @csrf
                                <div class="p-btnContainer">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="c-btn p-btnContainer__btn is-cansel">購入をキャンセルする</button>
                                </div>
                            </form>

                            <div class="p-btnContainer u-mb30">
                                <a href="{{route('products.show', ['id' => $product->id]) }}" class="c-btn p-btnContainer__btn is-detail">詳細を見る</a>
                            </div>
                    </div>


                @endforeach
                </div>
    </section>
</div>

@endsection