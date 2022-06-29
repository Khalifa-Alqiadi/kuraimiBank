<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="{{str_replace('-','-', app()->getLocale())}}" class="light-style layout-navbar-fixed layout-menu-fixed " dir="{{config('locales.languages')[app()->getLocale()]['rtl_support']}}" data-theme="theme-semi-dark" data-assets-path="../../assets/" data-template="vertical-menu-template-semi-dark">

  
<!--  , Sat, 26 Mar 2022 16:44:24 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - CRM | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/rtl/theme-semi-dark.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('css/main.css')}}" />

    <!-- Page CSS -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- Helpers -->
    <script src="{{ URL::asset('assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.  -->
    <script src="{{ URL::asset('assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ URL::asset('assets/js/config.js')}}"></script>

    @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')
      <link rel="stylesheet" href="{{URL::asset('css/bootstrap-rtl.css')}}">
        
    @endif
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script  src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

    <style>
      body{
        width:100vw;
        background-repeat: repeat-x;
        background-size: 100%;
        background-image: url({{asset('images/header-bg.png')}});  
      }
      .menu-theme{
        background-color: #342a4a;
      }
      .text-color{
        color: #342a4a;
      }
    </style>

</head>

<body>

  <div class="row">
    <div class="col-12">
      <div class="card bg-transparent border-0">
        
        <div class="card-body">
          
          <div class="d-flex align-items-center justify-content-center h-px-700">
            
            <form class="w-px-500   bg-white border shadow rounded p-3 p-md-5" action="{{route('login-save')}}" method="POST">
              @csrf
              <h3 class="card-header text-color mb-3 text-center">{{__('main.login.Name')}}</h3>
              <div class="row">
                <div class="mb-5">
                  <label class="col-sm-12 col-form-label fs-6 text-color" for="form-alignment-username">{{__('main.login.Email')}}</label>
                  <div class="col-sm-12">
                    <input type="email"  name="email" class="  form-control" placeholder="john.doe" />
                  </div>
                  @error('email')
                    <div class="text-danger col-md-12">{{$message}}</div>
                  @enderror
                </div>
                
                <div class="mb-5 form-password-toggle">
                  <label class="col-sm-12 col-form-label fs-6 text-color" >{{__('main.login.Password')}}</label>
                  <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                      <input type="password" name="password" class="  form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="form-alignment-password2" />
                      <span class="input-group-text cursor-pointer" id="form-alignment-password2"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                      <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="d-grid  ">
                <input type="submit" class="menu-theme text-white btn btn-primary" value="{{__('main.login.Name')}}">
              </div>
            </form>
          </div>
        </div>
    </div>
    </div>
  </div>



    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ URL::asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    
    <script src="{{ URL::asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/libs/select2/select2.js')}}"></script>
    
    <script src="{{ URL::asset('assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->
  
    <!-- Vendors JS -->
    <script src="{{ URL::asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
  
    <!-- Main JS -->
    <script src="{{ URL::asset('assets/js/main.js')}}"></script>
  
    <!-- Page JS -->
    <script src="{{ URL::asset('assets/js/dashboards-crm.js')}}"></script>
    {{-- <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src={{ asset('js/app.js')}}></script>
    <script src="{{asset('js/axios.js')}}"></script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnmKDP1HHCNnioa2SwC6xA1Rwf2GkaC7s&callback=initMap"
          ></script>
@stack('scripts_after')
@yield('script')
</body>
</html>