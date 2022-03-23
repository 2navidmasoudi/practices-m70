import url from '/config.js';
console.log(url);
$(function () {
    $.get({
        url: url + "/public/info.php",
        error: function () {
            // window.location.replace("/");
        },
        success: function () {
            $("#loader").css('display', 'none');
            $("main").addClass("flex");
            $("main").removeClass("hidden");
        }
    }).then(response => {
        console.log(response);
        const { username, token, name } = response;
    })
});