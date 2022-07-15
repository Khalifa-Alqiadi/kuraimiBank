@extends('front.layout.home')
@section('title')
    {{__('main.homePage.Home')}}
@endsection
@section('content')
<div class="home relative d-flex justify-end align-items-center">
    <div class="container hero w-100 h-100 d-flex" id="hero-info">
        <div class="hero-info absolute w-100 h-100">
            <h1 class="text-white fs-3 fw-bold m-0 font-family">حساب في كل بيت يمني</h1>
            <p class="text-white font-family fs-5 m-0" >يسهم في التنمية الاقتصادية والاجتماعية</p>
        </div>
        <div class="hero-info absolute w-100 h-100">
            <h1 class="text-white fs-3 fw-bold m-0">حساب في كل بيت</h1>
            <p class="text-white font-family fs-5 m-0" >يسهم في التنمية الاقتصادية والاجتماعية</p>
        </div>
    </div>
    <span class="indicators bottom" id="indicators"></span>
</div>
<section id="rate" class="rate">
    <div class="d-flex align-items-center justify-center">
        <div class="row row-col-sm-2 row-col-md-4 w-80 bg-white p-3 rate-list">
            <div class="col border p-1">
                <div class="d-flex ">
                    <div class="col-md-6">
                        <p class="fw-bold my-0 py-0">دولار امريكي</p>
                    </div>
                    <div class="col-md-2">
                        <p class="my-0 py-0">بيع</p>
                    </div>
                    <div class="col-md-2">
                        <p class="my-0 py-0">شراء</p>
                    </div>
                </div>
                <div class="d-flex" >
                    <div class="col-md-6">
                        <p class="fw-bold my-0 py-0">دولار امريكي</p>
                    </div>
                    <div class="col-md-2">
                        <p class="fs-6 my-0 py-0 text-info">600</p>
                    </div>
                    <div class="col-md-2">
                        <p class="fs-6 my-0 py-0 text-thred-color">550</p>
                    </div>
                </div>
            </div>
            <div class="col border p-1">
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold my-0 py-0">ريال سعودي</p>
                    </div>
                    <div class="col-md-2">
                        <p class="my-0 py-0">بيع</p>
                    </div>
                    <div class="col-md-2">
                        <p class="my-0 py-0">شراء</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold my-0 py-0">ريال سعودي</p>
                    </div>
                    <div class="col-md-2">
                        <p class="fs-6 my-0 py-0 text-info">600</p>
                    </div>
                    <div class="col-md-2">
                        <p class="fs-6 my-0 py-0 text-thred-color">550</p>
                    </div>
                </div>
            </div>
            <div class="col border p-1">
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold my-0 py-0">يورو</p>
                    </div>
                    <div class="col-md-2">
                        <p class="my-0 py-0">بيع</p>
                    </div>
                    <div class="col-md-2">
                        <p class="my-0 py-0">شراء</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold my-0 py-0">يورو</p>
                    </div>
                    <div class="col-md-2">
                        <p class="fs-6 my-0 py-0 text-info">550</p>
                    </div>
                    <div class="col-md-2">
                        <p class="fs-6 my-0 py-0 text-thred-color">550</p>
                    </div>
                </div>
            </div>
            <div class="col w-10 d-flex align-items-center justify-center ">
                <button class="text-second-color border-second-color bg-transparent py-1 px-2 fw-bold">تحويل العملات</button>
            </div>
        </div>
    </div>
    
    {{-- <img src="{{asset('images/header-bg.png')}}" alt="" class="w-100"> --}}
