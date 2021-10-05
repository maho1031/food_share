@include('layouts.head')
@extends('layouts.app')
@section('title', '商品一覧ページ')
@section('content')

<main class="l-main">
    <div id="app" class="p-product__wrapper">
        <product-index
        :categories="{{$categories}}"
        ></product-index>
    </div>
</main>
@endsection