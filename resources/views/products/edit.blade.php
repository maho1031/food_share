@include('layouts.head')
@extends('shop.layouts.app')
@section('title', '商品情報編集')
@section('content')

<main class="l-main">
    <div class="c-container p-productForm">
        <div class="p-productFrom__header">
            <p class="c-title__sub">商品情報編集</p>
            @include('error')
        </div>

        <div class="p-productForm__inner">
            <form action="{{route('products.update', ['product_id' => $product->id]) }}" method="POST" class="p-productForm__form" enctype="multipart/form-data">
            @csrf
                <div class="c-inputField u-mb30">
                    <label for="name" class="p-productForm__text u-mb10">商品名</label>
                    <input type="name" name="name" id="name" value="{{ old('name',$product->name) }}" class="c-inputField__input @error('name') is-error @enderror" autocomplete="name" autofocus="autofocus" required>
                </div>

                <div class="c-inputField u-mb30">
                    <label for="category_id" class="p-productForm__text u-mb10">カテゴリー</label>
                    <select type="text" name="category_id" class="c-inputField__input">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        @if($category->id === $product->category_id)
                        selected
                        @endif
                        >{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="c-inputField u-mb30">
                    <label for="price" class="p-productForm__text u-mb10">価格</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="c-inputField__input @error('price') is-error @enderror" autocomplete="price" autofocus="autofocus" required placeholder="例100">
                </div>

                <div class="c-inputField u-mb30">
                    <label for="exp_date" class="p-productForm__text u-mb10">賞味期限</label>
                    <input type="date" name="exp_date" id="exp_date" value="{{ old('exp_date',$product->exp_date->format('Y-m-d')) }}" class="c-inputField__input @error('exp_date') is-error @enderror" autocomplete="exp_date" autofocus="autofocus" required>
                </div>

                <div class="c-inputField u-mb30">
                    <label for="comment" class="p-productForm__text u-mb10">商品詳細</label>
                    <textarea name="comment" id="comment" cols="30" rows="10" class="c-inputField__input @error('comment') is-error @enderror" autocomplete="comment" autofocus="autofocus" required>{{ old('comment', $product->comment) }}</textarea>
                    <span class="c-inputField__detail">200文字以内</span>
                </div>

                <div class="c-inputField u-mb30">
                    <label for="pic1" class="p-productForm__text u-mb10">商品画像</label>
                    <div class="c-inputField__imgContainer">
                        <label class="c-inputField__areaDrop js-pic">
                            <input type="file" class="c-inputField__icon js-input-file" name="pic1" value="{{old('pic1',$product->pic1)}}" accept="image/jpeg,image/gif,image/png" multiple/>
                            @include('thumbnail')
                        </label>
                    </div>
                </div>

                <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn">編集する</button>
                </div>
            </form>

            <div class="p-btnContainer">
                    <a href="#modal-delete" data-toggle="modal" data-target="#modal-delete" class="c-btn p-btnContainer__btn is-cansel">
                    削除する
                    </a>
                    
            </div>
        </div>
        
        <p class="p-productForm__txt"><a class="p-productForm__txt-link" href="{{route('shop.show')}}">マイページへ戻る</a></p>
    </div>

      <!-- modal -->
      <div id="modal-delete" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('products.destroy', ['id' => $product->id]) }}">
                  @csrf
                  <div class="modal-body">
                    {{ $product->name }}を削除します。よろしいですか？
                  </div>
                  <div class="modal-footer justify-content-between">
                    <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                    <button type="submit" class="btn btn-danger">削除する</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- modal -->
</main>

@endsection