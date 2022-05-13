<nav id="sidebar" class="active">
    <div class="sidebar-header">
    <span><img src="{{ asset('images/logo-svg.svg') }}"></span>
    <button type="button" id="sidebarCollapse" class="btn text-sidebar position-absolute">
      <i class="icon icon-arrow-right"></i>
      <span></span>
    </button>
    </div>

    <ul class="list-unstyled components">

<li class="default-btn">
  <a href="{{url('/sale-invoice/create')}}"> <i class="fa fa-receipt"></i> <span class="menu-text">New
      Invoice</span></a>
</li>
<li class="{{ Request::is('sale-invoice','sale-invoice/*') ? 'active main-menus-item' : 'main-menus-item' }}">
  <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i
      class="fa fa-print"></i><span class="menu-text">All Invoices</span></a>
  <ul class="collapse list-unstyled submenu" id="pageSubmenu1">
    <li>
      <a href="{{url('/sale-invoice')}}">Sale Invoices</a>
    </li>
    <li>
      <a href="{{url('/purchase-invoice')}}">Purchase Invoices</a>
    </li>
  </ul>
</li>
<li>
  <hr />
</li>
<!--<li class="main-menus-item">
  <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i
      class="fa fa-plus-circle"></i><span class="menu-text">Create</span></a>
  <ul class="collapse list-unstyled submenu" id="pageSubmenu2">
    <li>
      <a href="{{url('/purchase-invoice/create')}}">Purchase Invoice</a>
    </li>
    <li>
      <a href="{{url('/sale-invoice/create')}}">Sale Invoice</a>
    </li>-->
    <!-- <li>
      <a href="#">Estimate/Quotation</a>
    </li>
    <li>
      <a href="#">Purchase Order</a>
    </li>
    <li>
      <a href="#">Delivery challan</a>
    </li> -->
   <!-- <li>
      <hr />
    </li>
    <li>
      <a href="{{url('/sale-receipt/create')}}">Sale Receipt</a>
    </li>
    <li>
      <a href="{{url('/purchase-receipt/create')}}">Purchase Receipt </a>
    </li>
    <li>
      <hr />
    </li>
    <li>
      <a href="{{url('/customers/create')}}">Customer/Vendor</a>
    </li>
    <li>
      <a href="{{url('/products/create')}}">Product</a>
    </li>
    <li>
      <a href="{{url('/transports/create')}}">Transport</a>
    </li>
    <li>
      <a href="{{url('/transportcharge/create')}}">Transport Charge</a>
    </li> 
  </ul>
</li>-->
<li class="main-menus-item">
  <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i
      class="fa fa-print"></i><span class="menu-text">View</span></a>
  <ul class="collapse list-unstyled submenu" id="pageSubmenu3">
  <li>
      <a href="{{url('/purchase-invoice')}}">Purchase Invoice</a>
    </li>
    <li>
      <a href="{{url('/sale-invoice')}}">Sale Invoice</a>
    </li>
    <li>
      <hr />
    </li>
    <li>
      <a href="{{url('/customers')}}">Customer/Vendor</a>
    </li>
    <li>
      <a href="{{url('/products')}}">Product</a>
    </li>
    <li>
      <a href="{{url('/transports')}}">Transport</a>
    </li>
    <!-- <li>
      <a href="{{url('/transportcharge')}}">Transport Charge</a>
    </li> -->
  </ul>
</li>
<li class="main-menus-item">
  <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i
      class="fa fa-rupee-sign"></i><span class="menu-text">Payments</span></a>
  <ul class="collapse list-unstyled submenu" id="pageSubmenu4">
    <li>
      <a href="{{url('/sale-receipt')}}">Inward Payment<small class="text-muted">(On Sales)</small></a>
    </li>
    <li>
      <a href="{{url('/purchase-receipt')}}">Outward Payment<small class="text-muted">(On Purchase)</small></a>
    </li>
  </ul>
</li>
<li>
  <hr />
</li>
<li>
  <a href="{{url('/')}}"> <i class="fa fa-chart-bar"></i><span class="menu-text">Analytics</span></a>
</li>
<li  class="main-menus-item">
  <a  href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-cog"></i><span class="menu-text">Settings</span></a>
  <ul class="collapse list-unstyled submenu" id="pageSubmenu5">
    <li>
      <a href="{{url('admin-details')}}">Admin </a>
    </li>
    <li>
      <a href="{{url('/business-detail')}}">Business Details</a>
    </li>
    <li>
        <a href="{{url('/invoice-setting')}}">Invoice</a>
    </li>
  </ul>
</li>


</ul>
<div class="userbar">
<div class="logout-sec"><i class="fa fa-user-circle"></i><span>
    <p class="username">{{ Auth::user()->name }}</p><small>Lifetime free plan</small>
  </span>
  <div class="logout-hover">
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dud-logout btn btn-danger"
      title="Logout">
      Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</div>
<div class="developedby">
  <p class="text-muted">
    Developed with <i class="fa fa-heart"></i> by:<br>
    River City Corporation
  </p>
</div>

  
  </nav>