<html>
<head>
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <style type="text/css" media="print">
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Arial";
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .subpage {
            padding: 1cm;
            border: 0px red solid;
            height: 257mm;
            outline: 2cm rgb(255, 255, 255) solid;
        }
        
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;        
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
            .btn { 
                display: none!important;
            }
        }
    </style>
    <style type="text/css">
        .btn {height: 30px; width: 60px; border: 1px solid rgba(83, 98, 230, 0.99); color:rgb(255, 255, 255); padding: 0px 0px 0px 0px; margin-top: 10px}
        .btn:hover {width: 80px; border: 1px solid rgba(83, 98, 230, 0.99); background-color: 1px solid rgba(8, 74, 112, 0.99); color:rgb(255, 255, 255);}
        .font1 {font-size: 20pt;}
        .font2 {font-size: 16pt;}
        .font3 {font-size: 14pt;}
        .font4 {font-size: 12pt;}
        .bold {font-weight: bold;}
        .jarak1 {margin-bottom: 40px;}
        .jarak2 {margin-bottom: 30px;}
        .jarak3 {margin-bottom: 20px;}
        p {line-height:1.8;}
        .withBorder {border: 1px solid;}
        .noBorder {border: 0px solid;}
        .table1 {width: 100%; border-collapse: collapse;}
        .table2 {width: 100%; border-collapse: collapse;}
        tr, td {padding: 8px 0px 8px 10px; vertical-align: top;}
    </style>
