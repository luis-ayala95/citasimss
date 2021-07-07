function load_notifications() {
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "op/notifications.php",
        success: function (resp) {
            $("#notifications").html(resp);
            $('.toast').toast('show');
        }
    });
}