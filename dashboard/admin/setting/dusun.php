<?php
include_once "header.php";
$query = "SELECT trdusun.* FROM trdusun inner join trkelurahan_trdusun on trkelurahan_trdusun.trdusun_id=trdusun.id WHERE trkelurahan_trdusun.trkelurahan_id = " . $_GET["id"];
$querykec = "select trkecamatan.* from trkecamatan inner join trkecamatan_trkelurahan on trkecamatan_trkelurahan.trkecamatan_id=trkecamatan.id where trkecamatan_trkelurahan.trkelurahan_id = " . $_GET['id'];
$hasilkec = mysqli_query($link, $querykec);
$hasilkecres = mysqli_fetch_array($hasilkec);
?>
<div class="wrapper">
    <?php include_once "sidebar.php"; ?>
    <div class="content-wrapper">
        <div class="main-content">
            <?php include_once "topbar.php"; ?>
            <div class="body-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="mb-4">
                            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=setting/dusun_create&id=" . $_GET["id"] . "&name=" . $_GET['name']; ?>"><i class="hvr-buzz-out fas fa-plus-circle" style="font-size: 35px; color:#37a000;"></i></a>
                            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=setting/kelurahan&id=" . $hasilkecres['id'] . "&name=" . $hasilkecres['n_kecamatan']; ?>"><i class="hvr-buzz-out fas fa-arrow-alt-circle-left" style="font-size: 35px; color:#ada112;"></i></a>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">Input Dusun untuk Kelurahan <?= $_GET['name'] ?></h6>
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
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 132.133px;" aria-label="Position: activate to sort column ascending">Nama Dusun</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 235.7px;" aria-label="Age: activate to sort column ascending">Kode Dusun</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // $query = "SELECT * FROM kecamatan";
                                                        $hasil = mysqli_query($link, $query);
                                                        $x = 1;
                                                        while ($r = mysqli_fetch_assoc($hasil)) {
                                                        ?>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1"><?= $x; ?></td>
                                                                <td><?= $r['n_dusun']; ?></td>
                                                                <td><?= $r['kode_daerah']; ?></td>
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