<nav id="sidebar" class="active">
    <div class="sidebar-header">
      <span>Bill</span>
      <button type="button" id="sidebarCollapse" class="btn text-sidebar position-absolute">
        <i class="icon icon-arrow-right"></i>
        <span></span>
      </button>
    </div>

    <ul class="list-unstyled components">

      <li class="{{ Route::is('home') ? 'active' : '' }}">
        <a href="{{url('/admin/dashboard')}}"> <i class="fa fa-dashboard"></i> <span class="menu-text">Dashboard</span></a>
      </li>
        <li>
        <a href="{{url('/admin/editprofile')}}"> <i class="fa fa-print"></i><span class="menu-text">Edit Profile </span></a>
      </li>
     <li>
        <a href="{{url('/admin/userslist')}}"> <i class="fa fa-print"></i><span class="menu-text">Users</span></a>
      </li>
      <li>
        <a href="{{url('/admin/units')}}"> <i class="fa fa-print"></i><span class="menu-text">Units </span></a>
      </li>
        <li>
        <a href="{{url('/admin/state')}}"> <i class="fa fa-print"></i><span class="menu-text">State </span></a>
      </li>
 
    </ul>
  </nav>