<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-bullhorn"></i> </i> Laporan Cuti</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Beranda</a></li>
                <li class="breadcrumb-item inactive">Cuti & Libur</li>
                <li class="breadcrumb-item active">Laporan Cuti</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"><b>Periode Cuti </b></h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="" id="salaryform" class="form-material row">
                                        <div class="form-group col-md-3">
                                            <input type="text" name="datetime" id="date_from" class="form-control mydatetimepicker" placeholder="Pilih Bulan dan Tahun" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="select2 form-control custom-select col-md-8" data-placeholder="Choose a Category" tabindex="1" id="emid" name="emid" required>
                                                <option value="#">Pilih Karyawan</option>
                                                <option value="all">All Employee</option>
                                                <?php foreach($employee as $value): ?>
                                                <option value="<?php echo $value->em_id ?>">
                                                    <?php echo $value->first_name.' '.$value->last_name; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <input type="submit" class="btn btn-success" value="Pilih" name="submit" id="BtnSubmit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>  
                                        <th>Nama Karyawan</th>
                                        <th>Momor Karyawan</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Durasi</th>
                                        <!--<th>Total</th>-->
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>PIN </th>
                                        <th>Employee</th>
                                        <th>Type</th>
                                        <th>Duration</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Total</th>
                                    </tr>
                                </tfoot> -->
                                <tbody style="color:green" class="leave">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#BtnSubmit").on("click", function(event) {

                    event.preventDefault();

                    var emid = $('#emid').val();
                    var datetime = $('.mydatetimepicker').val();
                    console.log(datetime);
                    $.ajax({
                        url: "Get_LeaveDetails?date_time=" + datetime + "&emp_id=" + emid,
                        type: "GET",
                        data: 'data',
                        success: function(response) {
                            $('.leave').html(response);
                        }
                    });
                });
            });

        </script>
        <?php $this->load->view('backend/footer'); ?>
