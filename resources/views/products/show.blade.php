@include('layouts.head')
@extends('layouts.app')
@section('title', '商品詳細')
@section('content')

<main class="l-main">
    <div class="c-container p-productDetail">
        <div id="app" class="p-productDetail__wrapper">
            <product-show
            :productid="{{ $product_id }}"
            >
            </product-show>
        </div>
    </div>
</main>

@endsection