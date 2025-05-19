$(document).ready(function(){

	var loginform = ".login-form";
    var invalidCls = "is-invalid";
    var $email = '[name="email"]';
    var loginbtn = '.login-form .th-btn';
    var $password = '[name="current-password"]';
    var $validation =
        '[name="name"],[name="email"],[name="subject"],[name="number"],[name="message"]'; // Must be use (,) without any space
    var formMessages = $(".login-form .form-messages");

    function login() {
        var formData = $(loginform).serialize();
        var valid;
        valid = validateLogin();
        if (valid) {
        	$(loginbtn).text('Authenticating...');
            jQuery
                .ajax({
                    url: $(loginform).attr("action"),
                    data: formData,
                    type: "POST",
                    dataType: "json",
                })
                .done(function (response) {
                    if( response.error == 1 ){
                    	formMessages.removeClass("success");
	                    formMessages.addClass("error");
	                    formMessages.text(response.error_message);
	                    $(loginbtn).text('Login');
                    } else {
	                    formMessages.removeClass("error");
	                    formMessages.addClass("success");
	                    formMessages.text(response.success_message);
	                    $(loginbtn).text('Loggedin');
	                    window.location.reload();
                    }
                })
                .fail(function (data) {
                	$(loginbtn).text('Login');
                    // Make sure that the formMessages div has the 'error' class.
                    formMessages.removeClass("success");
                    formMessages.addClass("error");
                    // Set the message text.
                    if (data.error_message !== "") {
                        formMessages.html(data.error_message);
                    } else {
                        formMessages.html(
                            "Oops! An error occured and your message could not be sent."
                        );
                    }
                });
        }
    }

    function sendContact() {
        var formData = $(form).serialize();
        var valid;
        valid = validateContact();
        if (valid) {
            jQuery
                .ajax({
                    url: $(form).attr("action"),
                    data: formData,
                    type: "POST",
                })
                .done(function (response) {
                    // Make sure that the formMessages div has the 'success' class.
                    formMessages.removeClass("error");
                    formMessages.addClass("success");
                    // Set the message text.
                    formMessages.text(response);
                    // Clear the form.
                    $(
                        form +
                        ' input:not([type="submit"]),' +
                        form +
                        " textarea"
                    ).val("");
                })
                .fail(function (data) {
                    // Make sure that the formMessages div has the 'error' class.
                    formMessages.removeClass("success");
                    formMessages.addClass("error");
                    // Set the message text.
                    if (data.responseText !== "") {
                        formMessages.html(data.responseText);
                    } else {
                        formMessages.html(
                            "Oops! An error occured and your message could not be sent."
                        );
                    }
                });
        }
    }

    function validateLogin()
    {
    	var valid = true;
        var formInput;

        if (
            !$(loginform+" "+$email).val() ||
            !$(loginform+" "+$email).val()
            .match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)
        ) {
            $(loginform+" "+$email).addClass(invalidCls);
            valid = false;
            return valid;
        } else {
            $(loginform+" "+$email).removeClass(invalidCls);
        }

        if ( !$(loginform+" "+$password).val() ) {
            $(loginform+" "+$password).addClass(invalidCls);
            valid = false;
        } else {
            $(loginform+" "+$password).removeClass(invalidCls);
            valid = true;
        }

        return valid;
    }

    function validateContact() {
        var valid = true;
        var formInput;

        function unvalid($validation) {
            $validation = $validation.split(",");
            for (var i = 0; i < $validation.length; i++) {
                formInput = form + " " + $validation[i];
                if (!$(formInput).val()) {
                    $(formInput).addClass(invalidCls);
                    valid = false;
                } else {
                    $(formInput).removeClass(invalidCls);
                    valid = true;
                }
            }
        }
        unvalid($validation);

        if (
            !$($email).val() ||
            !$($email)
            .val()
            .match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)
        ) {
            $($email).addClass(invalidCls);
            valid = false;
        } else {
            $($email).removeClass(invalidCls);
            valid = true;
        }
        return valid;
    }

    $(loginform).on("submit", function (element) {
        element.preventDefault();
        login();
    });

});