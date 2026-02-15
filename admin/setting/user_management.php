<?php
include_once "header.php";

// ==========================================
// 1. LOGIKA PHP (BACKEND)
// ==========================================

// -- A. HAPUS USER --
if (isset($_GET['act']) && $_GET['act'] == 'x' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "DELETE FROM tbluser WHERE user_id='$id'";
    if (mysqli_query($link, $query)) {
        echo "<script>Swal.fire('Sukses', 'Data berhasil dihapus', 'success').then(() => { window.location='index.php?token=" . encrypt(date('Ymd')) . "&hal=setting/user_management'; });</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Data gagal dihapus', 'error');</script>";
    }
}

// -- B. RESET PASSWORD --
if (isset($_GET['act']) && $_GET['act'] == 'rst' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($link, $_GET['id']);

    // Ambil data user untuk Telegram
    $qUser = mysqli_query($link, "SELECT * FROM tbluser WHERE user_id='$id'");
    $rUser = mysqli_fetch_assoc($qUser);

    // Generate Password Baru
    $pass_raw = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10);
    // Gunakan MD5 sesuai struktur lama Anda (Disarankan ganti ke password_hash di masa depan)
    $pass_hash = md5($keycode . $pass_raw);

    $query = "UPDATE tbluser SET user_passwd='$pass_hash' WHERE user_id='$id'";
    if (mysqli_query($link, $query)) {
        // Kirim Notif Telegram
        $text = "Password Anda Telah Direset.\n\nPassword Baru: <b>$pass_raw</b>\n\nSegera login dan ubah password Anda.";
        @file_get_contents("https://api.telegram.org/bot" . $token_bottelegram . "/sendMessage?chat_id=" . $rUser['user_telegram'] . "&text=" . urlencode($text) . "&parse_mode=html");

        echo "<script>Swal.fire('Sukses', 'Password berhasil direset & dikirim ke Telegram', 'success').then(() => { window.location='index.php?token=" . encrypt(date('Ymd')) . "&hal=setting/user_management'; });</script>";
    }
}

// -- C. SIMPAN DATA BARU --
if (isset($_POST['btnSimpan'])) {
    $uname      = mysqli_real_escape_string($link, $_POST['uname']);
    $passwd     = mysqli_real_escape_string($link, $_POST['passwd']);
    $nama       = mysqli_real_escape_string($link, $_POST['nama']);
    $role       = mysqli_real_escape_string($link, $_POST['role']);
    $nohp       = mysqli_real_escape_string($link, $_POST['nohp']);
    $telegram   = mysqli_real_escape_string($link, $_POST['idtelegram']);
    $status     = mysqli_real_escape_string($link, $_POST['status']);

    // Cek Duplikat Username
    $cek = mysqli_query($link, "SELECT user_id FROM tbluser WHERE user_nm='$uname'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>Swal.fire('Gagal', 'Username sudah digunakan!', 'warning');</script>";
    } else {
        $pass_hash = md5($keycode . $passwd);
        $query = "INSERT INTO tbluser (user_nm, user_passwd, user_nama, role_id, user_nohp, user_telegram, user_isaktif) 
                  VALUES ('$uname', '$pass_hash', '$nama', '$role', '$nohp', '$telegram', '$status')";

        if (mysqli_query($link, $query)) {
            echo "<script>Swal.fire('Sukses', 'User baru berhasil ditambahkan', 'success').then(() => { window.location='index.php?token=" . encrypt(date('Ymd')) . "&hal=setting/user_management'; });</script>";
        } else {
            echo "<script>Swal.fire('Error', '" . mysqli_error($link) . "', 'error');</script>";
        }
    }
}

// -- D. UPDATE DATA --
if (isset($_POST['btnEdit'])) {
    $id         = mysqli_real_escape_string($link, $_POST['id']);
    $nama       = mysqli_real_escape_string($link, $_POST['nama']);
    $role       = mysqli_real_escape_string($link, $_POST['role']);
    $nohp       = mysqli_real_escape_string($link, $_POST['nohp']);
    $telegram   = mysqli_real_escape_string($link, $_POST['idtelegram']);
    $status     = mysqli_real_escape_string($link, $_POST['status']);

    // Update Password jika diisi
    $sql_pass = "";
    if (!empty($_POST['passwd'])) {
        $p = md5($keycode . mysqli_real_escape_string($link, $_POST['passwd']));
        $sql_pass = ", user_passwd='$p'";
    }

    $query = "UPDATE tbluser SET 
              user_nama='$nama', 
              role_id='$role', 
              user_nohp='$nohp', 
              user_telegram='$telegram', 
              user_isaktif='$status' 
              $sql_pass 
              WHERE user_id='$id'";

    if (mysqli_query($link, $query)) {
        echo "<script>Swal.fire('Sukses', 'Data berhasil diperbarui', 'success').then(() => { window.location='index.php?token=" . encrypt(date('Ymd')) . "&hal=setting/user_management'; });</script>";
    } else {
        echo "<script>Swal.fire('Error', '" . mysqli_error($link) . "', 'error');</script>";
    }
}

