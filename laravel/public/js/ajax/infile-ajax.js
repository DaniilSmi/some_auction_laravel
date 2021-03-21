// initialize variables
let MYAPP = {};
let i = 0;
let bodyF1 = document.querySelector('body');
let loginWindow1 = document.querySelector('.login');
let submitB1 = document.querySelector('#ajax-submit-infile-comments');
let formDis1 = document.querySelector('#comments-form-infile'); 
let inputText1 = document.querySelector('#ajax-textarea-infile-comments');

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



// comment form sender

$(function() {
      $('#comments-form-infile').submit(function(e) {
        var $form = $(this);
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function(response) {
          console.log(response);
          if (response == 'not-auth') {
              closeMobileMenu();
              bodyF1.style.overflow = 'hidden';
              loginWindow1.style.display = "flex";
          } 
          if (response == 1) {

            document.querySelector('#ajax-textarea-infile-comments').value = '';
            submitB1.classList.add('disabled');
            formDis1.setAttribute('disabled', '');
            inputText1.style.height = '61px';
          }
        }).fail(function(response) {
          console.log(response);
        });
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault(); 
      });
});
