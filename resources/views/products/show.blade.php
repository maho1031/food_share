@include('layouts.head')
@extends('layouts.app')
@section('title', '商品情報編集')
@section('content')

<main class="l-main">
    <div class="c-container p-productDetail">
        <div class="p-productDetail__item">
            <div class="p-productDetail__header">
                <div class="p-productDetail__name">
                    <h1>なめらかプリンチョコ</h1>
                </div>
                <div class="p-productDetail__img">
                    <img src="{{asset('img/pro1.jpg')}}" alt="">
                </div>
            </div>
            <div class="p-productDetail__basicInfo">
                <div class="p-productDetail__price">
                    <span class="p-productDetail__price-main">¥200(税込)</span>
                </div>
                <div class="p-productDetail__foodDate">
                    <span class="p-productDetail__foodDate-exp">賞味期限：2021/03/01</span>
                </div>
                <div class="p-productDetail__comment">
                    <p class="p-productDetail__comment-text">冷やすとさらに美味しいです！おすすめ！！</p>
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
                        <dd class="p-productDetail__shopInfo-dd">セブンイレブン</dd>
                    </div>

                    <div class="p-productDetail__shopInfo-line">
                        <dt class="p-productDetail__shopInfo-dt">支店名</dt>
                        <dd class="p-productDetail__shopInfo-dd">目黒支店</dd>
                    </div>

                    <div class="p-productDetail__shopInfo-line">
                        <dt class="p-productDetail__shopInfo-dt">住所</dt>
                        <dd class="p-productDetail__shopInfo-dd">東京都目黒区000-111</dd>
                    </div>
                </dl>
            </div>
        </div>

        
    </div>
</main>

@endsection