<header class="header" style="width: 100%">
    <div class="header-left">
    </div>
    <div class="header-right">
        <div class="user-notification">
            <div class="dropdown">
                <a id="notification-button" class="dropdown-toggle no-arrow" href="#" role="button"
                    data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span id="notification-active" class="badge notification-active" style="display: none;"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul id="notifications">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{asset("vendors/images/photo1.jpg")}}" alt="" />
                    </span>
                    {{-- <span class="user-name">{{auth()->user()->name}}</span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</header>
