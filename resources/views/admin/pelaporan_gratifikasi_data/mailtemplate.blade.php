<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPG Pemerintah Provinsi Jawa Timur</title>
</head>

<body>
    <section style="text-align:center; background-color: #e6e6e6; padding:5px">
        <h2>UPG Pemerintah Provinsi Jawa Timur</h2>
        <p>Penyampaian Hasil Verifikasi Pelaporan Gratifikasi</p>
    </section>

    <section style="background-color:#ffffff;padding:20px">
        <div>
            <table>
                <tbody>
                    <tr>
                        <td valign=top>Hasil Verifikasi</td>
                        <td valign=top>:</td>
                        <td valign=top style="font-weight:bold; font-style:italic">
                          {{ ($items->pgd_verifikasi === 'Y') ? 'Pemberian Termasuk Dalam Gratifikasi' : 'Pemberian Tidak Termasuk Dalam Gratifikasi' }}
                        </td>
                    </tr>
                    <tr>
                        <td valign=top>Tanggal Pemberian</td>
                        <td valign=top>:</td>
                        <td valign=top>{{ $items->pgd_tanggal }}</td>
                    </tr>
                    <tr>
                        <td valign=top>Tanggal Pelaporan</td>
                        <td valign=top>:</td>
                        <td valign=top>{{ $items->pgd_tanggal_lapor }}</td>
                    </tr>
                    <tr>
                        <td valign=top>Kategori</td>
                        <td valign=top>:</td>
                        <td valign=top>{{ $items->pgd_kategori }}</td>
                    </tr>
                    <tr>
                        <td valign=top>Nama Pelapor</td>
                        <td valign=top>:</td>
                        <td valign=top>{{ $items->pgd_pelapor_nama }}</td>
                    </tr>
                    <tr>
                        <td valign=top>Nama Pemberi</td>
                        <td valign=top>:</td>
                        <td valign=top>{{ $items->pgd_pemberi_nama }}</td>
                    </tr>
                    <tr>
                        <td valign=top>Nominal Uang / Taksiran Nilai</td>
                        <td valign=top>:</td>
                        <td valign=top>{{ 'Rp. '.number_format($items->pgd_nominal, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td valign=top>Uraian Objek Gratifikasi</td>
                        <td valign=top>:</td>
                        <td valign=top>{{ $items->pgd_uraian }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Terima kasih telah melaporkan adanya indikasi gratifikasi kepada kami</p>
        </div>
    </section>

    <section style="text-align:center; background-color: #e6e6e6; padding:5px">
        <p>©️ 2025 Unit Pengendalian Gratifikasi Pemerintah Provinsi Jawa Timur | <a href="https://inspektorat.jatimprov.go.id/" target="_blank">www.inspektorat.jatimprov.go.id</a></p>
        <p>Informasi yang termuat di pesan email ini mungkin berisi informasi yang bersifat pribadi, rahasia, dan tertutup. Jika Anda bukanlah penerima yang dituju, maka penyebaran, distribusi, atau meniru dengan keras DILARANG. Jika Anda menerima pesan ini tanpa disengaja, harap segera hubungi pengirim  dan hapus material ini seluruhnya, baik dalam bentuk elektronik maupun dokumen cetak. Terima kasih.</p>
    </section>
</body>
</html>