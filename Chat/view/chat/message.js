export const addMessage = (data, animate = true) => {
    if ($(".chat-message > div").last().hasClass('justify-end')) {
        $("#messages > .chat-message:last-child > div > div > div").last().animate({
            borderBottomRightRadius: '0.5rem',
            WebkitBorderBottomRightRadius: '0.5rem',
        }, animate ? 'slow' : 0)
        $(`
            <div id="message_${data.id}" class="px-4 py-2 group rounded-lg inline-block rounded-br-none bg-blue-600 ${!data?.deleted ? "text-white" : "text-gray-300 italic"} relative">
                ${!data?.deleted ? data.message.replace(/\n\r?/g, '<br />') : "this message has been deleted."}
                ${!data?.deleted ? menu(data) : ""}
            </div>
        `)
            .hide()
            .appendTo("#messages > .chat-message:last-child > div > div")
            .show(animate ? 'fast' : 0, function () {
                if (animate) {
                    scrollToBottom();
                }
            })
    } else {
        $(`
            <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                        <div id="message_${data.id}" class="relative px-4 py-2 group rounded-lg inline-block rounded-br-none bg-blue-600 ${!data?.deleted ? "text-white" : "text-gray-300 italic"}">
                            ${!data?.deleted ? data.message.replace(/\n\r?/g, '<br />') : "this message has been deleted."}
                            ${!data?.deleted ? menu(data) : ""}
                        </div>
                    </div>
                </div>
            </div>
        `)
            .hide()
            .appendTo("#messages")
            .show(animate ? 'fast' : 0, function () {
                if (animate) {
                    scrollToBottom();
                }
            })
    }
    // if (animate) {
    //     scrollToBottom();
    // }
    menuFunction(data);
}

let sender_flag = '';

export const addSenderMessage = (data, animate = true) => {
    if (!$(".chat-message > div").last().hasClass('justify-end') && data.sender.username == sender_flag) {
        $("#messages > .chat-message:last-child > div > div > div").last().animate({
            borderBottomLeftRadius: '0.5rem',
            WebkitBorderBottomLeftRadius: '0.5rem',
        }, 'slow')
        $(`
            <div class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-800">
                <div id="message_${data.id}" class="${data?.deleted && "italic text-gray-500"}">
                    ${!data?.deleted ? data.message.replace(/\n\r?/g, '<br />') : "this message has been deleted."}
                </div>
            </div>
        `)
            .hide()
            .appendTo("#messages > .chat-message:last-child > div > div")
            .show(animate ? 'fast' : 0, function () {
                if (animate) {
                    scrollToBottom();
                }
            })
    } else {
        sender_flag = data.sender.username
        $(`
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div class="px-4 py-2 rounded-lg rounded-bl-none inline-block bg-gray-300 text-gray-800">
                            <div class="font-bold italic text-blue-600">${data.sender.name}</div>
                            <div id="message_${data.id}" class="${data?.deleted && "italic text-gray-500"}">
                                ${!data?.deleted ? data.message.replace(/\n\r?/g, '<br />') : "this message has been deleted."}
                            </div>
                        </div>
                    </div>
                <!-- <img
                    src=""
                    alt="My profile"
                    class="w-6 h-6 rounded-full order-1"
                /> -->
                </div>
            </div>
        `)
            .hide()
            .appendTo("#messages")
            .show(animate ? 'fast' : 0, function () {
                if (animate) {
                    scrollToBottom();
                }
            })
    }
    // if (!animate) {
    //     $("#messages").animate({ scrollTop: $("#messages").height() }, 'fast');
    // }
}

// const messages = $("#messages")

// export function scrollToBottom() {
//     messages.scrollTop = messages.scrollHeight;
// }

export const scrollToBottom = () => {
    // $("#messages").animate({ scrollTop: $("#messages").height() }, 'fast');
    $("#messages").animate({ scrollTop: $("#messages").prop("scrollHeight") }, 'fast');
    // $("#messages").animate({ scrollTop: 99999 }, 'fast');

}

export const deleteSenderMessage = (id) => {
    $(`#message_${id}`)
        .text("this message has beed deleted.")
        .addClass("text-gray-500 italic")
}

export const editMessage = (id, message) => {
    $.post("/public/chat/edit.php", { id, message })
        .done(response => {
            $(`#message_${response.id}`)
                .html(response.message + menu(response));

            menuFunction(response);
        })


}

const menu = (data) => `
    <button class="peer absolute top-0 left-0 mr-3 mb-3 md:mb-0 text-white font-medium rounded-lg text-sm py-1 text-center hidden group-hover:inline-flex items-center" type="button">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="absolute z-50 hidden flex-col bg-gray-700 rounded w-20 top-0 -left-20 peer-hover:flex hover:flex">
        <button id="edit_${data.id}" name="edit" value="${data.id}"
            class="h-10 hover:bg-blue-500">Edit</button>
        <button id="delete_${data.id}" name="delete" value="${data.id}"
            class="h-10 hover:bg-red-500 border-t">Delete</button>
    </div>       
`

export const menuFunction = (data) => {
    $(`#edit_${data.id}`).click(function () {
        $("#message").val(data.message).focus();
        $("#edit_text").text(data.message);
        $("#edit").show('fast');
        $("#send").attr("value", data.id).text("Edit");
    })
    $(`#delete_${data.id}`).click(function () {
        $.post('/public/chat/delete.php', { id: data.id })
            .done(response => {
                if (response.deleted) {
                    $(`#message_${response.id}`)
                        .text("this message has beed deleted.")
                        .addClass("text-gray-300 italic")
                }
            });
    })
}