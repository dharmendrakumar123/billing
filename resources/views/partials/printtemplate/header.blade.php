<!-- <header class="navbar pcoded-header navbar-expand-sm">
    <a class="mobile-menu" id="mobile-header" href="{{url('/')}}">
      <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">

      <ul class="navbar-nav ml-auto">
        
        <li>
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="icon icon-settings"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head bg-primary text-white">
                <span class="user-img"><i class="fa fa-user-o h1"></i></span>
                <span>Logout</span>
                
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dud-logout" title="Logout">
                    <i class="icon icon-logout"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
              <ul class="pro-body">
                <li><a href="javascript:;" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                <li><a href="javascript:;" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </header> -->