<div class="br-header">
  <div class="br-header-left">
    <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
    <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
  </div><!-- br-header-left -->
  <div class="br-header-right">
    <nav class="nav">
      <div class="dropdown show">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown" aria-expanded="true">
          <span class="logged-name hidden-md-down">{{Auth::user()->name}}</span>
          <img src="{{asset('public/storage/image/img2.jpg')}}" class="wd-32 rounded-circle" alt="">
          <span class="square-10 bg-success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-250 show" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
          <ul class="list-unstyled user-profile-nav">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <li><button type="submit"><i class="icon ion-power"></i> Sign Out</button></li>
            </form>
          </ul>
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </nav>
  </div><!-- br-header-right -->
</div>