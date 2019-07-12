	<?php

	include 'proses/koneksi.php';
		$array=array();
		$ramal=array();

		date_default_timezone_set("Asia/Jakarta");
		$tgl=date('Y-m-d'); 
		$hari=date('d'); 
		$year=date('Y');
		$tgl=explode('-',$tgl);
		$sql=mysqli_query($conn, "SELECT * FROM peramalan GROUP BY MONTH(bulan),YEAR(bulan)");
		$row=mysqli_num_rows($sql);
		$bln=date('m'); ;
		$sql=mysqli_query($conn,"SELECT SUM(qty) as jumlah FROM penjualan where YEAR(tgl_trans)='$year' GROUP BY MONTH(tgl_trans)");
			while($row=mysqli_fetch_array($sql)){
			array_push($array,$row['jumlah']);
			}
		for($i=0;$i<12;$i++){
						if(isset($array[$i])){

						}else{
							array_push($array,'0');
						}
					}
		$sql=mysqli_query($conn,"SELECT SUM(penjualan) as penjualan FROM peramalan GROUP BY YEAR(bulan),MONTH(bulan)");
					while($row=mysqli_fetch_array($sql)){
					array_push($ramal,$row['penjualan']);
					}

					for($i=0;$i<12;$i++){
						if(isset($ramal[$i])){

						}else{
							array_push($ramal,'0');
						}
					}
	$databulan=array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
						'November', 'Desember');
	$monthName=$databulan[$bln-1];
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

	<div class="panel panel-flat">
									<div class="panel-heading">
										<h6 class="panel-title">Detail Barang</h6>
										<div class="heading-elements">
											
										</div>
									</div>

									<div class="table-responsive">
										
									</div>

									<div class="table-responsive">
										<table class="table text-nowrap">
											<thead>
												<tr>
													<th>Produk</th>
													<th class="col-md-2">Stok</th>
													<th class="col-md-2">Peramalan Penjualan</th>
													<th class="col-md-2">Telah Terjual</th>
													<th class="col-md-2">Kekurangan Produk</th>
													<th class="col-md-2">Total Waktu Produksi</th>
													<th class="text-center" style="width: 20px;">
														<i class="icon-arrow-down12"></i>
													</th>
												</tr>
											</thead>
											<tbody>
												<tr class="active border-double">
											
												</tr>
												<?php 
												$sql=mysqli_query($conn,"SELECT * from karyawan");
												$r=mysqli_fetch_array($sql);
												$kary=$r['jml_kary'];

												$tothari1=0;
												$sql=mysqli_query($conn,"SELECT * FROM produk JOIN peramalan ON produk.id_produk = peramalan.id_produk WHERE YEAR(bulan)='$year' and MONTH(bulan)='$bln'");
												while($row=mysqli_fetch_array($sql)){
													$s=mysqli_query($conn, "SELECT * FROM penjualan where id_produk='$row[id_produk]' and YEAR(tgl_trans)='$year' and MONTH(tgl_trans)='$bln'");
													$d=mysqli_fetch_array($s);
													$jual=$d['qty']; 
													if(($row['stok']-($row['penjualan']-$jual))<=0){
														$kurang=($row['penjualan']-$jual)-$row['stok'];
														$waktu=$row['waktu_produksi'];
														$tothari=ceil(($waktu*$kurang)/$kary);
													}else{
														$tothari=0;
														$kurang=0;
													}
													$tothari1=$tothari1+$tothari;
												?>
												<tr>
													<td>
														<div class="media-left media-middle">
															<a href="#">
																<img src="img/produk/<?php echo $row['img'] ?>" class="img-circle img-xs" alt="">
															</a>
														</div>
														<div class="media-left">
															<div class="">
																<a href="#" class="text-default text-semibold"><?php echo $row['nama_produk'] ?></a>
															</div>
															<div class="text-muted text-size-small">
																<span class="status-mark border-blue position-left"></span>
																<?php echo $row['keterangan'] ?>
															</div>
														</div>
													</td>
													<td>
														<span class="text-muted"><?php echo $row['stok'] ?></span>
													</td>
													<td>
														<span class="text-success-600">
															<?php echo $row['penjualan'] ?></span>
													</td>
													<td>
															<?php echo $jual ?>
													</td>
													<td>
														<h6 class="text-semibold"><?php echo $kurang ?></h6>
													</td>
													<td>
														<span class=""><?php echo $tothari ?> Hari</span>
													</td>
													<td class="text-center">
														
													</td>
												</tr>
												<?php }?>
												


											</tbody>
										</table>
									</div>
								</div>

								<!-- Warning modal -->
					
					<!-- /warning modal -->
	<script>
		var grid_lines = c3.generate({
			bindto: '#c3-grid-lines',
			size: { height: 400 },
			color: {
				pattern: ['#2196F3','#FF9800']
				
			},
			data: {

				columns: [
					
					['Penjualan', <?php echo $array[0] ?> ,<?php echo $array[1] ?>, <?php echo $array[2] ?>, <?php echo $array[3] ?>
					, <?php echo $array[4] ?>, <?php echo $array[5] ?>, <?php echo $array[6] ?>, <?php echo $array[7] ?>
					, <?php echo $array[8] ?>, <?php echo $array[9] ?>, <?php echo $array[10] ?>, <?php echo $array[11] ?>],
					['Peramalan Penjualan', <?php echo $ramal[0] ?> ,<?php echo $ramal[1] ?>, <?php echo $ramal[2] ?>, <?php echo $ramal[3] ?>
					, <?php echo $ramal[4] ?>, <?php echo $ramal[5] ?>, <?php echo $ramal[6] ?>, <?php echo $ramal[7] ?>
					, <?php echo $ramal[8] ?>, <?php echo $ramal[9] ?>, <?php echo $ramal[10] ?>, <?php echo $ramal[11] ?>]
				]
			},
			axis: {
				x: {
					type: 'category',
					categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
						'November', 'December']
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
	<?php 
	
	if($hari=='1' or $hari=='01'){
	include 'proses/exponentialsmoothing.php'; 
	}

	?>