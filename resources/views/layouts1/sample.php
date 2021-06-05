<header class="l-header">
    <div class="p-header">
      <div class="p-header-top">
        <div class="p-header-titleWrapper">
            <a href="/">
              <h1 class="p-header-title"><img src="{{ asset('img/common/ico_sitelogo.svg') }}" alt=""></h1>
              <span class="p-header-subtitle">あなたの人生のSTEPを<br>共有しよう</span>
            </a>
          </div>
    
          {{-- pc menu --}}
          <nav class="p-header-pcMenu u-display-pc">
            <ul>
              <li><a href="{{ route('steps')}}">STEP一覧</a></li>
              <li class="js-category-menu p-header-category">カテゴリー検索<i class="p-header-category__icon fas fa-sort-down"></i>
                <ul class="p-header-category-menu  as_login">
                  @foreach($categories as $category)
                    <li><a href="/category/{{ $category->id }}">・{{ $category->name }}</a></li>
                  @endforeach
                </ul>
              </li>
              <li><a href="{{ route('steps.new')}}">STEPを作る</a></li>
            </ul>
          </nav>
      </div>

      <div class="p-header-bottom">
        <div class="p-header-btns u-display-pc">
          <ul>
            @auth
              <li class="p-header-btn__mypage as_login">
                <a href="{{ route('mypage') }}">
                  @if (Auth::user()->photo)
                    <figure class="p-avator as_small"><img src="{{ asset('img/update/user/'.Auth::user()->photo) }}.jpg" alt=""></figure>
                  @else
                    <figure class="p-avator as_small"><img src="{{ asset('img/common/img_noimage.jpg') }}" alt="*"></figure>
                  @endif
                  <span class="p-avator__name">{{  Auth::user()->name }}</span>
                </a>
              </li>
              <li class="c-btn p-header-btn as_logout">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form>
            @endauth
    
            @guest
              <li class="c-btn p-header-btn as_login">
                <a href="{{ route('login') }}">ログイン</a>
              </li>
              <li class="c-btn p-header-btn as_signup">
                <a href="{{ route('register') }}">新規登録</a>
              </li>
            @endauth
          </ul>
        </div>
      </div>
  
      {{-- sp menu --}}
      <div class="p-header-humberger u-display-sp js-header-btn">
        <span></span>
        <span></span>
        <span>MENU</span>
      </div>
      <div class="p-header-spMenu js-header-menu">
        <p class="p-header-spMenu__logo">
          <a href="/"><img src="{{ asset('img/common/ico_sitelogo.svg') }}" alt="STEP"></a>
        </p>
        <nav>
          <ul class="p-header-spMenu-list">
  
            @auth
            <li class="as_login">
              <a href="{{ route('mypage') }}">
                @if (Auth::user()->photo)
                  <figure class="p-avator as_small"><img src="{{ asset('img/update/user/'.Auth::user()->photo) }}.jpg" alt=""></figure>
                @else
                  <figure class="p-avator as_small"><img src="{{ asset('img/common/img_noimage.jpg') }}" alt="*"></figure>
                @endif
                <span class="p-avator__name">{{  Auth::user()->name }}</span>
              </a>
            </li>
            @endauth
  
            <li><a href="{{ route('steps')}}">STEP一覧</a></li>
            <li class="js-category-menu">カテゴリー検索<i class="p-header-category__icon fas fa-sort-down"></i>
              <ul class="p-header-category-menu">
                @foreach($categories as $category)
                  <li><a href="/category/{{ $category->id }}">・{{ $category->name }}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="{{ route('steps.new')}}">STEPを作る</a></li>
            
            @auth
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
            @endauth
          </ul>
        </nav>
        
        <ul class="p-header-spMenu__btns">
          @guest
            <li class="c-btn p-header-spMenu__btn as_login">
              <a href="{{ route('login') }}">ログイン</a>
            </li>
            <li class="c-btn p-header-spMenu__btn as_signup">
              <a href="{{ route('register') }}">新規登録</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>