</section>
<section class="services mb-3 relative mt-2 d-flex flex-column align-items-center">
    <h1 class="text-center text-second-color fs-4">خدمات تهتم بك</h1>
    <div class="w-80">
        <ul class="d-flex justify-between w-100">
            <li class="dot pointer" onclick="currentSlide(1)">البطائق الائتمانية</li>
            <li class="dot pointer" onclick="currentSlide(2)">تمويل الملكة</li>
            <li class="dot pointer" onclick="currentSlide(3)">حسابات الافراد</li>
            <li class="dot pointer" onclick="currentSlide(4)">ماكينات الصراف الآلي</li>
            <li class="dot pointer" onclick="currentSlide(5)">التمويل</li>
        </ul>
    </div>
    <div class="w-80 mt-3 border z-index-2 bg-white">
        <div class="row justify-between  hv-50 ">
            <div class="mySlides d-flex w-100">
                <div class="ms-0 me-0 col-md-8 px-5 box-shadow d-flex flex-column justify-evenly">
                    <h1 class="text-second-color">ماكينات الصراف الآلي</h1>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <button class="col-md-4  text-second-color border-second-color bg-transparent py-1 px-2 fw-bold">تحويل العملات</button>
                </div>
                <div class="col-md-4 ms-0 me-0 images relative bg-linear-gradient-main">
                    <img src="{{asset('pic/Al-_Kurimi_1 f.png')}}" alt="" class="w-60 h-90 images-transform absolute">
                    <img src="{{asset('pic/Al- kurimi 1 png.png')}}" alt="" class="w-60 h-90 images-transform img-tow absolute">
                </div>
            </div>
            <div class="mySlides w-100">
                <div class="ms-0 me-0 col-md-8 px-5 box-shadow d-flex flex-column justify-evenly">
                    <h1 class="text-second-color">ماكينات الصراف الآلي</h1>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <button class="col-md-4  text-second-color border-second-color bg-transparent py-1 px-2 fw-bold">تحويل العملات</button>
                </div>
                <div class="col-md-4 ms-0 me-0 images relative bg-linear-gradient-main">
                    <img src="{{asset('pic/Al-_Kurimi_1 f.png')}}" alt="" class="w-60 h-90 images-transform absolute">
                    <img src="{{asset('pic/Al- kurimi 1 png.png')}}" alt="" class="w-60 h-90 images-transform img-tow absolute">
                </div>
            </div>
            <div class="mySlides w-100">
                <div class="ms-0 me-0 col-md-8 px-5 box-shadow d-flex flex-column justify-evenly">
                    <h1 class="text-second-color">ماكينات الصراف الآلي</h1>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <button class="col-md-4  text-second-color border-second-color bg-transparent py-1 px-2 fw-bold">تحويل العملات</button>
                </div>
                <div class="col-md-4 ms-0 me-0 images relative bg-linear-gradient-main">
                    <img src="{{asset('pic/Al-_Kurimi_1 f.png')}}" alt="" class="w-60 h-90 images-transform absolute">
                    <img src="{{asset('pic/Al- kurimi 1 png.png')}}" alt="" class="w-60 h-90 images-transform img-tow absolute">
                </div>
            </div>
            <div class="mySlides w-100">
                <div class="ms-0 me-0 col-md-8 px-5 box-shadow d-flex flex-column justify-evenly">
                    <h1 class="text-second-color">ماكينات الصراف الآلي</h1>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <button class="col-md-4  text-second-color border-second-color bg-transparent py-1 px-2 fw-bold">تحويل العملات</button>
                </div>
                <div class="col-md-4 ms-0 me-0 images relative bg-linear-gradient-main">
                    <img src="{{asset('pic/Al-_Kurimi_1 f.png')}}" alt="" class="w-60 h-90 images-transform absolute">
                    <img src="{{asset('pic/Al- kurimi 1 png.png')}}" alt="" class="w-60 h-90 images-transform img-tow absolute">
                </div>
            </div>
            <div class="mySlides w-100">
                <div class="ms-0 me-0 col-md-8 px-5 box-shadow d-flex flex-column justify-evenly">
                    <h1 class="text-second-color">ماكينات الصراف الآلي</h1>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        في نفس المساحة، لقد تم توليد هذا
                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <p class="">
                        هذا النص هو مثال لنص يمكن أن يستبدل
                    </p>
                    <button class="col-md-4  text-second-color border-second-color bg-transparent py-1 px-2 fw-bold">تحويل العملات</button>
                </div>
                <div class="col-md-4 ms-0 me-0 images relative bg-linear-gradient-main">
                    <img src="{{asset('pic/Al-_Kurimi_1 f.png')}}" alt="" class="w-60 h-90 images-transform absolute">
                    <img src="{{asset('pic/Al- kurimi 1 png.png')}}" alt="" class="w-60 h-90 images-transform img-tow absolute">
                </div>
            </div>
        </div>
        
    </div>
    <img src="{{asset('images/kuraimi-4.PNG')}}" alt="" class=" h-50 images-kuraimi absolute">
    <div class="absolute trends w-100 h-10 d-flex justify-between">
        <button class="per-btn" onclick="plusSlides(1)"></button>
        <button class="next-btn" onclick="plusSlides(-1)"></button>
    </div>
</section>



