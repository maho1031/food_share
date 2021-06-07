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
                    <div class="p-product__item">
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

                            <div class="p-btnContainer">
                                <a href="" class="c-btn p-btnContainer__btn is-cansel">購入をキャンセルする</a>

                            </div>
                            <div class="p-btnContainer u-mb30">
                                <a href="" class="c-btn p-btnContainer__btn is-detail">詳細を見る</a>
                            </div>
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

                            <div class="p-btnContainer">
                                <a href="" class="p-btnContainer__btn is-cansel">購入をキャンセルする</a>

                            </div>
                            <div class="p-btnContainer u-mb30">
                                <a href="" class="p-btnContainer__btn is-detail">詳細を見る</a>
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


                            <div class="p-btnContainer">
                                <a href="" class="p-btnContainer__btn is-cansel">購入をキャンセルする</a>

                            </div>
                            <div class="p-btnContainer u-mb30">
                                <a href="" class="p-btnContainer__btn is-detail">詳細を見る</a>
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


                            <div class="p-btnContainer">
                                <a href="" class="p-btnContainer__btn is-cansel">購入をキャンセルする</a>

                            </div>
                            <div class="p-btnContainer u-mb30">
                                <a href="" class="p-btnContainer__btn is-detail">詳細を見る</a>
                            </div>
                        <!-- </div> -->
                    </div>

                </div>
    </section>
</div>

@endsection