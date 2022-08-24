@extends('front.layout.home')
@section('title')
    {{__('main.homePage.Home')}}
@endsection
@section('content')
<section class="service uccess-stories-hero about-hero">
    <div class="container hv-100 d-flex align-items-center relative">
        <img src="{{asset('images/md-duran-rE-2.png')}}" alt="" class="w-100 h-100 absolute background-image">
        <div class="row h-100  align-items-center relative">
            <div class="col mt-5 info d-flex flex-column align-items-center">
                <p class="mt-3 mb-1 text-white w-100">خدمات الأفراد/ماكينات الصراف الآلي/قصص النجاح</p>
            </div>
        </div>
    </div>
</section>
<section class="about-bank  bg-white success-stories-info relative">
    <div class="container d-flex flex-column align-items-center ">
        <img src="{{asset('images/Mask Group 30.png')}}" alt="" class="absolute image-line-3">
        <div class="items-info border bg-white w-90 d-flex flex-column align-items-center relative">
            <img src="{{asset('images/Group -13.png')}}" alt="" class="absolute image-line-2">
            
            <div class="item w-80 font-family-arabic">
                <h1 class="fs-4 relative mb-0">{{$successStories->title}}</h1>
                <div class="images-ms p-2 d-flex">
                    <img src="{{asset('images/redd-PTRzqc_h-4.png')}}" alt="" class="w-100">
                </div>
                {!! $successStories->description !!}
                <div class="row w-100 ">
                    <div class="info p-1 ">
                        {!! $successStories->onther_description !!}
                    </div>
                    <div class="images-lx p-2 flex-column justify-between">
                        <div class="relative h-100 d-flex align-items-center">
                            @php $images = json_decode($successStories->images); @endphp
                            @foreach ($images as $image)
                                <img src="{{asset('images/'. $image)}}" alt="" class="w-100 absolute slider-image image-1">
                            @endforeach
                        </div>
                        <div class="d-flex justify-end mt-3 mb-3">
                            <span class="border-second-color py-1 px-3 me-2 pointer" onclick="plusSliderImage(1)"><i class="text-second-color fs-5 fa-solid fa-angle-right"></i></span>
                            <span class="border-second-color py-1 px-3 pointer" onclick="plusSliderImage(-1)"><i class="text-second-color fs-5 fa-solid fa-angle-left"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{asset('images/Group -13.png')}}" alt="" class="absolute image-line-1">
</section>

<section class="onther-services-success">
    <div class="container mb-3 d-flex flex-column align-items-center">
        <h1 class="text-second-color font-family-arabic fs-3 text-title">أخبار أخرى عن البنك</h1>
        <div class="row row-cols-1 row-cols-lx-3 w-90">
            @foreach ($news as $news)
                <div class="col p-5 mb-3">
                    <div class="shadow border">
                        <img src="{{asset('images/'. $news->background)}}" alt="" class="w-100 hv-50">
                        <div class="ps-3 h-100">
                            <h1 class="mb-5 mt-5">{{$news->title}}</h1>
                            <p class="w-10 mb-5 mt-5 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="share share-icons success-icons bg-white">
    <x-share></x-share>
</section>
@endsection
@push('scripts_after')
    @include('front.script.success-stories')
@endpush