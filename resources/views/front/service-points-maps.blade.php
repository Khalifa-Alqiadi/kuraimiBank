@extends('front.layout.home')
@section('title')
    {{__('main.homePage.Home')}}
@endsection
@section('content')
<section class="bg-linear-gradient-main service-points">
    <div class="container hv-100 d-flex align-items-center justify-center relative">
        <div class="row w-80 h-100 row-cols-1 row-cols-lg-2 align-items-center relative">
            <div class="col mt-5 info d-flex flex-column align-items-center">
                <h1 class="text-white">الفروع وماكينات الصرافة</h1>
                <p class="mt-3 mb-1 text-white w-70">
                    خدماتنا قريبة منك ومتاحة في أكثر من
                    ٦٠٠ نقطة حول الجمهورية اليمنية  
                </p>
            </div>
            <div class="col d-flex flex-column div-box">
                <div class="bg-white w-60 box relative">
                    <hr class="w-100 hr-1">
                    <hr class="w-100 hr-2">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-bank  bg-white service-points-map relative">
    <img src="{{asset('images/snazzy-image (5).png')}}" alt="" class="w-100 h-100 absolute background-image">
    <div class="container d-flex flex-column align-items-center ">
        <div class="items-info bg-white w-90 d-flex flex-column align-items-center relative">
            <div class="item w-100 d-flex flex-column align-items-center">
                <form action="" class="w-90">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                        <div class="col">
                            <div class="d-flex flex-column p-5 form-group">
                                <label for="">الدولة</label>
                                <select name="" id="" class="p-2">
                                    <option value="">اليمن</option>
                                    <option value="">السعودية</option>
                                    <option value="">الكويت</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column p-5 form-group">
                                <label for="">المدينة</label>
                                <select name="" id="" class="p-2">
                                    <option value="">صنعاء</option>
                                    <option value="">تعز</option>
                                    <option value="">أب</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column p-5 form-group">
                                <label for="">نوع الموقع</label>
                                <select name="" id="" class="p-2">
                                    <option value="">صراف</option>
                                    <option value="">بنك</option>
                                    <option value="">صراف</option>
                                </select>
                            </div>
                        </div>
                        <div class="col d-flex justify-center align-items-center">
                            <div class=" buttom p-5 form-group w-100">
                                <button class=" bg-second-color w-100 text-white">تنفيذ الطلب</button>
                            </div>
                        </div>
                    </div>
                </form>
                <h1 class="fs-5 relative w-80 text-second-color">الفروع وصراف الي في اليمن - صنعاء</h1>
                <p class="text-right">عرض 45 موقع</p>
            </div>
        </div>
        <div class="info-map w-90">
            <div class="row p-3">
                <div class="col-md-12 bg-white border-2 p-3 d-flex justify-between mb-2">
                    <div class="info px-4">
                        <h2 class="text-second-color">شارع الاصبحي</h2>
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن  صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                    <div class="icons d-flex justify-between px-4">
                        <p class="me-2"><img src="{{asset('images/Group 528.png')}}" alt=""> صراف الي</p>
                        <p><img src="{{asset('images/Group 528.png')}}" alt=""> فرع</p>
                    </div>
                </div>
                <div class="col-md-12 bg-white border-2 p-3 d-flex justify-between mb-2">
                    <div class="info px-4">
                        <h2 class="text-second-color">شارع الاصبحي</h2>
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن  صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                    <div class="icons d-flex justify-between px-4">
                        <p><img src="{{asset('images/Group 528.png')}}" alt=""> فرع</p>
                    </div>
                </div>
                <div class="col-md-12 bg-white border-2 p-3 d-flex justify-between mb-2">
                    <div class="info px-4">
                        <h2 class="text-second-color">شارع الاصبحي</h2>
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن  صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                    <div class="icons d-flex justify-between px-4">
                        <p class="me-2"><img src="{{asset('images/Group 528.png')}}" alt=""> صراف الي</p>
                        <p><img src="{{asset('images/Group 528.png')}}" alt=""> فرع</p>
                    </div>
                </div>
                <div class="col-md-12 bg-white border-2 p-3 d-flex justify-between mb-2">
                    <div class="info px-4">
                        <h2 class="text-second-color">شارع الاصبحي</h2>
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن  صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                    <div class="icons d-flex justify-between px-4">
                        <p><img src="{{asset('images/Group 528.png')}}" alt=""> فرع</p>
                    </div>
                </div>
                <div class="col-md-12 bg-white border-2 p-3 d-flex justify-between mb-2">
                    <div class="info px-4">
                        <h2 class="text-second-color">شارع الاصبحي</h2>
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن  صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                    <div class="icons d-flex justify-between px-4">
                        <p><img src="{{asset('images/Group 528.png')}}" alt=""> فرع</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