// -- E. AMBIL DATA UNTUK EDIT --
$editData = [];
if (isset($_GET['act']) && $_GET['act'] == 'e' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($link, $_GET['id']);
    $qEdit = mysqli_query($link, "SELECT * FROM tbluser WHERE user_id='$id'");
    $editData = mysqli_fetch_assoc($qEdit);
}
?>

<div class="wrapper">
    <?php include_once "sidebar.php"; ?>
    <div class="content-wrapper">
        <div class="main-content">
            <?php include_once "topbar.php"; ?>

            <div class="body-content">
                <div class="row">

                    <div class="col-lg-4 mb-4">
                        <div class="card shadow-sm border-0" style="border-radius: 10px;">
                            <div class="card-header border-bottom-0 pt-4 px-4" style="background-color: #4287f5;">
                                <h6 class="font-weight-bold text-white">
                                    <i class="typcn typcn-user-add-outline mr-1"></i>
                                    <?= isset($_GET['act']) && $_GET['act'] == 'e' ? 'Edit Pengguna' : 'Tambah Pengguna Baru' ?>
                                </h6>
                            </div>
                            <div class="card-body px-4 pb-4">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= @$editData['user_id'] ?>">

                                    <div class="form-group">
                                        <label class="font-weight-600 text-muted small text-uppercase">Username</label>
                                        <input type="text" class="form-control" name="uname" value="<?= @$editData['user_nm'] ?>" <?= isset($_GET['act']) && $_GET['act'] == 'e' ? 'readonly' : 'required' ?> placeholder="Masukkan username">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600 text-muted small text-uppercase">Password</label>
                                        <input type="password" class="form-control" name="passwd" placeholder="<?= isset($_GET['act']) && $_GET['act'] == 'e' ? 'Isi jika ingin ubah password' : 'Masukkan password' ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600 text-muted small text-uppercase">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="<?= @$editData['user_nama'] ?>" required placeholder="Nama lengkap">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600 text-muted small text-uppercase">Role Akses</label>
                                        <select name="role" class="form-control" required>
                                            <option value="">-- PILIH ROLE --</option>
                                            <?php
                                            $qRole = mysqli_query($link, "SELECT * FROM tblrole ORDER BY role_id ASC");
                                            while ($rRole = mysqli_fetch_assoc($qRole)) {
                                                $selected = (@$editData['role_id'] == $rRole['role_id']) ? 'selected' : '';
                                                echo "<option value='{$rRole['role_id']}' $selected>{$rRole['role_nama']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600 text-muted small text-uppercase">No. Handphone</label>
                                        <input type="text" class="form-control" name="nohp" value="<?= @$editData['user_nohp'] ?>" placeholder="08xxxxxxxx">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600 text-muted small text-uppercase">ID Telegram</label>
                                        <input type="text" class="form-control" name="idtelegram" value="<?= @$editData['user_telegram'] ?>" placeholder="Contoh: 123456789">
                                        <small class="text-muted">Diperlukan untuk notifikasi reset password.</small>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600 text-muted small text-uppercase">Status Akun</label>
                                        <select name="status" class="form-control">
                                            <option value="Y" <?= (@$editData['user_isaktif'] == 'Y') ? 'selected' : '' ?>>AKTIF</option>
                                            <option value="T" <?= (@$editData['user_isaktif'] == 'T') ? 'selected' : '' ?>>TIDAK AKTIF</option>
                                        </select>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <?php if (isset($_GET['act']) && $_GET['act'] == 'e'): ?>
                                            <a href="index.php?token=<?= encrypt(date('Ymd')) ?>&hal=setting/user_management" class="btn btn-secondary">Batal</a>
                                            <button type="submit" name="btnEdit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan Perubahan</button>
                                        <?php else: ?>
                                            <button type="reset" class="btn btn-light">Reset</button>
                                            <button type="submit" name="btnSimpan" class="btn btn-success"><i class="fas fa-plus-circle mr-1"></i> Tambah User</button>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0" style="border-radius: 10px;">
                            <div class="card-header border-bottom-0 pt-4 px-4 d-flex justify-content-between align-items-center" style="background-color: #4287f5;">
                                <h6 class="font-weight-bold text-white mb-0"><i class="typcn typcn-th-list mr-1"></i> Daftar Pengguna Terdaftar</h6>
                            </div>
                            <div class="card-body px-0" style="padding: 0px">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover mb-0" id="tableUser">
                                        <thead class="bg-light text-muted">
                                            <tr>
                                                <th class="text-center" width="5%">No</th>
                                                <th>Nama & Username</th>
                                                <th>Kontak</th>
                                                <th>Role</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center" width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $qTampil = "SELECT tu.*, tr.role_nama 
                                                        FROM tbluser tu 
                                                        LEFT JOIN tblrole tr ON tu.role_id = tr.role_id 
                                                        ORDER BY tu.user_nama ASC";
                                            $rTampil = mysqli_query($link, $qTampil);

                                            // Cek Error Query
                                            if (!$rTampil) {
                                                echo "<tr><td colspan='6' class='text-center text-danger'>Error Query: " . mysqli_error($link) . "</td></tr>";
                                            } elseif (mysqli_num_rows($rTampil) == 0) {
                                                echo "<tr><td colspan='6' class='text-center'>Belum ada data user.</td></tr>";
                                            } else {
                                                $no = 1;
                                                while ($row = mysqli_fetch_assoc($rTampil)) {
                                                    $statusBadge = ($row['user_isaktif'] == 'Y')
                                                        ? '<span class="badge badge-success px-2 py-1">Aktif</span>'
                                                        : '<span class="badge badge-danger px-2 py-1">Non-Aktif</span>';
                                            ?>
                                                    <tr>
                                                        <td class="text-center align-middle"><?= $no++ ?></td>
                                                        <td class="align-middle">
                                                            <div class="font-weight-bold text-dark"><?= htmlspecialchars($row['user_nama']) ?></div>
                                                            <small class="text-muted"><i class="typcn typcn-user"></i> <?= htmlspecialchars($row['user_nm']) ?></small>
                                                        </td>
                                                        <td class="align-middle small">
                                                            <div><i class="typcn typcn-phone"></i> <?= $row['user_nohp'] ?></div>
                                                            <div><i class="fab fa-telegram-plane"></i> <?= $row['user_telegram'] ?></div>
                                                        </td>
                                                        <td class="align-middle"><span class="badge badge-info badge-pill"><?= $row['role_nama'] ?></span></td>
                                                        <td class="text-center align-middle"><?= $statusBadge ?></td>
                                                        <td class="text-center align-middle">
                                                            <div class="btn-group">
                                                                <a href="index.php?token=<?= encrypt(date('Ymd')) ?>&hal=setting/user_management&act=e&id=<?= $row['user_id'] ?>"
                                                                    class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="Edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a href="#" onclick="konfirmasiReset('<?= $row['user_id'] ?>', '<?= $row['user_nama'] ?>')"
                                                                    class="btn btn-sm btn-outline-warning" data-toggle="tooltip" title="Reset Password">
                                                                    <i class="fas fa-key"></i>
                                                                </a>
                                                                <a href="#" onclick="konfirmasiHapus('<?= $row['user_id'] ?>', '<?= $row['user_nama'] ?>')"
                                                                    class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Hapus">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php include_once "bottombar.php"; ?>
        </div>
    </div>
    <?php include_once "footer.php"; ?>
</div>

<script>
    function konfirmasiHapus(id, nama) {
        Swal.fire({
            title: 'Hapus User?',
            text: "Anda yakin ingin menghapus user " + nama + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php?token=<?= encrypt(date('Ymd')) ?>&hal=setting/user_management&act=x&id=" + id;
            }
        })
    }

    function konfirmasiReset(id, nama) {
        Swal.fire({
            title: 'Reset Password?',
            text: "Password baru akan dikirim ke Telegram user " + nama,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Reset!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php?token=<?= encrypt(date('Ymd')) ?>&hal=setting/user_management&act=rst&id=" + id;
            }
        })
    }

    // Aktifkan Tooltip Bootstrap
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>