@include('customer.layouts.head')
@include('customer.layouts.nav')
<div class="pcoded-main-container">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                @include('sweetalert::alert')
                <!-- [ breadcrumb ] start -->
 <div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
             @yield('content')
     </div>
</div>
</div>
</div>
</div>
</div>
@include('customer.layouts.footer')
