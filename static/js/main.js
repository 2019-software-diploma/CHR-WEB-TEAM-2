function flip() {
    var btn = document.querySelector("#Login").classList.toggle("flip");
}

function telephoneCheck(str) {
    var patt = new RegExp(/^\+?1?\s*?\(?\d{3}(?:\)|[-|\s])?\s*?\d{3}[-|\s]?\d{4}$/);
    return patt.test(str);
}

function formInputCheck(obj) {
    $("#" + obj.id).removeClass("is-valid");
    $("#" + obj.id).removeClass("is-invalid");
    telephoneCheck(obj.value) ? $("#" + obj.id).addClass("is-valid") : $("#" + obj.id).addClass("is-invalid");
}