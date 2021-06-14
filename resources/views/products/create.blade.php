@include('layouts.head')
@extends('shop.layouts.app')
@section('title', '商品新規登録')
@section('content')

<main class="l-main">
    <div class="c-container p-productForm">
        <div class="p-productFrom__header">
            <p class="c-title__sub">商品新規登録</p>
        </div>

        <div class="p-productForm__inner">
            <form method="POST" action="{{route('products.store')}}" class="p-productForm__form" enctype="multipart/form-data">
            @csrf
                <div class="c-inputField u-mb30">
                    <label for="name" class="p-productForm__text u-mb10">商品名</label>
                    <input type="name" name="name" id="name" class="c-inputField__input @error('name') is-error @enderror" autocomplete="name" autofocus="autofocus" required>
                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="price" class="p-productForm__text u-mb10">価格</label>
                    <input type="number" name="price" id="price" class="c-inputField__input @error('price') is-error @enderror" autocomplete="price" autofocus="autofocus" required placeholder="例：100">
                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="exp_date" class="p-productForm__text u-mb10">賞味期限</label>
                    <input type="date" name="exp_date" id="exp_date"class="c-inputField__input @error('exp_date') is-error @enderror" autocomplete="exp_date" autofocus="autofocus" required>
                    @if ($errors->has('exp_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('exp_date') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="comment" class="p-productForm__text u-mb10">商品詳細</label>
                    <textarea name="comment" id="comment" cols="30" rows="10"class="c-inputField__input @error('comment') is-error @enderror" autocomplete="comment" autofocus="autofocus" required></textarea>
                    <span class="c-inputField__detail">200文字以内</span>
                    @if ($errors->has('comment'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="pic1" class="p-productForm__text u-mb10">商品画像</label>
                    <div class="c-inputField__imgContainer">
                        <label class="c-inputField__areaDrop js-pic">
                            <input type="file" class="c-inputField__icon js-input-file" name="pic1" accept="image/jpeg,image/gif,image/png" />
                            <img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="c-inputField__image js-prev">
                        </label>
                    </div>
                    @if ($errors->has('pic1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pic1') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn">登録する</button>
                </div>
            </form>
        </div>
        <p class="p-productForm__txt"><a href="{{route('shop.show')}}" class="p-productForm__txt-link">マイページへ戻る</a></p>
    </div>
</main>

@endsection