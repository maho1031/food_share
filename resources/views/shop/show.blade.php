@extends('shop.layouts.app')
@section('title', 'マイページ')
@section('content')

<div class="l-main">
    <section class="c-container">
        <div class="p-prof">
            <p class="c-title">マイページ</p>
            <div class="p-prof__conent">
                <div class="p-btnContainer">
                    <a href="{{route('shop.edit')}}" class="c-btn p-btnContainer__btn is-prof">店舗情報の編集</a>
                </div>
                <div class="p-btnContainer">
                    <a href="{{route('products.create')}}" class="c-btn p-btnContainer__btn is-prof">商品の出品</a>
                </div>
            </div>
        </div>

        <div class="p-productContainer">
                <div class="p-product__header">
                    <p class="c-title u-mt60">出品した商品</p>
                </div>
                <div class="p-product__list">
                @foreach(auth()->user()->products as $product)
                    <div class="p-product__item">
                            <div class="p-product__image">
                            @if($product->pic1)
                                <img src="{{asset('storage/uploads/' .$product->pic1)}}" alt="">
                            @else
                                <img src="{{asset('img/sample-img.jpg')}}">
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
                                        <span class="p-product__sentense">賞味期限：{{$product->exp_date->format('Y-m-d')}}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="p-btnContainer">
                                <a href="{{route('products.edit', ['id' => $product->id]) }}" class="c-btn p-btnContainer__btn">商品の編集</a>
                            </div>
                            <div class="p-btnContainer u-mb30">
                                <a href="{{route('products.show', ['id' => $product->id]) }}" class="c-btn p-btnContainer__btn is-detail">詳細を見る</a>
                            </div>
                           
                    </div>
                    @endforeach


                    <div class="p-btnContainer u-mt60">
                                <a href="{{ route('shop.productList')}}" class="c-btn p-btnContainer__btn is-more">もっと見る</a>
                    </div>
                </div>
        </div>
        <div class="p-productContainer">
                <div class="p-product__header">
                    <p class="c-title u-mt60">購入された商品</p>
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

                            <div class="p-btnContainer u-mb30">
                                <a href="" class="c-btn p-btnContainer__btn is-detail">詳細を見る</a>
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

                            <div class="p-btnContainer u-mb30">
                                <a href="" class="c-btn p-btnContainer__btn is-detail">詳細を見る</a>
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

                            <div class="p-btnContainer u-mb30">
                                <a href="" class="c-btn p-btnContainer__btn is-detail">詳細を見る</a>
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

                            <div class="p-btnContainer u-mb30">
                                <a href="" class="c-btn p-btnContainer__btn is-detail">詳細を見る</a>
                            </div>

                            <div class="p-btnContainer u-mt60">
                                <a href="" class="c-btn p-btnContainer__btn is-more">もっと見る</a>
                            </div>
                        <!-- </div> -->
                    </div>

                </div>
        </div>
    </section>
</div>
@endsection