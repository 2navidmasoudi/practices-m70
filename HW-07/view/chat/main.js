$(function () {
    $.get({
        url: "/public/info.php",
        error: function () {
            window.location.replace("/");
        },
        success: function () {
            $("#loader").css('display', 'none');
            $("main").removeClass("hidden");
        }
    }).then(e => {
        console.log(e);

    })
});