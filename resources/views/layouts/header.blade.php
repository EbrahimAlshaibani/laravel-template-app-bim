
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{route("index")}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
        <span>تجربة</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route("index")}}">الرئيسية</a></li>
          <li><a class="nav-link scrollto" href="#about">عننا</a></li>
          <li><a class="nav-link scrollto" href="#services">خدماتنا</a></li>
          <li><a class="nav-link scrollto" href="{{route("client.products.index")}}">المنتجات</a></li>
          <li><a class="nav-link scrollto" href="#team">الفريق</a></li>
          <li><a href="blog.html">الاخبار</a></li>
          <li><a class="nav-link scrollto" href="#contact">تواصل معنا</a></li>
        
          <li class="dropdown"><a href="#"><span>اللغة</span> <i class="bi bi-chevron-down m-1"></i> </a>
            <ul>
              <li><a href="{{route('setLang','ar')}}">{{ __("messages.Arabic") }}</a></li>
              <li><a href="{{route('setLang','en')}}">{{ __("messages.English") }}</a></li>
              <li><a href="{{route('setLang','de')}}">{{ __("messages.German") }}</a></li>
              <li><a href="{{route('setLang','fr')}}">{{ __("messages.France") }}</a></li>
            </ul>
          </li>

          <li><a class="getstarted scrollto" href="#about">تعرف اكثر</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    

    </div>
  </header>

          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}