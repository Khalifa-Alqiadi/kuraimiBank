@extends('front.layout.home')
@section('title')
    {{__('main.homePage.Home')}}
@endsection
@section('content')
<section class="service  about-hero">
    <div class="container hv-100 d-flex align-items-center relative">
        <img src="{{asset('images/pexels-chepté-cormani-1416530.png')}}" alt="" class="w-100 h-100 absolute background-image">
        <div class="row h-100  align-items-center relative">
            <div class="col mt-5 info d-flex flex-column align-items-center">
                <p class="mt-3 mb-1 fs-6 text-white w-100">التمويل/مشروعي</p>
            </div>
        </div>
    </div>
</section>
<section class="about-bank bg-white about-info">
    <div class="container d-flex flex-column align-items-center">
        <div class="items-info bg-white w-90 d-flex flex-column align-items-center">
            <div class="item w-80 ">
                <h1 class="fs-4 relative mb-0">مجلس الإدارة</h1>
                <p class="w-50">
                    تواصل معنا بالطريقة التي تناسبك، نحن هنا لخدمتك
                </p>
                <div class="row w-100 row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <div class="col p-3 d-flex">
                        <div class="icons d-flex relative me-1">
                            <img src="{{asset('images/Rectangle 991.png')}}" alt="" class="w-100 h-60">
                            <img src="{{asset('pic/Layer 58.png')}}" alt="" class="absolute w-100 h-60">
                            <div class="num absolute w-100 h-60 d-flex align-items-center justify-center">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-second-color fs-6">تواصل معنا</h1>
                            <p class="mt-0 mb-0">967 1 503888 : تلفون</p>
                            <p class="mt-0 mb-0">967 1 435400 : فاكس</p>
                            <p class="mt-0 mb-0">الرقم المجاني : 8008800</p>
                            <p class="mt-0 mb-0">صندوق بريد : 19357</p>
                        </div>
                    </div>
                    <div class="col p-3 d-flex">
                        <div class="icons d-flex relative me-1">
                            <img src="{{asset('images/Rectangle 991.png')}}" alt="" class="w-100 h-60">
                            <img src="{{asset('pic/Layer 58.png')}}" alt="" class="absolute w-100 h-60">
                            <div class="num absolute w-100 h-60 d-flex align-items-center justify-center">
                                <i class="fa-regular fa-envelope text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-second-color fs-6"> راسلنا على البريد الالكتروني</h1>
                            <p class="mt-0 mb-0 fs-6">CS@kuraimibank.com</p>
                        </div>
                    </div>
                    <div class="col p-3 d-flex">
                        <div class="icons d-flex relative me-1">
                            <img src="{{asset('images/Rectangle 991.png')}}" alt="" class="w-100 h-60">
                            <img src="{{asset('pic/Layer 58.png')}}" alt="" class="absolute w-100 h-60">
                            <div class="num absolute w-100 h-60 d-flex align-items-center justify-center">
                                <i class="fa fa-location-dot text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-second-color fs-6">نقاط تواجدنا</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item w-80">
                <h2 class="fs-4 me-2 text-center font-family-arabic">كيف يمكننا مساعدك؟</h2>
                <form action="" class="w-100">
                    <div class="col-md-12 d-flex flex-column">
                        <label for="">الاسم</label>
                        <input type="text" class="form-control" placeholder="خليفة">
                    </div>
                    <div class="col-md-12 d-flex flex-column">
                        <label for="">التلفون</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-12 d-flex flex-column">
                        <label for="">البريد الالكتروني</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-12 d-flex flex-column">
                        <label for="">الرسالة</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-12 d-flex align-items-center justify-center">
                        <button class="mt-5 fw-bold btn-main bg-second-color text-white fw-bold">ارسال</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection