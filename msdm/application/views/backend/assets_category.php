<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-th-large"></i> Aset</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Beranda</a></li>
                <li class="breadcrumb-item inactive">Aset</li>
                <li class="breadcrumb-item active">Kategori Aset</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#assetsmodel" data-whatever="@getbootstrap" class="text-white TypeModal"><i class="" aria-hidden="true"></i> Tambah Kategori Aset </a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"> <b>Daftar Kategori Aset</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID </th>
                                        <th>Kategori Aset</th>
                                        <th>Nama Aset </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                            <tr>
                                                <th>ID </th>
                                                <th>Type</th>
                                                <th>Name </th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                <tbody>
                                    <?php foreach ($catvalue as $value): ?>
                                        <tr>
                                            <td><?php echo $value->cat_id; ?></td>
                                            <td><?php echo $value->cat_status ?></td>
                                            <td><?php echo $value->cat_name; ?></td>
                                            <td class="jsgrid-align-center ">
                                                <a href="" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light AssetsModal" data-id="<?php echo $value->cat_id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                <a onclick="confirm('Apakah Anda yakin ingin menghapus data ini?')" href="#" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light holidelet" data-id="<?php echo $value->cat_id; ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="assetsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Kategori Aset</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="Add_Assets_Category" id="assetsform" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Category Type </label>
                                <select name="cattype" class="form-control custom-select" required>
                                    <option>Select Category</option>
                                    <option value="Aset Tetap">Aset Tetap</option>
                                    <option value="Aset Digital">Aset Digital</option>
                                    <option value="Aset Produksi">Aset Produksi</option>
                                    <option value="Perlengkapan Kantor">Perlengkapan Kantor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Name </label>
                                <input type="text" name="catname" class="form-control" value="" placeholder="Category name..." minlength="2" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="catid" value="" class="form-control" id="recipient-name1">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".AssetsModal").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    $('#assetsform').trigger("reset");
                    $('#assetsmodel').modal('show');
                    $.ajax({
                        url: 'AssetscatByID?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function(response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
                        $('#assetsform').find('[name="catid"]').val(response.assetscatval.cat_id).end();
                        $('#assetsform').find('[name="catname"]').val(response.assetscatval.cat_name).end();
                        $('#assetsform').find('[name="cattype"]').val(response.assetscatval.cat_status).end();
                        /*                                                     if (response.assetsByid.Assets_type == 'Logistic')
                                                                           $('#btnSubmit').find(':checkbox[name=type][value="Logistic"]').prop('checked', true);*/

                    });
                });
            });
        </script>
        <?php $this->load->view('backend/footer'); ?>