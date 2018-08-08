<!-- Header -->
<header id="page-header">
  <!-- Header Content -->
  <div class="content-header">
    <!-- Left Section -->
    <div class="content-header-section">
      <!-- Toggle Sidebar -->
      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
      <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
        <i class="fa fa-bars"></i>
      </button>
      <!-- END Toggle Sidebar -->

      <!-- Open Search Section -->
      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
      <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
              data-action="header_search_on">
        <i class="fa fa-search"></i>
      </button>
      <!-- END Open Search Section -->

      <!-- Layout Options (used just for demonstration) -->
      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-wrench"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="page-header-options-dropdown">
          <h6 class="dropdown-header">Header</h6>
          <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout"
                  data-action="header_fixed_toggle">Fixed Mode
          </button>
          <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10"
                  data-toggle="layout" data-action="header_style_classic">Classic Style
          </button>
          <div class="d-none d-xl-block">
            <h6 class="dropdown-header">Main Content</h6>
            <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout"
                    data-action="content_layout_toggle">Toggle Layout
            </button>
          </div>
        </div>
      </div>
      <!-- END Layout Options -->

      <!-- Color Themes (used just for demonstration) -->
      <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-themes-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-paint-brush"></i>
        </button>
        <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
          <h6 class="dropdown-header text-center">Color Themes</h6>
          <div class="row no-gutters text-center mb-5">
            <div class="col-4 mb-5">
              <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                <i class="fa fa-2x fa-circle"></i>
              </a>
            </div>
            <div class="col-4 mb-5">
              <a class="text-elegance" data-toggle="theme" data-theme="/admin/assets/pages/themes/elegance.css"
                 href="javascript:void(0)">
                <i class="fa fa-2x fa-circle"></i>
              </a>
            </div>
            <div class="col-4 mb-5">
              <a class="text-pulse" data-toggle="theme" data-theme="/admin/assets/pages/themes/pulse.css"
                 href="javascript:void(0)">
                <i class="fa fa-2x fa-circle"></i>
              </a>
            </div>
            <div class="col-4 mb-5">
              <a class="text-flat" data-toggle="theme" data-theme="/admin/assets/pages/themes/flat.css"
                 href="javascript:void(0)">
                <i class="fa fa-2x fa-circle"></i>
              </a>
            </div>
            <div class="col-4 mb-5">
              <a class="text-corporate" data-toggle="theme" data-theme="/admin/assets/pages/themes/corporate.css"
                 href="javascript:void(0)">
                <i class="fa fa-2x fa-circle"></i>
              </a>
            </div>
            <div class="col-4 mb-5">
              <a class="text-earth" data-toggle="theme" data-theme="/admin/assets/pages/themes/earth.css"
                 href="javascript:void(0)">
                <i class="fa fa-2x fa-circle"></i>
              </a>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout"
                  data-action="sidebar_style_inverse_toggle">Sidebar Style
          </button>
        </div>
      </div>
      <!-- END Color Themes -->
    </div>
    <!-- END Left Section -->

    <!-- Right Section -->
    <div class="content-header-section">
      <!-- User Dropdown -->
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          J. Smith<i class="fa fa-angle-down ml-5"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
          <!-- Toggle Side Overlay -->
          <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
        @if(config('codebase.inc_side_overlay'))
            <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="si si-wrench mr-5"></i> Settings
            </a>
        @endif
          <!-- END Side Overlay -->

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="javascript:void(0)" onclick="document.querySelector('.js-signOut').submit()">
            <i class="si si-logout mr-5"></i> Sign Out
          </a>
          <form action="{{--route('logout')--}}" hidden class="js-signOut" method="post">
            {{csrf_field()}}
          </form>
        </div>
      </div>
      <!-- END User Dropdown -->

      <!-- Toggle Side Overlay -->
      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
        @if(config('codebase.inc_side_overlay'))
            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                    data-action="side_overlay_toggle">
                <i class="fa fa-tasks"></i>
            </button>
        @endif
      <!-- END Toggle Side Overlay -->
    </div>
    <!-- END Right Section -->
  </div>
  <!-- END Header Content -->

  <!-- Header Search -->
  <div id="page-header-search" class="overlay-header">
    <div class="content-header content-header-fullrow">
      <form action="{{route('admin.index')}}" method="get">
        <div class="input-group">
                    <span class="input-group-btn">
                        <!-- Close Search Section -->
                      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-secondary" data-toggle="layout"
                                data-action="header_search_off">
                            <i class="fa fa-times"></i>
                        </button>
                      <!-- END Close Search Section -->
                    </span>
          <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input"
                 name="page-header-search-input">
          <span class="input-group-btn">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
        </div>
      </form>
    </div>
  </div>
  <!-- END Header Search -->

  <!-- Header Loader -->
  <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
  <div id="page-header-loader" class="overlay-header bg-primary">
    <div class="content-header content-header-fullrow text-center">
      <div class="content-header-item">
        <i class="fa fa-sun-o fa-spin text-white"></i>
      </div>
    </div>
  </div>
  <!-- END Header Loader -->
</header>
<!-- END Header -->
