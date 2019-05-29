/* Main Function for page load */
windowsLoad();
function windowsLoad() {
    $("#l_username").focusout(function (event) {
        formInputCheck(this);
    });
    $("#t_l_password").focusout(function (event) {
        formInputCheck(this);
    });
    $("#t_r_password").focusout(function (event) {
        formInputCheck(this);
    });
    $("#c_r_password").focusout(function (event) {
        formInputCheck(this);
    });
    $("#email").focusout(function (event) {
        formInputCheck(this);
    });
    $("#loginForm").submit(function (event) {
        event.preventDefault();
    });
    $("#registerForm").submit(function (event) {
        event.preventDefault();
    });
    $("#profileForm").submit(function (event) {
        event.preventDefault();
    });
    $("#appt_Reset").click(function (event) {
        formReset();
    });
    $("#phone_number").keypress(function (event) {
        if (!(event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10))
            event.preventDefault();
    });
    $("#first_name").focusout(function (event) {
        formInputCheck(this);
    });
    $("#last_name").focusout(function (event) {
        formInputCheck(this);
    });
    $("#phone_number").focusout(function (event) {
        formInputCheck(this);
    });
    $("#address").focusout(function (event) {
        formInputCheck(this);
    });
    $("#reason").focusout(function (event) {
        formInputCheck(this);
    });
    $("#date").focusout(function (event) {
        formInputCheck(this);
    });
    $("#time").focusout(function (event) {
        formInputCheck(this);
    });
    $("#login_btn").click(function () {
        postLogin();
    });
    $("#register").click(function () {
        postRegister();
    });
    $("#update").click(function () {
        postProfile();
    });
    var text_max = 500;
    $('#count_message').html(text_max + ' / ' + text_max);
    $('#reason').keyup(function () {
        var text_length = $('#reason').val().length;
        var text_remaining = text_max - text_length;
        $('#count_message').html(text_remaining + ' / ' + text_max);
    });
    $('#message').keyup(function () {
        var text_length = $('#message').val().length;
        var text_remaining = text_max - text_length;
        $('#count_message').html(text_remaining + ' / ' + text_max);
    });
    $('#comment').keyup(function () {
        var text_length = $('#comment').val().length;
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
    autosize(document.getElementById("message"));
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

/* Login/Register*/
function checkPassword() {
    $("#c_r_password").removeClass("is-valid");
    $("#c_r_password").removeClass("is-invalid");
    var password1 = $('#t_r_password').val(),
        password2 = $('#c_r_password').val();
    if (password1 === password2) {
        $('#c_r_password').addClass("is-valid");
        r_beforeSubmit();
    } else {
        $("#c_r_password").addClass("is-invalid");
        $("#r_password").val("");
    }
}

function postLogin() {
    $("#lgoin").attr("disabled", "disabled");
    if ($("#l_password").val() === "")
        return;
    $.post('api.php',
        {
            action: 'Login',
            username: $("#l_username").val(),
            password: $("#l_password").val()
        },
        function (result) {
            if (result.Code !== 0) {
                $(".front .modal-dialog").before("<div class=\"alert alert-danger alert-dismissable fade show\" data-dismiss=\"alert\" data-alert=\"alert\" role=\"alert\">\n" +
                    "<strong>Login not success!</strong> You should check your user or password, and try again later.\n" +
                    "</div>");
                $("#register").removeAttr("disabled");
                setTimeout(function () {
                    $(".alert").alert("close");
                }, 2000);
            } else {
                $(".front .modal-dialog").before("<div class=\"alert alert-success alert-dismissable fade show\" data-dismiss=\"alert\" data-alert=\"alert\" role=\"alert\">\n" +
                    "<strong>Login success!</strong> You should redirect automatically after 2 seconds, if not please click this <a href=\"javascript:location.reload();\" class=\"alert-link\">link</a>.\n" +
                    "</div>");
                setTimeout(function () {
                    window.location.reload();
                }, 2000)
            }
        },
        'json'
    );
}

function postRegister() {
    $("#register").attr("disabled", "disabled");
    if ($("#r_password").val() === "")
        return;
    var receive_email = 0; //Don't receive email
    if ($("#newsLetter").is(':checked'))
        receive_email = 1;
    $.post('api.php',
        {
            action: 'Register',
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            password: $("#r_password").val(),
            email: $("#email").val(),
            newsletter: receive_email
        },
        function (result) {
            if (result.Code !== 0) {
                $(".back .modal-dialog").before("<div class=\"alert alert-danger alert-dismissable fade show\" data-dismiss=\"alert\" data-alert=\"alert\" role=\"alert\">\n" +
                    "<strong>Register not success!</strong> You should check all of your information, and try again later.\n" +
                    "</div>");
                $("#register").removeAttr("disabled");
                setTimeout(function () {
                    $(".alert").alert("close");
                }, 2000)
            } else {
                $(".back .modal-dialog").before("<div class=\"alert alert-success alert-dismissable fade show\" data-dismiss=\"alert\" data-alert=\"alert\" role=\"alert\">\n" +
                    "<strong>Register success!</strong> You should redirect automatically after 2 seconds, if not please click this <a href=\"javascript:location.reload();\" class=\"alert-link\">link</a>.\n" +
                    "</div>");
                setTimeout(function () {
                    window.location.reload();
                }, 2000)
            }
        },
        'json'
    );
}
/*  Password Encryption */
function encryption_password(passWord) {
    var hash = md5(sha256(passWord)).toUpperCase();
    return hash;
}

function l_beforeSubmit() {
    var password = encryption_password($("#t_l_password").val());
    $("#l_password").val(password);
}

function r_beforeSubmit() {
    var password = encryption_password($("#c_r_password").val());
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
        telephoneCheck(obj.value) ? $("#" + obj.id).addClass("is-valid") : $("#" + obj.id).addClass("is-invalid");
    } else if (obj.id == "c_r_password") {
        checkPassword();
    } else if (obj.id == "t_l_password"){
        l_beforeSubmit();
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

/* Profile */
function postProfile() {
    $("#update").attr("disabled", "disabled");
    if ($("#email2").val() === "")
        return;
    var receive_email = 0; //Don't receive email
    if ($("#subscription").is(':checked'))
        receive_email = 1;
    $.post('api.php',
        {
            action: 'update',
            ID: $("#id").val(),
            address: $("#address").val(),
            phone: $("#phone_number").val(),
            email: $("#email2").val(),
            sub: receive_email
        },
        function (result) {
            if (result.Code !== 0) {
                $("#profileForm").before("<div class=\"alert alert-danger alert-dismissable fade show\" data-dismiss=\"alert\" data-alert=\"alert\" role=\"alert\">\n" +
                    "<strong>Update not success!</strong> You should check your user or password, and try again later.\n" +
                    "</div>");
                $("#register").removeAttr("disabled");
                setTimeout(function () {
                    $(".alert").alert("close");
                }, 2000);
            } else {
                $("#profileForm").before("<div class=\"alert alert-success alert-dismissable fade show\" data-dismiss=\"alert\" data-alert=\"alert\" role=\"alert\">\n" +
                    "<strong>Update success!</strong> You should redirect automatically after 2 seconds, if not please click this <a href=\"javascript:location.reload();\" class=\"alert-link\">link</a>.\n" +
                    "</div>");
                setTimeout(function () {
                    window.location.reload();
                }, 2000)
            }
        },
        'json'
    );
}