<header class="l-header">
    <div class="p-header">
        
        <div class="p-header__logo">
            <h1 class="p-header__title">Haiki Share</h1>
            <span></span>
        </div>

        <!-- PC向けメニュー -->
        <nav class="p-header__nav">
            
            <ul class="p-header__list">
                <!-- ログインなし -->
                <!-- @guest
                <li class="c-btn p-header__btn is_login">
                    <a href="{{route('login')}}" class="">ログイン</a>
                </li>
                <li class="c-btn p-header__btn is_signup">
                    <a href="{{'register'}}" class="">新規会員登録</a>
                </li>
                @endauth -->
                <!-- ログインあり・ショップ -->
                @if(Auth::guard('shop')->check())
                    <li class="c-btn p-header__btn is_login">
                        <a href="{{route('shop.show')}}">マイページ</a>
                    </li>
                    <li class="c-btn p-header__btn is_logout">
                        <a href="{{route('shop.logout')}}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        ログアウト</a>
                        <form id="logout-form" action="{{ route('shop.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
            </ul>
        </nav>
   

        <!-- スマホメニューボタン  -->
        <div class="p-header__menuBtn" >
            <div class="p-header__menuBtnContainer js-menuTarget">
                <span class="p-header__menuLine"></span>
                <span class="p-header__menuLine"></span>
                <span class="p-header__menuLine"></span>
            </div>
        </div>

        <!-- スマホメニュー コンテンツ -->
        <div class="p-menuConttent">
            <nav class="p-header-spMenuContainer js-open-menu">
                <ul class="p-header__spGlobalMenu">
               
                    @guest
                    <li class="c-btn p-header__btn is_login">
                        <a href="{{route('login')}}" class="">ログイン</a>
                    </li>
                    <li class="c-btn p-header__btn is_signup">
                        <a href="{{route('register')}}">新規登録</a>
                    </li>
                    @endauth
                
    
                    @if(Auth::guard('shop')->check())
                    <li class="c-btn p-header__btn is_login">
                        <a href="{{route('shop.show')}}">マイページ</a>
                    </li>
                    <li class="c-btn p-header__btn is_logout">
                        <a href="{{route('shop.logout')}}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        ログアウト</a>
                        <form id="logout-form" action="{{ route('shop.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                    
                </ul>
                        

                
                <ul class="p-header-spActiveMenu js-open-menuTarget">
                    <li class="p-header-spActiveMenu__link">
                        <a href="">Haiki Shareとは？</a>
                    </li>
                    <li class="p-header-spActiveMenu__link">
                        <a href="">メリット</a>
                    </li>
                    <li class="p-header-spActiveMenu__link">
                        <a href="">使い方</a>
                    </li>
                    <li class="p-header-spActiveMenu__link">
                        <a href="">利用規約</a>
                    </li>
                    <li class="p-header-spActiveMenu__link">
                        <a href="">プライバシーポリシー</a>
                    </li>
            
                </ul>
            </nav>
        </div>

    </div>
</header>