<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('titulo','Sistema - Fullstack')</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="Sistema - Fullstack" />
    <meta name="author" content="Fullstack" />
    <meta
        name="description"
        content="Sistema de Ventas en Laravel" />
    <meta
        name="keywords"
        content="Sistema en laravel, Sistema de Ventas" />
    <link rel="shortcut icon" href="{{asset('assets/favicon.ico')}}" type="image/x-icon" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->

    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="../css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="{{asset('css/overlayscrollbars.min.css')}}" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="{{asset('bootstrap-icons-1.13.1/bootstrap-icons.css')}}" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{asset('css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a
                    href="/"
                    class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>FullStack</b></h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Ingresar sus credenciales de acceso</p>
                @if(session('error'))
            </div>
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif
            <form action="{{route('login.post')}}" method="post">
                @csrf
                <div class="input-group mb-1">
                    <div class="form-floating">
                        <input id="loginEmail" type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="" required />
                        <label for="loginEmail">Email</label>
                    </div>
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                </div>
                @error('email')
                <div class="mb-2"><small class="text-danger">{{ $message }}</small></div>
                @enderror
                <div class="input-group mb-1">
                    <div class="form-floating">
                        <input id="loginPassword" type="password" name="password" class="form-control" placeholder="" required />
                        <label for="loginPassword">Password</label>
                    </div>
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                </div>
                @error('password')
                <div class="mb-2"><small class="text-danger">{{ $message }}</small></div>
                @enderror
                <!--begin::Row-->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Acceder</button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>

            <!-- /.social-auth-links -->
            <!--
            <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
            <p class="mb-0">
                <a href="register.html" class="text-center"> Register a new membership </a>
            </p>
            -->
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
        src="{{asset('js/overlayscrollbars.browser.es6.min.js')}}"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
        src="{{asset('js/popper.min.js')}}"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
        src="{{asset('js/bootstrap.min.js')}}"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{asset('js/adminlte.js')}}"></script>
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
</body>
<!--end::Body-->

</html>