<!DOCTYPE html>

@php
  use App\Models\WebsiteInfo;
  $listInfo = WebsiteInfo::latest()->get();
@endphp
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
    {{-- <script src="{{ URL::asset('assets/vendor/js/template-customizer.js')}}"></script> --}}
    {{-- @include('script.template-customizer') --}}
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
      .content-wrapper{
        width:100vw;
        background-repeat: repeat-x;
        /* background-size: 100%; */
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

  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">

    
    




<!-- Menu -->
  
<aside id="layout-menu" class="layout-menu menu-vertical menu menu-theme">

  
  <div class="app-brand demo ">
    <a href="index-2.html" class="app-brand-link">

      <img src="{{asset('images/logo.svg')}}" alt="">
      <span  class="text-white app-brand-text demo fs-4 menu-text fw-bold ms-2">بنك الكريمي</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  
  
  <ul class="menu-inner py-1">
    {{-- @if (Auth::user()->hasPermission('manage_website')) --}}
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div class="" data-i18n="{{__('main.categories.Name')}}">{{__('categories.Categories')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('categories_admin')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.categories.Name')}}">{{__('main.categories.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{config('locales.languages')[app()->getLocale()]['name']}}">{{config('locales.languages')[app()->getLocale()]['name']}}</div>
        </a>
        <ul class="menu-sub text-white">
          @foreach (config('locales.languages') as $key => $val)
          <li class="menu-item">
            @if ($key != app()->getLocale())
            <a href="{{route('change-language', $key)}}" class="dropdown-item text-white">{{$val['name']}}</a>
            @endif
          </li>
          @endforeach
        </ul>
      </li>
      <!-- Charts & Maps -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('users.Users')}}">{{__('users.Users')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item ">
            <a href="{{route('usersAdminManage')}}" class="menu-link text-white">
              <div data-i18n="{{__('users.User_Title')}}">{{__('users.User_Title')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Charts & Maps -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.countries.Name')}}">{{__('main.countries.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('countriesAdmin')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.countries.Name')}}">{{__('main.countries.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Charts & Maps -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.cities.Name')}}">{{__('main.cities.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="Api-Cities" class="menu-link text-white">
              <div data-i18n="{{__('main.cities.Name')}}">{{__('main.cities.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Charts & Maps -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.service_point.name')}}">{{__('main.service_point.name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('service-points')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.service_point.name')}}">{{__('main.service_point.name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      
      <!-- Charts & Maps -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.services.Name')}}">{{__('main.services.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="Show-Services" class="menu-link text-white">
              <div data-i18n="{{__('main.services.Name')}}">{{__('main.services.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Charts & Maps -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.exchange_rate.Name')}}">{{__('main.exchange_rate.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item text-white">
            <a href="Show-exchange-rate" class="menu-link">
              <div data-i18n="{{__('main.exchange_rate.Name')}}">{{__('main.exchange_rate.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Charts & Maps -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.jobs.Name')}}">{{__('main.jobs.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('show-jobs')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.jobs.Name')}}">{{__('main.jobs.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.news.Name')}}">{{__('main.news.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('show-news')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.news.Name')}}">{{__('main.news.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart "></i>
          <div data-i18n="{{__('main.website.Name')}}">{{__('main.website.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('show-control-info')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.website.Control')}}">{{__('main.website.Control')}}</div>
            </a>
          </li>
          @foreach ($listInfo as $list)
            <li class="menu-item">
              <a href="show-info/{{$list->id}}" class="menu-link text-white">
                <div data-i18n="{{$list->key}}">{{$list->key}}</div>
              </a>
            </li>
          @endforeach
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.social_media.Name')}}">{{__('main.social_media.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('show-social_media')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.social_media.Name')}}">{{__('main.social_media.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.partners.Name')}}">{{__('main.partners.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('our_partners')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.partners.Name')}}">{{__('main.partners.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.reports.Name')}}">{{__('main.reports.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('financial-reports')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.reports.Name')}}">{{__('main.reports.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.permissions.Name')}}">{{__('main.permissions.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('show-permission')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.permissions.Name')}}">{{__('main.permissions.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.applications.Name')}}">{{__('main.applications.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('admin-applications')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.applications.Name')}}">{{__('main.applications.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.services_numbers.Name')}}">{{__('main.services_numbers.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('services-numbers')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.services_numbers.Name')}}">{{__('main.services_numbers.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
          <i class="menu-icon tf-icons bx bx-chart"></i>
          <div data-i18n="{{__('main.successStories.Name')}}">{{__('main.successStories.Name')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('success-stories-admin')}}" class="menu-link text-white">
              <div data-i18n="{{__('main.successStories.Name')}}">{{__('main.successStories.Name')}}</div>
            </a>
          </li>
        </ul>
      </li>
  </ul>
  
  

</aside>
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->




<nav  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        
        <!-- Search -->
        <div class="navbar-nav align-items-center">
          <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
              <i class="bx bx-search bx-sm"></i>
              <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
            </a>
          </div>
        </div>
        <!-- /Search -->
        


        

        <ul class="navbar-nav flex-row align-items-center ms-auto">

          <!-- Notification -->
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class="bx bx-bell bx-sm"></i>
              <span class="badge bg-danger rounded-pill badge-notifications">5</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-footer border-top">
                <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
                  View all notifications
                </a>
              </li>
            </ul>
          </li>
          <!--/ Notification -->
          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block">John Doe</span>
                      <small class="text-muted">Admin</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('logout')}}">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>
      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
      </div>
  </nav>
<!-- / Navbar -->

      

      <!-- Content wrapper -->
      <div class="content-wrapper" >

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')

  <!-- / Footer -->
  
            
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
  
      
      
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      
      
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
      
    </div>
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
  