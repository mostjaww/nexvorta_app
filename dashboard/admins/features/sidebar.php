<?php
if (!isset($_SESSION['username'])) {
    header("Location: menu-a/login.php");
    exit();
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/sneat/API/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/sneat/features/controller_user.php';

function generateToken()
{
    return encrypt(date('Ymd'));
}

// Jika base_url belum didefinisikan
if (!isset($base_url)) {
    $base_url = "https://" . $_SERVER['HTTP_HOST'] . "/sneat/";
}
?>

<aside id="layout-menu" class="bg-menu-theme layout-menu menu-vertical menu">
    <div class="app-brand demo">
        <a href="<?= $base_url?>" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="<?= $base_url; ?>assets/img/icons/brands/logo_deliserdang.png" alt="Logo" style="width: 40px; height: auto;" />
            </span>
            <span class="ms-3 app-brand-text fw-bolder menu-text" style="font-size: large;">BACKOFFICE</span>
        </a>
        <a href="javascript:void(0);" class="ms-auto text-large layout-menu-toggle menu-link">
            <i class="bx-chevron-left bx icon-base"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <div style="height: 32px;"></div>
    <ul class="py-1 menu-inner">
        <?php if (!empty($_SESSION['menus'])): ?>
            <?php foreach ($_SESSION['menus'] as $menu): ?>

                <?php foreach ($menu['submenus'] as $submenu): ?>
                    <?php if ($submenu['submenu_allow'] === 'Y' || $submenu['submenu_allow'] === 'T'): ?>

                        <?php foreach ($menu['submenus'] as $index => $submenu): ?>
                            <?php if (!in_array($submenu['submenu_allow'], ['Y', 'T'], true)) continue; ?>

                            <?php if ($submenu['submenu_type'] === 'menu'): ?>
                                <?php
                                // Cari submenu anak dari menu ini, jika ada
                                $children = array_filter($menu['submenus'], function ($child) {
                                    return $child['submenu_type'] === 'submenu';
                                });
                                ?>

                                <?php if (!empty($children)): ?>
                                    <!-- Menu induk dengan dropdown -->
                                    <li class="menu-item">
                                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                                            <i class="menu-icon tf-icons bx <?= htmlspecialchars($submenu['submenu_icon']); ?>"></i>
                                            <div><?= htmlspecialchars($submenu['submenu_nama']); ?></div>
                                        </a>
                                        <ul class="menu-sub">
                                            <?php foreach ($children as $child): ?>
                                                <li class="menu-item">
                                                    <a href="<?= $base_url . htmlspecialchars($child['submenu_link']); ?>" class="menu-link">
                                                        <div><?= htmlspecialchars($child['submenu_nama']); ?></div>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <!-- Menu tanpa anak submenu, tetap ditampilkan -->
                                    <li class="menu-item">
                                        <a href="<?= $base_url . htmlspecialchars($submenu['submenu_link']); ?>" class="menu-link">
                                            <i class="menu-icon tf-icons bx <?= htmlspecialchars($submenu['submenu_icon']); ?>"></i>
                                            <div><?= htmlspecialchars($submenu['submenu_nama']); ?></div>
                                        </a>
                                    </li>
                                <?php endif; ?>

                            <?php elseif ($submenu['submenu_type'] === 'submenu'): ?>
                                <!-- Hanya tampilkan jika tidak sedang ditampilkan dalam parent -->
                                <?php
                                // Cek apakah menu ini tidak memiliki parent `menu` untuk menghindari duplikat
                                $has_menu_parent = false;
                                foreach ($menu['submenus'] as $s) {
                                    if ($s['submenu_type'] === 'menu') {
                                        $has_menu_parent = true;
                                        break;
                                    }
                                }
                                ?>
                                <?php if (!$has_menu_parent): ?>
                                    <li class="menu-item">
                                        <a href="<?= $base_url . htmlspecialchars($submenu['submenu_link']); ?>" class="menu-link">
                                            <i class="menu-icon tf-icons bx <?= htmlspecialchars($submenu['submenu_icon']); ?>"></i>
                                            <div><?= htmlspecialchars($submenu['submenu_nama']); ?></div>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>


                    <?php endif; ?>
                <?php endforeach; ?>


            <?php endforeach; ?>
        <?php else: ?>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <div class="text-danger">Tidak ada menu tersedia</div>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</aside>