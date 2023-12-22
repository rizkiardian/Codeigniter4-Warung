<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: #219150;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td.total {
            font-weight: bold;
        }
        button {
            background-color: #219150;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1c7e41;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi</h1>
    <table>
        <tr>
            <th>ID Transaksi</th>
            <th>Nama User</th>
            <th>Waktu</th>
            <th>Tanggal</th>
            <th>Total Bayar</th>
        </tr>
        <?php 
            $totalBayar = 0;
            foreach ($TabelTransaksi as $row) : 
                $totalBayar += $row['total_bayar'];
        ?>
            <tr>
                <td><?= $row['id_transaksi']; ?></td>
                <td><?= $row['nama_user']; ?></td>
                <td><?= date('H:i:s', strtotime($row['tanggal_transaksi'])); ?></td>
                <td><?= date('d-m-Y', strtotime($row['tanggal_transaksi'])); ?></td>
                <td>Rp <?= number_format($row['total_bayar'], 2, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" class="total">Total Keseluruhan</td>
            <td class="total">Rp <?= number_format($totalBayar, 2, ',', '.'); ?></td>
        </tr>
    </table>

    <button onclick="window.print()">Cetak</button>

    <script>
        // Jalankan fungsi window.print() untuk mencetak halaman
        window.print();
    </script>
</body>
</html>
