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








function getNewCars () {
  let classGetNew = new Getter('/get-new-cars');
  classGetNew.getSmthW().then(res => {data = res}).then(() => classShow.ShowCar(data, document.querySelector('.block-car-info-right')));
}


function getImages() {
  if(window.location.pathname !== ''){

    let datal = window.location.pathname;

  var pairs = datal.split('/');
   //создадим временный массив, чтобы записать значения и конечный объект, куда запишем ключи и их значение
  var tmp = []
  var searchl = {};

  for (i=0; i<pairs.length; i++) {
   tmp[i] = pairs[i].split('=');
  }
  //возвращаем объект ключей и значений
  console.log(tmp);
 }
}

// start code

getNewCars();