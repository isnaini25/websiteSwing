$(document).ready(function() {
    $('#loading').bind('ajaxStart', function() {
        $(this).show();
    }).bind('ajaxStop', function() {
        $(this).hide();
    });

    function load_notification_admin() {
        $.ajax({
            type: 'post',
            url: 'notifikasiAdmin.php',
            dataType: "json",
            success: function(data) {
                $("#notifikasi-admin").html(data.notifikasi_pembayaran);

                $("#count-admin").html(data.count);
                $("#count-text-admin").html(data.count);
            }

        });
    }

    $("#seen-admin").on("click", function() {
        $.ajax({
            type: 'post',
            url: 'notifikasiAdmin.php',
            data: 'view=0',
            success: function(data) {
                $("#count-admin").html(data.count);
            }
        })
    })

    load_notification_admin();
    setInterval(function() {
        load_notification_admin();
    }, 15000);

})