@include('layouts.head')
@extends('layouts.app')
@section('title', '商品新規登録')
@section('content')

<main class="l-main">
    <div class="c-container p-productForm">
        <div class="p-productFrom__header">
            <p class="c-title__sub">商品新規登録</p>
        </div>

        <div class="p-productForm__inner">
            <form method="" action="" class="p-productForm__form">
            @csrf
                <div class="c-inputField u-mb30">
                    <label for="name" class="p-productForm__text u-mb10">商品名</label>
                    <input type="name" name="name" id="name" value="{{ old('name') }}" class="c-inputField__input @error('name') is-error @enderror" autocomplete="name" autofocus="autofocus" required>
                    <!-- @error('name')
                    <span class="p-form__errorMsg" role="alert">
                       
                    </span>
                    @enderror -->
                </div>

                <div class="c-inputField u-mb30">
                    <label for="price" class="p-productForm__text u-mb10">価格</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" class="c-inputField__input @error('price') is-error @enderror" autocomplete="price" autofocus="autofocus" required placeholder="例100">

                    <!-- @error('price')
                    <span class="p-form__errorMsg" role="alert">
                       
                    </span>
                    @enderror -->
                </div>

                <div class="c-inputField u-mb30">
                    <label for="exp_date" class="p-productForm__text u-mb10">賞味期限</label>
                    <input type="date" name="exp_date" id="exp_date" value="{{ old('exp_date') }}" class="c-inputField__input @error('exp_date') is-error @enderror" autocomplete="exp_date" autofocus="autofocus" required>

                    <!-- @error('exp_date')
                    <span class="p-form__errorMsg" role="alert">
                       
                    </span>
                    @enderror -->
                </div>

                <div class="c-inputField u-mb30">
                    <label for="comment" class="p-productForm__text u-mb10">商品詳細</label>
                    <textarea name="comment" id="comment" value="{{ old('cpmment') }}" class="c-inputField__input @error('comment') is-error @enderror" autocomplete="comment" autofocus="autofocus" required></textarea>
                    <span class="c-inputField__detail">200文字以内</span>
                    <!-- @error('comment')
                    <span class="p-form__errorMsg" role="alert">
                       
                    </span>
                    @enderror -->
                </div>

                <div class="c-inputField u-mb30">
                    <label for="pic1" class="p-productForm__text u-mb10">商品画像</label>
                    <div class="c-inputField__imgContainer">
                        <label class="c-inputField__areaDrop js-pic">
                            <input type="file" class="c-inputField__icon js-input-file" name="pic1" value="{{old('pic1')}}" accept="image/jpeg,image/gif,image/png" />
                            <img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="js-prev">
                        </label>
                    </div>

                    <!-- @error('comment')
                    <span class="p-form__errorMsg" role="alert">
                     
                    </span>
                    @enderror -->
                </div>

                <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn">登録する</button>
                </div>
            </form>
        </div>
        <p class="p-productForm__txt"><a class="p-productForm__txt-link" href="">マイページへ戻る</a></p>
    </div>
</main>

@endsection