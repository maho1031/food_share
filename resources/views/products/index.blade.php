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
                <form method="GET" action="{{route('products.index')}}">
                    <ul class="p-searchFrom__list">
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">都道府県で探す</p>
                            <div class="p-searchForm__select c-select">
                                <select name="prefecture_id" class="c-inputField__input">
                                    @foreach(config('prefecture') as $key => $score)
                                    <option value="{{ $key }}">{{ $score }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <label class="p-searchForm__text">価格順で探す</label>
                            <div class="p-searchForm__select c-select">
                                <select name="sort" id="sort">
                                    <option value="">指定なし</option>
                                    <option value="1">高い順</option>
                                    <option value="2">やすい順</option>
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">新着順で探す</p>
                            <div class="p-searchForm__select c-select">
                                <select name="sort" id="sort">
                                    <option value="">指定なし</option>
                                    <option value="3">新しい順</option>
                                    <option value="4">古い順</option>
                                </select>
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
                    <span>検索結果:件</span>
                </div>
                <div id="app" class="p-product__wrapper">
                    <product-list></product-list>
                </div>
            </div>
    </section>
</main>
@endsection