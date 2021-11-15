@include('layouts.head')

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Login</h3>
                    {{-- <div class="mb-3 text-white" style="background: #ff5858;">
                       <a href="#" class="mt-2 d-block p-2 text-center text-white">
                        <i class="fab fa-google"></i>  Login with Google </a>
                    </div> --}}
                    <div class="mb-3 text-white" style="background: #3d3c3c;" >
                        <a href="{{ route('login-provider','github') }}" class="mt-2 d-block p-2 text-center text-white">
                           <i class="fab fa-github"></i> Login with Github </a>
                    </div>                    
                 </div>
            </div>
        </div>
    </div> 
 
@include('layouts.footer')