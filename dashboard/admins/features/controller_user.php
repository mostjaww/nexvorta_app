<?php
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/sneat/API/config.php';

if (!isset($_SESSION['role_id'])) {
    die("Role ID tidak ditemukan dalam sesi.");
}

$role_id = $_SESSION['role_id'];

// Query lengkap untuk mengambil data menu dan submenu berdasarkan role_id
$sql = " SELECT 
        tblmenu.id AS menu_id,
        tblmenu.menu_nama,
        tblsubmenu.id AS submenu_id,
        tblsubmenu.submenu_nama,
        tblsubmenu.submenu_link,
        tblsubmenu.submenu_icon,
        tblsubmenu.submenu_type,
        tblsubmenu.submenu_urut,
        tblsubmenu.submenu_allow
    FROM tblsubmenu
    INNER JOIN tblmenu ON tblsubmenu.menu_id = tblmenu.id
    INNER JOIN tblroleizin ON tblsubmenu.id = tblroleizin.submenu_id
    WHERE tblroleizin.role_id = ?
    ORDER BY tblmenu.id ASC, tblsubmenu.submenu_urut ASC
";


// Eksekusi query
$statement = $conn->prepare($sql);
if (!$statement) {
    die("Terjadi kesalahan pada query: " . $conn->error);
}
$statement->bind_param("i", $role_id);
$statement->execute();
$result = $statement->get_result();

// Susun array $menus sesuai format menu -> submenus[]
$menus = [];

while ($row = $result->fetch_assoc()) {
    $menu_id = $row['menu_id'];

    if (!isset($menus[$menu_id])) {
        $menus[$menu_id] = [
            'menu_nama' => $row['menu_nama'],
            'submenus' => []
        ];
    }

    $menus[$menu_id]['submenus'][] = [
        'submenu_id'         => $row['submenu_id'],
        'submenu_nama'       => $row['submenu_nama'],
        'submenu_link'       => $row['submenu_link'],
        'submenu_icon'       => $row['submenu_icon'],
        'submenu_type'       => $row['submenu_type'],
        'submenu_urut'       => $row['submenu_urut'],
        'submenu_allow'      => $row['submenu_allow']
    ];
}

$statement->close();

// Simpan hasilnya ke dalam session
$_SESSION['menus'] = $menus;

// Simpan nama role
$daftar_nama_role = [
    1 => 'SUPER ADMIN',
    2 => 'ADMIN',
    3 => 'BACKOFFICE',
    4 => 'KEPALA DINAS',
    5 => 'SEKRETARIS',
    6 => 'KEPALA BIDANG',
    7 => 'KEPALA SEKSI',
];

$_SESSION['role_nama'] = $daftar_nama_role[$role_id] ?? 'Unknown';