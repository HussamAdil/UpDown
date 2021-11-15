@include('layouts.head')
@include('layouts.nav')
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            @yield('content')
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@include('layouts.footer')
