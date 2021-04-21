// initialaze some things
const buttons = document.querySelectorAll('.slider-titles-hrefs');
const sliders = document.querySelectorAll('.slide');
let area = document.querySelector('.slider-content');
const width = document.querySelector('.container').offsetWidth;


// show current page function
function show(i) {
	for (let ii=0; ii<sliders.length; ii++) {
		sliders[ii].style.height = '0';
		buttons[ii].classList.remove('title-active');
		sliders[ii].classList.remove('effectClass');
	}
	sliders[i].style.height = '100%';
	buttons[i].classList.add('title-active');
	sliders[i].classList.add('effectClass');
}

// click handler
for (let i=0; i<buttons.length; i++) {
	buttons[i].onclick = function () {
		show(i);
	}
}



show(0);
