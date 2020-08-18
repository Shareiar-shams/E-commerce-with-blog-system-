<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block">
        <div class="input-group">
          <button type="button" name="search" id="search-btn" class="btn btn-flat">
            <i class="mdi mdi-magnify"></i>
          </button>
          <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc."
            autofocus autocomplete="off" />
        </div>
        <div id="search-results-container">
          <ul id="search-results"></ul>
        </div>
      </div>

      <div class="navbar-right ">
        <ul class="nav navbar-nav">
          <!-- User Account -->
          <li class="nav-item dropdown user-menu">
            <button  class="dropdown-toggle nav-link" data-toggle="dropdown">
              @if($user->image != 'noimage.jpg')
                <img src="{{Storage::disk('local')->url($user->image)}}" class="user-image" alt="User Image" />
              @else
                <img src="{{asset('admin/dist/img/avatar04.png')}}" class="user-image" alt="User Image" />
              @endif
              <span class="d-none d-lg-inline-block">{{$user->name}}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">

              <li>
                <a href="{{route('myprofile',$user->slug)}}">
                  <i class="mdi mdi-account"></i> My Profile
                </a>
              </li>

              <li class="dropdown-footer">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('LogOut') }}
                </a>
                

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>

              <li>
                <a href="{{route('shop')}}">
                  <i class="mdi mdi-account"></i> Back to Shop
                </a>
              </li>

            </ul>
          </li>
        </ul>
      </div>
    </nav>


</header>