	<?php

	include 'proses/koneksi.php';
	$array = array();
	$ramal = array();
	$tahun = array();

	$sql0 = mysqli_query($conn, "SELECT  bulan as tahun FROM peramalan");
	while ($query = mysqli_fetch_array($sql0)) {
		array_push($tahun, $query['tahun']);
	} //tahun 

	for ($i = 0; $i <= 4; $i++) {
		$sql = mysqli_query($conn, "SELECT SUM(penjualan) as dodol FROM peramalan WHERE bulan = $tahun[$i]");
		while ($row = mysqli_fetch_array($sql)) {
			array_push($array, $row['dodol']); //peramalan penjualan
		}
	}

	$query = mysqli_query($conn, "SELECT SUM(lembar) as ya FROM data_penjualan GROUP BY YEAR(tggl_transaksi)");
	while ($row = mysqli_fetch_array($query)) {
		array_push($ramal, $row['ya']); //peramalan penjualan
	}


	for ($i = 0; $i < 12; $i++) {
		if (isset($array[$i])) { } else {
			array_push($array, '0');
		}
	}
	?>

	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>



	<div>
		<a type="button" target="_blank" href="proses/test.php" class="btn btn-success btn-sm legitRipple mb-20">Export Excel <i class="icon-file-excel"></i></a>
	</div>

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

					['Penjualan', <?php echo $ramal[0] ?>, <?php echo $ramal[1] ?>, <?php echo $ramal[2] ?>, <?php echo $ramal[3] ?>],
					['peramalan penjualan', <?php echo $array[0] ?>, <?php echo $array[1] ?>, <?php echo $array[2] ?>, <?php echo $array[3] ?>, <?php echo $array[4] ?>],
				]
			},
			axis: {
				x: {
					type: 'category',
					categories: [<?= $tahun[0] ?>, <?= $tahun[1] ?>, <?= $tahun[2] ?>, <?= $tahun[3] ?>, <?= $tahun[4] ?>]
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