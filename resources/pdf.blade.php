<!DOCTYPE html>
<html>

<head>

    <title>Data Barang</title>

    <style>

        body{
            font-family: sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:10px;
            text-align:left;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

    </style>

</head>

<body>

    <h2>
        Data Barang Inventory Kantor
    </h2>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Kondisi</th>

            </tr>

        </thead>

        <tbody>

            @foreach($barang as $item)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->nama_barang }}
                </td>

                <td>
                    {{ $item->kategori }}
                </td>

                <td>
                    {{ $item->stok }}
                </td>

                <td>
                    {{ $item->kondisi }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>