
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>CSIR <i>NAL</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        @if (Auth::user()->is_admin == 2)
          <li class="br-menu-item">
            <a href="{{url('/dashboard')}}" class="br-menu-link {{ request()->is('dashboard*') ? 'active' : '' }}">
              <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
              <span class="menu-item-label">Home</span>
            </a><!-- br-menu-link -->
          </li><!-- br-menu-item -->
          <li class="br-menu-item">
            @php
                $id = Auth::user()->id;
            @endphp
            <a href='{{url("/item-lists/$id")}}' class="br-menu-link {{ request()->is('item-lists*') ? 'active' : '' }}">
              <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
              <span class="menu-item-label">Register Equipement List</span>
            </a><!-- br-menu-link -->
          </li><!-- br-menu-item -->
          <li class="br-menu-item">
            <a href=" {{url('/closed-tickets')}}" class="br-menu-link {{ request()->is('closed-tickets*') ? 'active' : '' }}">
              <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
              <span class="menu-item-label">Closed Ticket</span>
            </a><!-- br-menu-link -->
          </li><!-- br-menu-item -->
        @endif
        @if (Auth::user()->is_admin != 2)
        <li class="br-menu-item">
          <a href="{{url('/adhome')}}" class="br-menu-link {{ request()->is('adhome*') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Home</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        @if (Auth::user()->is_admin == 0)
            <li class="br-menu-item">
            <a href=" {{url('/emplist')}}" class="br-menu-link {{ request()->is('emplist*') ? 'active' : '' }}">
              <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
              <span class="menu-item-label">Employee List</span>
            </a><!-- br-menu-link -->
          </li><!-- br-menu-item -->
        @endif
        @if (Auth::user()->is_admin == 0)
        <li class="br-menu-item">
        <a href=" {{url('/editUserRegi')}}" class="br-menu-link {{ request()->is('editUserRegi*') ? 'active' : '' }}">
          <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
          <span class="menu-item-label">Forms Control</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
    @endif
         <li class="br-menu-item">
          <a href=" {{url('/amcrequirelist')}}" class="br-menu-link {{ request()->is('amcrequirelist*') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">AMC Requirment List</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

         <li class="br-menu-item">
          <a href=" {{url('/amclist')}}" class="br-menu-link {{ request()->is('amclist*') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">AMC List</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href=" {{url('/forwardlist')}}" class="br-menu-link {{ request()->is('forwardlist*') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Ticket Forward List</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href=" {{url('/all-closed-tickets')}}" class="br-menu-link {{ request()->is('all-closed-tickets*') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Closed Ticket</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

      @endif
      </ul><!-- br-sideleft-menu -->
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->