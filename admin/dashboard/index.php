<?php
include_once "header.php";

// -- A. Filter Tanggal Default --
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$tglawal = $_POST['tglawal'];
	$tglakhir = $_POST['tglakhir'];
} else {
	$tglawal = date('Y-01-01');
	$tglakhir = date('Y-m-d');
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
	/* Styling Tambahan agar Card Lebih Cantik */
	.card-modern {
		border: none;
		border-radius: 15px;
		box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .05);
		transition: transform 0.3s;
	}

	.card-modern:hover {
		transform: translateY(-5px);
	}

	.bg-gradient-primary {
		background: linear-gradient(45deg, #4099ff, #73b4ff);
		color: white;
	}

	.bg-gradient-success {
		background: linear-gradient(45deg, #2ed8b6, #59e0c5);
		color: white;
	}

	.bg-gradient-warning {
		background: linear-gradient(45deg, #FFB64D, #ffcb80);
		color: white;
	}

	.bg-gradient-danger {
		background: linear-gradient(45deg, #FF5370, #ff869a);
		color: white;
	}

	.card-icon-large {
		font-size: 3rem;
		opacity: 0.3;
		position: absolute;
		right: 20px;
		top: 20px;
	}

	.stat-label {
		font-size: 0.85rem;
		opacity: 0.9;
		text-transform: uppercase;
		letter-spacing: 1px;
	}

	.stat-value {
		font-size: 2.2rem;
		font-weight: 700;
		margin-bottom: 0;
	}
</style>

<div class="wrapper">
	<?php include_once "sidebar.php"; ?>
	<div class="content-wrapper">
		<div class="main-content">
			<?php include_once "topbar.php"; ?>
			<div class="body-content">
				<div class="alert alert-success card-modern mb-4" role="alert" id="alert-success-autohide" style="background: #e3f9e5; color: #1f7a26; border-left: 5px solid #28a745;">
					<div class="d-flex align-items-center">
						<i class="typcn typcn-user-outline mr-2" style="font-size: 24px;"></i>
						<h4 class="alert-heading mb-0">Halo <?php echo htmlspecialchars($_SESSION['user_nama']) ?>, Selamat Datang Kembali!</h4>
					</div>
				</div>

				<div class="card card-modern mb-4">
					<div class="card-body">
						<form method="POST" class="row align-items-end">
							<div class="col-md-4">
								<label class="font-weight-bold">Tanggal Awal</label>
								<input type="date" name="tglawal" class="form-control" value="<?= $tglawal ?>">
							</div>
							<div class="col-md-4">
								<label class="font-weight-bold">Tanggal Akhir</label>
								<input type="date" name="tglakhir" class="form-control" value="<?= $tglakhir ?>">
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-primary shadow-sm"><i class="typcn typcn-filter"></i> Filter Data</button>
								<a href="" class="btn btn-light shadow-sm">Reset</a>
							</div>
						</form>
					</div>
				</div>

				<div class="row">
					<?php
					// Contoh Query (Sesuaikan dengan nama tabel Anda)
					// $total_transaksi = mysqli_query($conn, "SELECT count(id) as total FROM transaksi WHERE tgl BETWEEN '$tglawal' AND '$tglakhir'");
					?>
					<div class="col-md-3">
						<div class="card card-modern bg-gradient-primary mb-4">
							<div class="card-body p-4">
								<div class="stat-label">Total Transaksi</div>
								<div class="stat-value">1,250</div>
								<i class="typcn typcn-shopping-cart card-icon-large"></i>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card card-modern bg-gradient-success mb-4">
							<div class="card-body p-4">
								<div class="stat-label">Pendapatan</div>
								<div class="stat-value">Rp 15.2M</div>
								<i class="typcn typcn-chart-line card-icon-large"></i>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card card-modern bg-gradient-warning mb-4">
							<div class="card-body p-4">
								<div class="stat-label">User Aktif</div>
								<div class="stat-value">458</div>
								<i class="typcn typcn-group-outline card-icon-large"></i>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card card-modern bg-gradient-danger mb-4">
							<div class="card-body p-4">
								<div class="stat-label">Pending Order</div>
								<div class="stat-value">12</div>
								<i class="typcn typcn-time card-icon-large"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="card card-modern mb-4">
							<div class="card-header bg-white font-weight-bold">Tren Pertumbuhan</div>
							<div class="card-body">
								<canvas id="mainChart" height="120"></canvas>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card card-modern mb-4">
							<div class="card-header bg-white font-weight-bold">Distribusi Kategori</div>
							<div class="card-body">
								<canvas id="pieChart" height="255"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include_once "bottombar.php"; ?>
		</div>
	</div>
</div>
<?php include_once "footer.php"; ?>

<script>
	// 1. Auto Hide Alert
	setTimeout(function() {
		var alertBox = document.getElementById('alert-success-autohide');
		if (alertBox) {
			alertBox.style.transition = 'opacity 1s';
			alertBox.style.opacity = '0';
			setTimeout(function() {
				alertBox.style.display = 'none';
			}, 1000);
		}
	}, 4000);
	
	// 2. Inisialisasi Grafik Tren (Line Chart)
	const ctx = document.getElementById('mainChart').getContext('2d');
	new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
			datasets: [{
				label: 'Penjualan 2026',
				data: [12, 19, 3, 5, 2, 3],
				borderColor: '#4099ff',
				backgroundColor: 'rgba(64, 153, 255, 0.1)',
				fill: true,
				tension: 0.4
			}]
		},
		options: {
			responsive: true
		}
	});

	// 3. Inisialisasi Grafik Pie
	const ctxPie = document.getElementById('pieChart').getContext('2d');
	new Chart(ctxPie, {
		type: 'doughnut',
		data: {
			labels: ['Elektronik', 'Fashion', 'Makanan'],
			datasets: [{
				data: [40, 30, 30],
				backgroundColor: ['#4099ff', '#2ed8b6', '#FFB64D']
			}]
		},
		options: {
			cutout: '70%',
			maintainAspectRatio: false
		}
	});
</script>