</head>
<body onload="window.print()">
<!--<body>-->
    <div class="page">
        <div class="subpage" style="text-align: justify;">
            <!--<button class="btn btn-info center-block" onclick="cetak()">Cetak</button>
            <p class="text-center font1 bold jarak1">FORMULIR PELAPORAN GRATIFIKASI</p>
            <p class="mb-4">
            <table class="table1 noBorder font4 jarak3">
                <tbody>
                    <tr style="padding: 4px 4px !important;">
                        <td style="width: 40px; padding: 4px 4px !important;">Yth.</td>
                        <td style="padding: 4px 4px !important;">Unit Pengendali Gratifikasi</td>
                    </tr>
                    <tr style="padding: 4px 4px !important;">
                        <td style="padding: 4px 4px !important;"></td>
                        <td style="padding: 4px 4px !important;">Pemerintah Daerah Provinsi Jawa Timur</td>
                    </tr>
                    <tr style="padding: 4px 4px !important;">
                        <td style="padding: 4px 4px !important;"></td>
                        <td style="padding: 4px 4px !important;">di Tempat</td>
                    </tr>
                </tbody>
            </table>
            <p class="font4 jarak3">
                Saya yang bertanda tangan di bawah ini melaporkan dan/atau menyerahkan penerimaan Gratifikasi sebagai berikut:
            </p>
            -->

            <p class="text-center font3 bold jarak1">FORMULIR PELAPORAN GRATIFIKASI DI LINGKUNGAN PEMERINTAH PROVINSI JAWA TIMUR</p>
            <p class="mb-4">
            
            <table class="table1 noBorder font4">
                <tbody>
                    <tr>
                        <td style="width: 40px; padding: 4px 4px 4px 4px !important;">Nomor</td>
                        <td style="width: 2px; padding: 4px 4px 4px 4px !important;">:</td>
                        <td style="padding: 4px 4px 4px 4px !important;"><b>{{ $items->pgd_no }}</b> / {{ $items->pgd_sumber }}</td>
                        <td style="padding: 4px 4px 4px 4px !important;"><p class="text-right" id="pgd_tanggal_lapor" style="margin-bottom: 0px; line-height: 1;"></p></td>
                    </tr>
                    <tr>
                        <td style="width: 40px; padding: 4px 4px 4px 4px !important;">Kategori</td>
                        <td style="width: 2px; padding: 4px 4px 4px 4px !important;">:</td>
                        <td style="padding: 4px 4px 4px 4px !important;">{{ $items->pgd_kategori }}</td>
                        <td style="padding: 4px 4px 4px 4px !important;"></td>
                    </tr>
                    <tr>
                        <td style="width: 40px; padding: 4px 4px 4px 4px !important;">Verifikasi</td>
                        <td style="width: 2px; padding: 4px 4px 4px 4px !important;">:</td>
                        <td style="padding: 4px 4px 4px 4px !important;">{{ $items->pgd_verifikasi === 'Y' ? 'Termasuk Gratifikasi' : 'Bukan Gratifikasi' }}</td>
                        <td style="padding: 4px 4px 4px 4px !important;"></td>
                    </tr>
                </tbody>
            </table>

            <h2 class="font4 bold">A. Identitas Pelapor</h2>
            <table class="table2 withBorder font4">
                <tbody>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">1.</td>
                        <td class="withBorder">NIK</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pelapor_nik }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">2.</td>
                        <td class="withBorder" style="width: 38%;">Nama Lengkap</td>
                        <td class="withBorder" style="width: 4%;">:</td>
                        <td class="withBorder" style="width: 55%;">{{ $items->pgd_pelapor_nama }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">3.</td>
                        <td class="withBorder">Tempat / Tgl. Lahir</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder"><p class="text-left" id="pgd_pelapor_tanggal_lahir" style="margin-bottom: 0px; line-height: 1; text-indent: 0px;"></p></td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">4.</td>
                        <td class="withBorder">Telepon / Email</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pelapor_telepon }} / {{ $items->pgd_pelapor_email }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">5.</td>
                        <td class="withBorder">Alamat Rumah</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pelapor_alamat_rumah }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">6.</td>
                        <td class="withBorder">Jabatan/Pangkat/Golongan</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pelapor_jabatan }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">7.</td>
                        <td class="withBorder">Unit Kerja</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pelapor_unit_kerja }}</td>
                        
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">8.</td>
                        <td class="withBorder">Nama Instansi</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pelapor_instansi }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">9.</td>
                        <td class="withBorder">Alamat Kantor</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pelapor_alamat_kantor }}</td>
                    </tr>
                </tbody>
            </table>

            <h2 class="font4 bold">B. Identitas Pemberi</h2>
            <table class="table2 withBorder font4">
                <tbody>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">1.</td>
                        <td class="withBorder" style="width: 38%;">Nama Lengkap</td>
                        <td class="withBorder" style="width: 4%;">:</td>
                        <td class="withBorder" style="width: 55%;">{{ $items->pgd_pemberi_nama }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">2.</td>
                        <td class="withBorder">Telepon</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pemberi_telepon }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">3.</td>
                        <td class="withBorder">Pekerjaan</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pemberi_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">4.</td>
                        <td class="withBorder">Alamat</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pemberi_alamat }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">5.</td>
                        <td class="withBorder">Hubungan Dengan Pelapor</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pemberi_hubungan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="page">
        <div class="subpage" style="text-align: justify;">
            <h2 class="font4 bold">C. Data Penerimaan / Penolakan Gratifikasi</h2>
            <table class="table2 withBorder font4">
                <tbody>
                    <tr>
                        <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Peristiwa Terkait Gratifikasi</td>
                        <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Jenis Objek Gratifikasi</td>
                        <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Uraian</td>
                        <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Nominal Uang/Taksiran Nilai</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-left" style="padding-right: 8px; vertical-align: top;">{{ $items->pgd_peristiwa }}</td>
                        <td class="withBorder text-left" style="padding-right: 8px; vertical-align: top;">{{ $items->pgd_jenis }}</td>
                        <td class="withBorder text-left" style="padding-right: 8px; vertical-align: top;">{{ $items->pgd_uraian }}</td>
                        <td class="withBorder text-right" style="padding-right: 8px; vertical-align: top;">{{ 'Rp. '.number_format($items->pgd_nominal, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            <h2 class="font4 bold">D. Alasan dan Kronologi</h2>
            <table class="table2 withBorder font4">
                <tbody>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">1.</td>
                        <td class="withBorder" style="width: 38%;">Nama Lengkap</td>
                        <td class="withBorder" style="width: 4%;">:</td>
                        <td class="withBorder" style="width: 55%;">{{ $items->pgd_pemberi_nama }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">2.</td>
                        <td class="withBorder">Telepon</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pemberi_telepon }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">3.</td>
                        <td class="withBorder">Pekerjaan</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pemberi_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">4.</td>
                        <td class="withBorder">Alamat</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pemberi_alamat }}</td>
                    </tr>
                    <tr>
                        <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">5.</td>
                        <td class="withBorder">Hubungan Dengan Pelapor</td>
                        <td class="withBorder">:</td>
                        <td class="withBorder">{{ $items->pgd_pemberi_hubungan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function cetak() {
            window.print();
        }

        bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        tanggal = {!! $items !!};
        split_tanggal = tanggal.pgd_tanggal_lapor.split("-");
        document.getElementById('pgd_tanggal_lapor').innerHTML = split_tanggal[2]+' '+bulan[parseInt(split_tanggal[1]-1)]+' '+split_tanggal[0];

        split_tanggal = tanggal.pgd_pelapor_tanggal_lahir.split("-");
        document.getElementById('pgd_pelapor_tanggal_lahir').innerHTML = tanggal.pgd_pelapor_tempat_lahir+' / '+split_tanggal[2]+' '+bulan[parseInt(split_tanggal[1]-1)]+' '+split_tanggal[0];
        </script>
</body>
</html>