@extends('layouts.app')
@section('title', 'パスワード再設定')
@section('content')
<main class="l-main">
    <div class="c-container p-auth__container">
        <div class="p-auth__header">
            <p class="p-auth__title">パスワード再設定</p>
           
        </div>
        <div class="p-auth__inner">
        @include('error')
        @if (session('status'))
          <span class="p-form__errorMsg" role="alert">
              {{ session('status') }}
          </span>
        @endif
        <p class="p-auth__text">ご登録いただいたメールアドレスを入力してください。</p>
        <p class="p-auth__text">メールアドレス宛にパスワードの再設定のメールをお送りします。</p>
            <form action="{{ route('password.email') }}" method="POST" class="p-auth__form">
                @csrf
                <div class="c-inputField u-mb30">
                    <label for="email" class="p-auth__text u-mb10">メールアドレス</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="c-inputField__input @error('email') is-error @enderror" autocomplete="email" autofocus="autofocus" required>
                </div>

                <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn">送信</button>
                </div>
            </form>          
        </div>
    </div>
</main>
@endsection