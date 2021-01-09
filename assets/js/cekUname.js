$(document).ready(function() {
    $("#usernamePJ").change(function() {
        var username = $("#usernamePJ").val();

        $.ajax({
            type: "post",
            url: "checkUsernamePenjahit.php",
            data: "username=" + username,
            success: function(data) {
                if (data == 0) {
                    $("#cekUnamePJ").html("<i class='fa fa-check'></i> Username tersedia");
                } else {
                    $("#cekUnamePJ").html("<i class='fa fa-times'></i> Username tidak tersedia");
                }
            }
        });

    });

    $("#usernamePL").change(function() {
        var username = $("#usernamePL").val();
        $.ajax({
            type: "post",
            url: "checkUsernamePelanggan.php",
            data: "username=" + username,
            success: function(data) {
                if (data == 0) {
                    $("#cekUnamePL").html("<i class='fa fa-check'></i> Username tersedia");
                } else {
                    $("#cekUnamePL").html("<i class='fa fa-times'></i> Username tidak tersedia");
                }
            }
        });

    });

});