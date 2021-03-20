// initialize variables
let MYAPP = {};
let i = 0;

class Getter 
{
  constructor (url) {
    this.url = url;
  }

  async getSmth (query) {
    this.query = query;
    // seting data
    let user = {
      query: this.query,
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

    return response;
  }

  async getSmthW () {
    // seting new ajax query
    let response = await fetch(this.url);

    if (response.ok) {
      let json = await response.json();
      return json;
    } else {
      alert("Ошибка HTTP: " + response.status);
    }
  }
}

class ShowSmthClass
{
  // creating new class object for show pagination button
  showPagination (buttonSmth) {
    this.buttonSmth = buttonSmth;
    // show button
    this.buttonSmth.style.display = "block";
  }
  // creating new class object for show cars
  ShowCar (response, area) {
    this.area = area;
    this.response = response;
    // show objects
    this.area.innerHTML += this.response;
  }

}


let classShow = new ShowSmthClass();

// show pagination controller
function checkPagi(data, offset) {
  if (Number(data) / 9 > 1 && data - 9 > offset) {
      classShow.showPagination(document.querySelector('#ajax-pagination-button'));
  }
}

// get information about objects and paginate
function paginate(offset) {
  let ClassGetPagInfo = new Getter('/get-pagination-info');
  ClassGetPagInfo.getSmthW().then(res => {data = res}).then(() => checkPagi(data[0]['count(*)'], offset));
}

// show car controller
function showAllCars(offset) {
  let classGet = new Getter('/post-get');
  classGet.getSmth(offset).then(res => {full = res}).then(() => classShow.ShowCar(full, document.querySelector('.block-content-index-2-left-content')));
  // paginate results
  paginate(offset);
}


// button listener
document.querySelector('#ajax-pagination-button').onclick = function () {
  i++;
  document.querySelector('#ajax-pagination-button').style.display = "none";
  showAllCars(i*9);
}

function getNewCars () {
  let classGetNew = new Getter('/get-new-cars');
  classGetNew.getSmthW().then(res => {data = res}).then(() => classShow.ShowCar(data, document.querySelector('.block-content-index-2-right-content')));
}

// start code
showAllCars(0);

getNewCars();