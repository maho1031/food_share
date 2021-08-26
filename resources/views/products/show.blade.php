@include('layouts.head')
@extends('shop.layouts.app')
@section('title', '商品詳細')
@section('content')

<main class="l-main">
    <div class="c-container p-productDetail">
        <div class="p-productDetail__item">
            <div class="p-productDetail__header">
                <div class="p-productDetail__name">
                    <h1>{{$product->name}}</h1>
                </div>
                <div class="p-productDetail__img">
                    @if($product->pic1)
                    <img src="{{asset('storage/uploads/'. $product->pic1) }}" alt="" >
                    @else
                    <img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="">
                    @endif
                </div>
            </div>
            <div class="p-productDetail__basicInfo">
                <div class="p-productDetail__price">
                    <span class="p-productDetail__price-main">¥{{$product->price}}(税込)</span>
                </div>
                <div class="p-productDetail__foodDate">
                    <span class="p-productDetail__foodDate-exp">賞味期限：{{$product->exp_date->format('Y-m-d')}}</span>
                </div>
                <div class="p-productDetail__comment">
                    <p class="p-productDetail__comment-text">{{$product->comment}}</p>
                </div>
            </div>

            <form method="POST" action="">
                 <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn">購入予約をする</button>
                </div>
            </form>

            <div class="p-productDetail__snsShare u-mb20">
                <a href="" class="p-productDetail__snsShare-link">
                    <i class="fab fa-twitter sns_share_icon"></i>
                    Tweet
                </a>
            </div>

            <div class="p-productDetail__content">
                <h3 class="p-productDetail__content-title">店舗情報</h3>
                <dl class="p-productDetail__shopInfo">
                    <div class="p-productDetail__shopInfo-line">
                        <dt class="p-productDetail__shopInfo-dt">コンビニ名</dt>
                        <dd class="p-productDetail__shopInfo-dd">{{$product->shop->conveni->name}}</dd>
                        
                    </div>

                    <div class="p-productDetail__shopInfo-line">
                        <dt class="p-productDetail__shopInfo-dt">支店名</dt>
                        <dd class="p-productDetail__shopInfo-dd">{{$product->shop->name}}</dd>
                    </div>

                    <div class="p-productDetail__shopInfo-line">
                        <dt class="p-productDetail__shopInfo-dt">住所</dt>
                        <dd class="p-productDetail__shopInfo-dd">{{$product->shop->address}}</dd>
                    </div>
                </dl>
            </div>
        </div>

        
    </div>
</main>

@endsection