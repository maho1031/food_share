@include('layouts.head')
@extends('layouts.app')
@section('title', '新規登録')
@section('content')
<main class="l-main">
    <div class="c-container p-auth__container">
        <div class="p-auth__header">
            <p class="p-auth__title">新規登録</p>
            @include('error')
        </div>
        <div class="p-auth__inner">
            <form method="POST" action="{{ route('register') }}" class="p-auth__form">
                @csrf
                <div class="c-inputField u-mb30">
                    <label for="name" class="p-auth__text u-mb10">お名前</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="c-inputField__input @error('name') is-error @enderror" autocomplete="name" autofocus="autofocus" required>
                </div>

                <div class="c-inputField u-mb30">
                    <label for="email" class="p-auth__text u-mb10">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="c-inputField__input @error('email') is-error @enderror" autocomplete="email" autofocus="autofocus" required>
                </div>

                <div class="c-inputField u-mb30">
                    <label for="password" class="p-auth__text u-mb10">パスワード</label>
                    <input type="password" name="password" class="c-inputField__input @error('password') is-error @enderror" autocomplete="current-password" autofocus="autofocus" required>
                    <span class="c-inputField__detail">半角英数字で8文字以上</span>          
                </div>

                <div class="c-inputField u-mb30">
                    <label for="password" class="p-auth__text u-mb10">パスワード(確認)</label>
                    <input type="password" name="password_confirmation" class="c-inputField__input @error('password') is-error @enderror" autocomplete="new-password" autofocus="autofocus" required>
                </div>

                <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn is-register u-mt20">新規登録</button>
                </div>




            </form>

            <div class="p-btnContainer">
                    <a href="{{ route('shop.register') }}" class="c-btn p-btnContainer__btn is-seller u-mt20">出品者新規登録はこちら</a>
            </div>
            
        </div>
    </div>
</main>
@endsection
