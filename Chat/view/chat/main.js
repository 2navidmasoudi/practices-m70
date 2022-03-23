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
    }).then(response => {
        console.log(response);
        const { username, token, name } = response;



    })
});