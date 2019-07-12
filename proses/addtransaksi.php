<?php
include 'koneksi.php';
include 'function.php';

$split=explode("/",$_POST['tgl']);
    
$tgl=$split[2].'-'.$split[0].'-'.$split[1];
$sql=mysqli_query($conn,"INSERT into penjualan values('','$tgl','$_POST[produk]','$_POST[qty]','$_POST[customer]'
,'$_POST[ket]')");
if($sql){
     notif('success','Data Transaksi Berhasil Ditambahkan'); 
     header("location: ../index.php?p=datapenjualan");
}else{
    notif('error','Data Transaksi gagal Ditambahkan'); 
     header("location: ../index.php?p=adddatapenjualan");
}
?>