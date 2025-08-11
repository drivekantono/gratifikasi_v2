<html>
<head>
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <style type="text/css" media="print">
        /* main.css */
        /* on-screen styles */
        @media screen {
            body {
                width: 100%;
                height: 100%;
                margin: 0;
                color:rgb(58, 0, 216);
                background-color:rgb(192, 189, 0);
            }
        }
        .halaman {
            margin-top: 15mm;
        }

        /* print styles */
        @media print {
            body {
                margin: 0;
                color:rgb(58, 0, 216);
                background-color:rgb(192, 189, 0);
            }
        }

        /* print.css */
        aside, nav, form, iframe, .menu, .hero, .adslot {
            display: none;
        }
        a::after {
            content: " (" attr(href) ")";
        }
        main::after {
            content: "Copyright site.com";
            display: block;
            text-align: center;
        }
        h1 {
            break-before: always;
        }
        table, img, svg {
            break-inside: avoid;
        }
        /* target all pages */
        @page {
            margin-top: 0cm;
            margin-bottom: 50px;
            counter-increment: page;

            @bottom-right {
                border-top: 1px solid rgb(221, 0, 0);
                padding-right:20px;
                font-size: 12px !important;
                content: "Hal " counter(page) " of " counter(pages);
            }
            
            @bottom-left {
                content: "";
                font-size: 12px !important;
                border-top: 1px solid rgb(253, 0, 0);
            }
        }
        /* target the first page only */
        @page :first {
            margin-top: 0cm;
        }
        /* target left (even-numbered) pages only */
        @page :left {
            margin-top: 15mm;
            margin-left: 15mm;
            margin-right: 15mm;
        }
        /* target right (odd-numbered) pages only */
        @page :right {
            margin-top: 15mm;
            margin-left: 15mm;
            margin-right: 15mm;
        }

        /* hidden on-screen */
        .print {
            display: none;
        }
        @media print {
            /* visible when printed */
            .print {
                display: block;
            }
        }
    </style>
    <style type="text/css">
        .btn {height: 30px; width: 60px; border: 1px solid rgba(83, 98, 230, 0.99); color:rgb(255, 255, 255); padding: 0px 0px 0px 0px; margin-top: 10px}
        .btn:hover {width: 80px; border: 1px solid rgba(83, 98, 230, 0.99); background-color: 1px solid rgba(8, 74, 112, 0.99); color:rgb(255, 255, 255);}
        .font1 {font-size: 20pt;}
        .font2 {font-size: 16pt; color:rgb(250, 0, 0);}
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
    @php
        function secretValue($str) {
        $temp = "";
        for ($i = 0; $i < strlen($str); $i++) {
            if ($i < 2) {
                $temp = $temp.$str[$i];
            } else if ($i >= 2 && $i < strlen($str) - 2) {
                if ($str[$i] === " ") {
                    $temp = $temp." ";
                } else {
                    $temp = $temp."*";
                }
            } else if ($i >= strlen($str) - 2 && $i < strlen($str)) {
                $temp = $temp.$str[$i];
            }
        }
        return $temp;
        }
    @endphp
    <div class="halaman">
        <p class="text-center font2 bold jarak1">FORMULIR PELAPORAN GRATIFIKASI DI LINGKUNGAN PEMERINTAH PROVINSI JAWA TIMUR</p>
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
                    <td style="width: 40px; padding: 4px 4px 4px 4px !important;">Jenis Laporan</td>
                    <td style="width: 2px; padding: 4px 4px 4px 4px !important;">:</td>
                    <td style="padding: 4px 4px 4px 4px !important;">{{ $items->pgd_jenis_laporan }}</td>
                    <td style="padding: 4px 4px 4px 4px !important;"></td>
                </tr>
                <tr>
                    <td style="width: 40px; padding: 4px 4px 4px 4px !important;">Verifikasi</td>
                    <td style="width: 2px; padding: 4px 4px 4px 4px !important;">:</td>
                    <td style="padding: 4px 4px 4px 4px !important;">{{ $items->pgd_verifikasi }}</td>
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
                    <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">3.</td>
                    <td class="withBorder">Instansi</td>
                    <td class="withBorder">:</td>
                    <td class="withBorder">{{ $items->pgd_pemberi_instansi }}</td>
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

        <h2 class="font4 bold">C. Data Penerimaan / Penolakan Gratifikasi</h2>
        <table class="table2 withBorder font4">
            <tbody>
                <tr>
                    <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Peristiwa Terkait Gratifikasi</td>
                    <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Lokasi Objek Gratifikasi</td>
                    <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Jenis Objek Gratifikasi</td>
                    <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Uraian</td>
                    <td class="withBorder text-center" style="width: 25%; padding-right: 8px; vertical-align: middle;">Nominal Uang/Taksiran Nilai</td>
                </tr>
                <tr>
                    <td class="withBorder text-left" style="padding-right: 8px; vertical-align: top;">{{ $items->pgd_peristiwa }}</td>
                    <td class="withBorder text-left" style="padding-right: 8px; vertical-align: top;">{{ $items->pgd_lokasi_objek }}</td>
                    <td class="withBorder text-left" style="padding-right: 8px; vertical-align: top;">{{ $items->pgd_jenis_objek }}</td>
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
                    <td class="withBorder" style="width: 38%;">Alasan Pemberian</td>
                    <td class="withBorder" style="width: 4%;">:</td>
                    <td class="withBorder" style="width: 55%;">{{ $items->pgd_alasan }}</td>
                </tr>
                <tr>
                    <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">2.</td>
                    <td class="withBorder">Kronologi Penerimaan</td>
                    <td class="withBorder">:</td>
                    <td class="withBorder">{{ $items->pgd_kronologi }}</td>
                </tr>
                <tr>
                    <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">3.</td>
                    <td class="withBorder">Tempat Pemberian</td>
                    <td class="withBorder">:</td>
                    <td class="withBorder">{{ $items->pgd_tempat }}</td>
                </tr>
                <tr>
                    <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">4.</td>
                    <td class="withBorder">Tanggal Pemberian</td>
                    <td class="withBorder">:</td>
                    <td class="withBorder"><p class="text-left" id="pgd_tanggal" style="margin-bottom: 0px; line-height: 1; text-indent: 0px;"></p></td>
                </tr>
                <tr>
                    <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">5.</td>
                    <td class="withBorder">Catatan Tambahan</td>
                    <td class="withBorder">:</td>
                    <td class="withBorder">{{ $items->pgd_catatan }}</td>
                </tr>
                <tr>
                    <td class="withBorder text-right" style="width: 5%; padding-right: 4px;">5.</td>
                    <td class="withBorder">Dokumen Pendukung</td>
                    <td class="withBorder">:</td>
                    <td class="withBorder"><img src="{{asset('uploads/pelaporan_gratifikasi/'.$items->pgd_lampiran)}}" alt="Dokumen Pendukung" id="pgd_lampiran"></td>
                </tr>
            </tbody>
        </table>
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

        split_tanggal = tanggal.pgd_tanggal.split("-");
        document.getElementById('pgd_tanggal').innerHTML = split_tanggal[2]+' '+bulan[parseInt(split_tanggal[1]-1)]+' '+split_tanggal[0];

        var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        var pgd_lampiran = document.getElementById('pgd_lampiran');
        var pgd_lampiran_path = pgd_lampiran.value;
        if(!ekstensiOk.exec(pgd_lampiran_path)){
            if (pgd_lampiran.height < pgd_lampiran.width) {
            pgd_lampiran.width = "340";
            } else {
                pgd_lampiran.height = "190";
            }
        }
    </script>
</body>
</html>