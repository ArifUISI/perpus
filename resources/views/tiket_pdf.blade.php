<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Perpustakaan &mdash; SMPN 59 SURABAYA</title>

    <!-- Favicon -->
    <link rel="icon" href="https://res.cloudinary.com/aripinnet/image/upload/v1635225220/favicon_qozmfr.png"
        type="image/x-icon" />

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 13px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 0px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

    </style>
</head>

<body>
    @foreach( $data as $d )
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://res.cloudinary.com/aripinnet/image/upload/v1635224792/logo_qhyubh.png"
                                    alt="Company logo" style="width: 100%; max-width: 125px" />
                            </td>

                            <td>
                                SMPN 59 SURABAYA<br />
                                Jl. Klumprik Pdam, Balas Klumprik, <br />
                                Kec. Wiyung, Kota SBY, Jawa Timur 60222
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Nama : {{ $d->nama }}<br />
                                NISN : {{ $d->nisn }} <br />
                                No Telfon : {{ $d->seluler }}
                            </td>

                            
                            <td>
                                ID Peminjaman : {{ $d->id }}<br />
                                Tanggal Peminjaman : {{ date('d-m-Y', strtotime($d->tgl_pinjam)) }}<br />
                                Tanggal Kembali : {{ date('d-m-Y', strtotime($d->tgl_kembali)) }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Buku</td>

                <td> </td>
            </tr>

            <tr class="details">
                <td>{{ $d->judul }}</td>

                <td> </td>
            </tr>

            <tr class="heading">
                <td>Tanda Terima</td>

                <td>Tanda Terima</td>
            </tr>
            <tr class="item last">
                <td>
					<br><br><br><br><br>
					( {{ $d->nama }} )
				</td>

                <td>
					<br><br><br><br><br>
					( Penjaga Perpustakaan )
				</td>
            </tr>
            <tr class="item last">
                <td>
					*Note : Di tanda tangani apabila buku di terima
				</td>

                <td>
					*Note : Di tanda tangani apabila buku di kembalikan
				</td>
            </tr>

        </table>
    </div>
    @endforeach
</body>

</html>
