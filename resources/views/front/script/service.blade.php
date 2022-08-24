<script>
    let slideIndex = 1;
    showSlides(slideIndex, "sliders", "dot-feature");

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
        });
        perBtn[i].addEventListener('click', () => {
            item.scrollLeft -= containerWidth;
        })

    })

</script>