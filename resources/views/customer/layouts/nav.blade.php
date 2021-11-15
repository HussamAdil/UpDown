 <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ sidebar menu ] start -->
    @include('customer.layouts.sidebar')
    <!-- [ sidebar menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">AfroZon</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
    
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">
                            <i class="icon feather @if(count($notificationInvitations) > 0) {{'text-c-red'}} @endif icon-bell"></i>
                            @if(count($notificationInvitations) > 0)
                              {{ count($notificationInvitations) }}
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Invitation</h6>
                              
                            </div>
                            <ul class="noti-body">
                                @foreach ($notificationInvitations as $invitation)
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{asset('dashboard-assets/images/user/avatar-1.jpg')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a><strong>{{$invitation->user->name}}</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>{{$invitation->created_at->diffForHumans()}}</span></a>
                                        <a class="d-block" href="{{route('customer.invitation.show' , $invitation->id)}}"> invite you to join  {{$invitation->team->name}} team
                                            </a>
                                        </div>
                                    </div>
                                </li>      
                                @endforeach
                              
                           
                            </ul>
                           
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{asset('dashboard-assets/images/user/avatar-1.jpg')}}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ auth()->user()->name}}</span>
                            </div>
                            <ul class="pro-body">
                                <li>
                                    <a href="{{route('customer.membership.index')}}"   class="dropdown-item" >
                                        <i class="feather icon-package"></i>
                                        Membership</a>
                                </li>
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a  href="{{ route('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->