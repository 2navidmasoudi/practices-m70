$(function () {
    $("#alert").hide();
    $('form').submit(function (e) {
        e.preventDefault();

        let data = {};
        $("form :input").each(function () {
            const input = $(this);
            if (!this.name) return;
            data[this.name] = input.val();
        });

        console.log(data);

        $.post({
            url: "/public/register.php",
            dataType: "json",
            data,
            success: function (result, textStatus) {
                console.log(result, textStatus);
            },
            error: function (e) {
                const message = e.responseJSON.message;
                $("#alert").text(message);
                $("#alert").show('slow');
                // $("#alert").slideUp();
            },
        });
    })
    $("#alert").removeClass("d-none");

})