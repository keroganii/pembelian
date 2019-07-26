<html>

<head>
    <title>Export Data Excel</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Export Peramalan.xls");
    include 'koneksi.php';
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Tahun</th>
                <th>Penjualan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT data_produk.nama_Produk as nama,peramalan.bulan as tahun,peramalan.penjualan as jual FROM data_produk JOIN peramalan ON data_produk.id_produk = peramalan.id_produk ");
            $i = 1;
            while ($data = mysqli_fetch_assoc($query)) :
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tahun'] ?></td>
                    <td><?= $data['jual'] ?></td>
                </tr>
                <?php $i++;
            endwhile;
            ?>
        </tbody>
    </table>
</body>

</html>