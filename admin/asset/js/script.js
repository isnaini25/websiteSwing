$(document).ready(function() {



    var id_penjahit = document.getElementById('idPenjahit').value;


    function load_notification() {
        $.ajax({
            type: 'post',
            url: 'notifikasi.php',
            dataType: "json",
            data: 'id_penjahit=' + id_penjahit,
            success: function(sukses) {

                $("#notifikasi-pesanan").html(sukses.notifikasi_pesanan);
                $("#count").html(sukses.count);
                $("#count-text").html(sukses.count);

            }

        });
    }

    function load_message() {
        $.ajax({
            type: 'post',
            url: 'pesan.php',
            dataType: "json",
            data: 'id_penjahit=' + id_penjahit,

            success: function(data) {
                $("#notifikasi-pesan").html(data.notifikasi_pesan);

                $("#count-pesan").html(data.count);
                $("#count-pesan-text").html(data.count);

            }

        });
    }

    $("#seen").on("click", function() {
        $.ajax({
            type: 'post',
            url: 'notifikasi.php',
            data: 'view=0&id_penjahit=' + id_penjahit,
            success: function(data) {
                $("#count").html(data.count);
            }
        })
    })

    $("#seen-pesan").on("click", function() {
        $.ajax({
            type: 'post',
            url: 'pesan.php',
            data: 'view=0&id_penjahit=' + id_penjahit,
            success: function(data) {
                $("#count-pesan").html(data.count);
            }
        })
    })

    //pesan

    function modal_dialog(id_pelanggan, nama) {

        var modal_content = '<div class="modal-dialog" id="dialog-pelanggan-' + id_pelanggan + '">';
        modal_content += '<div class="modal-content">';
        modal_content += '<div class="modal-header">';
        modal_content += '<h6 class="modal-title">Kirim pesan kepada ' + nama + '</h6>';
        modal_content += '<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>';
        modal_content += '</div>';
        modal_content += '<div class="modal-body" >';
        modal_content += '<div class="container-fluid">';
        modal_content += '<form>';
        modal_content += '<div class="col-sm-12" id="isi-pesan-' + id_pelanggan + '" style="overflow:scroll; overflow-x: hidden; height:400px">';
        modal_content += load_new_message(id_pelanggan);
        modal_content += '<span id="bottom"></span> </div> ';
        modal_content += '<div class="col-sm-12 pesan">';
        modal_content += '<input type="text" hidden id="idPelanggan" value="' + id_pelanggan + '">';
        modal_content += '<textarea maxlength="500" placeholder="Tulis pesan.." class="form-control mt-3" id="pesan" name="pesan"></textarea>';
        modal_content += '<button type="button" class="btn kirim mt-3" style="background-color:  #b057f4;color:#fff;">Kirim</button>';
        modal_content += '</div>';
        modal_content += '</form>';
        modal_content += '</div>';
        modal_content += '</div>';
        modal_content += '</div>';
        modal_content += '</div>';

        $('.chat').html(modal_content);

    }


    function send_message() {
        var id_pelanggan = $('#idPelanggan').val();
        var pesan = $("#pesan").val();

        if (pesan == "") {
            alert("Isi pesan!");
        } else {
            $.ajax({
                type: "post",
                url: "kirimPesan.php",
                data: "id_pelanggan=" + id_pelanggan + "&id_penjahit=" + id_penjahit + "&pesan=" + pesan + "&pengirim=penjahit",
                success: function(data) {

                    $('#pesan').val('');
                    $('#isi-pesan-' + id_pelanggan).html(data);
                    scrollToBottom(id_pelanggan)
                }
            });
        }
    }

    function load_new_message(id_pelanggan) {

        $.ajax({
            type: "post",
            url: "kirimPesan.php",
            data: "id_pelanggan=" + id_pelanggan + "&id_penjahit=" + id_penjahit + "&pengirim=penjahit",

            success: function(data) {
                $('#isi-pesan-' + id_pelanggan).html(data);

            },

        });
    }

    $(document).on('click', '.pesan_pelanggan', function() {
        var id_pelanggan = $(this).data('id');
        var nama = $(this).data('nama');

        modal_dialog(id_pelanggan, nama);
        setTimeout(function() { scrollToBottom(id_pelanggan); }, 10);
        // $('#dialog-pelanggan-'+id_pelanggan).dialog({
        // autoOpen:false,
        // width:400
        // });

        $('#dialog-pelanggan-' + id_pelanggan).dialog('open');
        $('#modal-show').addClass("fade");

    });


    function scrollToBottom(id) {
        var chat = document.getElementById('isi-pesan-' + id);
        if (chat != undefined) {
            chat.style.height = 400;
            chat.scrollTop = chat.scrollHeight;

        }
    }

    function update_message() {
        $('.chat-history').each(function() {
            var id_pelanggan = $(this).data('id');
            load_new_message(id_pelanggan);
        });
    }


    $(document).on('click', '.close', function() {
        $('.modal-dialog').remove();
        $('#modal-show').removeClass("fade");
        $('#modal-img').modal('hide');
        modal = document.getElementById("modal-img");
        modal.style.display = "none";
    });


    $(document).on('click', '.kirim', function() {
        send_message();

    });




    load_message();
    load_notification();

    setInterval(function() {
        load_notification();
        load_message();
        update_message();
    }, 10000);



})