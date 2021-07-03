@include('layouts.head')
@extends('shop.layouts.app')
@section('title', '商品情報編集')
@section('content')

<main class="l-main">
    <div class="c-container p-productForm">
        <div class="p-productFrom__header">
            <p class="c-title__sub">商品情報編集</p>
        </div>

        <div class="p-productForm__inner">
            <form action="{{route('products.update', ['id' => $product->id]) }}" method="POST" class="p-productForm__form" enctype="multipart/form-data">
            @csrf
                <div class="c-inputField u-mb30">
                    <label for="name" class="p-productForm__text u-mb10">商品名</label>
                    <input type="name" name="name" id="name" value="{{ old('name',$product->name) }}" class="c-inputField__input @error('name') is-error @enderror" autocomplete="name" autofocus="autofocus" required>
                    @if ($errors->has('name'))
                                    <span class="c-inputField__errorMsg" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="price" class="p-productForm__text u-mb10">価格</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="c-inputField__input @error('price') is-error @enderror" autocomplete="price" autofocus="autofocus" required placeholder="例100">
                    @if ($errors->has('price'))
                                    <span class="c-inputField__errorMsg" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="exp_date" class="p-productForm__text u-mb10">賞味期限</label>
                    <input type="date" name="exp_date" id="exp_date" value="{{ old('exp_date',$product->exp_date->format('Y-m-d')) }}" class="c-inputField__input @error('exp_date') is-error @enderror" autocomplete="exp_date" autofocus="autofocus" required>
                    @if ($errors->has('exp_date'))
                                    <span class="c-inputField__errorMsg" role="alert">
                                        <strong>{{ $errors->first('exp_date') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="comment" class="p-productForm__text u-mb10">商品詳細</label>
                    <textarea type="text" name="comment" id="comment" cols="30" rows="10" class="c-inputField__input @error('comment') is-error @enderror" autocomplete="comment" autofocus="autofocus" required>{{ old('comment', $product->comment) }}</textarea>
                    <span class="c-inputField__detail">200文字以内</span>
                    @if ($errors->has('comment'))
                                    <span class="c-inputField__errorMsg" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="pic1" class="p-productForm__text u-mb10">商品画像</label>
                    <div class="c-inputField__imgContainer">
                        <label class="c-inputField__areaDrop js-pic">
                            <input type="file" class="c-inputField__icon js-input-file" name="pic1" value="{{old('pic1',$product->pic1)}}" accept="image/jpeg,image/gif,image/png" />
                            @if($product->pic1)
                            <img src="/storage/uploads/{{$product->pic1}}" alt="userIcon" class="js-prev">
                      
                        @else
                        <img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="js-prev">
                        @endif
                        </label>
                    </div>
                    @if ($errors->has('pic1'))
                                    <span class="c-inputField__errorMsg" role="alert">
                                        <strong>{{ $errors->first('pic1') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn">編集する</button>
                </div>
            </form>
        </div>
        <p class="p-productForm__txt"><a class="p-productForm__txt-link" href="">マイページへ戻る</a></p>
    </div>
</main>

@endsection