import url from '/config.js';
import { addMessage, addSenderMessage, scrollToBottom } from './message.js';
$(function () {
    // $("#loader").css('display', 'none');
    // $("main").addClass("flex");
    // $("main").removeClass("hidden");
    $.get({
        url: url + "/public/info.php",
        error: function () {
            window.location.replace("/");
            return false;
        },
        success: function () {
            $("#loader").css('display', 'none');
            $("main").addClass("flex");
            $("main").removeClass("hidden");
        }
    }).then(response => {
        // updateChat(response);
        getChat(response);
        const { username, token, name } = response;

        // setInterval(function () {
        //     $("#messages").html("")
        //     getChat(response);
        // }, 1000);

        let previous = null;
        let current = null;
        setInterval(function () {
            $.getJSON("/db/chat.json", function (json) {
                current = json
                if (previous && current && !_.isEqual(previous, current)) {
                    // location.reload();
                    const diff = current.slice(previous.length)
                    diff.forEach(item => {
                        if (item.sender.username != username) {
                            addSenderMessage(item.message, item.sender.name);
                        }
                    })
                }
                previous = current;
            });
        }, 2000);

        $("textarea").each(function () {
            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("input", function () {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        });
    })

    const getChat = (user_data = {}) => {
        $.get("/public/chat/get.php")
            .done(async response => {

                let itemsProcessed = 0;
                const { username, token, name } = user_data;

                await response.forEach(r => {
                    if (username == r.sender.username) {
                        addMessage(r.message, false);
                    } else {
                        addSenderMessage(r.message, r.sender.name, false)
                    }

                    itemsProcessed++;
                    if (itemsProcessed === response.length) {
                        // scrollToBottom();
                    }
                });
            });
        setTimeout(() => {
            scrollToBottom()
        }, 500);
    };


    const addChat = (message) => {
        $.post('/public/chat/add.php', { message })
            .done(response => addMessage(response.message));
    }

    $("#send").on('click', function () {
        const message = $("#message").val();
        if (message.length > 100) return false;
        $("#message").val('').focus();
        $("#limit").text("").css("color", "white");
        if (message) addChat(message);
    })

    $('#message').keyup(function (event) {
        const limit = $("#message").val().length;
        if ((event.keyCode == 10 || event.keyCode == 13) && event.ctrlKey) {
            $("#send").click();
        }

        if (limit >= 50) {
            $("#limit").text(limit + "/100");
        } else {
            $("#limit").text("");
        }

        if (limit <= 100) {
            $("#limit").css("color", "white");
        } else {
            $("#limit").css("color", "red");
        }
    });
});