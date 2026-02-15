<style>
    /* Jam Digital */
    .digital-clock-wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
        margin-right: 20px;
        border-right: 1px solid #eee;
        padding-right: 20px;
        line-height: 1.2;
    }

    .clock-time {
        font-size: 18px;
        font-weight: 700;
        color: #333;
        font-family: 'Courier New', Courier, monospace;
        /* Font monospaced agar angka tidak goyang */
    }

    .clock-date {
        font-size: 11px;
        color: #888;
        font-weight: 600;
        text-transform: uppercase;
    }
</style>

<nav class="navbar-custom-menu navbar navbar-expand-lg m-0" style="height: 70px;">
    <div class="sidebar-toggle-icon open" id="sidebarCollapse">
        sidebar toggle<span></span>
    </div>
    <div class="d-flex flex-grow-1"></div>
    <div class="digital-clock-wrapper d-none d-md-flex">
        <span class="clock-time" id="clock-time">00:00:00</span>
        <span class="clock-date" id="clock-date">LOADING...</span>
    </div>
    <ul class="navbar-nav flex-row align-items-center ml-auto">

        <li class="nav-item dropdown user-menu">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                <div class="img-user" style="display: inline-block; max-width: 100%; height: auto;">
                    <img src="<?php echo $base_url; ?>assets\img\logo\dashboard.png" style="max-width: 100%; height: auto; display: block;" alt="">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header d-sm-none">
                    <a href="#" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                </div>

                <div class="user-header">
                    <div class="img-user" style="display: inline-block; max-width: 100%; height: auto;">
                        <img src="<?php echo $base_url; ?>assets\img\logo\dashboard.png" style="max-width: 100%; height: auto; display: block;" alt="">
                    </div>
                    <h6><?php echo $_SESSION['user_nama'] ?></h6>
                    <span><a class="__cf_email__" style="color: rgb(85, 179, 246)" data-cfemail="6f0a170e021f030a2f08020e0603410c0002"><?php echo $_SESSION['role_nama'] ?></a></span>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown user-menu">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="mdi mdi-cog mdi-spin"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header d-sm-none">
                    <a href="#" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                </div>

                <!-- <a href="<?php echo "index.php?token=" . encrypt(date('Ymd')) . "&hal=app-calendar"; ?>" class="dropdown-item"><i class="typcn typcn-calendar-outline"></i> Kalender</a> -->
                <a href="<?php echo "index.php?token=" . encrypt(date('Ymd')) . "&hal=setting/upassword"; ?>" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Ubah Password</a>
                <a href="<?php echo "index.php?token=" . encrypt(date('Ymd')) . "&hal=logout"; ?>" class="dropdown-item" id="logout-link"><i class="typcn typcn-power"></i>Logout</a>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var logoutLink = document.getElementById('logout-link');
                        if (logoutLink) {
                            logoutLink.addEventListener('click', function(e) {
                                e.preventDefault();
                                Swal.fire({
                                    title: 'Konfirmasi',
                                    text: 'Apakah Anda yakin ingin keluar?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Ya, keluar',
                                    cancelButtonText: 'Batal'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = logoutLink.href;
                                    }
                                });
                            });
                        }
                    });
                </script>
                <!-- <a href="<?php echo "index.php?token=" . encrypt(date('Ymd')) . "&hal=logout"; ?>" class="dropdown-item"><i class="typcn typcn-power"></i> Logout</a> -->
            </div>
        </li>

    </ul>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // --- 1. CONFIG: DAFTAR TANGGAL MERAH (LIBUR NASIONAL) ---
        // Format: 'YYYY-MM-DD'. Masukkan tanggal libur nasional tahun 2025 di sini.
        // Tips: Anda bisa men-generate ini dari PHP jika data libur ada di database.
        const liburNasional = [
            '2025-01-01', // Tahun Baru Masehi
            '2025-01-27', // Isra Mi'raj
            '2025-01-29', // Tahun Baru Imlek
            '2025-03-29', // Hari Suci Nyepi
            '2025-03-31', // Idul Fitri (Estimasi)
            '2025-04-01', // Cuti Bersama Idul Fitri (Estimasi)
            '2025-04-18', // Wafat Isa Al Masih
            '2025-05-01', // Hari Buruh
            '2025-05-12', // Hari Raya Waisak
            '2025-05-29', // Kenaikan Isa Al Masih
            '2025-06-01', // Hari Lahir Pancasila
            '2025-06-07', // Idul Adha (Estimasi)
            '2025-06-27', // Tahun Baru Islam
            '2025-08-17', // HUT RI
            '2025-09-05', // Maulid Nabi Muhammad SAW
            '2025-12-25', // Hari Raya Natal
        ];

        // --- 2. SCRIPT JAM DIGITAL ---
        function updateClock() {
            const now = new Date();

            // A. LOGIKA CEK HARI LIBUR
            // ----------------------------------------
            // 1. Cek Weekend (0 = Minggu, 6 = Sabtu)
            const dayOfWeek = now.getDay();
            const isWeekend = (dayOfWeek === 0 || dayOfWeek === 6);

            // 2. Cek Tanggal Merah (Format YYYY-MM-DD)
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const day = String(now.getDate()).padStart(2, '0');
            const todayStr = `${year}-${month}-${day}`;

            const isNationalHoliday = liburNasional.includes(todayStr);
            const isHoliday = isWeekend || isNationalHoliday;

            // B. UPDATE TAMPILAN WAKTU
            // ----------------------------------------
            const timeString = now.toLocaleTimeString('id-ID', {
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            }).replace(/\./g, ':');

            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            let dateString = now.toLocaleDateString('id-ID', dateOptions);

            // Ambil Element
            const timeEl = document.getElementById('clock-time');
            const dateEl = document.getElementById('clock-date');

            // Update Teks
            if (timeEl) timeEl.textContent = timeString;
            if (dateEl) {
                // Jika libur nasional, tambahkan keterangan (opsional)
                if (isNationalHoliday) {
                    dateEl.textContent = dateString.toUpperCase() + " (LIBUR)";
                } else {
                    dateEl.textContent = dateString.toUpperCase();
                }
            }

            // C. UBAH WARNA JIKA LIBUR
            // ----------------------------------------
            if (isHoliday) {
                // Warna Merah (Danger)
                if (timeEl) timeEl.style.color = '#dc3545';
                if (dateEl) dateEl.style.color = '#dc3545';
            } else {
                // Warna Normal (Hitam/Abu) - Sesuaikan dengan CSS asli Anda
                if (timeEl) timeEl.style.color = '#333';
                if (dateEl) dateEl.style.color = '#888';
            }
        }

        // Jalankan update setiap 1 detik
        setInterval(updateClock, 1000);
        updateClock();
    });
</script>