@extends('front.layout.home')
@section('title')
    {{__('main.homePage.Home')}}
@endsection
@section('content')
<section class="service hv-100 relative">
    <img src="{{asset('pic/Al-_Kurimi_3_f4.png')}}" alt="" class="w-100 h-100 absolute background-image">
    <div class="container d-flex align-items-center relative">
        
        <div class="row hv-100 row-cols-1 row-cols-lx-2 align-items-end relative">
            <div class="col mt-5 info d-flex flex-column align-items-center ">
                <p class="mt-3 mb-1 fs-6 text-white w-80 font-family-arabic">{{$service->name}}</p>
                <h1 class="fs-4 mt-1 mb-1 text-white w-80 font-family-arabic">{{$service->name}}</h1>
                <div class="text-infos w-80 text-white">
                    {!! $service->description !!}
                </div>
            </div>
            <div class="col">
                <div class="images d-flex justify-end relative">
                    <img class="w-100 service-img" src="{{asset('images/Al-_Kurimi_3 f2.png')}}" alt="">
                    <img class="w-100 service-img-2" src="{{asset('images/'. $service->background)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container  d-flex flex-column align-items-center">
        <img src="{{asset('images/header-bg.png')}}" alt="" class="absolute w-100 h-10 background-image">
        <div class="features-info bg-white">
            <div class="row p-4 row-cols-1  row-cols-md-2 row-cols-lg-3">
                @php $i = 1 @endphp
                @foreach ($service->advantages as $advantage)
                    <div class="col p-3">
                        <div class="icons d-flex relative">
                            <img src="{{asset('images/Rectangle 991.png')}}" alt="" class="w-100 h-100">
                            <img src="{{asset('pic/Layer 58.png')}}" alt="" class="absolute w-100 h-100">
                            <div class="num absolute w-100 h-100 d-flex align-items-center justify-center">
                                <h1 class="font-family-english text-white">{{$i}}</h1>
                            </div>
                        </div>
                        <h1 class="text-second-color title">{{$advantage->name}}</h1>
                        <p class="">
                            {{$advantage->description}}
                        </p>
                    </div>
                    @php $i++ @endphp
                @endforeach
            </div>
        </div>
        <div class="features-slider w-100 d-flex flex-column align-items-center">
            <div class="w-50">
                <ul class="d-flex justify-between w-100">
                    @php $i =1 @endphp
                    @foreach ($service->slider as $slider)
                        <li class="dot-feature pointer" onclick="currentSlide({{$i}})">{{$slider->title}}</li>
                        @php $i++ @endphp
                    @endforeach
                </ul>
            </div>
            <img src="{{asset('images/sasa.png')}}" alt="" class="absolute line-1 image-lines">
            <img src="{{asset('images/aa.png')}}" alt="" class="absolute line-2 image-lines">
            <img src="{{asset('images/aaaa.png')}}" alt="" class="absolute line-3 image-lines">
            <div class="row w-80 mt-5">
                @foreach ($service->slider as $slider)
                    <div class="sliders row row-cols-1 row-cols-lx-2 relative">
                        <div class="col">
                            <img src="{{asset('images/'.$slider->image)}}" alt="" class="w-100 h-100">
                        </div>
                        <div class="col sliders-info font-family-arabic">
                            <h1 class="font-family-arabic text-second-color">{{$slider->title}}</h1>
                            {!! $slider->description !!}
                            <div class="button d-flex flex-column">
                                <p class="fw-bold text-second-color">{{$slider->title}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="bg-light-color service-project">
    <div class="container d-flex flex-column align-items-center">
        <div class="d-flex justify-start w-90 pt-4">
            <h1 class="text-second-color">خدمة مشروعي تتيح لك الفرصة</h1>
        </div>
        <div class="d-flex justify-end w-90 pb-4">
            <h1 class="text-second-color">لتحسين مشروعك الخاص وتطويره</h1>
        </div>
    </div>
</section>
<section class="success-stories">
    <div class="container">
        <h1 class="text-second-color mt-5 mb-5">قصص نجاح</h1>
        @foreach ($service->storeis as $stories)
            <div class="success-info hv-80 relative" >
                <img src="{{asset('images/'. $stories->background)}}" alt="" class="absolute w-100 h-100">
                <div class="info relative text-white font-family-arabic">
                    <h1 class="text-white">{{$stories->title}}</h1>
                    {!! $stories->description !!}
                    <button class="text-white border-bottom bg-transparent py-2 px-4 fw-bold"><a href="{{route('success-stories.showTitle',$stories->title)}}">قراءة المزيد</a></button>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-end mt-3 mb-3">
            <span class="border-second-color py-1 px-3 me-2 pointer" onclick="plusSlides(1)"><i class="text-second-color fs-5 fa-solid fa-angle-right"></i></span>
            <span class="border-second-color py-1 px-3 pointer" onclick="plusSlides(-1)"><i class="text-second-color fs-5 fa-solid fa-angle-left"></i></span>
        </div>
    </div>
</section>

<section class="onther-services">
    <div class="w-100 relative">
        <h1 class="text-second-color text-center fs-4">خدمات أخرى قد تهمك</h1>
        <div class="onther-services-slider  d-flex w-100 card-slider align-items-center justify-start">
            @foreach ($services as $service)
                <div class="card">
                    <div class="card-img">
                        <img src="{{asset('images/'. $service->background)}}" alt="" class="w-100 h-100">
                    </div>
                    <h1>{{$service->name}}</h1>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-center mt-3 mb-3">
            <span class=" py-1 px-2 me-2 pointer next-btn bg-light-color"><i class="text-second-color fs-5 fa-solid fa-angle-right"></i></span>
            <span class=" py-1 px-2 pointer per-btn bg-light-color"><i class="text-second-color fs-5 fa-solid fa-angle-left"></i></span>
        </div>
    </div>
</section>
@endsection

@push('scripts_after')
    @include('front.script.service')
@endpush