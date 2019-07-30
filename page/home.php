<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>



<div>
	<a type="button" target="_blank" href="proses/metode.php" class="btn btn-success btn-sm legitRipple mb-20">Export Excel <i class="icon-file-excel"></i></a>
</div>

<?php

include 'proses/koneksi.php';
$array = array();
$ramal = array();

$array2 = array();
$ramal2 = array();

$array3 = array();
$ramal3 = array();

$array4 = array();
$ramal4 = array();

$tahun = array();
$sql0 = mysqli_query($conn, "SELECT  YEAR(tahun) as tahun FROM peramalan");
while ($query = mysqli_fetch_array($sql0)) {
	array_push($tahun, $query['tahun']);
} //tahun 

$sql = mysqli_query($conn, "SELECT penjualan as dodol FROM peramalan WHERE id_produk = 'A'");
while ($row = mysqli_fetch_array($sql)) {
	array_push($array, $row['dodol']); //penjualan
}

$sql = mysqli_query($conn, "SELECT penjualan as dodol FROM peramalan WHERE id_produk = 'B'");
while ($row = mysqli_fetch_array($sql)) {
	array_push($array2, $row['dodol']); //penjualan
}

$sql = mysqli_query($conn, "SELECT penjualan as dodol FROM peramalan WHERE id_produk = 'C'");
while ($row = mysqli_fetch_array($sql)) {
	array_push($array3, $row['dodol']); //penjualan
}

$sql = mysqli_query($conn, "SELECT penjualan as dodol FROM peramalan WHERE id_produk = 'D'");
while ($row = mysqli_fetch_array($sql)) {
	array_push($array4, $row['dodol']); //penjualan
}

$query = mysqli_query($conn, "SELECT peramalan as ya FROM peramalan WHERE id_produk = 'A'");
while ($row = mysqli_fetch_array($query)) {
	array_push($ramal, $row['ya']); //peramalan penjualan
}

$query = mysqli_query($conn, "SELECT peramalan as ya FROM peramalan WHERE id_produk = 'B'");
while ($row = mysqli_fetch_array($query)) {
	array_push($ramal2, $row['ya']); //peramalan penjualan
}

$query = mysqli_query($conn, "SELECT peramalan as ya FROM peramalan WHERE id_produk = 'C'");
while ($row = mysqli_fetch_array($query)) {
	array_push($ramal3, $row['ya']); //peramalan penjualan
}

$query = mysqli_query($conn, "SELECT peramalan as ya FROM peramalan WHERE id_produk = 'D'");
while ($row = mysqli_fetch_array($query)) {
	array_push($ramal4, $row['ya']); //peramalan penjualan
}
$sql2 = mysqli_query($conn, "SELECT data_produk.id_produk,data_produk.nama_produk FROM data_produk"); // memanggil data produk
$i = 1;
while ($c = mysqli_fetch_array($sql2)) {
	?>
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h6 class="panel-title text-semibold">Grafik Penjualan <?= $c['nama_produk'] ?></h6>
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
				<div class="chart" id="c<?= $i ?>-grid-lines"></div>
			</div>
		</div>
	</div>
	<?php $i++;
} ?>
<script>
	var grid_lines = c3.generate({
		bindto: '#c1-grid-lines',
		size: {
			height: 400
		},
		color: {
			pattern: ['#2196F3', '#FF9800']

		},
		data: {

			columns: [

				['Penjualan', <?= $array[0] ?>, <?= $array[1] ?>, <?= $array[2] ?>, <?= $array[3] ?>],
				['peramalan penjualan', <?= $ramal[0] ?>, <?= $ramal[1] ?>, <?= $ramal[2] ?>, <?= $ramal[3] ?>],
			]
		},
		axis: {
			x: {
				type: 'category',
				categories: [
					<?= $tahun[0] ?>,
					<?= $tahun[1] ?>,
					<?= $tahun[2] ?>,
					<?= $tahun[3] ?>,
				]
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
	var grid_lines = c3.generate({
		bindto: '#c2-grid-lines',
		size: {
			height: 400
		},
		color: {
			pattern: ['#2196F3', '#FF9800']

		},
		data: {

			columns: [

				['Penjualan', <?= $array2[0] ?>, <?= $array2[1] ?>, <?= $array2[2] ?>, <?= $array2[3] ?>],
				['peramalan penjualan', <?= $ramal2[0] ?>, <?= $ramal2[1] ?>, <?= $ramal2[2] ?>, <?= $ramal2[3] ?>],
			]
		},
		axis: {
			x: {
				type: 'category',
				categories: [
					<?= $tahun[0] ?>,
					<?= $tahun[1] ?>,
					<?= $tahun[2] ?>,
					<?= $tahun[3] ?>,
				]
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

				['Penjualan', <?= $array3[0] ?>, <?= $array3[1] ?>, <?= $array3[2] ?>, <?= $array3[3] ?>],
				['peramalan penjualan', <?= $ramal3[0] ?>, <?= $ramal3[1] ?>, <?= $ramal3[2] ?>, <?= $ramal3[3] ?>],
			]
		},
		axis: {
			x: {
				type: 'category',
				categories: [
					<?= $tahun[0] ?>,
					<?= $tahun[1] ?>,
					<?= $tahun[2] ?>,
					<?= $tahun[3] ?>,
				]
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
	var grid_lines = c3.generate({
		bindto: '#c4-grid-lines',
		size: {
			height: 400
		},
		color: {
			pattern: ['#2196F3', '#FF9800']

		},
		data: {

			columns: [

				['Penjualan', <?= $array4[0] ?>, <?= $array4[1] ?>, <?= $array4[2] ?>, <?= $array4[3] ?>],
				['peramalan penjualan', <?= $ramal4[0] ?>, <?= $ramal4[1] ?>, <?= $ramal4[2] ?>, <?= $ramal4[3] ?>],
			]
		},
		axis: {
			x: {
				type: 'category',
				categories: [
					<?= $tahun[0] ?>,
					<?= $tahun[1] ?>,
					<?= $tahun[2] ?>,
					<?= $tahun[3] ?>,
				]
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