export default (
    text,
    textColor = "text-red-400",
    progressColor = "bg-red-600",
    duration = 3000
) => {
    $("#alert_text").addClass(textColor);
    $("#progress").addClass(progressColor);

    $("#alert_text").text(text);
    $("#alert").show('fast', function () {
        $("#progress").animate({ width: "100%" }, duration - 500);
        setTimeout(() => {
            $(this).hide('fast', function () {
                $("#progress").animate({ width: 0 });
                $("#alert_text").text("");

                $("#alert_text").removeClass(textColor);
                $("#progress").removeClass(progressColor);
            });
        }, duration);
    });

    $("#close_alert").on("click", function () {
        $("#alert").hide('fast', function () {
            $("#progress").animate({ width: 0 });
            $("#alert_text").text("");
        });
    })

}