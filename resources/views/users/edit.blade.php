@include('layouts.head')
@extends('layouts.app')
@section('title', 'アカウント情報編集')
@section('content')

<main class="l-main">
    <div class="c-container p-auth">
        <div class="p-auth__header">
            <p class="p-auth__title">アカウント情報編集</p>
        </div>
        <div class="p-auth__inner">
            <form action="POST" class="p-auth__form">
                @csrf
                <div type="text" class="c-inputField u-mb30">
                    <label for="email" class="p-auth__text u-mb10">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="c-inputField__input @error('email') is-error @enderror" autocomplete="email" autofocus="autofocus" required>
                    <!-- @error('email')
                    <span class="p-form__errorMsg" role="alert">
                       
                    </span>
                    @enderror -->
                </div>

                <div type="text" class="c-inputField u-mb30">
                    <label for="password" class="p-auth__text u-mb10">パスワード</label>
                    <input type="password" name="password" id="password" class="c-inputField__input @error('password') is-error @enderror" autocomplete="current-password" autofocus="autofocus" required>
                    <span class="c-inputField__detail">半角英数字で8文字以上</span>
                    <!-- @error('password')
                    <span class="p-form__errorMsg" role="alert">
                        
                    </span>
                    @enderror -->
                </div>

                <div type="text" class="c-inputField u-mb30">
                    <label for="password" class="p-auth__text u-mb10">パスワード(確認)</label>
                    <input type="password" name="password" id="password_confirmation" class="c-inputField__input @error('password') is-error @enderror" autocomplete="new-password" autofocus="autofocus" required>
                    <!-- @error('password')
                    <span class="p-form__errorMsg" role="alert">
                        
                    </span>
                    @enderror -->
                </div>

                <div class="p-btnContainer">
                    <button type="submit" class="c-btn p-btnContainer__btn">変更する</button>
                </div>




            </form>

            
        </div>
        <p class="p-productForm__txt"><a class="p-productForm__txt-link" href="">マイページへ戻る</a></p>
    </div>
</main>
@endsection