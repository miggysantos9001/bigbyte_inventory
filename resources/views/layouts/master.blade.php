<!doctype html>
<html class="fixed sidebar-light">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Online Ordering System | Powered By BigByte</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/animate/animate.compat.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/font-awesome/css/all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/boxicons/css/boxicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/magnific-popup/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/jquery-ui/jquery-ui.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/jquery-ui/jquery-ui.theme.css') }}" />
        <!-- <link rel="stylesheet" href="{{ asset('public/assets/vendor/select2/css/select2.css') }}" /> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/morris/morris.css') }}" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('public/assets/css/theme.css') }}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('public/assets/css/skins/default.css') }}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">

        <!-- Head Libs -->
        <script src="{{ asset('public/assets/vendor/modernizr/modernizr.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
        <style type="text/css">
            .style1{
                color: blue; 
                font-weight: bolder; 
                text-transform: uppercase;
            }
            .select2-container .select2-choice, .select2-result-label {
              font-size: 1.5em;
              height: 41px; 
              overflow: auto;
            }

            .select2-arrow, .select2-chosen {
              padding-top: 6px;
            }

            .btn{
                border-radius: 0;
            }

            .select2-close-mask{
                z-index: 2099;
            }
            .select2-dropdown{
                z-index: 3051;
            }

        </style>
    </head>
    <body class="loading-overlay-showing" data-loading-overlay>
        <div class="loading-overlay">
            <div class="bounce-loader">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <section class="body">

            <!-- start: header -->
            @include('layouts.partials.nav')
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                @include('layouts.partials.aside')
                <!-- end: sidebar -->
                @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
                @yield('content')
                @stack('modals')
            </div>
        </section>

        <!-- Vendor -->
        <script src="{{ asset('public/assets/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/popper/umd/popper.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/common/common.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

        <!-- Specific Page Vendor -->
        <script src="{{ asset('public/assets/vendor/jquery-ui/jquery-ui.js') }}"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <!-- <script src="{{ asset('public/assets/vendor/select2/js/select2.js') }}"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
        <script src="{{ asset('public/assets/vendor/bootstrapv5-multiselect/js/bootstrap-multiselect.js') }}"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('public/assets/js/theme.js') }}"></script>

        <!-- Theme Custom -->
        <script src="{{ asset('public/assets/js/custom.js') }}"></script>

        <!-- Theme Initialization Files -->
        <script src="{{ asset('public/assets/js/theme.init.js') }}"></script>

        <!-- Examples -->
        <script src="{{ asset('public/assets/js/examples/examples.dashboard.js') }}"></script>
        <script src="{{ asset('public/assets/js/examples/examples.advanced.form.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script>
            $('.select2').select2({
                //theme:'bootstrap-5',
            });
            $('#myTable').DataTable();
        </script>
        <script type="text/javascript">
            jQuery(function($){
                $('.mask-date').mask('9999-99-99');
                $('.mask-school-year').mask('9999-9999');
            });
        </script>
        @stack('js')
    </body>
</html>