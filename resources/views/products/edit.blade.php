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

        <div id="app" class="p-productForm__inner">
            <form-edit
              :product_id="{{$product_id}}"
              :categories="{{$categories}}"
            ></form-edit>

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