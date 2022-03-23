$(function () {

    // window.location.replace("/view/chat");

    $("#alert").hide();
    $("#alert").removeClass("d-none");

    $(document).keypress(function (e) {
        if (e.which == 13) {
            $("form").submit();
        }
    });

    $('form').submit(function (e) {
        e.preventDefault();

        let data = {};
        $("form :input").each(function () {
            const input = $(this);
            if (!this.name) return;
            data[this.name] = input.val();
        });

        $.post({
            url: "/public/register.php",
            dataType: "json",
            data,
            success: function (response) {
                $("#alert").hide('fast');
                $("input").addClass("is-valid");
                $("input").removeClass("is-invalid");

                if (response.location) {
                    window.location.href = response.location;
                }
            },
            error: function (e) {
                console.log(e);
                const message = e.responseJSON.message;
                $("#alert").hide('slow', function () {
                    $(this).text(message).show('slow');
                });
                if (e.status == 408) {
                    const username = $("input[name=username]");
                    username.focus();
                    username.removeClass("is-valid");
                    username.addClass("is-invalid");
                }

                if (e.status == 422) {
                    const username = $("input[name=username]");
                    const email = $("input[name=email]");
                    const name = $("input[name=name]");
                    const password = $("input[name=password]");

                    // email is validated in ui
                    email.addClass('is-valid');

                    if (e.responseJSON.inputError == 1) {
                        let focus = false;
                        $("input").each(function () {
                            if (!this.value) {
                                if (!focus) {
                                    $(this).focus();
                                    focus = true;
                                }
                                $(this).removeClass("is-valid");
                                $(this).addClass("is-invalid");
                            } else {
                                $(this).removeClass("is-invalid");
                                $(this).addClass("is-valid");
                            }
                        })
                    }

                    if (e.responseJSON.inputError == 2) {
                        username.focus();
                        username.removeClass("is-valid");
                        username.addClass("is-invalid");
                    }
                    if (e.responseJSON.inputError == 3) {
                        username.addClass("is-valid");
                        username.removeClass("is-invalid");

                        name.focus();
                        name.removeClass("is-valid");
                        name.addClass("is-invalid");
                    }
                    if (e.responseJSON.inputError == 4) {
                        username.addClass("is-valid");
                        username.removeClass("is-invalid");
                        name.addClass("is-valid");
                        name.removeClass("is-invalid");

                        password.focus();
                        password.removeClass("is-valid");
                        password.addClass("is-invalid");
                    }
                }
            },
        });
    })

})