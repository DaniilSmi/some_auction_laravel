let maxWidth = 200;
let maxHeight = 100;
let inputText = document.querySelector('#ajax-textarea-infile-comments');
let submitB = document.querySelector('#ajax-submit-infile-comments');
let formDis = document.querySelector('#comments-form-infile'); 
const close_reply = document.querySelector('#close_reply');
let reply_text = document.querySelector('#reply_text span');
let reply_comments_area = document.querySelector('.reply_comments');
let input_reply_id = document.querySelector('#id_com_reply');

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


close_reply.onclick = function() {
    reply_text.innerHTML = '';
    reply_comments_area.style.display = "none";
    inputText.style.paddingLeft = '0.5rem';
    input_reply_id.value = ''; 
}


function showReply (text, parent_id) {
    // set text for user view
    reply_text.innerHTML = text;
    // show reply_text
    reply_comments_area.style.display = "block";
    // get width
    let widthPL = Number(window.getComputedStyle(reply_comments_area).width.replace('px', '')) + 25;
    // set padding
    inputText.style.paddingLeft = widthPL+"px";
    // set reply value for form
    input_reply_id.value = parent_id; 
    // scroll to text area
    inputText.scrollIntoView({block: "center", inline: "center", behavior: "smooth"});
}