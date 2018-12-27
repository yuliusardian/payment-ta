<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Halaman Data Pembayaran <small>User</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Level</a>
            </li>
            <li class="active">Here</li>
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
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div style="margin-top: 4px"  id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
<!--                            <div class="col-md-12 text-right">-->
<!--                                --><?php //echo anchor(site_url('mobil/create'), '+ Tambah Mobil', 'class="btn btn-primary"'); ?>
<!--                            </div>-->
                        </div>

                        <br><br>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                            <tr>
                                <th width="80px">NO</th>
                                <th>EMAIL</th>
                                <th>LEVEL</th>
                                <th>PAYMENT STATUS</th>
                                <th>TOTAL PAYMENT</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($data as $key => $val): ?>
                                <tr>
                                    <td><?php echo $key+1 ?></td>
                                    <td><?php echo $val->email; ?></td>
                                    <td><?php echo $val->user_level ?></td>
                                    <td><?php echo $val->payment_status ?></td>
                                    <td><?php echo $val->total_payment ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('PaymentUser/detail').'/'.$val->id?>">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--/.col (right) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->




<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var t = $("#mytable").dataTable({});
    });
</script>
