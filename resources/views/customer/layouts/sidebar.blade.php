<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-arrow-up"></i>
                </div>
                <span class="b-title"> {{env('APP_NAME')}}</span>
            </a>
         </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                <a href="{{route('customer.dashboard.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
               
                <li  class="nav-item"><a href="{{route('customer.team.index')}}"  class="nav-link  "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Teams</span></a></li>

                <li  class="nav-item"><a href="{{route('customer.link.index')}}"  class="nav-link "><span class="pcoded-micon"><i class="feather icon-link"></i></span><span class="pcoded-mtext">Link</span></a></li>

                <li  class="nav-item"><a href="{{route('customer.invitation.index')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-paper-plane" aria-hidden="true"></i></span><span class="pcoded-mtext"> My Invitations</span></a></li>

                 <li data-username="Maps Google " class="nav-item  "><a 
                    href="{{ route('logout') }}"  onclick="event.preventDefault();
document.getElementById('logout-form').submit();"
                    class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Logout</span></a></li>
            
             </ul>
        </div>
    </div>
</nav>
