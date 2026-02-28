<?php
include_once "header.php";
?>
<div class="wrapper">
    <?php include_once "sidebar.php"; ?>
    <div class="content-wrapper">
        <div class="main-content">
            <?php include_once "topbar.php"; ?>
            <div class="body-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:history.back()" class="text-decoration-none">
                                            <i class="fa fa-arrow-left" style="margin-right:10px;"></i>
                                        </a>
                                        <h6 class="fs-17 font-weight-600 mb-0">
                                            UPLOAD DOKUMEN
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo "index.php?token=" . encrypt(date('Ymd')) . "&hal=input/document_simpan"; ?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label font-weight-600">NOMOR SURAT</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="" id="example-text-input" placeholder="NOMOR SURAT" name="nomor_surat" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label font-weight-600">NAMA SURAT</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="" id="example-text-input" placeholder="NAMA SURAT" name="nama_surat" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label font-weight-600">JENIS SURAT</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="jenis_surat" id="example-text-input" required="">
                                                <option value="PILIH JENIS">PILIH JENIS : </option>
                                                <option value="SURAT MASUK">SURAT MASUK</option>
                                                <option value="SURAT KELUAR">SURAT KELUAR</option>
                                                <option value="DOKUMEN">DOKUMEN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="upload-dokumen" class="col-sm-3 col-form-label font-weight-600">UPLOAD SURAT</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" id="upload-dokumen" name="file" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100p mb-2 mr-1">SIMPAN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once "bottombar.php"; ?>
            <div class="overlay"></div>
        </div>
    </div>
    <?php include_once "footer.php"; ?>

    <script type="text/javascript" src="assets/dist/js/maskpbbplugins.js"></script>
    <script type="text/javascript" src="assets/dist/js/maskpbb.js"></script>
    <script type="text/javascript" src="assets/dist/js/maskpbbact.js"></script>