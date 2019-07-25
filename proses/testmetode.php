<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<?php
include 'koneksi.php';
$a = 0.1;

$arr = array();
$sql = mysqli_query($conn, "DELETE FROM peramalan"); // menghapus data peramalan sebelumnya
$sql2 = mysqli_query($conn, "SELECT data_produk.id_produk,data_produk.nama_produk FROM data_produk"); // memanggil data produk

?>



<?php
while ($c = mysqli_fetch_array($sql2)) {
    $sql = mysqli_query($conn, "SELECT SUM(lembar) AS lembar, YEAR(tggl_transaksi) as tahun FROM data_penjualan WHERE 
    id_produk='$c[id_produk]' GROUP BY YEAR(tggl_transaksi)"); // memanggil jumlah data penjualan berdasarkan bulan dan tahun
    $arrsementara = array(); //inisialisasi array
    $periode = array();  //inisialisasi array
    while ($row = mysqli_fetch_array($sql)) {
        array_push($arrsementara, $row['lembar']); // menginput data penjualan per bulan kedalam array untuk proses perhitungan selanjutnya
        array_push($periode, $row['tahun']);
        $tahun = $row['tahun'];
    }
    array_push($periode, $tahun + 1);

    $dataramal = array('0', $arrsementara[0]); // inisialisasi peramalan bulan pertama=0 dan peramalan bulan ke dua=datapenjualan bulan pertama
    $sql = mysqli_query($conn, "INSERT into peramalan values('$c[id_produk]','$periode[0]','0')"); //insert data peramalan bulan 1 ke database
    $sql = mysqli_query($conn, "INSERT into peramalan values('$c[id_produk]','$periode[1]','$arrsementara[0]')"); //insert data peramalan tahun 2 ke database
    $error = array($arrsementara[1] - $arrsementara[0]); // menghitung nilai error perbulan
    $error2 = array(pow($error[0], 2));  // menghitung nilai error^2 perbulan
    $ramal = $arrsementara[0];
    $datatmp = array('0', $arrsementara[0]);
    $datakonstanta = array('0', $arrsementara[0]);
    $dataslope = array('0');
    $dataforecast = array('0', $arrsementara[0]);


    for ($i = 2; $i <= count($arrsementara); $i++) {
        $x1 = $arrsementara[$i - 1];  //mendapatkan nilai penjualan tahun 3 dan seterusnya
        $ramal1 = $a * $x1 + (1 - $a) * $ramal; // perhitungan nilai peramalan tahun 3 dan seterusnya berdasarkan metode
        $ramal2 = $a * $ramal1 + (1 - $a) * $ramal; //double exponential smoothing
        $konstanta = 2 * ($ramal1) - $ramal2; //perhitungan konstanta
        $slope = (($a / (1 - $a)) * ($ramal1 - $ramal2)); //perhitungan slope
        $forecast = $konstanta + $slope; //perhitungan forecast
        array_push($dataramal, $ramal2); //simpan data peramalan ke array
        array_push($datatmp, $ramal1);
        array_push($datakonstanta, $konstanta);
        array_push($dataslope, $slope);
        array_push($dataforecast, $forecast);
        $sql = mysqli_query($conn, "INSERT into peramalan values('$c[id_produk]','$periode[$i]','$ramal2')"); //insert data peramalan tahun 3 dan seterusnya ke database
        if ($i < count($arrsementara)) {
            $err = $arrsementara[$i] - $ramal2; //menghitung nilai error pertahun
            // echo $err;
            $err2 = pow($err, 2); //menghitung nilai error^2 pertahun
            array_push($error, $err); //simpan nilai error ke array
            array_push($error2, $err2); //simpan nilai error^2 ke array
        }
    }


    $jml_err = array_sum($error2); // menjumlahkan semua nilai error pertahun
    $rmse = pow(($jml_err / (count($arrsementara) - 1)), 0.5); //menghitung nilai error akhir

    ?>



    <?php
    ?>
    <h2><?php echo $c['nama_produk'] ?></h2>
    <table style="width:50%">
        <tr>
            <th class="text-center" width="100">Periode (Tahun)</th>
            <th class="text-center" width="100">Penjualan</th>
            <th class="text-center" width="100">Peramalan Single</th>
            <th class="text-center" width="100">Peramalan Double</th>
            <th class="text-center" width="100">Konstanta</th>
            <th class="text-center" width="100">Slope</th>
            <th class="text-center" width="100">Forecast</th>
            <th class="text-center" width="100">Error</th>
            <th class="text-center" width="100">|Error|</th>
            <th class="text-center" width="100">Error^2</th>
            <th class="text-center" width="100">|%Error|</th>

        </tr>
        <?php
        $jumlah = 0;
        $jumlah2 = 0;
        foreach ($dataramal as $key => $value) {
            echo "<tr>";
            echo "<td>" . ($periode[$key]) . "</td>"; //data 1
            if ($key >= count($arrsementara)) {
                echo "<td>-</td>"; //data 2
            } else {
                echo "<td>" . $arrsementara[$key] . "</td>"; //data 2
            }
            echo "<td>" . $datatmp[$key] . "</td>"; //data 3
            echo "<td>" . $value . "</td>"; //data 4
            if ($key == 0) {
                echo "<td>-</td>"; //data 5
                echo "<td>-</td>"; //data 6
                echo "<td>-</td>"; //data 7
                echo "<td>-</td>"; //data 8
                echo "<td>-</td>"; //data 9
                echo "<td>-</td>"; //data 10
                echo "<td>-</td>"; //data 11
            } elseif ($key > count($error)) {
                echo "<td>-</td>"; //data 5
                echo "<td>-</td>"; //data 6
                echo "<td>-</td>"; //data 7
                echo "<td>-</td>"; //data 8
                echo "<td>-</td>"; //data 9
                echo "<td>-</td>"; //data 10
                echo "<td>-</td>"; //data 11
            } else {
                echo "<td>" . $datakonstanta[$key] . "</td>"; //data 5
                echo "<td>" . $dataslope[$key - 1] . "</td>"; //data 5
                echo "<td>" . $dataforecast[$key] . "</td>"; //data 6
                echo "<td>" . $error[$key - 1] . "</td>"; //data 7
                echo "<td>" . abs($error[$key - 1]) . "</td>"; //data 8
                echo "<td>" . $error2[$key - 1] . "</td>"; //data 9
                $d = (abs($error[$key - 1]) / $arrsementara[$key]) * 100; //data 10 
                echo "<td>" . $d . "%</td>"; //data 5
            }
            echo "</tr>";
            if (isset($error2[$key - 1])) {
                $jumlah = $jumlah + $error2[$key - 1];
                $jumlah2 = $jumlah2 + $d;
            }
        }
        echo "<tr>";
        echo "<td colspan='9'><b>Jumlah</b></td>";
        echo "<td>" . $jumlah . "</td>";
        echo "<td>" . $jumlah2 . "%</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='9'><b>Nilai Error<b></td>";
        echo "<td>" . $rmse . "</td>";
        echo "<td>" . $jumlah2 / count($error2) . "%</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='9'></td>";
        echo "<td align='center'><b>RSME</b></td>";
        echo "<td align='center'><b>MAPE</b></td>";
        echo "</tr>";

        echo "</table>";
        echo "<br><br>";
    }



    ?>