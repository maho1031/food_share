@include('layouts.head')
@extends('layouts.app')
@section('title', 'アカウント情報編集')
@section('content')

<main class="l-main">
    <div class="c-container p-auth__container">
        <div class="p-auth__header">
            <p class="p-auth__title">プロフィール編集</p>
        </div>
        <div class="p-auth__inner">
            <form method="POST" action="{{ route('users.update') }}" class="p-auth__form">
                @csrf
                <input type="hidden" name="id" value="{{auth()->user()->id}}">

                <div class="c-inputField u-mb30">
                    <label for="name" class="p-auth__text u-mb10">お名前</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="c-inputField__input @error('name') is-error @enderror" autocomplete="name" autofocus="autofocus" required>
                    @if ($errors->has('name'))
                        <span class="c-inputField__errorMsg" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="c-inputField u-mb30">
                    <label for="email" class="p-auth__text u-mb10">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="c-inputField__input @error('email') is-error @enderror" autocomplete="email" autofocus="autofocus" required>
                    @if ($errors->has('email'))
                            <span class="c-inputField__errorMsg" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="password" class="p-auth__text u-mb10">パスワード</label>
                    <input type="password" name="password" class="c-inputField__input @error('password') is-error @enderror" autocomplete="current-password" autofocus="autofocus" required>
                    <span class="c-inputField__detail">半角英数字で8文字以上</span>
                    @if ($errors->has('password'))
                            <span class="c-inputField__errorMsg" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="c-inputField u-mb30">
                    <label for="password" class="p-auth__text u-mb10">パスワード(確認)</label>
                    <input type="password" name="password_confirmation" class="c-inputField__input @error('password') is-error @enderror" autocomplete="new-password" autofocus="autofocus" required>
                    
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