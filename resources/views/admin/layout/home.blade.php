<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/adminDashboard.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light main-color">
        <div class="container d-flex justify-content-between">
            {{-- <a class="navbar-brand" href="dashboard.php">Home</a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    khalifa
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="">Visit Shop</a></li>
                        <li>
                            <a class="dropdown-item" href="">
                                khalifa
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><a class="dropdown-item" href=""></a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex justfiy-content-center container-fuild">
        <div class="col-md-2 main-color  vh-100">
            <ul class="p-2 mt-5 d-flex justify-content-center flex-column">
                <li class="p-2 me-3"><a class="text-white fs-5" href="">الرئيسية</a></li>
                <li class="p-2 me-3"><a class="text-white fs-5" href="{{route('categories_admin')}}">ادارة التصنيفات</a></li>
                <li class="p-2 me-3"><a class="text-white fs-5" href="{{route('usersAdminManage')}}">ادارة المستخدم</a></li>
                <li class="p-2 me-3"><a class="text-white fs-5" href="">ادارة المستخدم</a></li>
                <li class="p-2 me-3"><a class="text-white fs-5" href="">ادارة المستخدم</a></li>
                <li class="p-2 me-3"><a class="text-white fs-5" href="">ادارة المستخدم</a></li>
                <li class="p-2 me-3"><a class="text-white fs-5" href="">ادارة المستخدم</a></li>
            </ul>
        </div>
        <div class="col-md-10 mt-5 d-flex flex-column ">
            @yield('content')
        </div>
    </div>
    <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script>
    {{-- <script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script> --}}
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>