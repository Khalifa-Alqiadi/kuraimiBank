@extends('front.layout.home')
@section('title')
    {{__('main.homePage.Home')}}
@endsection
@section('content')
<div class="home relative d-flex hv-100 justify-end align-items-center">
    {{-- <img src="{{asset('pic/2.jpg')}}" alt="" class="w-100 h-100 absolute background-image"> --}}
    <div class="container hero w-100 h-100 d-flex" id="hero-info">
        <div class="hero-info absolute w-100 h-100">
            <h1 class="text-white fs-3 fw-bold m-0 font-family-arabic">حساب في كل بيت يمني</h1>
            <p class="text-white fs-5 m-0" >يسهم في التنمية الاقتصادية والاجتماعية</p>
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
        <div class="row w-90 bg-white p-2 rate-list justify-between">
            @foreach ($rates as $rate)
            <div class="item  p-1">
                <div class="card border-2 w-90">
                    <div class="d-flex ">
                        <div class="col-md-6">
                            <h1 class="fw-bold my-0 py-0">{{$rate->name}}</h1>
                        </div>
                        <div class="col-md-2">
                            <p class="my-0 py-0 text-light-color-2">{{__('main.homePage.Sale')}}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="my-0 py-0 text-light-color-2">{{__('main.homePage.Buy')}}</p>
                        </div>
                    </div>
                    <div class="d-flex" >
                        <div class="col-md-6">
                            @if ($rate->id == 1)
                                <img src="{{asset('images/Group 741.png')}}" alt="" class="">
                            @elseif($rate->id == 2)
                                <img src="{{asset('images/Group 742.png')}}" alt="" class="">
                            @elseif($rate->id == 3)
                                <img src="{{asset('images/Group 743.png')}}" alt="" class="">
                            @endif
                        </div>
                        <div class="col-md-2">
                            <p class="fs-6 my-0 py-0 text-info font-family-english">{{$rate->sale}}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="fs-6 my-0 py-0 text-thred-color font-family-english">{{$rate->buy}}</p>
                        </div>
                    </div>
                </div>  
            </div>
            @endforeach
            
            <div class="item  item-button w-10 d-flex align-items-center justify-center">
                <div class="card">
                    <button class="text-second-color border-second-color bg-transparent py-2 px-2 fw-bold">{{__('main.homePage.CoinsExchange')}}</button>
                </div>  
            </div>
        </div>
    </div>
    
    {{-- <img src="{{asset('images/header-bg.png')}}" alt="" class="w-100"> --}}
</section>
<section class="services mb-3 relative d-flex flex-column align-items-center">
    <h1 class="text-center text-title text-second-color fs-4 font-family-arabic">{{__('main.homePage.ServicesCare')}}</h1>
    <div class="w-80">
        <ul class="d-flex justify-between w-100">
            @foreach ($services as $service)
                <li class="dot pointer" onclick="currentSlide({{$service->id}})">{{$service->name}}</li>
            @endforeach
        </ul>
    </div>
    <div class="w-80 mt-3 border z-index-2 bg-white">
        <div class="row  justify-between  hv-50 ">
            @foreach ($services as $service)
                <div class="mySlides row row-cols-1 row-cols-md-2 row-cols-sm-1 w-100">
                    <div class="ms-0 me-0 mySlides-info box-shadow d-flex flex-column justify-evenly font-family-arabic">
                        <h1 class="text-second-color font-family-arabic">{{$service->name}}</h1>
                        {!! $service->description !!}
                        <a href="{{route('services.showName', $service->name)}}" class=" link w-20 text-second-color border-second-color py-2 px-2 fw-bold">{{__('main.More')}} </a>
                    </div>
                    
                    
                    <div class="col-md-4 ms-0 me-0 images relative bg-linear-gradient-main d-flex align-items-center justify-center">
                        <img src="{{asset('images/Layer 61.png')}}" alt="" class="w-100 images-transform absolute">
                        <img src="{{asset('images/Layer 71.png')}}" alt="" class="w-30 images-transform absolute">
                        <img src="{{URL::to('images/'. $service->background)}}" alt="" class="mt-5 w-100 img-database">
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
    <img src="{{asset('images/kuraimi-4.PNG')}}" alt="" class=" h-50 images-kuraimi absolute">
    <div class="absolute trends w-90 h-10 d-flex justify-between">
        <button class="per-btn bg-transparent" onclick="plusSlides(1)"><i class="text-second-color fs-4 fa-solid fa-angle-right"></i></button>
        <button class="next-btn bg-transparent" onclick="plusSlides(-1)"><i class="text-second-color fs-4 fa-solid fa-angle-left"></i></button>
    </div>
</section>

