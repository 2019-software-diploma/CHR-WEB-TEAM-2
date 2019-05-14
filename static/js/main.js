/* Main Function for page load */
windowsLoad();
function windowsLoad() {
    var text_max = 500;
    $('#count_message').html(text_max + ' / ' + text_max);
    $('#reason').keyup(function () {
        var text_length = $('#reason').val().length;
        var text_remaining = text_max - text_length;
        $('#count_message').html(text_remaining + ' / ' + text_max);
    });
    $('#reason').keypress(function () {
        return $('#reason').val().length < 500;
    });
    $(function () {
        $('.btn-register').click(function () {
            flip_dialog();
        });
    });
    autosize(document.getElementById("reason"));
}
/* Login/Register Dialog */
function cleanDialog() {
    $('.flip-container').removeClass('hover');
}

function flip_dialog(message, html) {
    $('.flip-container .back').height($('.flip-container .front').height());
    $(window).scrollTop(0)
    $('.flip-container').addClass('hover');
    $('.flip-container .btn-login').click(function () {
        $('.flip-container').removeClass('hover');
    });
}

/* Login/Register Password Encryption*/
function encryption_password(userName, passWord) {
    var hash = md5(sha256(userName + passWord)).toUpperCase();
    return hash;
}

function l_beforeSubmit() {
    var password = encryption_password($("#l_username").val(), $("#t_l_username").val());
    $("#l_password").val(password);
}

function r_beforeSubmit() {
    var password = encryption_password($("#r_username").val(), $("#t_r_username").val());
    $("#r_password").val(password);
}
/* Appointment */
function telephoneCheck(str) {
    var patt = new RegExp(/^\+?1?\s*?\(?\d{3}(?:\)|[-|\s])?\s*?\d{3}[-|\s]?\d{4}$/);
    return patt.test(str);
}
function formInputCheck(obj) {
    $("#" + obj.id).removeClass("is-valid");
    $("#" + obj.id).removeClass("is-invalid");
    if (obj.value != "") {
        $("#" + obj.id).addClass("is-valid");
    } else {
        $("#" + obj.id).addClass("is-invalid");
    }
    if (obj.id == "phone_number") {
        $("#" + obj.id).removeClass("is-valid");
        $("#" + obj.id).removeClass("is-invalid");
        telephoneCheck(obj.value) ? $("#" + obj.id).addClass("is-valid") : $("#" + obj.id).addClass("is-invalid");

    }
}

function formReset() {
    $("#first_name").removeClass("is-valid");
    $("#first_name").removeClass("is-invalid");
    $("#last_name").removeClass("is-valid");
    $("#last_name").removeClass("is-invalid");
    $("#phone_number").removeClass("is-valid");
    $("#phone_number").removeClass("is-invalid");
    $("#address").removeClass("is-valid");
    $("#address").removeClass("is-invalid");
    $("#reason").removeClass("is-valid");
    $("#reason").removeClass("is-invalid");
    $("#date").removeClass("is-valid");
    $("#date").removeClass("is-invalid");
    $("#time").removeClass("is-valid");
    $("#time").removeClass("is-invalid");
    $('#count_message').html("500 / 500");
}