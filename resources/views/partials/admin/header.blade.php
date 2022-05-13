<header class="navbar pcoded-header navbar-expand-sm">
    <a class="mobile-menu" id="mobile-header" href="{{url('/')}}">
      <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">

      <ul class="navbar-nav ml-auto">
        <!-- <li class="mr-5">
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Session: <i class="icon icon-calendar"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <ul class="pro-body">
                <li><a href="#" class="dropdown-item">2019 - 2020</a></li>
                <li><a href="#" class="dropdown-item">2020 - 2021</a></li>
              </ul>
            </div>
          </div>
        </li> -->
        <li>
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="icon icon-settings"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head bg-primary text-white">
                <span class="user-img"><i class="fa fa-user h1"></i></span>
                <span>Admin</span>
                <!-- <a href="{{url('/logout')}}" class="dud-logout" title="Logout">
                  <i class="icon icon-logout"></i>
                </a> -->
                <a href="{{ url('admin/logoutadmin') }}"
                    class="dud-logout" title="Logout">
                    <i class="icon icon-logout"></i>
                </a>
                 </div>
              <!--ul class="pro-body">
                <li><a href="javascript:;" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                <li><a href="javascript:;" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
              </ul-->
            </div>
          </div>
        </li>
      </ul>
    </div>
  </header>