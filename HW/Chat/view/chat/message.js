import alert from "./alert.js";

export const addMessage = (data, animate = true) => {
    if (data?.deleted) return;
    if ($(".chat-message > div").last().hasClass("justify-end")) {
        $("#messages > .chat-message:last-child > div > div > div")
            .last()
            .animate(
                {
                    borderBottomRightRadius: "0.5rem",
                    WebkitBorderBottomRightRadius: "0.5rem",
                },
                animate ? "slow" : 0
            );
        $(`
            <div 
                id="message_${data.id}" 
                class="px-4 py-2 group rounded-lg inline-block rounded-br-none bg-blue-600 ${!data?.deleted ? "text-white" : "text-gray-300 italic"} relative"
            >
                ${renderData(data)}
                ${!data?.deleted ? menu(data) : ""}
            </div>
        `)
            .hide()
            .appendTo("#messages > .chat-message:last-child > div > div")
            .show(animate ? "fast" : 0, function () {
                if (animate) {
                    scrollToBottom();
                }
            });
    } else {
        $(`
            <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                        <div id="message_${data.id}" class="relative px-4 py-2 group rounded-lg inline-block rounded-br-none bg-blue-600 ${!data?.deleted ? "text-white" : "text-gray-300 italic"}">
                            ${renderData(data)}
                            ${!data?.deleted ? menu(data) : ""}
                        </div>
                    </div>
                </div>
            </div>
        `)
            .hide()
            .appendTo("#messages")
            .show(animate ? "fast" : 0, function () {
                if (animate) {
                    scrollToBottom();
                }
            });
    }
    // if (animate) {
    //     scrollToBottom();
    // }
    menuFunction(data);
};

let sender_flag = "";

export const addSenderMessage = (data, admin = false, animate = true) => {
    if (data?.deleted) return;
    if (
        !$(".chat-message > div").last().hasClass("justify-end") &&
        data.sender.username == sender_flag
    ) {
        $("#messages > .chat-message:last-child > div > div > div").last().animate(
            {
                borderBottomLeftRadius: "0.5rem",
                WebkitBorderBottomLeftRadius: "0.5rem",
            },
            "slow"
        );
        $(`
            <div class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-800 group relative" >
                <div id="message_${data.id}" class="${data?.deleted && " italic text-gray-500"} ">
                    ${renderData(data)}
                    ${admin ? adminMenu(data) : ""}
                </div>
            </div>
        `)
            .hide()
            .appendTo("#messages > .chat-message:last-child > div > div")
            .show(animate ? "fast" : 0, function () {
                if (animate) {
                    scrollToBottom();
                }
            });
    } else {
        sender_flag = data.sender.username;
        $(`
            <div class="chat-message" >
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div class="px-4 py-2 rounded-lg rounded-bl-none inline-block bg-gray-300 text-gray-800 group relative">
                            <div class="font-bold italic text-blue-600">
                                ${data.sender.name}
                            </div>
                            <div id="message_${data.id}" class="${data?.deleted && "italic text-gray-500"}">
                                ${renderData(data)}
                                ${admin ? adminMenu(data) : ""}
                            </div>
                        </div>
                    </div>
                    <!-- < img
                        src = ""
                        alt = "My profile"
                        class="w-6 h-6 rounded-full order-1"
                    /> -->
                </div>
            </div>
        `)
            .hide()
            .appendTo("#messages")
            .show(animate ? "fast" : 0, function () {
                if (animate) {
                    scrollToBottom();
                }
            });
    }
    // if (!animate) {
    //     $("#messages").animate({ scrollTop: $("#messages").height() }, 'fast');
    // }
    if (admin) {
        adminFunction(data);
    }
};

// const messages = $("#messages")

// export function scrollToBottom() {
//     messages.scrollTop = messages.scrollHeight;
// }

export const scrollToBottom = () => {
    // $("#messages").animate({ scrollTop: $("#messages").height() }, 'fast');
    $("#messages").animate(
        { scrollTop: $("#messages").prop("scrollHeight") },
        "fast"
    );
    // $("#messages").animate({ scrollTop: 99999 }, 'fast');
};

const renderData = (data) => {
    if (data?.deleted) return "this message has been deleted.";
    if (data?.picture) return `<img src="${data.picture.path}" >`;
    if (data?.message) return data.message.replace(/\n\r?/g, "<br />");
}

// for admin delete
export const deleteMessage = (data, admin = false) => {
    $(`#message_${data.id}`)
        .text("this message has beed deleted.")
        .addClass("text-gray-300 italic");

    if (admin) {
        $(`#message_${data.id}`).append(adminMenu(data))
        adminFunction(data)
    };
}

