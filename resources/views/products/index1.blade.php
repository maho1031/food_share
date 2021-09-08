@include('layouts.head')
@extends('shop.layouts.app')
@section('title', '商品一覧ページ')
@section('content')

<main class="l-main">
    <div class="c-container p-search">
        <div class="p-search__content">
            <div class="p-search__header">
                <p class="c-title">商品検索</p>
            </div>
            <div class="p-searchForm">
                <form method="GET" action="">
                    <ul class="p-searchFrom__list">
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">都道府県で探す</p>
                            <div class="p-searchForm__select c-select">
                                <select name="prefecture_id" class="c-inputField__input">
                                    <option value="0"
                                    @if(\Request::get('prefecture_id') == '0')
                                    selected
                                    @endif
                                    >全て</option>
                                    @foreach(config('prefecture') as $key => $score)
                                    <option value="{{ $key }}"
                                    @if(\Request::get('prefecture_id') == $key)
                                    selected
                                    @endif
                                    >{{ $score }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">価格順で探す</p>
                            <div class="p-searchForm__select c-select">
                                <select name="sort_price" id="">
                                    <option value="0">指定なし</option>
                                    <option value="{{ \Constant::SORT_ORDER['higherPrice'] }}"
                                     @if(\Request::get('sort_price') === \Constant::SORT_ORDER['higherPrice'])
                                        selected
                                        @endif
                                    >価格の高い順</option>
                                    <option value="{{ \Constant::SORT_ORDER['lowerPrice'] }}"
                                    @if(\Request::get('sort_price') === \Constant::SORT_ORDER['lowerPrice'])
                                    selected
                                    @endif
                                    >価格の安い順</option>
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">登録日で探す</p>
                            <div class="p-searchForm__select c-select">
                                <select name="sort_date" id="">
                                    <option value="0">指定なし</option>
                                    <option value="{{ \Constant::SORT_ORDER['later'] }}"
                                    @if(\Request::get('sort_date') === \Constant::SORT_ORDER['later'])
                                    selected
                                     @endif
                                    >新着順</option>
                                    <option value="{{ \Constant::SORT_ORDER['older'] }}"
                                    @if(\Request::get('sort_date') === \Constant::SORT_ORDER['older'])
                                    selected
                                     @endif
                                    >古い順</option>
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                        <p class="p-searchForm__text">検索ワード</p>
                            <div class="p-searchForm__select c-select">
                                <input type="text" name="keyword" class="c-inputField__input">
                            </div>
                        </li>

                    </ul>

                    <div class="p-btnContainer">
                        <button type="submit" class="c-btn p-btnContainer__btn">検索する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="c-container p-product">
            <div class="p-productContainer">
                <div class="p-product__header">
                    <p class="c-title">商品一覧</p>
                </div>
                <div class="p-product__list">
                @foreach($products as $product)
                    <div class="p-product__item">
                        <span class="c-tag">{{$product->category->name}}</span>
                            <div class="p-product__image">
                                <img src="{{asset('storage/uploads/'.$product->pic1)}}" alt="">
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
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">登録日：{{$product->created_at->format('Y/m/d')}}</span>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </section>
</main>
@endsection