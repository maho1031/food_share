@include('layouts.head')
@extends('layouts.app')
@section('title', '出品した商品一覧')
@section('content')

<section class="c-container p-product">
            <div class="p-productContainer">
                <div class="p-product__header">
                    <p class="c-title">出品した商品一覧</p>
                </div>
                <div class="p-product__list">
                    @foreach($products as $product)
                    <div class="p-product__item">
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
                                        <span class="p-product__sentense">商品名：{{$product->name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：{{$product->price}}円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：{{$product->shop->conveni->name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：{{$product->shop->name}}支店</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-btnContainer">
                                <a href="{{route('products.edit', ['product_id' => $product->id] )}}" class="p-btnContainer__btn">商品の編集</a>
                            </div>
                            <div class="p-btnContainer u-mb30">
                                <a href="{{route('products.sshow', ['product_id' => $product->id]) }}" class="p-btnContainer__btn is-detail">詳細を見る</a>
                            </div>
                           
                    </div>
                    @endforeach


                    <p class="p-productForm__txt"><a class="p-productForm__txt-link" href="{{route('shop.show')}}">マイページへ戻る</a></p>
                    
                </div>
                
            </div>
</section>
@endsection