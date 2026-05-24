<!DOCTYPE html>
<html>
<head>

    <title>Laporan Barang</title>

    <style>

        body{
            font-family: sans-serif;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 10px;
            text-align: left;
        }

        h2{
            text-align: center;
        }

    </style>

</head>

<body>

    <h2>
        Laporan Data Barang Inventory Kantor
    </h2>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Ruangan</th>
                <th>Stok</th>
                <th>Kondisi</th>

            </tr>

        </thead>

        <tbody>

            @foreach($barangs as $barang)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $barang->kode_barang }}

                </td>

                <td>

                    {{ $barang->nama_barang }}

                </td>

                <td>

                    {{ $barang->kategori }}

                </td>

                <td>

                    {{ $barang->ruangan }}

                </td>

                <td>

                    {{ $barang->stok }}

                </td>

                <td>

                    {{ $barang->kondisi }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>