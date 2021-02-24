<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo" style="height: 54px">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="font-weight-bold">EZ</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b class="font-weight-bold">EZ </b><span class="text-yellow-100"> Cosmo</span></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top  py-0 pl-0">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if (Route::has('login'))
            @auth
                {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a> --}}
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a class="dropdown-toggle p-2" data-toggle="dropdown" type="button" id="dropdownMenuButton" aria-expanded="false">
                    <img src="{{asset('images/'. Auth::user()->profile_photo)}}" class="user-image" alt="User Image">
                    <span class="hidden-xs font-weight-bold">{{ Auth::user()->first_name }}</span>
                  </a>
                  <ul class="dropdown-menu" style="top: 45px; right:-10px" aria-labelledby="dropdownMenuButton">
                    <!-- User image -->
                    <li class="user-header dropdown-item">
                      <img src="{{asset('images/'. Auth::user()->profile_photo) }}" class="img-circle m-auto" alt="User Image">
                      <p class="text-white font-bold">
                        {{ Auth::user()->email }}                    
                        <small>Member since {{ Auth::user()->created_at->format('M Y') }}</small>
                      </p>
                    </li>
      
                      <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="" class="btn btn-default btn-sm text-black">Profile</a>
                      </div>
                      <div class="pull-right">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <a href="" onclick="event.preventDefault();this.closest('form').submit();" class="btn btn-default btn-sm text-black">Sign out</a>
                      </form>
                      </div>
                    </li>
                  </ul>
                </li>
            @else
            <div class="sm:block text-sm">
                <a href="{{ route('login') }}" class="mr-2 text text-white text-bold ">Login</a>
                <span class="text-white text-bold">|</span>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-2 text text-white text-bold">Register</a>
                @endif
            </div>
            @endauth
          @endif
        </ul>
      </div>
    </nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview @yield("add")">
          <a href="#">
            <i class="fa fa-plus-square fa-fw"></i> <span>Add</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu">
            <li class="@yield("user")"><a href="{{route('admin.brands.index')}}"><i class="fa fa-user fa-fw"></i> Brands</a></li>
            <li class="@yield("order")"><a href="{{route('admin.lines.index')}}"><i class="fa fa-shopping-cart fa-fw"></i> Lines</a></li>
            <li class="@yield("country")"><a href="{{route('admin.countries.index')}}"><i class="fa fa-globe-africa fa-fw"></i> Country</a></li>
            <li class="@yield("category")"><a href="{{route('admin.categories.index')}}"><i class="fa fa-sitemap fa-fw"></i> Category</a></li>
            <li class="@yield("indication")"><a href="{{route('admin.indications.index')}}"><i class="fa fa-pills fa-fw"></i> Indications</a></li>
            <li class="@yield("ingredient")"><a href="{{route('admin.ingredients.index')}}"><i class="fa fa-pills fa-fw"></i> Ingredients</a></li>
            <li class="@yield("product")"><a href=""><i class="fa fa-pills fa-fw"></i> Product</a></li>
            <li class="@yield("city")"><a href=""><i class="fa fa-city fa-fw"></i> City</a></li>
            <li class="@yield("state")"><a href=""><i class="fa fa-building fa-fw"></i> State</a></li>
          </ul>
        </li>
        <li class="treeview @yield("view")">
          <a href="#">
            <i class="fa fa-eye fa-fw"></i> <span>View</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield("view-user")"><a href=""><i class="fa fa-user fa-fw"></i> Users</a></li>
            <li class="@yield("view-order")"><a href=""><i class="fa fa-shopping-cart fa-fw"></i> Orders</a></li>
            <li class="@yield("view-category")"><a href=""><i class="fa fa-sitemap fa-fw"></i> Categories</a></li>
            <li class="@yield("view-product")"><a href=""><i class="fa fa-pills fa-fw"></i> Products</a></li>
            <li class="@yield("view-country")"><a href=""><i class="fa fa-globe-africa fa-fw"></i> Countries</a></li>
            <li class="@yield("view-city")"><a href=""><i class="fa fa-city fa-fw"></i> Cities</a></li>
            <li class="@yield("view-state")"><a href=""><i class="fa fa-building fa-fw"></i> States</a></li>
          </ul>
        </li>        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
