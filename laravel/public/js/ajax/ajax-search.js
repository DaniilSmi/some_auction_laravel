// initialize variables
let width451 = document.querySelectorAll('#header-search')[0];
let width452 = document.querySelectorAll('#header-search')[1];
let widthAtall = document.querySelectorAll('#header-search');
const width45 = window.getComputedStyle(width451).width;
let areaSearch = document.querySelectorAll('.ajax-search-index ul');
const buttonsSub = document.querySelectorAll('#header-search-submit');
const hrefsClickAjax = document.querySelectorAll('.ajax-search-a');
const areaSearchMi = document.querySelectorAll('.desktop-header-form');

// delete exception
try {
	// set styles for ajax-result area
	document.querySelectorAll('.ajax-search-index')[0].style.width = width45;
	document.querySelectorAll('.ajax-search-index')[1].style.width = width45;
} catch {}

// class for show some DOM objects
class Shower
{
	// initialize class variables
	constructor (object, quantity, style) {
		this.object = object;
		this.quantity = quantity;
		this.style = style;
	}

	// function for show object
	showMechanisme() {
		for (let i=0; i<this.quantity; i++) {
			this.object[i].style.display = this.style;
		}
	}

	// interface for function 
	showInterface () {
		return this.showMechanisme();
	}
}

// class for show titles into ajax-area
class ShowerTitles 
{
	showTitles (titles, value) {
		// get results
		let titlesSort = titles;
		// set null value for ajax-search area
    areaSearch[0].innerHTML = '';
		areaSearch[1].innerHTML = '';
		// show or close ajax
		if (titlesSort.length == 0) {
			let classShwer = new Shower(document.querySelectorAll('.ajax-search-index'), document.querySelectorAll('.ajax-search-index').length, 'none');
			classShwer.showInterface();
		} else {
			let classShwer = new Shower(document.querySelectorAll('.ajax-search-index'), document.querySelectorAll('.ajax-search-index').length, 'block');
			classShwer.showInterface();
		}

		// show titles
		for (let ii = 0; ii<areaSearch.length; ii++) {
			areaSearch[ii].innerHTML += '<a href="search/q/'+value+'" class="ajax-search-a"><li>'+value+'</li></a>';
			for (let i=0; i<titlesSort.length; i++) {
				areaSearch[ii].innerHTML += '<a href="search/q/'+titlesSort[i]['title']+'" class="ajax-search-a"><li>'+titlesSort[i]['title']+'</li></a>';
			}
		}
	}

	// show titles interface
	showTitlesInterface(titles, value) {
		this.showTitles(titles, value);
	}
}

// class for get results from server
class GetterInfo
{
	constructor (url, searchQuery) {
		this.url = url;
		this.searchQuery = searchQuery;
	}	


	// get some data 
	async doSearchInfo() {
    // seting data
    let user = {
      query: this.searchQuery,
    };
    // seting new ajax query
    let response = await fetch(this.url, {
      method: 'POST',
      headers: {
      "Content-Type": "application/json",
      "Accept": "application/json, text-plain, */*",
      "X-Requested-With": "XMLHttpRequest",
      "X-CSRF-TOKEN": document.head.querySelector("[name~=csrf-token][content]").content
    },
    body: JSON.stringify(user)
    }).then(result => result.json())
    .then(data => {
      return data;
    });

    // return result 
    return response;
	}

	// just an interface for ajax-getter
	async getSearchInfoInterface() {
		return this.doSearchInfo();
	}
}

// controller for ajax-search
class OnInput
{
	constructor (thing) {
		this.thing = thing;
	}

	doControl () {
		// checking for results from server
		if (this.thing.value != '' && this.thing.value.length > 1) {
			// get data and show titles

			let ext = new GetterInfo('/get-titles-for-search', this.thing.value);
			let classShwerrr = new ShowerTitles();
			ext.getSearchInfoInterface().then(res => classShwerrr.showTitlesInterface(res, this.thing.value));
		} else {
			// close ajax-area
			let classShwer = new Shower(document.querySelectorAll('.ajax-search-index'), document.querySelectorAll('.ajax-search-index').length, 'none');
			classShwer.showInterface();
		}
	}

	// interface for controller
	doControlInterface() {
		this.doControl();
	}
}

// reload ajax-search when user typing
width451.oninput = function () {
	let classRet = new OnInput(width451);
	classRet.doControlInterface();
}

// reload ajax-search when user typing
width452.oninput = function () {
	let classRet = new OnInput(width452);
	classRet.doControlInterface();
}


// check for arrows down
for (let i=0; i<widthAtall.length; i++) {
		// set counter
		let im = 0;
		// check for input and reload counter

		widthAtall[i].addEventListener('input', function (e) {im=0; }, false);
		// check for buttons down


		document.addEventListener('keydown', function(event) {
			if (event.code == 'Enter' || event.code == 'NumpadEnter') {
				if (widthAtall[0].value != '') {
					if (widthAtall[0] === document.activeElement) {
						window.location.href = 'search/q/'+widthAtall[0].value;
					}
				}
			}
			
			// check for arrow down
	  if (event.code == 'ArrowDown') {

	  	if (im < document.querySelectorAll('.ajax-search-view a').length/2) {
	  	let areaSearchLi = document.querySelectorAll('.ajax-search-view a');

	  	for (let iii=0; iii<areaSearchLi.length; iii++) {
	  		areaSearchLi[iii].classList.remove('activeLi');
	  	}

	  	im++;

	  	if (im <= areaSearchLi.length-1) {
	  		areaSearchLi[im-1].classList.add('activeLi');
	  		widthAtall[i].value = document.querySelectorAll('.ajax-search-view a li')[im-1].innerHTML;
	  		widthAtall[i].selectionStart = widthAtall[i].value.length;
	  	} else {
	  	}
	  }
	}

	
	if (event.code == 'ArrowUp') {

	  	if (im > 0) {
	  	let areaSearchLi = document.querySelectorAll('.ajax-search-view a');

	  	for (let iii=0; iii<areaSearchLi.length; iii++) {
	  		areaSearchLi[iii].classList.remove('activeLi');
	  	}

	  	im--;

	  	if (im > 0) {
	  		areaSearchLi[im-1].classList.add('activeLi');
	  		widthAtall[i].value = document.querySelectorAll('.ajax-search-view a li')[im-1].innerHTML;
	  	}
	  }
	}


	});	
}

for (let i=0; i<buttonsSub.length; i++) {
	buttonsSub[i].onclick = function () {
		if (widthAtall[i].value != '') {
			window.location.href = 'search/q/'+widthAtall[i].value;
		}
	}
}


window.onclick = function (event) {
	if (event.target != widthAtall && event.target != widthAtall && event.target != hrefsClickAjax && event.target != areaSearch) {
		areaSearch[0].innerHTML = '';
		areaSearch[1].innerHTML = '';
		let classShwer = new Shower(document.querySelectorAll('.ajax-search-index'), document.querySelectorAll('.ajax-search-index').length, 'none');
		classShwer.showInterface();
		im = 0;
	}
}