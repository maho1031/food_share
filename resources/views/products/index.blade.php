@include('layouts.head')
@extends('layouts.app')
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
                                <select name="place_id" id="">
                                    <option value="0">東京都</option>
                                    <option value="0">東京都</option>
                                    <option value="0">東京都</option>
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">価格順で探す</p>
                            <div class="p-searchForm__select c-select">
                                <select name="price" id="">
                                    <option value="0">価格の高い順</option>
                                    <option value="0">価格の安い順</option>
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">賞味期限が切れているもので探す</p>
                            <div class="p-searchForm__select c-select">
                                <select name="exp" id="">
                                    <option value="0">賞味期限切れ</option>
                                    <option value="1">賞味期限間近</option>
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
                </div>
                <div class="p-product__list">
                    <div class="p-product__item">
                        <!-- <div class="p-product__contents"> -->
                            <div class="p-product__image">
                                <img src="{{asset('img/pro1.jpg')}}" alt="">
                                <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：なめらかプリンチョコ</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：100円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：セブンイレブン</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：東京都目黒区支店</span>
                                    </li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="p-product__item">
                        <!-- <div class="p-product__contents"> -->
                            <div class="p-product__image">
                                <img src="{{asset('img/pro1.jpg')}}" alt="">
                                <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：なめらかプリンチョコ</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：100円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：セブンイレブン</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：東京都目黒区支店</span>
                                    </li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="p-product__item">
                        <!-- <div class="p-product__contents"> -->
                            <div class="p-product__image">
                                <img src="{{asset('img/pro2.jpg')}}" alt="">
                                <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：なめらかプリンチョコ</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：100円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：セブンイレブン</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：東京都目黒区支店</span>
                                    </li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="p-product__item">
                        <!-- <div class="p-product__contents"> -->
                            <div class="p-product__image">
                                <img src="{{asset('img/pro3.jpg')}}" alt="">
                                <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：なめらかプリンチョコ</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：100円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：セブンイレブン</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：東京都目黒区支店</span>
                                    </li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="p-product__item">
                        <!-- <div class="p-product__contents"> -->
                            <div class="p-product__image">
                                <img src="{{asset('img/pro4.jpg')}}" alt="">
                                <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：なめらかプリンチョコ</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：100円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：セブンイレブン</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：東京都目黒区支店</span>
                                    </li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="p-product__item">
                        <!-- <div class="p-product__contents"> -->
                            <div class="p-product__image">
                                <img src="{{asset('img/pro5.jpg')}}" alt="">
                                <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：なめらかプリンチョコ</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：100円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：セブンイレブン</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：東京都目黒区支店</span>
                                    </li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="p-product__item">
                        <!-- <div class="p-product__contents"> -->
                            <div class="p-product__image">
                                <img src="{{asset('img/pro6.jpg')}}" alt="">
                                <!-- <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div> -->
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：なめらかプリンチョコ</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：100円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：セブンイレブン</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：東京都目黒区支店</span>
                                    </li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="p-product__item">
                        <!-- <div class="p-product__contents"> -->
                            <div class="p-product__image">
                                <img src="{{asset('img/pro7.jpg')}}" alt="">
                                <!-- <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div> -->
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：なめらかプリンチョコ</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：100円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：セブンイレブン</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：東京都目黒区支店</span>
                                    </li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </section>
</main>
@endsection