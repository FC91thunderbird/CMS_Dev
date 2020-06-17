 <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <ul>
                       
                        <div class="logo"><a href="home"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Admin Dashboard</span></a></div>
                         <li class="label">Main</li>
                        <li><a href="home">Dashboard</a></li>
                        

                        <li class="label">News</li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-user"></i>See All Features  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="crud">Category</a></li>
                                <li><a href="cat">Add Products</a></li>
                                <li><a href="menu">Add Menus</a></li>
                                <li><a href="test">Test</a></li>
                          </ul>
                        </li>
                        <li class="label">Extra</li>
                         @foreach($side as $menus)
                        <li><a href="{{ $menus->link }}"><i class="{{ $menus->icon }}"></i>{{ $menus->menu_name }}</a></li>
                        @endforeach
                        <li><a><i class="ti-close"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>


         <!-- /# sidebar -->
        <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <div class="float-right">
                        
                        
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">{{ ucfirst( Auth::user()->name) }}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="ti-power-off"></i>Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                            </li>                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>{{ config('app.name') }}</span></h1>

                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                    </div>