  <div class="left-side-bar">
      <div class="brand-logo">
          <a href="index.html">
              <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
              <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
          </a>
          <div class="close-sidebar" data-toggle="left-sidebar-close">
              <i class="ion-close-round"></i>
          </div>
      </div>
      <div class="menu-block customscroll">
          <div class="sidebar-menu">
              <ul id="accordion-menu">
                  <li class="dropdown">
                      <a href="{{route('dashboard')}}" class="dropdown-toggle no-arrow pl-3">
                          <span class="fa fa-home"></span>
                          <span class="mtext px-2">Home</span>
                      </a>
                  </li>
                  <li class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle pl-2">
                          <span class="fa fa-user px-2"></span><span class="mtext">Users</span>
                      </a>
                      <ul class="submenu">
                          <li><a href="{{route('users')}}">All users</a></li>
                          <li><a href="{{route('users.create')}}">Add new user</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </div>
