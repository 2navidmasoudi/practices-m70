import url from "/config.js";
$(function () {
  // window.location.replace("/view/chat");

  $("#alert").hide();
  $("#alert").removeClass("d-none");

  $("input").keyup(function (e) {
    if ($(this).val()) {
      $(this).addClass("is-valid");
      $(this).removeClass("is-invalid");
    } else {
      $(this).addClass("is-invalid");
      $(this).removeClass("is-valid");
    }
  });

  // $(document).keypress(function (e) {
  //     if (e.which == 13) {
  //         $("form").submit();
  //     }
  // });

  $("form").submit(function (e) {
    e.preventDefault();

    let data = {};
    $("form :input").each(function () {
      const input = $(this);
      if (!this.name) return;
      data[this.name] = input.val();
    });

    $.post({
      url: url + "/public/login.php",
      dataType: "json",
      data,
      success: function (response) {
        console.log(response);

        $("input").addClass("is-valid");
        $("input").removeClass("is-invalid");

        if (response.location) {
          window.location.href = response.location;
        }
      },
      error: function (e) {
        console.log(e);
        const message = e?.responseJSON?.message;
        if (message) {
          $("#alert").hide("slow", function () {
            $(this).text(message).show("slow");
          });
        }

        if (e.status == 422) {
          if (e.responseJSON.inputError == 1) {
            let focus = false;
            $("input").each(function () {
              if (!this.value) {
                if (!focus) {
                  $(this).focus();
                  focus = true;
                }
                $(this).removeClass("is-valid");
                $(this).addClass("is-invalid");
              } else {
                $(this).removeClass("is-invalid");
                $(this).addClass("is-valid");
              }
            });
          }
        }
      },
    });
  });
});
