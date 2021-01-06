<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pembayaran</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Pembayaran</h4>
                            <?php
                            $kueriTotal = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran WHERE statusBayar ='S'");

                            $total = 0;
                            $totalBayar = 0;
                            while ($resT = mysqli_fetch_array($kueriTotal)) {
                                $total = $resT['totalBayar'] + $resT['biayaKirim'];
                                $totalBayar = $total + $totalBayar;
                            }
                            ?>
                            <h5>Total Pembayaran dikonfirmasi : Rp <?php echo number_format($totalBayar);?></h5>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Pembayaran</th>
                                        <th>Metode Bayar</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran A INNER JOIN tbl_metodeBayar B ON A.idMetodeBayar = B.idMetodeBayar WHERE A.bukti <> ''");
                                    $no = 1;
                                    while ($res = mysqli_fetch_array($kueri)) {
                                    ?>
                                        <tr>
                                            <th><?php echo $no; ?></th>
                                            <td><?php echo $res['idPembayaran']; ?></td>
                                            <td><?php echo $res['namaMetode']; ?></td>
                                            <td><?php echo "Rp" . number_format($res['biayaKirim'] + $res['totalBayar']); ?></td>
                                            <td><?php if ($res['statusBayar'] == 'B') {

                                                    echo "<span class='badge badge-pill badge-warning'>Menunggu Konfirmasi</span>";
                                                } else {
                                                    echo "<span class='badge badge-pill badge-success'>Dikonfirmasi</span>";
                                                } ?>

                                            </td>
                                            <td><a class="btn btn-primary" href="<?php echo $admin_url; ?>adminweb.php?module=cekPembayaran&id=<?php echo $res['idPembayaran'] ?>"> <span>Konfirmasi</span></a></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
    </div>
</div>