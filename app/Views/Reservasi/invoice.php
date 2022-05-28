<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
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
            padding-bottom: 40px;
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

        /* RTL */
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                HOTELSCADA                            </td>

                            <td>
                                ID Reservasi: <?= [0][0]['id_reservasi'] ?><br />
                                Check-in: <?= $reservasi[0]['cek-in'] ?><br />
                                Check-out: <?= $reservasi[0]['cek-out'] ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="text-align: center;">
                                <?= $reservasi[0]['nama_tamu'] ?><br />
                                <?= $reservasi[0]['email_pemesan'] ?><br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Tipe Kamar</td>

                <td><?= $reservasi[0]['tipe_kamar'] ?></td>
            </tr>

            <tr class="details">
                <td>Harga</td>

                <td>Rp. <?= $reservasi[0]['harga_kamar'] ?>/Kamar</td>
            </tr>

            <tr class="heading">
                <td></td>

                <td>Price</td>
            </tr>

            <tr class="item">
                <td>Jumlah Kamar</td>

                <td><?= $reservasi[0]['jumlah_kamar'] ?> Kamar</td>
            </tr>

        
            <tr class="total">
                <td></td>

                <td>Total: Rp. <?= $reservasi[0]['total'] ?> </td>
            </tr>
        </table>
        <a href="<?= session('kembali') ?? '/' ?>" class="no-print">Kembali</a>
        <?php /*<a href="#" onclick="copyClipboard()">Salin Alamat Invoice</a> */ ?>
    </div>
    <?php /*
    <input type="hidden" value="<?= current_url() ?>" id="input">
    <script>
        function copyClipboard() {
            var sampleText = document.getElementById("input"); // getting the text field
            sampleText.select(); // selecting the text field
            sampleText.setSelectionRange(0, 99999)
            document.execCommand("copy"); // Copying text inside text field
            alert("Alamat invoice berhasil disalin"); // alerting the copied text
        }
    </script>
    */ ?>
</body>

</html>