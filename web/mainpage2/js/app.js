const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

// let navToggle = document.querySelector(".nav__toggle");
// let navWrapper = document.querySelector(".nav__wrapper");

// navToggle.addEventListener("click", function () {
//     if (navWrapper.classList.contains("active")) {
//         this.setAttribute("aria-expanded", "false");
//         this.setAttribute("aria-label", "menu");
//         navWrapper.classList.remove("active");
//     } else {
//         navWrapper.classList.add("active");
//         this.setAttribute("aria-label", "close menu");
//         this.setAttribute("aria-expanded", "true");
//     }
// });
document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#060f16';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});


menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});