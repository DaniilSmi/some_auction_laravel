// initialize variables
let MYAPP = {};
let i = 0;
let bodyF1 = document.querySelector('body');
let loginWindow1 = document.querySelector('.login');
let submitB1 = document.querySelector('#ajax-submit-infile-comments');
let formDis1 = document.querySelector('#comments-form-infile'); 
let inputText1 = document.querySelector('#ajax-textarea-infile-comments');
let reply_text1 = document.querySelector('#reply_text span');
let reply_comments_area1 = document.querySelector('.reply_comments');
let input_reply_id1 = document.querySelector('#id_com_reply');
const buttons = document.querySelectorAll('.slider-titles-hrefs');
const sliders = document.querySelectorAll('.slide');
let area = document.querySelector('.slider-content');
const width = document.querySelector('.container').offsetWidth;
let areeF = document.querySelectorAll('.slide');
let coomt = document.querySelectorAll('.comment-text p');

// set id variable

function setId(id) {
 publicId = id;
}

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
      let json = await response.json();
      return json;
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






function getNewest() {
  let getN = new Getter('/get-newest-comments/'+publicId);
  getN.getSmthW().then(res => areeF[0].innerHTML = res);
}

function getUpvoted() {

}

function getSeller() {

}

function getBids() {
  
}



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
    // check for click data
    if (i==0) {
      getNewest();
    } else if (i==1) {
      getUpvoted();
    }else if (i==2) {
      getSeller();
    } else {
      getBids();
    }
  }
}

// start position
window.onload = function () {
  show(0);
  getNewest();
}


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
            reply_text1.innerHTML = '';
            reply_comments_area1.style.display = "none";
            inputText1.style.paddingLeft = '0.5rem';
            input_reply_id1.value = ''; 
            show(0);
            getNewest();
          }
        }).fail(function(response) {
          console.log(response);
        });
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault(); 
      });
});


