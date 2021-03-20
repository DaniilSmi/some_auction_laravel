let maxWidth = 200;
let maxHeight = 100;
let inputText = document.querySelector('#ajax-textarea-infile-comments');
let submitB = document.querySelector('#ajax-submit-infile-comments');
let formDis = document.querySelector('#comments-form-infile'); 
inputText.oninput = function () {
    if (inputText.value != '') {
        submitB.classList.remove('disabled');
        formDis.removeAttribute('disabled');
    } else {
        submitB.classList.add('disabled');
        formDis.setAttribute('disabled', '');
        inputText.style.height = '61px';
    }

    if (inputText.scrollHeight > inputText.clientHeight) {
    	inputText.style.height = inputText.scrollHeight + 'px';
    }

}
