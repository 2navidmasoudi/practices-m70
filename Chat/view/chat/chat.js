import { EmojiButton } from '/node_modules/@joeattardi/emoji-button/dist/index.js';
import url from '/config.js';
import { addMessage, addSenderMessage, scrollToBottom, deleteSenderMessage, editMessage } from './message.js';
import upload from './upload.js';
$(function () {
    $("#edit").hide();
    $("#error").hide();
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
            $("main").addClass("flex").removeClass("hidden");
        }
    }).then(response => {
        getChat(response);
        const { username, token, name } = response;

        let previous = null;
        let current = null;
        setInterval(function () {
            $.getJSON("/db/chat.json", function (json) {
                current = json
                if (previous && current && !_.isEqual(previous, current)) {
                    // location.reload();
                    const diff = _.differenceWith(current, previous, _.isEqual);
                    diff.forEach(item => {
                        if (item.sender.username != username) {
                            if (item?.deleted) {
                                deleteSenderMessage(item);
                                return;
                            }
                            if (_.find(previous, d => d.id == item.id)) {
                                $(`#message_${item.id}`).text(item.message);
                                return;
                            }
                            addSenderMessage(item);
                        }


                    })
                }
                previous = current;
            });
        }, 2000);

        $("textarea").each(function () {
            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("keyup", function () {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        });

        upload();

        // Emoji picker and trigger
        const picker = new EmojiButton({
            theme: "dark",
            autoHide: false,
            position: {
                right: "15%",
                bottom: "3rem",
            },
        });
        const trigger = $('#emoji');

        picker.on('emoji', selection => {
            // `selection` object has an `emoji` property
            // containing the selected emoji
            $('#message').val(function (i, val) {
                return val + selection.emoji;
            })
        });

        trigger.on('click', () => picker.togglePicker(trigger));
    })

    const getChat = (user_data = {}) => {
        $.get("/public/chat/get.php")
            .done(async response => {

                // let itemsProcessed = 0;
                const { username, token, name } = user_data;

                await response.forEach(item => {
                    if (username == item.sender.username) {
                        addMessage(item, false);
                    } else {
                        addSenderMessage(item, false)
                    }

                    // itemsProcessed++;
                    // if (itemsProcessed === response.length) {
                    //     // scrollToBottom();
                    // }
                });
            });
        setTimeout(() => {
            scrollToBottom()
        }, 500);
    };


    const addChat = (message) => {
        $.post('/public/chat/add.php', { message })
            .done(response => addMessage(response));
    }

    $("#send").on('click', function () {
        const message = $("#message").val();
        if (message.length > 100) return false;
        $("#message").val('').focus();
        $("#limit").text("").css("color", "white");
        $("textarea").each(function () {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        })
        if (message) addChat(message);
    })

    $("#edit_button").on('click', function () {
        const message = $("#message").val();
        if (message.length > 100) return false;
        $("#message").val('').focus();
        $("#limit").text("").css("color", "white");
        $("textarea").each(function () {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        })
        if (this?.value) {
            editMessage(this.value, message);
            $("#close_edit").click();
            return;
        }
    })


    $('#message').keydown(function (e) {
        if (e.keyCode === 13 && e.ctrlKey) {
            $(this).val(function (i, val) {
                return val + "\n";
            });
        }
    }).keypress(function (e) {
        const limit = $("#message").val().length;
        if (e.keyCode === 13 && !e.ctrlKey) {
            if (limit <= 100) {
                if ($('#edit_button').attr('value')) {
                    $("#edit_button").click();
                } else {
                    $("#send").click();
                }
            }
            return false;
        }
    });

    $('#message').keyup(function () {
        const limit = $("#message").val().length;
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

    $("#close_edit").click(function () {
        $("#edit").hide('fast', function () {
            $("#edit_text").text("");
        })
        $("#message").val("");
        $("#edit_button").addClass('hidden').removeAttr("value");
        $("#upload").removeClass('hidden');
        $("#send").removeClass('hidden');
    })
});