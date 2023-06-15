$(document).ready(function() {

    var id_kecamatan_selected = document.getElementById('idKecamatan').value;
    var id_kelurahan_selected = document.getElementById('idKelurahan').value;
    var id_bank_selected = document.getElementById('idBank').value;

    $.ajax({
        type: 'post',
        url: 'module/data/dataBank.php',
        data: 'id_bank=' + id_bank_selected,
        success: function(hasil_bank) {

            $("select[name=bank]").html(hasil_bank);

        }

    });
    $.ajax({
        type: 'post',
        url: 'module/data/dataKecamatan.php',
        data: 'id_kecamatan=' + id_kecamatan_selected,
        success: function(hasil_kecamatan) {

            $("select[name=kecamatan]").html(hasil_kecamatan);

        }

    });
    $.ajax({
        type: 'post',
        url: 'module/data/dataKelurahan.php',
        data: 'id_kelurahan=' + id_kelurahan_selected + '&id_kecamatan=' + (id_kecamatan_selected * 10),
        success: function(select_kelurahan) {
            $("select[name=kelurahan]").html(select_kelurahan);

        }

    });

    $("select[name=kecamatan]").on("change", function() {
        var id_kecamatan = $("option:selected", this).attr("id_kecamatan");
        $.ajax({
            type: 'post',
            url: 'module/data/dataKelurahan.php',
            data: 'id_kecamatan=' + (id_kecamatan * 10),
            success: function(hasil_kelurahan) {
                $("select[name=kelurahan]").html(hasil_kelurahan);
            }
        })
    })
    $(document).ready(function() {

        $("#username").change(function() {
            var username = $("#username").val();

            $.ajax({
                type: "post",
                url: "../checkUsernamePenjahit.php",
                data: "username=" + username,
                success: function(data) {
                    if (data == 0) {
                        $("#cekUname").html("<i class='fa fa-check'></i> Username tersedia");
                    } else {
                        $("#cekUname").html("<i class='fa fa-times'></i> Username tidak tersedia");
                    }
                }
            });

        });

    });
})