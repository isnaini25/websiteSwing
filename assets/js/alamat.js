$(document).ready(function() {

    if (document.getElementById('alamat-penjahit')) {
        $.ajax({
            type: 'post',
            url: 'admin/module/data/dataKecamatan.php',
            success: function(hasil_kecamatan) {

                $("select[name=kecamatan]").html(hasil_kecamatan);

            }
        });


        $("select[name=kecamatan]").on("change", function() {
            var id_kecamatan = $("option:selected", this).attr("id_kecamatan");
            $.ajax({
                type: 'post',
                url: 'admin/module/data/dataKelurahan.php',
                data: 'id_kecamatan=' + (id_kecamatan * 10),
                success: function(hasil_kelurahan) {
                    $("select[name=kelurahan]").html(hasil_kelurahan);
                    console.log(id_kecamatan);
                }
            })
        })
    }

    if (document.getElementById('alamat-pelanggan')) {
        $.ajax({
            type: 'post',
            url: 'admin/module/data/dataProvinsi.php',
            success: function(hasil_provinsi) {

                $("select[name=provinsi]").html(hasil_provinsi);

            }
        });


        $("select[name=provinsi]").on("change", function() {
            var id_provinsi = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: 'post',
                url: 'admin/module/data/dataKota.php',
                data: 'id_provinsi=' + id_provinsi,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);

                }
            })
        })
    }

    if (document.getElementById('idProvinsi')) {
        id_provinsi = document.getElementById('idProvinsi').value;
        id_kota = document.getElementById('idKota').value;
        $.ajax({
            type: 'post',
            data: 'id_provinsi=' + id_provinsi + '&page=profil',
            url: 'admin/module/data/dataProvinsi.php',
            success: function(hasil_provinsi) {

                $("#provinsi").html(hasil_provinsi);

            }
        });
        $.ajax({
            type: 'post',
            url: 'admin/module/data/dataKota.php',
            data: 'id_kota=' + id_kota + '&id_provinsi=' + (id_provinsi) + '&page=profil',
            success: function(hasil_kota) {
                $("#kota").html(hasil_kota);

            }

        });
    }


    if (document.getElementById('idKelurahan')) {
        var id_kecamatan = document.getElementById('idKecamatan').value;
        var id_kelurahan = document.getElementById('idKelurahan').value;
        $.ajax({
            type: 'post',
            data: 'id_kecamatan=' + id_kecamatan + '&page=profil',
            url: 'admin/module/data/dataKecamatan.php',
            success: function(hasil_kecamatan) {

                $("#kecamatan").html(hasil_kecamatan);

            }
        });
        $.ajax({
            type: 'post',
            url: 'admin/module/data/dataKelurahan.php',
            data: 'id_kelurahan=' + id_kelurahan + '&id_kecamatan=' + (id_kecamatan * 10) + '&page=profil',
            success: function(hasil_kelurahan) {
                $("#kelurahan").html(hasil_kelurahan);

            }

        });
    }

    //profil Select 
    if (document.getElementById('idProvinsiSelected')) {
        var id_kota = document.getElementById('idKotaSelected').value;
        var id_provinsi = document.getElementById('idProvinsiSelected').value;
        $.ajax({
            type: 'post',
            data: 'id_provinsi=' + id_provinsi,
            url: 'admin/module/data/dataProvinsi.php',
            success: function(hasil_provinsi) {
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        $.ajax({
            type: 'post',
            url: 'admin/module/data/dataKota.php',
            data: 'id_kota=' + id_kota + '&id_provinsi=' + (id_provinsi),
            success: function(hasil_kota) {
                $("select[name=kota]").html(hasil_kota);
            }
        });


    }

})