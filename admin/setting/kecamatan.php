<?php
include_once "header.php"; ?>

<div class="wrapper">
    <?php include_once "sidebar.php"; ?>
    <div class="content-wrapper">
        <div class="main-content">
            <?php include_once "topbar.php"; ?>
            <div class="body-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="mb-4">
                            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=setting/kecamatan_create"; ?>"><i class="hvr-buzz-out fas fa-plus-circle" style="font-size: 35px; color:#37a000;"></i></a>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">Setting Kecamatan Di Kabupaten Deli Serdang</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table display table-bordered table-striped table-hover basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width:20px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 132.133px;" aria-label="Position: activate to sort column ascending">Nama Kecamatan</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 235.7px;" aria-label="Age: activate to sort column ascending">Kode Kecamatan</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 235.7px;" aria-label="Age: activate to sort column ascending">Jumlah Kelurahan</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 235.7px;" aria-label="Age: activate to sort column ascending">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query = "select trkecamatan.* from trkecamatan inner join trkabupaten_trkecamatan on trkecamatan.id=trkabupaten_trkecamatan.trkecamatan_id where trkabupaten_trkecamatan.trkabupaten_id = 30";
                                                        $hasil = mysqli_query($link, $query);
                                                        $x = 1;
                                                        while ($r = mysqli_fetch_assoc($hasil)) {
                                                        ?>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1"><?= $x; ?></td>
                                                                <td><?= $r['n_kecamatan']; ?></td>
                                                                <td><?= $r['kode_daerah']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    $Qjumlahkelurahan = "SELECT count(trkelurahan_id) as jumlah from trkecamatan_trkelurahan inner join trkecamatan on trkecamatan.id=trkecamatan_trkelurahan.trkecamatan_id where trkecamatan.id = " . $r['id'];
                                                                    // echo $Qjumlahkelurahan;
                                                                    $Exjumlahkelurahan = mysqli_query($link, $Qjumlahkelurahan);
                                                                    $rowjumlahkelurahan = mysqli_fetch_array($Exjumlahkelurahan, MYSQLI_ASSOC);
                                                                    echo $rowjumlahkelurahan["jumlah"];
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=setting/kelurahan&id=" . $r['id'] . "&name=" . $r['n_kecamatan']; ?>">
                                                                        <i class="hvr-buzz-out far fa-eye" style="color:#37a000;font-size: 20px;margin-right: 10px;"></i>
                                                                    </a>
                                                                    <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=setting/kecamatan_edit&id=" . $r['id']; ?>">
                                                                        <i class="hvr-buzz-out fas fa-file-signature" style="color:#007bff;font-size: 20px;margin-right: 10px;"></i>
                                                                    </a>
                                                                    <?php if ($rowjumlahkelurahan["jumlah"] == 0) { ?>
                                                                        <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=setting/kecamatan_delete&id=" . $r['id'];
                                                                                                    ?>" onclick="return confirm('Yakin Mau Hapus Data?')">
                                                                            <i class="demo4 hvr-buzz-out fas fa-trash" style="color:#e60303;font-size: 20px;margin-right: 10px;" id="demo4"></i>
                                                                        </a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php $x++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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