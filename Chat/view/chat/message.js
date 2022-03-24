
export const addMessage = (message, animate = true) => {
    if ($(".chat-message > div").last().hasClass('justify-end')) {
        $("#messages > .chat-message:last-child > div > div > div").last().animate({
            borderBottomRightRadius: '0.5rem',
            WebkitBorderBottomRightRadius: '0.5rem',
        }, animate ? 'slow' : 0)
        $(`
            <div class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white">
                ${message.replace(/\n\r?/g, '<br />')}
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
                        <div class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white">
                            ${message.replace(/\n\r?/g, '<br />')}
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
}

let sender_flag = '';

export const addSenderMessage = (message, sender, animate = true) => {
    if (!$(".chat-message > div").last().hasClass('justify-end') && sender == sender_flag) {
        $("#messages > .chat-message:last-child > div > div > div").last().animate({
            borderBottomLeftRadius: '0.5rem',
            WebkitBorderBottomLeftRadius: '0.5rem',
        }, 'slow')
        $(`
            <div class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-800">
                ${message.replace(/\n\r?/g, '<br />')}
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
        sender_flag = sender
        $(`
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-800">
                            <div class="font-bold italic text-blue-600">${sender}</div>
                                ${message.replace(/\n\r?/g, '<br />')}
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