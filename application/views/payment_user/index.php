<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Halaman Pembayaran <small>user</small></h1>
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
                        <h3 class="box-title">Form Pembayaran</h3>
                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <div class="box-body">

                        <form action="<?= site_url('PaymentUser/create_action') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email">EMAIL USER</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email user" value="" autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="user_level">USER LEVEL</label>
                                <select id="user_level" name="user_level" class="form-control">
                                    <option value="premium">PREMIUM</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="payment_status">STATUS PEMBAYARAN</label>
                                <select id="payment_status" name="payment_status" class="form-control">
                                    <option value="unpaid">BELUM LUNAS</option>
                                    <option value="paid">LUNAS</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="total_payment">JUMLAH PEMBAYARAN</label>
                                <input type="number" class="form-control" name="total_payment" id="total_payment" placeholder="1000000" value="" autocomplete="off"/>
                            </div>

                            <button type="submit" class="btn btn-primary">SAVE</button>
                            <a href="<?php echo site_url('PaymentUser') ?>" class="btn btn-default">Cancel</a>
                            <a href="<?php echo site_url('PaymentUser/read') ?>" class="btn btn-default">Lihat Data</a>
                        </form>


                    </div>
                </div>
            </div><!--/.col (right) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


