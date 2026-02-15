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
                                        <?php
                                        $QSurat = "SELECT count(id) as total from document";
                                        $totalsurat = mysqli_query($link, $QSurat);
                                        $totalsurat = mysqli_fetch_array($totalsurat); ?>
                                        <h6 class="fs-17 font-weight-600 mb-0" style="text-transform: uppercase;">Daftar Dokumen | <?= $totalsurat['total'] ?></h6>
                                    </div>
                                    <div>
                                        <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=input/document_create"; ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i> Tambah Dokumen
                                        </a>
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
                                                        <tr role="row"></tr>
                                                        </tr>
                                                        <th class="sorting_asc" style="width: 10px; text-transform: uppercase;">No.</th>
                                                        <th class="sorting" style="width: 150px; text-transform: uppercase;">Nomor Dokumen</th>
                                                        <th class="sorting" style="width: 200px; text-transform: uppercase;">Nama Dokumen</th>
                                                        <th class="sorting" style="width: 250px; text-transform: uppercase;">Jenis Dokumen</th>
                                                        <th class="sorting" style="width: 125px; text-transform: uppercase;">Tanggal Upload</th>
                                                        <th class="sorting" style="width: 125px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query = "SELECT * FROM document";
                                                        $hasil = mysqli_query($link, $query);
                                                        $x = 1;
                                                        while ($r = mysqli_fetch_assoc($hasil)) {
                                                        ?>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1 text-center"><?= $x; ?></td>
                                                                <td>&nbsp; <?= $r['nomor_surat']; ?></td>
                                                                <td>&nbsp; <?= $r['nama_surat']; ?></td>
                                                                <td>&nbsp; <?= $r['jenis_surat']; ?></td>
                                                                <td>&nbsp; <?= $r['tanggal_upload']; ?></td>
                                                                <td>
                                                                    &nbsp;
                                                                    <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=document_delete&id=" . $r['id']; ?>" onclick="return confirm('Yakin Mau Hapus Surat Ini?')">
                                                                        <i class="demo4 hvr-buzz-out fas fa-trash" style="color:#e60303;font-size: 20px;margin-right: 10px;" id="demo4"></i>
                                                                    </a>
                                                                    <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=document_view&id=" . $r['id']; ?>" target="_blank">
                                                                        <i class="fas fa-eye" style="color:#007bff;font-size:20px;margin-right:10px;"></i>
                                                                    </a>
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