<section class="news relative">
    <div class="container mt-5 w-100 d-flex align-items-center justify-center flex-column">
        <div class="absolute trends w-100 h-10 d-flex justify-between">
            <button class="per-btn"></button>
            <button class="next-btn"></button>
        </div>
        <h1 class="text-center fs-4 text-titlr text-second-color mt-5">ابق على اطلاع على آخر أخبار البنك</h1>
        <div class="d-flex mb-5 w-90 card-slider align-items-center justify-start">
            <div class=" card relative bg-white d-flex flex-column justify-between content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            <div class=" card relative h-100 bg-white d-flex flex-column justify-between content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100 h-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3 h-100">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            <div class=" card relative bg-white content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            <div class=" card relative bg-white content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            <div class=" card relative bg-white content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            <div class=" card relative bg-white content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            <div class=" card relative bg-white content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            <div class=" card relative bg-white content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            <div class=" card relative bg-white content">
                <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100">
                <div class="absolute news-info h-100 ">
                    <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                        <h1 class="text-white mb-2">مشروع تحديث أنظمة البنك</h1>
                        <p class="text-white mb-4">هذا النص هو مثال لنص يمكن أن يستبدل في
                            نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى هذا النص هو مثال لنص يمكن أن
                            يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال
                            لنص يمكن أن يستبدل
                        </p>
                    </div>
                    <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                        <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                    </div>
                </div>
                <div class="ps-3">
                    <h1 class="">مشروع تحديث أنظمة البنك</h1>
                    <p class="w-10 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                </div>
            </div>
            
        </div>
        <button class="mt-5 fw-bold mb-5 btn-main bg-transparent text-second-color">المزيد</button>
    </div>
</section>


<section class="numbers relative hv-80">
    
    <div class="container d-flex flex-column justify-evenly hv-80">
        <h1 class="fs-4 text-white">نجاحاتنا في أرقام</h1>
        <div class="row p-3 number">
            <div class="col-md-3 m-2 border-bottom">
                <h1 class="fs-3 fw-bold text-white m-0" > <a href="" data-after="+889">+889</a></h1>
                <p class="text-white mb-2 m-0 w-50">
                      
                    تمويل عقاري تم تمويله
                    تمويلا شاملا
                </p>
            </div>
            <div class="col-md-3 m-2 border-bottom" >
                <h1 class="fs-3 fw-bold text-white m-0"><a href="" data-after="+889">+889</a></h1>
                <p class="text-white mb-2 m-0 w-50">
                      
                    تمويل عقاري تم تمويله
                    تمويلا شاملا
                </p>
            </div>
            <div class="col-md-3 m-2 border-bottom">
                <h1 class="fs-3 fw-bold text-white m-0" ><a href="" data-after="+889">+889</a></h1>
                <p class="text-white mb-2 m-0 w-50">
                      
                    تمويل عقاري تم تمويله
                    تمويلا شاملا
                </p>
            </div>
            <div class="col-md-3 m-2 border-bottom">
                <h1 class="fs-3 fw-bold text-white m-0" ><a href="" data-after="+889">+889</a></h1>
                <p class="text-white mb-2 m-0 w-50">
                      
                    تمويل عقاري تم تمويله
                    تمويلا شاملا
                </p>
            </div>
        </div>
        <div class="row p-3 number">
            <div class="col-md-3 m-2 border-bottom">
                <h1 class="fs-3 fw-bold text-white m-0"><a href="" data-after="+889">+889</a></h1>
                <p class="text-white mb-2 m-0 w-50">
                      
                    تمويل عقاري تم تمويله
                    تمويلا شاملا
                </p>
            </div>
            <div class="col-md-3 m-2 border-bottom">
                <h1 class="fs-3 fw-bold text-white m-0"><a href="" data-after="+889">+889</a></h1>
                <p class="text-white mb-2 m-0 w-50">
                      
                    تمويل عقاري تم تمويله
                    تمويلا شاملا
                </p>
            </div>
            <div class="col-md-3 m-2 border-bottom">
                <h1 class="fs-3 fw-bold text-white m-0"><a href="" data-after="+889">+889</a></h1>
                <p class="text-white mb-2 m-0 w-50">
                      
                    تمويل عقاري تم تمويله
                    تمويلا شاملا
                </p>
            </div>
            <div class="col-md-3 m-2 border-bottom">
                <h1 class="fs-3 fw-bold text-white m-0"><a href="" data-after="+1000">+1000</a></h1>
                <p class="text-white mb-2 m-0 w-50">
                      
                    تمويل عقاري تم تمويله
                    تمويلا شاملا
                </p>
            </div>
        </div>
        {{-- <div class="absolute fw-bold number-back">+889</div> --}}
    </div>
</section>

