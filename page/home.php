	<?php

	include 'proses/koneksi.php';
	$array = array();
	$ramal = array();
	$tahun = array();
	date_default_timezone_set("Asia/Jakarta");
	$tgl = date('Y-m-d');
	$hari = date('d');
	$year = date('Y');
	$tgl = explode('-', $tgl);
	$sql1 = mysqli_query($conn, "SELECT tggl_transaksi FROM data_penjualan GROUP BY YEAR(tggl_transaksi)");
	while ($query = mysqli_fetch_array($sql1)) {
		array_push($tahun, $query['tggl_transaksi']);
	}
	$sql = mysqli_query($conn, "SELECT * FROM peramalan");
	$row = mysqli_num_rows($sql);
	$bln = date('m');
	while ($row = mysqli_fetch_array($sql)) {
		array_push($array, $row['penjualan']);
	}

	for ($i = 0; $i < 12; $i++) {
		if (isset($array[$i])) { } else {
			array_push($array, '0');
		}
	}

	print_r($array);

	$sql = mysqli_query($conn, "SELECT SUM(penjualan) as penjualan FROM peramalan GROUP BY YEAR(bulan)");
	while ($row = mysqli_fetch_array($sql)) {
		array_push($ramal, $row['penjualan']);
	}

	for ($i = 0; $i < 12; $i++) {
		if (isset($ramal[$i])) { } else {
			array_push($ramal, '0');
		}
	}
	// $databulan = array(
	// 	'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
	// 	'November', 'Desember'
	// );
	// $monthName = $databulan[$bln - 1];
	?>

	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>



	<button type="button" id="btnmodal" style="display: none;" class="btn btn-warning btn-sm legitRipple" data-toggle="modal" data-target="#modal_theme_warning">Launch <i class="icon-play3 position-right"></i></button>

	<div class="panel panel-flat">
		<div class="panel-heading">
			<h6 class="panel-title text-semibold">Grafik Penjualan</h6>
			<div class="heading-elements">
				<ul class="icons-list">
					<li>
						<a data-action="collapse"></a>
					</li>
					<li>
						<a data-action="reload"></a>
					</li>
					<li>
						<a data-action="close"></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="panel-body">
			<div class="chart-container">
				<div class="chart" id="c3-grid-lines"></div>
			</div>
		</div>
	</div>
	<script>
		var grid_lines = c3.generate({
			bindto: '#c3-grid-lines',
			size: {
				height: 400
			},
			color: {
				pattern: ['#2196F3', '#FF9800']

			},
			data: {

				columns: [

					['Penjualan', <?php echo $array[0] ?>, <?php echo $array[1] ?>, <?php echo $array[2] ?>, <?php echo $array[3] ?>, <?php echo $array[4] ?>],
					['Peramalan Penjualan', <?php echo $ramal[0] ?>, <?php echo $ramal[1] ?>, <?php echo $ramal[2] ?>, <?php echo $ramal[3] ?>, <?php echo $ramal[4] ?>]
				]
			},
			axis: {
				x: {
					type: 'category',
					categories: ['2014', '2015', '2016', '2017', '2018']
				}
			},
			grid: {
				x: {
					show: true
				},
				y: {
					show: true
				}
			}
		});
	</script>
	<!-- <?php

			if ($hari == '1' or $hari == '01') {
				include 'proses/exponentialsmoothing.php';
			}

			?> -->