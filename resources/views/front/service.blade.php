@extends('front.layout.home')
@section('title')
    {{__('main.homePage.Home')}}
@endsection
@section('content')
<section class="service  ">
    <div class="container hv-100 d-flex align-items-center relative">
        <img src="{{asset('pic/Al-_Kurimi_3_f4.png')}}" alt="" class="w-100 h-100 absolute background-image">
        <div class="row h-100 row-cols-1 row-cols-lx-2 align-items-center relative">
            <div class="col mt-5 info d-flex flex-column align-items-center">
                <p class="mt-3 mb-1 fs-6 text-white w-80">التمويل/مشروعي</p>
                <h1 class="fs-4 mt-1 mb-1 text-white w-80">مشروعي</h1>
                <p class="text-white w-80 ">
                    بتمويلات تصل إلى 50 مليون ريال يمني، تخيل ماذا يمكنك أن
                    تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                    يساعدك لتجيب عن هذا التساؤل
                </p>
                <div class="d-flex align-items-start w-80">
                    <button class="text-white bg-thred-color py-2 px-4 fw-bold">تحويل العملات</button>
                </div>
            </div>
            <div class="col absolute images">
                <img class="w-100 service-img" src="{{asset('images/Al-_Kurimi_3 f2.png')}}" alt="">
                <img class="w-100 service-img-2" src="{{asset('images/Al-_Kurimi_3 5 f.png')}}" alt="">
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container  d-flex flex-column align-items-center">
        <img src="{{asset('images/header-bg.png')}}" alt="" class="absolute w-100 h-10 background-image">
        <div class="features-info bg-white">
            <div class="row p-4 row-cols-1  row-cols-md-2 row-cols-lg-3">
                <div class="col p-3">
                    <div class="icons d-flex relative">
                        <img src="{{asset('images/Rectangle 991.png')}}" alt="" class="w-100 h-100">
                        <img src="{{asset('pic/Layer 58.png')}}" alt="" class="absolute w-100 h-100">
                        <div class="num absolute w-100 h-100 d-flex align-items-center justify-center">
                            <h1 class="font-family-english text-white">1</h1>
                        </div>
                    </div>
                    <h1 class="text-second-color fs-5">تراعي طبيعة دخلك</h1>
                    <p class="">
                        تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)
                    </p>
                </div>
                <div class="col p-3">
                    <div class="icons d-flex relative">
                        <img src="{{asset('images/Rectangle 991.png')}}" alt="" class="w-100 h-100">
                        <img src="{{asset('pic/Layer 58.png')}}" alt="" class="absolute w-100 h-100">
                        <div class="num absolute w-100 h-100 d-flex align-items-center justify-center">
                            <h1 class="font-family-english text-white">2</h1>
                        </div>
                    </div>
                    <h1 class="text-second-color fs-5">تراعي إمكانياتك</h1>
                    <p>تراعي إمكانياتك بضمانات بسيطة وميسرة</p>
                </div>
                <div class="col p-3">
                    <div class="icons d-flex relative">
                        <img src="{{asset('images/Rectangle 991.png')}}" alt="" class="w-100 h-100">
                        <img src="{{asset('pic/Layer 58.png')}}" alt="" class="absolute w-100 h-100">
                        <div class="num absolute w-100 h-100 d-flex align-items-center justify-center">
                            <h1 class="font-family-english text-white">3</h1>
                        </div>
                    </div>
                    <h1 class="text-second-color fs-5">دراسة مالية واقتصادية</h1>
                    <p>
                        تقدم لك دراسة مالية واقتصادية لمشروعك
                        تستطيع من خلالها الحصول عل تقييم حقيقي
                        .لإدارة مشروعك
                    </p>
                </div>
            </div>
        </div>
        <div class="features-slider w-100 d-flex flex-column align-items-center">
            <div class="w-70">
                <ul class="d-flex justify-between w-100">
                    <li class="dot-feature pointer" onclick="currentSlide(1)">المميزات </li>
                    <li class="dot-feature pointer" onclick="currentSlide(2)"> الشروط </li>
                    <li class="dot-feature pointer" onclick="currentSlide(3)">الاشتراك </li>
                    <li class="dot-feature pointer" onclick="currentSlide(4)"> أسئلة شائعة</li>
                </ul>
            </div>
            <img src="{{asset('images/sasa.png')}}" alt="" class="absolute line-1 image-lines">
            <img src="{{asset('images/aa.png')}}" alt="" class="absolute line-2 image-lines">
            <img src="{{asset('images/aaaa.png')}}" alt="" class="absolute line-3 image-lines">
            <div class="row w-90 mt-5">
                <div class="sliders row row-cols-1 row-cols-lg-2 relative">
                    <div class="col">
                        <img src="{{asset('images/news.PNG')}}" alt="" class="w-100 h-100">
                    </div>
                    <div class="col sliders-info">
                        <h1 class="">مميزات خدمة مشروعي</h1>
                        <p class="mt-1 mb-1">
                            السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر الإسلامي
                            على مدار الساعة وطوال أيام الأسبوع  
                        </p>
                        <p class="mt-1 mb-1">
                            إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                            بطاقة
                        </p>
                        <p class="mt-1 mb-1">
                            يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                            إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                            سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                            (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                        </p>
                        <p class="mt-1 mb-1">
                            تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                            الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                            طلب كشف حساب مختصر او الاستعلام عن الرصيد
                        </p>
                        <p class="border-bottom-second-2 fw-bold w-20 text-second-color">الشروط</p>
                    </div>
                </div>
                <div class="sliders row row-cols-1 row-cols-lg-2 relative">
                    <div class="col">
                        <img src="{{asset('images/news.PNG')}}" alt="" class="w-100 h-100">
                    </div>
                    <div class="col sliders-info">
                        <h1 class="">الشروط</h1>
                        <p class="mt-1 mb-1">
                            السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر الإسلامي
                            على مدار الساعة وطوال أيام الأسبوع  
                        </p>
                        <p class="mt-1 mb-1">
                            إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                            بطاقة
                        </p>
                        <p class="mt-1 mb-1">
                            يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                            إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                            سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                            (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                        </p>
                        <p class="mt-1 mb-1">
                            تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                            الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                            طلب كشف حساب مختصر او الاستعلام عن الرصيد
                        </p>
                        <p class="border-bottom-second-2 fw-bold w-20 text-second-color">الشروط</p>
                    </div>
                </div>
                <div class="sliders row row-cols-1 row-cols-lg-2 relative">
                    <div class="col">
                        <img src="{{asset('images/news.PNG')}}" alt="" class="w-100 h-100">
                    </div>
                    <div class="col sliders-info">
                        <h1 class="">الاشتراك</h1>
                        <p class="mt-1 mb-1">
                            السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر الإسلامي
                            على مدار الساعة وطوال أيام الأسبوع  
                        </p>
                        <p class="mt-1 mb-1">
                            إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                            بطاقة
                        </p>
                        <p class="mt-1 mb-1">
                            يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                            إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                            سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                            (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                        </p>
                        <p class="mt-1 mb-1">
                            تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                            الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                            طلب كشف حساب مختصر او الاستعلام عن الرصيد
                        </p>
                        <p class="border-bottom-second-2 fw-bold w-20 text-second-color">الشروط</p>
                    </div>
                </div>
                <div class="sliders row row-cols-1 row-cols-lg-2 relative">
                    <div class="col">
                        <img src="{{asset('images/news.PNG')}}" alt="" class="w-100 h-100">
                    </div>
                    <div class="col sliders-info">
                        <h1 class="">أسئلة شائعة</h1>
                        <p class="mt-1 mb-1">
                            السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر الإسلامي
                            على مدار الساعة وطوال أيام الأسبوع  
                        </p>
                        <p class="mt-1 mb-1">
                            إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                            بطاقة
                        </p>
                        <p class="mt-1 mb-1">
                            يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                            إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                            سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                            (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                        </p>
                        <p class="mt-1 mb-1">
                            تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                            الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                            طلب كشف حساب مختصر او الاستعلام عن الرصيد
                        </p>
                        <p class="border-bottom-second-2 fw-bold w-20 text-second-color">الشروط</p>
                    </div>
                </div>
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
        <div class="success-info hv-80 relative" >
            <img src="{{asset('images/app.png')}}" alt="" class="absolute w-100 h-100">
            <div class="info relative">
                <h1 class="text-white">مولت مشروعي</h1>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
            </div>
        </div>
        <div class="success-info hv-80 relative" >
            <img src="{{asset('images/app.png')}}" alt="" class="absolute w-100 h-100">
            <div class="info relative">
                <h1 class="text-white"> hlkjhkljhk مولت مشروعي</h1>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
                <p class="mb-0 text-light-color">هذا النص هو مثال لنص يمكن أن يستبدل</p>
                <p class="mb-0 text-light-color">
                    هذا النص هو مثال لنص يمكن أن يستبدل هذا النص هو مثال لنص يمكن أن يستبدل
                </p>
            </div>
        </div>
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
            <div class="card">
                <div class="card-img">
                    <img src="{{asset('images/Al- kurimi 1 png.png')}}" alt="" class="w-100 h-100">
                </div>
                <h1> تمويل مشروعي</h1>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="{{asset('images/Al- kurimi 1 png.png')}}" alt="" class="w-100 h-100">
                </div>
                <h1> تمويل مشروعي</h1>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="{{asset('images/Al- kurimi 1 png.png')}}" alt="" class="w-100 h-100">
                </div>
                <h1> تمويل مشروعي</h1>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="{{asset('images/Al- kurimi 1 png.png')}}" alt="" class="w-100 h-100">
                </div>
                <h1> تمويل مشروعي</h1>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="{{asset('images/Al- kurimi 1 png.png')}}" alt="" class="w-100 h-100">
                </div>
                <h1> تمويل مشروعي</h1>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="{{asset('images/Al- kurimi 1 png.png')}}" alt="" class="w-100 h-100">
                </div>
                <h1> تمويل مشروعي</h1>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="{{asset('images/Al- kurimi 1 png.png')}}" alt="" class="w-100 h-100">
                </div>
                <h1> تمويل مشروعي</h1>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="{{asset('images/Al- kurimi 1 png.png')}}" alt="" class="w-100 h-100">
                </div>
                <h1> تمويل مشروعي</h1>
            </div>
        </div>
        <div class="d-flex justify-center mt-3 mb-3">
            <span class=" py-1 px-2 me-2 pointer next-btn bg-light-color"><i class="text-second-color fs-5 fa-solid fa-angle-right"></i></span>
            <span class=" py-1 px-2 pointer per-btn bg-light-color"><i class="text-second-color fs-5 fa-solid fa-angle-left"></i></span>
        </div>
        <div class="trand absolute d-flex justify-between w-100 h-80">
            <div class="right color"></div>
            <div class="left color"></div>
        </div>
    </div>
</section>
@endsection

@push('scripts_after')
<script>
    let slideIndex = 1;
showSlides(slideIndex, "sliders", "dot-feature");

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n, "sliders", "dot-feature");
}

function showSlides(n, sliders, dot) {
    let i;
    let slides = document.getElementsByClassName(sliders);
    let dots = document.getElementsByClassName(dot);
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "flex";
    dots[slideIndex - 1].className += " active";
    slides[slideIndex - 1].className += " active";
}


let slideProject = 1;
showSlidesProject(slideProject);


function plusSlides(n) {
    showSlidesProject(slideProject += n);
}
function showSlidesProject(n) {
    let i;
    let slides = document.getElementsByClassName("success-info");
    if (n > slides.length) {
        slideProject = 1
    }
    if (n < 1) {
        slideProject = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    // for (i = 0; i < dots.length; i++) {
    //     dots[i].className = dots[i].className.replace(" active", "");
    // }
    slides[slideProject - 1].style.display = "flex";
    // dots[slideIndex - 1].className += " active";
    slides[slideProject - 1].className += " active";
}

const newsSlider = [...document.querySelectorAll('.onther-services-slider')];
const card = [...document.querySelectorAll('.card')];
const right = [...document.querySelectorAll('.right')];
const left = [...document.querySelectorAll('.left')];
const nextBtn = [...document.querySelectorAll('.next-btn')];
const perBtn = [...document.querySelectorAll('.per-btn')];

newsSlider.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;
    nextBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
        console.log(item.scrollLeft)
        // if(newsSlider >0){
        //     left[i].style.display = "none";
        // }else{
        //     left[i].style.display = "block";
            
        // }
        
        
    });
    perBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
        // if(newsSlider > 0){
        //     right[i].style.display = "none";
        // }else{
        //     right[i].style.display = "block";
            
        // }
    })

})

</script>
@endpush