<section class="maps">
    <div class="container hv-80 d-flex flex-column justify-center">
        <div class="row">
            <div class="col-md-5 p-4 d-flex flex-column justify-between">
                <h1 class="text-second-color mb-5 w-40 text-center">نقاط تواجدنا</h1>
                <div class="row">
                    <div class="col-md-3 text-center">
                        <h3 class="text-second-color">100</h3>
                        <p class="text-second-color">فرع بنك</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <h3 class="text-second-color">400</h3>
                        <p class="text-second-color">صراف الي</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <h3 class="text-second-color">100</h3>
                        <p class="text-second-color">نقطة خدمة</p>
                    </div>
                </div>
                <button class="mt-5 ms-4 w-40 fw-bold mb-5 btn-main bg-transparent text-second-color">أقرب نقطة لك</button>
            </div>
            <div class="col-md-6">
                <img src="{{asset('images/kurimi-5.PNG')}}" alt="" class="w-100">
            </div>
        </div>
    </div>
</section>

<section class="footer bg-second-color relative">
    <div class="container hv-80 pt-5 d-flex flex-column justify-between align-items-center">
        <img src="{{asset('images/logok.svg')}}" alt="" class="mt-5">
        <hr class="w-90 bg-white">
        <div class="row w-90">
            <div class="col-md-2">
                <h1 class="text-white">البنك</h1>
                <p class="mt-0 mb-0">عن البنك</p>
                <p class="mt-0 mb-0">الرؤية</p>
                <p class="mt-0 mb-0">الرسالة</p>
                <p class="mt-0 mb-0">الأهداف</p>
                <p class="mt-0 mb-0">القيم والمبادئ</p>
                <p class="mt-0 mb-0">بيان سياسة</p>
                <p class="mt-0 mb-0">مكافحة غسل</p>
                <p class="mt-0 mb-0">شركائنا</p>
            </div>
            <div class="col-md-2">
                <h1 class="text-white">شركائنا</h1>
                <p class="mt-0 mb-0">موني جرام</p>
                <p class="mt-0 mb-0">ماستر كارد</p>
                <p class="mt-0 mb-0">البنوك المراسلة</p>
                <p class="mt-0 mb-0">منظمة التمويل الدولية</p>
                <p class="mt-0 mb-0">تيمينوس</p>
            </div>
            <div class="col-md-2">
                <h1 class="text-white">الخدمات</h1>
                <p class="mt-0 mb-0">خدمات الأفراد</p>
                <p class="mt-0 mb-0">خدمات الشركات</p>
                <p class="mt-0 mb-0">كريمي اكسبرس</p>
                <p class="mt-0 mb-0">ام فلوس</p>
                <p class="mt-0 mb-0">التمويل</p>
            </div>
            <div class="col-md-2">
                <h1 class="text-white">التقارير</h1>
                <p class="mt-0 mb-0">التقارير المالية</p>
                <p class="mt-0 mb-0">القوائم المالية</p>
            </div>
            <div class="col-md-2">
                <h1 class="text-white">نقاط الخدمة</h1>
                <p class="mt-0 mb-0">الفروع وماكينات الصرافة</p>
            </div>
            <div class="col-md-2">
                <h1 class="text-white">تواصل معنا</h1>
                <p class="mt-0 mb-0">967 1 503888 : تلفون</p>
                <p class="mt-0 mb-0">967 1 435400 : فاكس</p>
                <p class="mt-0 mb-0">967 1 435400 : فاكس</p>
                <p class="mt-0 mb-0">الرقم المجاني : 8008800</p>
                <p class="mt-0 mb-0">صندوق بريد : 19357</p>
            </div>
        </div>
        <div class="row w-90 justify-between">
            <div class="col-md-2 d-flex justify-between">
                <i class="fa-brands text-white fs-5 fa-facebook-f"></i>
                <i class="fa-brands text-white fs-5 fa-twitter"></i>
                <i class="fa-brands text-white fs-5 fa-instagram"></i>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-center">
                <img src="{{asset('images/kurimi-buttom.PNG')}}" alt="" class="me-3">
                <img src="{{asset('images/kurimi-buttom-2.PNG')}}" alt="">
            </div>
        </div>
        <h1 class="fs-5 text-white text-right">&copy;kurimi 2022</h1>
        </div>
        
        <div class="absolute layout-image d-flex justify-betwen">
            <img src="{{asset('pic/Layer 116.png')}}" alt="" class="img-one">
            <img src="{{asset('pic/Layer 116.png')}}" alt="" class="img-tow">
        </div>
</section>
@endsection