<header class="header_area">
    <!-- Top Header Area Start -->
    <div class="top_header_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-end">

                <div class="col-12 col-lg-7">
                    <div class="top_single_area d-flex align-items-center">
                        <!-- Logo Area -->
                        <div class="top_logo">
                            @if($logos->logo != 'noimage.jpg')
                             <a href="#"><img src="{{Storage::disk('local')->url($logos->logo)}}" alt=""></a>
                            @else
                            <a href="#"><img src="{{asset('user/img/core-img/logo.png')}}" alt=""></a>
                            @endif
                        </div>
                        <!-- Cart & Menu Area -->
                        @include('user.include.cart-drop')
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Top Header Area End -->
    <div class="main_header_area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 d-md-flex justify-content-between">
                    <!-- Header Social Area -->
                    <div class="header-social-area">
                        <span class="karl-level">Share</span>
                        @foreach($medias as $media)
                        <a href="{{$media->link}}"> <i class="{{$media->fontawsomeicon}}" aria-hidden="true"></i></a>
                        @endforeach
                    </div>
                    <!-- Menu Area -->
                    <div class="main-menu-area">
                        <nav class="navbar navbar-expand-lg align-items-start">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                            <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="{{URL::to('/')}}">Home</a></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                                        <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                            <a class="dropdown-item" href="{{route('shop')}}">Shop</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('blog')}}">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </a>

                                             <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('LogOut') }}
                                                </a>
                                                

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <a class="dropdown-item" href="{{route('User-Dashboard.index',Auth::user()->slug)}}">Dashboard</a>
                                            </div>
                                            
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Help Line -->
                    <div class="help-line">
                        <a href="tel:{{$logos->phoneNo}}"><i class="ti-headphone-alt"></i> {{$logos->phoneNo}}</a>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </header>