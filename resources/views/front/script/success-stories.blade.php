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
    
        slides[slideImages - 1].className += " active";
    }
</script>