// delete message comming from server
export const deleteSenderMessage = (data, admin = false) => {
    const { id } = data;
    // console.log("remove " + id + sender.name);

    // if ($(`message_${ id } `).siblings().length == 0) {
    //     console.log("remove everything");
    //     console.log($(`#message_${ id } `).parent('.chat-message'))
    //     $(`#message_${ id } `).parent('.chat-message').remove();
    //     sender_flag = "";
    // } else {
    //     if ($(`message_${ id } `).is(':first-child')) {
    //         console.log("remove first");
    //         console.log($(`message_${ id } `).siblings().eq(0));
    //         $(`message_${ id } `).siblings().eq(1).prepend(`
    //             <div class="font-bold italic text-blue-600">${sender.name}</div>
    //         `)
    //     }
    $(`#message_${id}`)
        .text("this message has beed deleted.")
        .addClass("text-gray-500 italic");
    // .parent().remove()

    if (admin) {
        $(`#message_${data.id}`).append(adminMenu(data))
        adminFunction(data)
    };
    // }
};

export const editMessage = (id, message) => {
    $.post("/public/chat/edit.php", { id, message }).done((response) => {
        $(`#message_${response.id}`).html(response.message + menu(response));
        menuFunction(response);
    });
};

const menu = (data) => `
    <button class="peer absolute top-0 left-0 mr-3 mb-3 md:mb-0 text-white font-medium rounded-lg text-sm py-1 text-center hidden group-hover:inline-flex items-center" type="button">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="absolute z-20 hidden flex-col bg-gray-700 rounded w-20 top-0 -left-20 peer-hover:flex hover:flex">
    ${!data?.picture ?
        `
        <button id="edit_${data.id}" name="edit" value="${data.id}"
            class="h-10 hover:bg-blue-500 rounded-t ">Edit</button>
        <button id="delete_${data.id}" name="delete" value="${data.id}"
            class="h-10 hover:bg-red-500 border-t rounded-b">Delete</button>
        `
        :
        `
        <button id="delete_${data.id}" name="delete" value="${data.id}"
            class="h-10 hover:bg-red-500 rounded">Delete</button>
        `
    }
    </div>       
`;

const adminMenu = (data) => `
    <button class="peer absolute top-0 right-0 ml-3 mb-3 md:mb-0 text-black font-medium rounded-lg text-sm py-1 text-center hidden group-hover:inline-flex items-center" type="button">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="absolute z-20 hidden flex-col bg-gray-700 rounded w-20 top-0 -right-20 peer-hover:flex hover:flex">
    ${!data?.deleted ?
        `
        <button id="delete_${data.id}" name="delete" value="${data.id}"
            class="h-10 hover:bg-rose-500 rounded-t text-gray-300">Delete</button>
        <button id="ban_${data.id}" name="ban" value="${data.id}"
            class="h-10 hover:bg-red-500 border-t rounded-b text-gray-300">Ban/Unban</button>
        `
        :
        `
        <button id="ban_${data.id}" name="ban" value="${data.id}"
            class="h-10 hover:bg-red-500 text-gray-300 rounded">Ban/Unban</button>
        `
    }
    </div>       
`;;

export const menuFunction = (data) => {
    if (data?.deleted) return;

    $(`#edit_${data.id}`).click(function () {
        $("#message").val(data.message).focus();
        $("#edit_text").text(data.message);
        $("#edit").show("fast");
        $("#send").addClass("hidden");
        $("#upload").addClass("hidden");
        $("#edit_button").removeClass("hidden").attr("value", data.id);
    });

    $(`#delete_${data.id}`).click(function () {
        $.post("/public/chat/delete.php", { id: data.id }).done((response) => {
            if (response.deleted) {
                deleteMessage(response);

                $("#close_edit").click();
            }
        });
    });
};

export const adminFunction = (data) => {
    if (!data?.deleted) {
        $(`#delete_${data.id}`).click(function () {
            $.post("/public/chat/delete.php", { id: data.id }).done((response) => {
                if (response.deleted) {
                    deleteSenderMessage(response, true);

                    // $("#close_edit").click();
                }
            });
        });
    }

    $(`#ban_${data.id}`).click(function () {
        $.post('/public/chat/ban.php', {
            // data,
            username: data.sender.username
        }).done(response => {
            // console.log(response);
            alert(
                `${response.name} has been ${!response.ban ? "un" : ""}banned.`,
                "text-blue-400",
                "bg-blue-600"
            );
        })
    });
};