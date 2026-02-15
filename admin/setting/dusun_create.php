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
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">Input Dusun untuk Kelurahan <?= $_GET['name'] ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo "index.php?token=" . encrypt(date('Ymd')) . "&hal=setting/dusun_simpan&id=" . $_GET["id"] . "&name=" . $_GET['name']; ?>" enctype="multipart/form-data">
                                    <div id="function">
                                        <div class="form-group row">
                                            <label for="text-input" class="col-sm-3 col-form-label font-weight-600">Nama Dusun</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="nama" placeholder="Nama Dusun">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="function">
                                        <div class="form-group row">
                                            <label for="text-input" class="col-sm-3 col-form-label font-weight-600">Kode Dusun</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="kode" placeholder="Kode Dusun">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100p mb-2 mr-1">Simpan</button>
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