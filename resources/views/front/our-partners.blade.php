@extends('front.layout.home')
@section('title')
    {{__('main.homePage.Home')}}
@endsection
@section('content')
<section class="service our-partners about-hero">
    <div class="container hv-100 d-flex align-items-center relative">
        <img src="{{asset('images/md-duran-rE-2.png')}}" alt="" class="w-100 h-100 absolute background-image">
        <div class="row h-100  align-items-center relative">
            <div class="col mt-5 info d-flex flex-column align-items-center">
                <p class="mt-3 mb-1 text-white w-100">رئيسية/شركائنا</p>
            </div>
        </div>
    </div>
</section>
<section class="about-bank  bg-white success-stories-info our-partners-info relative">
    <div class="container d-flex flex-column align-items-center ">
        <img src="{{asset('images/Mask Group 30.png')}}" alt="" class="absolute image-line-3">
        <div class="items-info border bg-white w-90 d-flex flex-column align-items-center relative">
            <img src="{{asset('images/Group -13.png')}}" alt="" class="absolute image-line-2">
            <div class="item w-100 d-flex flex-column align-items-center p-2">
                <h1 class="fs-4 relative w-80">شركائنا</h1>
                <div class="row w-100 p-3 border relative align-items-center justify-center">
                    <div class="col-md-3">
                        <div class="partners-images d-flex justify-center align-items-center">
                            <img src="{{asset('images/mt1_s_pg.png')}}" alt="" class="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2>هذا النص هو مثال</h2>
                        <p class="mt-0 mb-0">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                            .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                        </p>
                        <p class="mt-0 mb-0">
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
                            لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة
                        </p>
                    </div>
                    <div class="number absolute font-family-arabic text-light-color">1</div>
                </div>
                <div class="row w-100 p-3 border relative align-items-center justify-center">
                    <div class="col-md-3">
                        <div class="partners-images d-flex justify-center align-items-center">
                            <img src="{{asset('images/mt1_s_pg.png')}}" alt="" class="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2>هذا النص هو مثال</h2>
                        <p class="mt-0 mb-0">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                            .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                        </p>
                        <p class="mt-0 mb-0">
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
                            لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة
                        </p>
                    </div>
                    <div class="number absolute font-family-arabic text-light-color">2</div>
                </div>
                <div class="row w-100 p-3 border relative align-items-center justify-center">
                    <div class="col-md-3">
                        <h2>البنوك المراسلة</h2>
                    </div>
                    <div class="col-md-8">
                        <div class="partners-images d-flex justify-center align-items-center">
                            <img src="{{asset('images/mt1_s_pg.png')}}" alt="" class="">
                            <img src="{{asset('images/mt1_s_pg.png')}}" alt="" class="">
                            <img src="{{asset('images/mt1_s_pg.png')}}" alt="" class="">
                        </div>
                    </div>
                    <div class="number absolute font-family-arabic text-light-color">2</div>
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
            <div class="col p-5 mb-3">
                <div class="shadow border">
                    <img src="{{asset('images/md-duran-rE-3.png')}}" alt="" class="w-100">
                    <div class="ps-3 h-100">
                        <h1 class="mb-5 mt-5">مشروع تحديث أنظمة البنك</h1>
                        <p class="w-10 mb-5 mt-5 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                    </div>
                </div>
            </div>
            <div class="col p-5 mb-3">
                <div class="shadow border">
                    <img src="{{asset('images/md-duran-rE-3.png')}}" alt="" class="w-100">
                    <div class="ps-3 h-100">
                        <h1 class="mb-5 mt-5">مشروع تحديث أنظمة البنك</h1>
                        <p class="w-10 mb-5 mt-5 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                    </div>
                </div>
            </div>
            <div class="col p-5 mb-3">
                <div class="shadow border">
                    <img src="{{asset('images/md-duran-rE-3.png')}}" alt="" class="w-100">
                    <div class="ps-3 h-100">
                        <h1 class="mb-5 mt-5">مشروع تحديث أنظمة البنك</h1>
                        <p class="w-10 mb-5 mt-5 text-second-color border-bottom-second-2 fw-bold">المزيد</p>
                    </div>
                </div>
            </div>
    </div>
</section>
<section class="share share-icons success-icons bg-white">
    <div class="container d-flex flex-column align-items-center">
        <h1 class="text-second-color fs-5">مشاركة الصفحة في</h1>
        <div class="d-flex icons">
            <i class="fa-solid fa-share-nodes"></i>
            <i class="fa-brands fa-whatsapp"></i>
            <i class="fa-brands fa-telegram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook-f"></i>
        </div>
    </div>
</section>
@endsection
@push('scripts_after')
<script>
let slideImages = 1;
showSlidesImages(slideImages);

    function plusSliderImage(n) {
    showSlidesImages(slideImages += n);
}
function showSlidesImages(n) {
    let i;
    let left = 5;
    let zIndex = 1
    let height = 95;
    let slides = document.getElementsByClassName("slider-image");
    if (n > slides.length) {
        slideImages = 1
    }
    if (n < 1) {
        slideImages = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        zIndex += i
    }
    console.log(zIndex)
    for (i = 0; i < slides.length; i++) {
        slides[i].style.left = "-" + left + "%";
        
        slides[i].style.zIndex = + zIndex - 1;
        slides[i].style.height = height + "%";
        zIndex -=1;
        height -= 5;
        if(i == 0){
            left = 5
        }else{
            left += 5
        }
        
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].className = slides[i].className.replace(" active", "");
    }
    for (i = 0; i < slides.length; i++) {
        zIndex += i
    }
    slides[slideImages - 1].style.left = 0;
    slides[slideImages - 1].style.zIndex = zIndex;
    slides[slideImages - 1].style.height = "100%";
    console.log(zIndex)

    // dots[slideIndex - 1].className += " active";
    slides[slideImages - 1].className += " active";
}
</script>
@endpush