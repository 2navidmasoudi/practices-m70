// import { addMessage } from "./message.js";

import { addMessage } from "./message.js";
import alert from "./alert.js";

export default () => {
    $("#upload").on("click", function () {
        $("#picture").click();
    })

    $("#picture").on("change", function () {
        const [file] = this.files;
        if (file) {
            const fileType = file['type'];
            const validImageTypes = ["image/gif", "image/jpeg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                // Show alert if its not picture...
                alert("File is not an image.");
                const pic = $("#picture");
                pic.files = [];
                return;
            }
            const url = URL.createObjectURL(file);
            $("#img").attr("src", url);
            $("#picture_modal").modal();
            $("#confirm_upload").focus();
            // modal.prepend("")
            // img.src = URL.createObjectURL(file)
        }
    })

    $("#cancle_upload").on("click", function () {
        $.modal.close();
    })

    $("#confirm_upload").on("click", function () {
        const [file_data] = $('#picture').prop('files');
        const form_data = new FormData();
        form_data.append('file', file_data);
        //fd.append("CustomField", "This is some extra data");
        $.post({
            url: '/public/chat/upload.php',
            data: form_data,
            success: function (data) {
                addMessage(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        $.modal.close();
    })

    // event on closing modal
    $('#picture_modal').on($.modal.BEFORE_CLOSE, function (event) {
        const pic = $("#picture");
        pic.files = [];
        $("#message").focus();
    });
}