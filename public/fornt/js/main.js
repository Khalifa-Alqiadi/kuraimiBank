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
