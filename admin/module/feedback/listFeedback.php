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
                
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Feedback</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="card-title" >
                            <h4 class="d-inline">Feedback</h4>
                            
                        </div>
                       
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pengirim</th>
                                        <th>Feedback</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_feedback");
                                    $no = 1;
                                    while ($res=mysqli_fetch_array($kueri)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $no;?></th>
                                        <td><?php echo $res['pengirim'];?></td>
                                        <td><?php echo $res['pesan'];?></span>
                                        </td>
                                        
                                    </tr>
                                    <?php $no++ ;}?>
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