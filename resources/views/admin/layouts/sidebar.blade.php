<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> Howdy Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('addCategory') }}" class="nav-link {{ request()->is('admin/add-category') ? 'active' : '' }}">
                <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Category
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('addFeatureAmenities') }}" class="nav-link {{ request()->is('admin/add-featureAmenities') ? 'active' : '' }}">
                <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Feature and Amenities
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('addProperty') }}" class="nav-link {{ request()->is('admin/add-property') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Property
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('property') }}" class="nav-link {{ request()->is('admin/properties') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
              <p>
            Properties
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Add
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('property_attribute')}}" class="nav-link {{ request()->is('admin/add-property-attributes') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Property Attribute</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addCity')}}"  class="nav-link {{ request()->is('admin/add-city') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>City </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addPostUser')}}"  class="nav-link {{ request()->is('admin/add-post-user') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Post User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addTestimonial')}}"  class="nav-link {{ request()->is('admin/add-testimonial') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonial </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('getService') }}" class="nav-link {{ request()->is('admin/service/add-service') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add Services</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-church"></i>
              <p>
               Market Trends
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('getNews') }}" class="nav-link {{ request()->is('admin/market-trend/News') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('getMedia') }}" class="nav-link {{ request()->is('admin/market-trend/media') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('getBlog') }}" class="nav-link {{ request()->is('admin/market-trend/blog') ? 'active' : '' }}"">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('getInsight') }}" class="nav-link {{ request()->is('admin/market-trend/insight') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insight</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
              <p>
               About
               <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('getCompanyProfile') }}" class="nav-link {{ request()->is('admin/about/add-profile') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Company Profile</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('getCompanyMessageCeo') }}" class="nav-link {{ request()->is('admin/about/ceo-message') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ceo Message</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('getCompanyMessageChairman') }}" class="nav-link {{ request()->is('admin/about/chairman-message') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chairman Message</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('addCorporateTeam') }}" class="nav-link {{ request()->is('admin/about/add-corporate-team') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Corporate Team</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('inquiryData') }}" class="nav-link {{ request()->is('admin/inquiryData') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tree"></i>
              <p>
           Inquiries
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('addFaq') }}" class="nav-link {{ request()->is('admin/faq/add-faq') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tree"></i>
              <p>
           Faq
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
