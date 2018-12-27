<?php
/**
 * Created by PhpStorm.
 * User: yuliusardian
 * Date: 12/27/18
 * Time: 11:14 PM
 */
?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Halaman Detail Pembayaran <small>user</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Level</a>
            </li>
        </ol>
    </section><!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-info">


                    <div class="box-header with-border">
                        <h3 class="box-title">Pembayaran</h3>
                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <div class="box-body">
                        <h2 style="margin-top:0px">Detail</h2>
                        <table class="table">
                            <tr><td>ID</td><td><?= $id ?></td></tr>
                            <tr><td>EMAIL</td><td><?= $email ?></td></tr>
                            <tr><td>LEVEL</td><td><?= $level ?></td></tr>
                            <tr><td>PAYMENT STATUS</td><td><?= $payment_status ?></td></tr>
                            <tr><td>TOTAL PAYMENT</td><td><?= $total_payment ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('PaymentUser/read') ?>" class="btn btn-default">Cancel</a></td></tr>
                        </table>
                    </div>
                </div>
            </div><!--/.col (right) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
