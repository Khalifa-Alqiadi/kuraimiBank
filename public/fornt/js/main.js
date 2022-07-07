const hamburger = document.querySelector('.navbar .hamburger');
const mobile_menu = document.querySelector('.navbar .nav-items');
const menu_item = document.querySelectorAll('.navbar .nav-items ul li');
const header = document.querySelector('navbar.container');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobile_menu.classList.toggle('active');
});

// document.addEventListener('scroll', () => {
//     const header = document.querySelector('.header');
//     var scroll_position = window.scrollY;
//     if(scroll_position > 200){
//         header.style.backgroundColor = "#29323c";
//         header.style.transition = "1s ease all";
//     }else{
//         header.style.backgroundColor = "transparent";
//     }
// });

menu_item.forEach((item) => {
    item.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        mobile_menu.classList.toggle('active');
    });
});


var sliderHero = Array.from(document.querySelectorAll(".hero .hero-info"));

var sliderCount = sliderHero.length;
var currentSlider = 1;

var paginationElement = document.createElement('ul');
paginationElement.setAttribute('id', 'pagination-ul');
for (var i = 1; i <= sliderCount; i++) {
    var paginationItems = document.createElement('li');
    paginationItems.setAttribute('data-index', i);
    // paginationItems.appendChild(document.createTextNode(i));
    paginationElement.appendChild(paginationItems);
    console.log(i)

}
document.getElementById('indicators').appendChild(paginationElement);

var paginationCreatedUl = document.getElementById('pagination-ul')
var paginationsBullets = Array.from(document.querySelectorAll("#pagination-ul li"));
for (var i = 0; i < paginationsBullets.length; i++) {
    paginationsBullets[i].onclick = function () {
        currentSlider = parseInt(this.getAttribute('data-index'))
        theChecker()
    }
}

function theChecker() {
    removeAllActive();
    sliderHero[currentSlider - 1].classList.add('active');
    paginationCreatedUl.children[currentSlider - 1].classList.add('active')

}


function removeAllActive() {
    sliderHero.forEach(function (hero) {
        hero.classList.remove('active')
    });
    paginationsBullets.forEach(function (bullets) {
        bullets.classList.remove('active')
    })
}
theChecker()


const newsSlider = [...document.querySelectorAll('.card-slider')];
const card = [...document.querySelectorAll('.card')];
const nextBtn = [...document.querySelectorAll('.news .next-btn')];
const perBtn = [...document.querySelectorAll('.news .per-btn')];

newsSlider.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;
    nextBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    });
    perBtn[i].addEventListener('click', () => {
        console.log(item.scrollLeft)
        item.scrollLeft -= containerWidth;
    })

})


let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
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
