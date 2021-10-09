@extends('layouts.app')
@section('title', 'パスワード再発行')
@section('content')
<main class="l-main">
    <div class="c-container p-auth__container">
        <div class="p-auth__header">
            <p class="p-auth__title">パスワード再発行</p>
            @include('error')
        </div>
        <div class="p-auth__inner">
            <form action="{{ route('password.update') }}" method="POST" class="p-auth__form">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="c-inputField u-mb30">
                    <label for="email" class="p-auth__text u-mb10">メールアドレス</label>
                    <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" class="c-inputField__input @error('email') is-error @enderror" autocomplete="email" autofocus="autofocus" required>
                </div>

                <div class="c-inputField u-mb30">
                    <label for="password" class="p-auth__text u-mb10">新しいパスワード</label>
                    <input type="password" name="password" id="password" class="c-inputField__input @error('password') is-error @enderror" autocomplete="current-password" autofocus="autofocus" required>
                    <span class="c-inputField__detail">半角英数字で8文字以上</span>
                </div>

                <div class="c-inputField u-mb30">
                    <label for="password" class="p-auth__text u-mb10">新しいパスワード(再入力)</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="c-inputField__input @error('password') is-error @enderror" autocomplete="current-password" autofocus="autofocus" required>
                </div>

                <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn">送信</button>
                </div>

            </form>
            
        </div>
    </div>
</main>
@endsection
