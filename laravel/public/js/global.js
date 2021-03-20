// initialze blocks
let mobileMenu = document.querySelector('.mobile-header');
let bodyF = document.querySelector('body');
const buttonOpenLogin = document.querySelector('#header-signup-button');
const buttonCloseMenu = document.querySelector('#close-login');
let loginWindow = document.querySelector('.login');
let registerWindow = document.querySelector('.register');
const buttopenR = document.querySelector('#open-new-account');
const buttonCloseRegister = document.querySelector('#close-register');
const userWindow = document.querySelector('#user-menu-toogle');
const nottiWindow = document.querySelector('#notifications-button');
let userMenu = document.querySelector('.menu-just');
let nottiMenu = document.querySelector('.notti-just');
const forgot_open = document.querySelector('#open-forgot-password');
let forgot_window = document.querySelector('.forgot-password');
const close_forgot = document.querySelector('#close-forgot');
const htS = document.querySelector('.form-or-data').innerHTML;
/*open-new-account*/
// show menu for mobile 


function showMobileMenu() {
	mobileMenu.style.transform = 'translateX(0)';
	document.querySelector('body').style.overflow = 'hidden';
}

// close menu for mobile

function closeMobileMenu () {
	mobileMenu.style.transform = 'translateX(100%)';
	document.querySelector('body').style.overflow = 'visible';
}

// register and login show
try {
buttonOpenLogin.onclick = function () {
	closeMobileMenu();
	bodyF.style.overflow = 'hidden';
	loginWindow.style.display = "flex";
}
} catch {}


buttonCloseMenu.onclick = function () {
	bodyF.style.overflow = 'visible';
	loginWindow.style.display = "none";
}

buttopenR.onclick = function () {
	closeMobileMenu();
	bodyF.style.overflow = 'hidden';
	loginWindow.style.display = "none";
	registerWindow.style.display = "flex";
}


buttonCloseRegister.onclick = function () {
	bodyF.style.overflow = 'visible';
	loginWindow.style.display = "none";
	registerWindow.style.display = "none";
}

try {
userWindow.onclick = function () {
	nottiMenu.classList.remove('menu-just-display');
	userMenu.classList.toggle('menu-just-display');
}
} catch {}

try {
nottiWindow.onclick = function () {
	userMenu.classList.remove('menu-just-display');
	nottiMenu.classList.toggle('menu-just-display');
}
} catch {}

forgot_open.onclick = function () {
	bodyF.style.overflow = 'none';
	loginWindow.style.display = "none";
	forgot_window.style.display = "flex";
}

close_forgot.onclick = function () {
	bodyF.style.overflow = 'visible';
	forgot_window.style.display = "none";
}