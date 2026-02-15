<?php
include_once 'config.php';

if ($_SESSION['user_id'] == '') {
?>
    <script type='text/javascript'>
        window.location = 'logout.php';
    </script>
<?php
}
?>

<style>
    /* Wrapper Utama Sidebar */
    .sidebar-bunker {
        background: linear-gradient(180deg, #1c6ba4 0%, #0d47a1 100%) !important;
        /* Gradasi Biru Lebih Modern */
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        height: 100vh;
        /* Full Height */
    }

    /* Bagian Profile */
    .profile-element {
        padding: 20px;
        background: rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Container Menu (Flex) */
    .sidebar-body {
        display: flex;
        flex-direction: column;
        flex: 1;
        /* Mengisi sisa ruang */
        overflow: hidden;
        /* Mencegah scrollbar ganda */
        padding: 0;
    }

    /* Area Menu Utama (Scrollable) */
    .sidebar-nav-scroll {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        padding-top: 10px;
    }

    /* Kustomisasi Scrollbar agar tipis & rapi */
    .sidebar-nav-scroll::-webkit-scrollbar {
        width: 5px;
    }

    .sidebar-nav-scroll::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar-nav-scroll::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }

    /* Styling Menu Item */
    .sidebar-nav ul.metismenu li a {
        color: rgba(255, 255, 255, 0.8) !important;
        padding: 12px 20px;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        font-size: 14px;
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    /* Hover Effect */
    .sidebar-nav ul.metismenu li a:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #fff !important;
        border-left: 4px solid #fff;
        padding-left: 25px;
        /* Efek geser kanan sedikit */
    }

    /* Active State (Jika Anda punya logika active class di PHP nanti) */
    .sidebar-nav ul.metismenu li.mm-active>a {
        background: rgba(255, 255, 255, 0.2);
        color: #fff !important;
        border-left: 4px solid #00d2ff;
        font-weight: 600;
    }

    /* Footer Logout Area */
    .sidebar-footer {
        padding: 15px;
        background: rgba(0, 0, 0, 0.2);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: auto;
        /* Memaksa ke bawah */
    }

    .btn-logout-custom {
        display: block;
        width: 100%;
        text-align: left;
        color: #ffcccc !important;
        /* Warna merah muda lembut */
        background: transparent;
        padding: 10px 15px;
        border-radius: 6px;
        transition: 0.3s;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-logout-custom:hover {
        background: rgba(255, 0, 0, 0.2);
        color: #fff !important;
        transform: translateX(5px);
    }
</style>

<nav class="sidebar sidebar-bunker">

    <div class="profile-element d-flex align-items-center flex-shrink-0">
        <div class="avatar online mr-3">
            <img src="<?php echo $base_url; ?>assets\img\logo\dashboard.png" class="img-fluid rounded-circle shadow-sm" alt="" style="width: 45px; height: 45px; border: 2px solid rgba(255,255,255,0.5);">
        </div>
        <div class="profile-text text-white">
            <h6 class="m-0 text-white" style="font-size:15px; font-weight:700; letter-spacing: 0.5px;"><?php echo $_SESSION['user_nama'] ?></h6>
            <span class="badge badge-light mt-1" style="color: #1c6ba4; font-weight: bold; font-size: 10px;"><?php echo $_SESSION['role_nama'] ?></span>
        </div>
    </div>

    <div class="sidebar-body">

        <nav class="sidebar-nav sidebar-nav-scroll">
            <ul class="metismenu">
                <li class="nav-label ml-3 mt-2 mb-2 text-white-50 medium" style="text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Main Menu</li>

                <?php
                // Query Menu Utama
                $QMenu = "SELECT tm.menu_id, tm.menu_nama, tsm.submenu_icon, tsm.submenu_link, tsm.submenu_type, tsm.submenu_allow 
                FROM tblmenu tm 
                LEFT JOIN tblsubmenu tsm ON tm.menu_id = tsm.menu_id 
                LEFT JOIN tblroleizin tri ON tsm.submenu_id = tri.submenu_id 
                WHERE tri.role_id = '" . $_SESSION['role_id'] . "' 
                AND tsm.submenu_type = 'menu' 
                ORDER BY tm.menu_id ASC";

                $rstMenu = mysqli_query($link, $QMenu);

                while ($rMenu = mysqli_fetch_assoc($rstMenu)) {
                    if ($rMenu['submenu_allow'] == 'Y') {
                        $css = 'class="has-arrow material-ripple" href="#"';
                    } else {
                        $css = 'href="index.php?token=' . encrypt(date('Ymd')) . '&hal=' . $rMenu['submenu_link'] . '"';
                    }
                ?>
                    <li>
                        <a <?php echo $css; ?>>
                            <i class="typcn typcn-<?php echo $rMenu['submenu_icon'] ?> mr-3" style="font-size: 22px;"></i>
                            <span><?php echo $rMenu['menu_nama'] ?></span>
                        </a>

                        <ul class="nav-second-level">
                            <?php
                            $QSMenu = "SELECT tm.menu_id, tsm.submenu_nama, tsm.submenu_icon, tsm.submenu_link, tsm.submenu_type, tsm.submenu_allow 
                            FROM tblmenu tm 
                            LEFT JOIN tblsubmenu tsm ON tm.menu_id = tsm.menu_id 
                            LEFT JOIN tblroleizin tri ON tsm.submenu_id = tri.submenu_id 
                            WHERE tri.role_id = '" . $_SESSION['role_id'] . "' 
                            AND tm.menu_id = '" . $rMenu['menu_id'] . "' 
                            AND tsm.submenu_type = 'submenu' 
                            ORDER BY tm.menu_id ASC";

                            $rstSMenu = mysqli_query($link, $QSMenu);
                            while ($rSMenu = mysqli_fetch_assoc($rstSMenu)) {
                            ?>
                                <li>
                                    <a href="<?php echo "index.php?token=" . encrypt(date('Ymd')) . "&hal=" . $rSMenu['submenu_link']; ?>">
                                        <i class="typcn typcn-<?php echo $rSMenu['submenu_icon'] ?> mr-2" style="font-size: 16px; opacity: 0.7;"></i>
                                        <?php echo $rSMenu['submenu_nama']; ?>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>

        <div class="sidebar-footer">
            <?php $logoutUrl = "index.php?token=" . encrypt(date('Ymd')) . "&hal=logout"; ?>
            <a href="<?php echo $logoutUrl; ?>" class="btn-logout-custom"
                onclick="event.preventDefault(); Swal.fire({
                   title: 'Konfirmasi Keluar',
                   text: 'Apakah Anda yakin ingin keluar?',
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#d33',
                   cancelButtonColor: '#3085d6',
                   confirmButtonText: 'Ya, Keluar',
                   cancelButtonText: 'Batal'
               }).then((result) => {
                   if (result.isConfirmed) {
                       window.location.href = '<?php echo addslashes($logoutUrl); ?>';
                   }
               });">
                <i class="typcn typcn-power-outline mr-2"></i> Keluar
            </a>
        </div>

    </div>
</nav>