<section class="hv-100 app d-flex align-items-center">
    <div class="row w-100 row-cols-1 row-cols-sm-1 row-cols-lx-2">
        <div class="col">
            <div class="p-1 d-flex align-items-center">
                <img src="{{asset('images/app.png')}}" alt="" class="w-100">
            </div>
        </div>
        <div class="col hv-70  relative font-family-arabic">
            <div class="relative">
                <h1 class="fs-4 text-second-color mt-0 mb-0 ms-3">
                    تطبيقات البنك
                </h1>
                <p class="w-70 ms-3 text-info">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                    مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم       
                </p>
                <div class="slides-app d-flex relative mt-3 ">
                    @foreach ($applications as $application)
                        <div class="item-app p-3 bg-white w-80 absolute ms-2">
                            <h1 class="fs-5 m-1">{{$application->name}}</h1>
                            <div class="row row-cols-3">
                                {!! $application->list_info !!}
                            </div>
                            <div class="col-md-6 mt-2 d-flex align-items-center justify-between">
                                <a href="{{$application->play_link}}"><img src="{{asset('images/kurimi-buttom-3.PNG')}}" alt="" class=""></a>
                                <a href="{{$application->store_link}}"><img src="{{asset('images/kurimi-buttom-4.PNG')}}" alt=""></a>
                            </div>
                        </div>
                    @endforeach
                    <div class="cicle d-flex w-100 absolute me-3">
                        @php $i = 1 @endphp
                        @foreach ($applications as $application)
                            <span class="items pointer" onclick="currentSlideApp({{$i}})"></span>
                            @php $i++ @endphp
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

<section class="news relative">
    <div class="container mt-5 w-100 d-flex align-items-center justify-center flex-column">
        <div class="absolute trends w-90 h-10 d-flex justify-between">
            <button class="per-btn bg-transparent"><i class="text-second-color pointer fs-4 fa-solid fa-angle-right"></i></button>
            <button class="next-btn bg-transparent"><i class="text-second-color pointer fs-4 fa-solid fa-angle-left"></i></button>
        </div>
        <h1 class="text-center fs-4 text-titlr text-second-color mt-5">ابق على اطلاع على آخر أخبار البنك</h1>
        <div class="d-flex mb-5 w-90 card-slider align-items-center justify-start">
            @foreach ($news as $news)
                <div class=" card relative bg-white d-flex flex-column justify-between content">
                    <div class="image">
                        <img src="{{Url::to('images/'. $news->background)}}" alt="" class="">
                    </div>
                    <div class="absolute news-info h-100 ">
                        <div class="p-3 h-70 d-flex flex-column align-items-center justify-center">
                            <h1 class="text-white mb-2">{{$news->title}}</h1>
                            <p class="text-white mb-4">
                                {{$news->description}}
                            </p>
                        </div>
                        <div class="w-100 h-30 bg-second-color d-flex justify-center align-items-center">
                            <p class="w-10 text-white border-bottom-white-2 fw-bold">المزيد</p>
                        </div>
                    </div>
                    <div class="ps-3">
                        <h1 class="">{{$news->title}}</h1>
                        <p class="w-10 text-second-color border-bottom-second-2 fw-bold">{{__('main.More')}}</p>
                    </div>
                </div>
            @endforeach    
        </div>
        <button class="mt-5 fw-bold mb-5 btn-main bg-transparent text-second-color">المزيد</button>
    </div>
</section>


<section class="numbers relative hv-80">
    <div class="container d-flex flex-column justify-evenly align-items-center">
        <div class="numbers-info p-5">
            <h1 class="fs-4 text-white mt-5">نجاحاتنا في أرقام</h1>
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 number">
                @foreach ($servicsNumbers as $number)
                    <div class="col">
                        <div class="card mt-3 mb-5 px-5">
                            <h1 class="fs-3 fw-bold text-white m-0"><a href="" data-after="+{{$number->numbers}}">+{{$number->numbers}}</a></h1>
                            <p class="text-white mb-2 m-0 w-60">
                                {{$number->description}}
                            </p>
                            <hr>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="absolute fw-bold number-back">+889</div> --}}
    </div>
</section>

<section class="maps">
    <div class="container hv-80 d-flex flex-column justify-center">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2">
            <div class="col p-4 d-flex flex-column justify-between">
                <h1 class="text-second-color mb-5 w-50 text-center">نقاط تواجدنا</h1>
                <div class="row ">
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
                <div class="w-70">
                    <button class="mt-5 ms-4 fw-bold mb-5 btn-main bg-transparent text-second-color">أقرب نقطة لك</button>
                </div>
            </div>
            <div class="col">
                <img src="{{asset('images/kurimi-5.PNG')}}" alt="" class="w-100">
            </div>
        </div>
    </div>
</section>


@endsection