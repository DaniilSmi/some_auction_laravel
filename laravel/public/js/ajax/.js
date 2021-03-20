
/*
const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
let areaCar = document.querySelector('.block-content-index-2-left-content');
let areaNewCar = document.querySelector('.block-content-index-2-right-content');
let buttonPag = document.querySelector('#ajax-pagination-button');
let i = 0;


function showPagination() {
  buttonPag.style.display = "block";
}


async function getInfoPag(offset) {
  let user = {
  query: 'select count(*) from `car-imp`',
  };

  let response = await fetch('/post-get', {
    method: 'POST',
    headers: {
      "Content-Type": "application/json",
     "Accept": "application/json, text-plain, *//**",
     "X-Requested-With": "XMLHttpRequest",
     "X-CSRF-TOKEN": csrfToken
    },
    body: JSON.stringify(user)
  }).then(result => result.json())
    .then(data => {
        return data;
    });

    if (Number(response[0]['count(*)']) / 9 > 1 && response[0]['count(*)'] - 9 > offset) {
      showPagination();
    } 
}

function showCar(response, offset) {
  getInfoPag(offset);
  response.forEach((element) => {
    areaCar.innerHTML += '<div class="car-simple-block-2-index"><a href="#" class="a-car-block2-index"><div class="jsc"><img class="img-car-simple-block-2-index" src="/images/mbw.jpg"></div><div class="jsc marginfor"><div class="car-simple-block-2-index-content"><div class="car-content-title car-car-info"><span class="span-pointer">'+element['year']+' '+element["title"]+'</span></div><div class="car-content-info car-car-info"><span class="span-pointer">'+element['most_info']+'</span></div><div class="car-content-place"><span class="span-pointer">'+element['place']+'</span></div></div></div></a></div>';
  });
}

async function get (offset) {
  
  

  let user = {
  query: 'select * from `car-imp` limit 9 offset '+offset,
  };

  let response = await fetch('/post-get', {
    method: 'POST',
    headers: {
      "Content-Type": "application/json",
     "Accept": "application/json, text-plain, *//**",
     "X-Requested-With": "XMLHttpRequest",
     "X-CSRF-TOKEN": csrfToken
    },
    body: JSON.stringify(user)
  }).then(result => result.json())
    .then(data => {
        return data;
    });

  showCar(response, offset);
}


get(0);




buttonPag.onclick = function () {
  i++;
  buttonPag.style.display = "none";
  get(i*9);
}



function showCarNew(response) {
  
  response.forEach((element) => {
    areaNewCar.innerHTML += '<div class="car-new-left"><a href="#" class="a-car-block2-index"><div class="images-car-new"><img class="car-new-left-img-first" src="/images/mbw.jpg"><div class="car-new-left-img-other"> <img class="car-new-left-img-other-img" src="/images/mbw.jpg"><br><img class="car-new-left-img-other-img" src="/images/mbw.jpg"></div></div><div class="car-content-title car-car-info"><span class="span-pointer">'+element['year']+' '+element["title"]+'</span></div><div class="car-content-info car-car-info"><span class="span-pointer">'+element['most_info']+'</span></div><div class="car-content-place"><span class="span-pointer">'+element['place']+'</span></div></a></div>';
  });
}

async function getNew () {
  
  

  let user = {
  query: 'SELECT * FROM `car-imp` ORDER BY `upload-time` DESC LIMIT 10',
  };

  let response = await fetch('/post-get', {
    method: 'POST',
    headers: {
      "Content-Type": "application/json",
     "Accept": "application/json, text-plain, *//**",
     "X-Requested-With": "XMLHttpRequest",
     "X-CSRF-TOKEN": csrfToken
    },
    body: JSON.stringify(user)
  }).then(result => result.json())
    .then(data => {
        return data;
    });

  showCarNew(response);
}

getNew();

*/