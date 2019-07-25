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
		$sql = mysqli_query($conn, "SELECT * FROM peramalan WHERE bulan = $tahun[$i]");
		while ($row = mysqli_fetch_array($sql)) {
			array_push($array, $row['penjualan']); //peramalan penjualan
		}
	}

	for ($i = 0; $i < 12; $i++) {
		if (isset($array[$i])) { } else {
			array_push($array, '0');
		}
	}
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
				pattern: ['#2196F3', '#FF9800', '#FF9800', '#FF9800', '#FF9800']

			},
			data: {

				columns: [

					['Penjualan', <?php echo $array[4] ?>, <?php echo $array[5] ?>, <?php echo $array[6] ?>, <?php echo $array[7] ?>],
					['Karpet Gambar Bunga', <?php echo $array[0] ?>, <?php echo $array[4] ?>, <?php echo $array[8] ?>, <?php echo $array[12] ?>, <?php echo $array[16] ?>],
					['Karpet Gambar	Kartun', <?php echo $array[1] ?>, <?php echo $array[5] ?>, <?php echo $array[9] ?>, <?php echo $array[13] ?>, <?php echo $array[17] ?>],
					['Karpet Gambar Sport', <?php echo $array[2] ?>, <?php echo $array[6] ?>, <?php echo $array[10] ?>, <?php echo $array[14] ?>, <?php echo $array[18] ?>],
					['Karpet Gambar Vektor', <?php echo $array[3] ?>, <?php echo $array[7] ?>, <?php echo $array[11] ?>, <?php echo $array[15] ?>, <?php echo $array[19] ?>]
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