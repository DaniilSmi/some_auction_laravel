//class for get information from database
class GetterCounter
{
	constructor (url) {
		this.url = url;
	}

  async getter() {
    // seting new ajax query
    let response = await fetch(this.url);

    if (response.ok) {
      let json = await response.json();
      return json;
    } else {
      alert("Ошибка HTTP: " + response.status);
    }
  }


	getterInterface() {
		return this.getter();
	}
}

// class for show values
class ShowerCounter
{

	constructor (value, object) {
		this.value = value;
		this.object = object;
	}

	showData () {
		document.querySelector(this.object).innerHTML = this.value;

	}

	showDataInterface () {
		return this.showData();
	}
}

// class for count date
class CountDate
{
	constructor (object) {
		this.object = object;
	}

	countD () {
		if (this.object.innerHTML.substr(2) != 'Days' && this.object.innerHTML.substr(2) != 'Day') {
			let dateStr = this.object;
			//set timer for deleting seconds
			let timer = setInterval(function () {
				// set date to another format
				let date = new Date('"Wed, 27 July 2016 '+dateStr.innerHTML+' +0300');
		    if (dateStr.innerHTML != '00:00:00' && dateStr.innerHTML != 'finaled') { 
		    	// delete second
		    	date.setSeconds(date.getSeconds() - 1);
		    	// transform date object to string
		    	date = date.toString();
		    	// delete
		    	let ddd = date.replace('Wed Jul 27 2016 ', '');
		    	ddd = ddd.replace(' GMT+0300 (Москва, стандартное время)', ''); 
		    	// show result
		    	dateStr.innerHTML = ddd;
		    } else {
		    	dateStr.innerHTML = 'finaled';
		    }
			}, 1000)
		} 

	}

	countDInterface () {
		this.countD();
	}
}
// starting code
function countM(id) {
	// set new class for get data from `/get-time/`
	let time = new GetterCounter('/get-time/'+id);

	time.getterInterface().then(res => new ShowerCounter(res, '.time-left-p span').showDataInterface()).then(() => new CountDate(document.querySelector('.time-left-p span')).countDInterface());
}