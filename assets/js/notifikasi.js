$(document).ready(function() {
    var id_pelanggan = document.getElementById('idPelanggan').value;


    function load_notification() {
        $.ajax({
            type: 'post',
            url: 'notifikasiBaca.php',
            dataType: "json",
            data: 'id_pelanggan=' + id_pelanggan,
            success: function(data) {
                $(".notifikasi-content").html(data.notifikasi_pesanan);

                $("#count-notifikasi").html(data.count);
            }

        });
    }

    function load_message() {
        $.ajax({
            type: 'post',
            url: 'pesanBaca.php',
            dataType: "json",
            data: 'id_pelanggan=' + id_pelanggan,
            success: function(data) {
                $(".pesan-content").html(data.notifikasi_pesan);
                $("#count-pesan").html(data.count);

            }

        });
    }


    $("#seen").on("click", function() {
        $.ajax({
            type: 'post',
            url: 'notifikasiBaca.php',
            data: 'view=0&id_pelanggan=' + id_pelanggan,
            success: function(data) {
                $("#count-pesan").html(data.count);
            }
        })
    })


    $("#seen-pesan").on("click", function() {
        $.ajax({
            type: 'post',
            url: 'pesanBaca.php',
            data: 'view=0&id_pelanggan=' + id_pelanggan,
            success: function(data) {
                $("#count-notifikasi").html(data.count);
            }
        })
    })

    load_message();
    load_notification();
    setInterval(function() {
        load_notification();
        load_message();
    }, 20000);


    //pesan

    function modal_dialog(id_penjahit, nama) {
        var modal_content = '<div class="modal-dialog" id="dialog-penjahit-' + id_penjahit + '">';
        modal_content += '<div class="modal-content">';
        modal_content += '<div class="modal-header">';
        modal_content += '<h6 class="modal-title">Kirim pesan kepada ' + nama + '</h6>';
        modal_content += '<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>';
        modal_content += '</div>';
        modal_content += '<div class="modal-body" >';
        modal_content += '<div class="container-fluid">';
        modal_content += '<form>';
        modal_content += '<div class="col-sm-12 pesan-container" id="isi-pesan-' + id_penjahit + '" style="overflow:scroll; overflow-x: hidden; height:400px">';
        modal_content += load_new_message(id_penjahit);
        modal_content += '<span id="bottom"></span> </div> ';
        modal_content += '<div class="col-sm-12 pesan">';
        modal_content += '<input type="text" hidden id="idPenjahit" value="' + id_penjahit + '">';
        modal_content += '<textarea maxlength="500" placeholder="Tulis pesan.." class="form-control mt-3" id="pesan" name="pesan"></textarea>';
        modal_content += '<button type="button" class="btn kirim mt-3" style="background-color:  #FFAD32;color:#fff;">Kirim</button>';
        modal_content += '</div>';
        modal_content += '</form>';
        modal_content += '</div>';
        modal_content += '</div>';
        modal_content += '</div>';
        modal_content += '</div>';

        $('.chat').html(modal_content);
    }


    function send_message() {
        var id_penjahit = $('#idPenjahit').val();
        var pesan = $("#pesan").val();

        if (pesan == "") {
            alert("Isi pesan!");
        } else {
            $.ajax({
                type: "post",
                url: "pesanKirim.php",
                data: "id_pelanggan=" + id_pelanggan + "&id_penjahit=" + id_penjahit + "&pesan=" + pesan + "&pengirim=pelanggan",
                success: function(data) {

                    $('#pesan').val('');
                    $('#isi-pesan-' + id_penjahit).html(data);
                    scrollToBottom(id_penjahit);
                }
            });
        }
    }

    function load_new_message(id_penjahit) {
        $.ajax({
            type: "post",
            url: "pesanKirim.php",
            data: "id_pelanggan=" + id_pelanggan + "&id_penjahit=" + id_penjahit + "&pengirim=pelanggan",
            success: function(data) {
                $('#isi-pesan-' + id_penjahit).html(data);

            }
        });
    }

    function openDialog(btndiv) {
        var id_penjahit = $(btndiv).data('id');
        var nama = $(btndiv).data('nama');
        modal_dialog(id_penjahit, nama);


        console.log(nama);
        $('#modal-show').addClass("fade");
        $('#dialog-penjahit-' + id_penjahit).dialog('open');
        setTimeout(function() { scrollToBottom(id_penjahit); }, 1000);
        //document.getElementById("dialog-penjahit-"+id_penjahit).openDialog();
    }


    $(document).on('click', '.pesan_penjahit', function() {
        openDialog(this);
    });

    $(document).on('click', '.aksi-chat', function() {
        openDialog(this);
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
            var id_penjahit = $(this).data('id');
            load_new_message(id_penjahit);
        });
    }


    $(document).on('click', '.close', function() {
        $('.modal-dialog').remove();
        $('#modal-show').removeClass("fade");

    });


    $(document).on('click', '.kirim', function() {
        send_message();
    });



    setInterval(function() {
        update_message();
    }, 20000);
})