<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Gratifikasi</title>
    @include('template_fe.head')
    <style>
        @media print {
            body {
                background-color: white;
            }

            .print-container {
                width: 100%;
                padding: 5px;
                margin: 0;
                background-color: #ececec;
            }

            .no-print {
                display: none;
            }

            /*h1, h2, h3 {
                page-break-before: always;
            }*/

            .content {
                margin-top: 0px;
            }

            .print-container {
                page-break-before: always;
            }

            img {
                height: 60px
            }

            h2 {
                margin-bottom: 0px;
            }

            .text-xl {
                font-size: 30pt;
            }

            .text-lg {
                font-size: 20pt;
                letter-spacing: 0px
            }

            .text-md {
                font-size: 12pt;
                letter-spacing: -0.1px;
                line-height: 1.4;
            }

            .text-sm {
                font-size: 8pt;
                letter-spacing: 0px
            }

            .checkbox {
                display: block;
                position: relative;
                padding-left: 35px;
                margin-top: 0px;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            
            /* hide the browser's default checkbox */
            .checkbox input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }
            
            /* create custom checkbox */
            .check {
                position: absolute;
                top: 0;
                left: 0;
                height: 20px;
                width: 20px;
                background-color: #eee;
                border: 2px solid rgb(45, 46, 46);
            }
            
            /* add background color when the checkbox is checked */
            .checkbox input:checked ~ .check {
                background-color:rgb(45, 46, 46);
                border:none;
            }
            
            /* create the checkmark and hide when not checked */
            .check:after {
                content: "";
                position: absolute;
                display: none;
            }
            
            /* show the checkmark when checked */
            .checkbox input:checked ~ .check:after {
                display: block;
            }
            
            /* checkmark style */
            .checkbox .check:after {
                left: 8px;
                top: 5px;
                width: 5px;
                height: 10px;
                border: solid white;
                border-width: 0 3px 3px 0;
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
            }

            input[type="text"] {
                background: transparent;
                border: none;
                color:rgb(31, 31, 31);
            }

            td {
                vertical-align: top;
            }
        }
    </style>
</head>

<body class="bg-gray-100" onload="window.print()">

    <div class="print-container" style="border-top:2px #b4cbe2 solid; border-bottom:2px #b4cbe2 solid; ">
        <table style="color:rgb(31, 31, 31)">
            <tr>
                <th style="width: 130px">
                    <img src="{{asset('uploads/pelaporan_gratifikasi/logo-gratifikasi.png')}}" alt="Logo 1" class="w-10 h-10">
                    <img src="{{asset('uploads/pelaporan_gratifikasi/logo-pemprov.png')}}" alt="Logo 2" class="w-10 h-10">
                </th>
                <th class="text-md font-semibold" style="width: 380px">
                    UNIT PENGENDALIAN GRATIFIKASI</br>
                    PEMERINTAH PROVINSI JAWA TIMUR
                </th>
                <th class="text-xl font-semibold" style="text-align: right; width: 600px">
                    LAPORAN GRATIFIKASI
                </th>
            </tr>
        </table>

        <div class="content" style="background-color: #d6e0e9; border-radius: 10px; padding: 10px;">
            <h2 class="text-md font-semibold">PENGERTIAN GRATIFIKASI</h2>
            <ul type="disc" style="padding-left: 20px; line-height: 1.2; text-align: justify">
                <li class="text-md">
                    <strong>Pasal 12B ayat (1) UU Nomor 20 Tahun 2001</strong> : “Setiap gratifikasi kepada pegawai negeri atau penyelenggara negara dianggap pemberian suap, apabila berhubungan dengan jabatan dan yang berlawanan dengan kewajiban atau tugasnya”.
                </li>
                <li class="text-md">
                    <strong>Penjelasan Pasal 12B ayat (1) UU Nomor 20 Tahun 2001</strong> : Gratifikasi adalah pemberian dalam arti luas, yakni meliputi pemberian uang, barang, rabat (discount), komisi, pinjaman tanpa bunga, tiket perjalanan, fasilitas penginapan, ciuman dan fasilitas lainnya. Gratifikasi tersebut baik yang diterima di dalam negeri maupun di luar negeri dan yang dilakukan dengan cara langsung maupun secara elektronik.
                </li>
            </ul>

            </br>

            <h2 class="text-md font-semibold">TATA CATA PELAPORAN</h2>
            <ul type="disc" style="padding-left: 20px; line-height: 1.2; text-align: justify">
                <li>Pegawai Negeri Wajib melaporkan penerimaan Gratifikasi atas pemberian yang berhubungan dengan jabatan dan berlangsung dengan kewajiban atau tugasnya.</li>
                <li>Pelaporan Gratifikasi dilakukan dengan cara: 
                    <ul type="disc" style="padding-left: 20px; line-height: 1.2; text-align: left">
                        <li>Disampaikan kepada UPG Pembantu dalam waktu paling lama 7 hari kerja sejak Gratifikasi diterima/ditolak;</li>
                        <li>Disampaikan kepada UPG dalam jangka waktu paling lama 10 hari kerja sejak Gratifikasi diterima/ditolak;</li>
                        <li>Disampaikan kepada KPK paling lambat 30 hari kerja sejak Gratifikasi diterima/ditolak;</li>
                    </ul>
                </li>
                <li>UPG Pembantu wajib meneruskan laporan Gratifikasi kepada UPG dalam waktu paling lama 7 (tujuh) hari kerja sejak tanggal laporan Gratifikasi diterima.</li>
                <li>UPG wajib meneruskan laporan Gratifikasi kepada KPK dalam waktu paling lama 10 (sepuluh) hari kerja sejak tanggal laporan Gratifikasi diterima.</li>
            </ul>
        </div>

        </br>

        <table style="width: 100%; color:rgb(31, 31, 31)">
            <tr><td class="text-sm" style="text-align: right;">Wajib diisi (Pilih salah satu)</td></tr>
            <tr><td style="height: 8px; background-color: #b4cbe2; border-radius: 10px;"></td></tr>
        </table>

        <table style="color:rgb(31, 31, 31); margin-top: 10px">
            <tr>
                <td class="text-md" style="text-align: left; width: 380px">Kerahasiaan Laporan</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 400px">
                    <label class="checkbox text-md">Pribadi / Rahasia
                        <input type="checkbox" id="pgd_pelapor_rahasia" name="pgd_pelapor_rahasia">
                        <span class="check"></span>
                    </label>
                </td>
                <td class="text-md" style="text-align: left; width: 400px">
                    <label class="checkbox text-md">Tidak Dirahasiakan
                        <input type="checkbox" id="pgd_pelapor_rahasia" name="pgd_pelapor_rahasia" checked>
                        <span class="check"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 380px">Jenis Laporan</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 400px">
                    <label class="checkbox text-md">Laporan Penerimaan
                        <input type="checkbox" id="pgd_jenis_laporan" name="pgd_jenis_laporan" checked=>
                        <span class="check"></span>
                    </label>
                </td>
                <td class="text-md" style="text-align: left; width: 400px">
                    <label class="checkbox text-md">Laporan Penolakan
                        <input type="checkbox" id="pgd_jenis_laporan" name="pgd_jenis_laporan" >
                        <span class="check"></span>
                    </label>
                </td>
            </tr>
        </table>

        </br>

        <table style="width: 100%; color:rgb(31, 31, 31)">
            <tr>
                <th class="text-md" rowspan="2" style="text-align: left; height: 40px; width: 600px; background-color: #b4cbe2; border-radius: 20px 20px 0px 20px; padding-left: 10px">
                    A. IDENTITAS PELAPOR
                </th>
                <td class="text-sm" style="text-align: right; vertical-align: bottom">Seluruhnya wajib diisi</td>
            </tr>
            <tr><td style="height: 8px; background-color: #b4cbe2; border-radius: 0px 10px 10px 0px;"></td></tr>
        </table>

        <table cellpadding="5" style="color:rgb(31, 31, 31); margin-top: 10px; vertical-align: text-top;">
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Nama Lengkap</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pelapor_nama }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Nomor Induk Kependudukan</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pelapor_nik }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Tempat Lahir</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pelapor_tempat_lahir }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Tanggal Lahir</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    <p id="pgd_pelapor_tanggal_lahir" style="margin-bottom: 0px"></p>
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Nama Instansi/Perangkat Daerah</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pelapor_instansi }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Jabatan/Pangkat/Golongan</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pelapor_jabatan }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Alamat</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pelapor_alamat_rumah }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Nomor HP</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pelapor_telepon }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Alamat Email</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pelapor_email }}
                </td>
            </tr>
        </table>

        </br>

        <table style="width: 100%; color:rgb(31, 31, 31)">
            <tr>
                <th class="text-md" rowspan="2" style="text-align: left; height: 40px; width: 600px; background-color: #b4cbe2; border-radius: 20px 20px 0px 20px; padding-left: 10px">
                    B. DATA PEMBERI GRATIFIKASI
                </th>
                <td class="text-sm" style="text-align: right; vertical-align: bottom">Seluruhnya wajib diisi &emsp; &emsp; &emsp; *)Pilih salah satu</td>
            </tr>
            <tr><td style="height: 8px; background-color: #b4cbe2; border-radius: 0px 10px 10px 0px;"></td></tr>
        </table>

        <table cellpadding="5" style="color:rgb(31, 31, 31); margin-top: 10px; vertical-align: text-top;">
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Nama Lengkap Pemberi</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pemberi_nama }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Instansi Pemberi</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pemberi_instansi }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Alamat Lengkap Pemberi</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_pemberi_alamat }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Hubungan Gratifikasi*</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $flag = false }}
                    @foreach ($items_data_hubungan as $item_data_hubungan)
                        <label class="checkbox text-md">{{ $item_data_hubungan->pgl_nilai }}
                            <input type="checkbox" id="pgd_pemberi_hubungan_{{ $item_data_hubungan->id }}" name="pgd_pemberi_hubungan" 
                                   {{ ($item_data_hubungan->pgl_nilai === $items->pgd_pemberi_hubungan) ? "checked" : "" }}>
                            <span class="check"></span>
                        </label>

                        @php
                            if ($item_data_hubungan->pgl_nilai === $items->pgd_pemberi_hubungan) {
                                $flag = true;
                            }
                        @endphp
                    @endforeach
                    <label class="checkbox text-md">Lainnya, sebutkan
                        <input type="checkbox" id="pgd_pemberi_hubungan_lainnya" name="pgd_pemberi_hubungan" 
                                {{ ($flag === true) ? "" : "checked" }}>
                        <span class="check"></span>
                    </label>
                    {{ ($flag === true) ? "" : $items->pgd_pemberi_hubungan }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Alasan Pemberian</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_alasan }} </br> {{ $items->pgd_alasan }}
                </td>
            </tr>
            <tr height="20px"></tr>
        </table>
    </div>

    <div class="print-container" style="border-top:2px #b4cbe2 solid; border-bottom:2px #b4cbe2 solid; ">
        <table style="width: 100%; color:rgb(31, 31, 31); margin-top: 10px;">
            <tr>
                <th class="text-md" rowspan="2" style="text-align: left; height: 40px; width: 600px; background-color: #b4cbe2; border-radius: 20px 20px 0px 20px; padding-left: 10px">
                    C. DATA PENERIMAAN GRATIFIKASI
                </th>
                <td class="text-sm" style="text-align: right; vertical-align: bottom">Seluruhnya wajib diisi &emsp; &emsp; &emsp; *)Pilih salah satu</td>
            </tr>
            <tr><td style="height: 8px; background-color: #b4cbe2; border-radius: 0px 10px 10px 0px;"></td></tr>
        </table>

        <table cellpadding="5" style="color:rgb(31, 31, 31); margin-top: 10px; vertical-align: text-top;">
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Peristiwa Terkait Gratifikasi*</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $flag = false }}
                    @foreach ($items_data_peristiwa as $item_data_peristiwa)
                        <label class="checkbox text-md">{{ $item_data_peristiwa->pgl_nilai }}
                            <input type="checkbox" id="pgd_peristiwa_{{ $item_data_peristiwa->id }}" name="pgd_peristiwa" 
                                   {{ ($item_data_peristiwa->pgl_nilai === $items->pgd_peristiwa) ? "checked" : "" }}>
                            <span class="check"></span>
                        </label>

                        @php
                            if ($item_data_peristiwa->pgl_nilai === $items->pgd_peristiwa) {
                                $flag = true;
                            }
                        @endphp
                    @endforeach
                    <label class="checkbox text-md">Lainnya, sebutkan
                        <input type="checkbox" id="pgd_peristiwa_lainnya" name="pgd_peristiwa" 
                                {{ ($flag === true) ? "" : "checked" }}>
                        <span class="check"></span>
                    </label>
                    {{ ($flag === true) ? "" : $items->pgd_peristiwa }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Lokasi Objek Gratifikasi*</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $flag = false }}
                    @foreach ($items_data_lokasi_objek as $item_data_lokasi_objek)
                        <label class="checkbox text-md">{{ $item_data_lokasi_objek->pgl_nilai }}
                            <input type="checkbox" id="pgd_lokasi_objek_{{ $item_data_lokasi_objek->id }}" name="pgd_lokasi_objek" 
                                   {{ ($item_data_lokasi_objek->pgl_nilai === $items->pgd_lokasi_objek) ? "checked" : "" }}>
                            <span class="check"></span>
                        </label>

                        @php
                            if ($item_data_lokasi_objek->pgl_nilai === $items->pgd_lokasi_objek) {
                                $flag = true;
                            }
                        @endphp
                    @endforeach
                    <label class="checkbox text-md">Lainnya, sebutkan
                        <input type="checkbox" id="pgd_lokasi_objek_lainnya" name="pgd_lokasi_objek" 
                                {{ ($flag === true) ? "" : "checked" }}>
                        <span class="check"></span>
                    </label>
                    {{ ($flag === true) ? "" : $items->pgd_lokasi_objek }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Jenis Objek Gratifikasi*</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $flag = false }}
                    @foreach ($items_data_jenis_objek as $item_data_jenis_objek)
                        <label class="checkbox text-md">{{ $item_data_jenis_objek->pgl_nilai }}
                            <input type="checkbox" id="pgd_jenis_objek_{{ $item_data_jenis_objek->id }}" name="pgd_jenis_objek" 
                                   {{ ($item_data_jenis_objek->pgl_nilai === $items->pgd_jenis_objek) ? "checked" : "" }}>
                            <span class="check"></span>
                        </label>

                        @php
                            if ($item_data_jenis_objek->pgl_nilai === $items->pgd_jenis_objek) {
                                $flag = true;
                            }
                        @endphp
                    @endforeach
                    <label class="checkbox text-md">Barang/Uang/Alat tukar lainnya, sebutkan
                        <input type="checkbox" id="pgd_jenis_objek_lainnya" name="pgd_jenis_objek" 
                                {{ ($flag === true) ? "" : "checked" }}>
                        <span class="check"></span>
                    </label>
                    {{ ($flag === true) ? "" : $items->pgd_jenis_objek }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Uraian Objek Gratifikasi*</br><p class="text-sm">(deskripsi detail objek Gratifikasi seperti jenis, bentuk, merek, tahun pembuatan, warna, dll)</p></td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_uraian }}
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Nilai Nominal/Taksiran</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ 'Rp. '.number_format($items->pgd_nominal, 0, ',', '.').',00' }}
                </td>
            </tr>
        </table>

        </br>

        <table style="width: 100%; color:rgb(31, 31, 31); margin-top: 10px;">
            <tr>
                <th class="text-md" rowspan="2" style="text-align: left; height: 40px; width: 600px; background-color: #b4cbe2; border-radius: 20px 20px 0px 20px; padding-left: 10px">
                    D. KRONOLOGI PENERIMAAN GRATIFIKASI
                </th>
                <td class="text-sm" style="text-align: right; vertical-align: bottom">Seluruhnya wajib diisi</td>
            </tr>
            <tr><td style="height: 8px; background-color: #b4cbe2; border-radius: 0px 10px 10px 0px;"></td></tr>
        </table>

        <table cellpadding="5" style="color:rgb(31, 31, 31); margin-top: 10px; vertical-align: text-top;">
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Tanggal Penerimaan Gratifikasi</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    <p id="pgd_tanggal" style="margin-bottom: 0px"></p>
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Tanggal Pelaporan Gratifikasi</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    <p id="pgd_tanggal_lapor_upgp" style="margin-bottom: 0px"></p>
                </td>
            </tr>
            <tr style="padding: 0px;">
                <td class="text-md" style="text-align: left; width: 30px"></td>
                <td class="text-md" style="text-align: left; width: 300px"><p class="text-sm">(jika laporan dilaporkan melalui UPG Pembantu, namun tidak ada tindak lanjut)</p></td>
                <td class="text-md" style="text-align: left; width: 20px"></td>
                <td style="text-align: left; width: 800px;">
                </td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" style="text-align: left; width: 300px">Tempat Penerimaan Gratifikasi</td>
                <td class="text-md" style="text-align: left; width: 20px">:</td>
                <td class="text-md" style="text-align: left; width: 800px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">
                    {{ $items->pgd_tempat }}
                </td>
            </tr>
            <tr height="20px"></tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px">&#9679</td>
                <td class="text-md" colspan="3" style="text-align: left; width: 300px">Uraian tentang proses terjadinya penerimaan Gratifikasi (kapan, dimana, dengan siapa, bagaimana, dan dalam rangka apa)</td>
            </tr>
            <tr>
                <td class="text-md" style="text-align: left; width: 30px"></td>
                <td class="text-md" colspan="3" style="text-align: justify; width: 300px; border-bottom:1px rgba(95, 95, 95, 0.64) dotted;">{{ $items->pgd_kronologi }}</td>
            </tr>
        </table>

        </br>

        <table style="width: 100%; color:rgb(31, 31, 31); margin-top: 10px;">
            <tr>
                <th class="text-md" rowspan="2" style="text-align: left; height: 40px; width: 600px; background-color: #b4cbe2; border-radius: 20px 20px 0px 20px; padding-left: 10px">
                    E. Permohonan Kompensasi Objek Gratifikasi
                </th>
                <td class="text-sm" style="text-align: right; vertical-align: bottom">*)Pilih salah satu</td>
            </tr>
            <tr><td style="height: 8px; background-color: #b4cbe2; border-radius: 0px 10px 10px 0px;"></td></tr>
        </table>

        <table cellpadding="5" style="color:rgb(31, 31, 31); margin-top: 10px; vertical-align: text-top;">
            <tr>
                <td class="text-md" style="text-align: justify; width: 2000px;">Pelapor Gratifikasi bersedia untuk menyerahkan uang sebagai kompensasi atas barang yang diterimanya sebesar nilai yang tercantum dalam Surat Keputusan Pimpinan KPK. Permintaan kompensasi yang telah mendapatkan persetujuan KPK tidak dapat dibatalkan sepihak oleh pelapor.</td>
                <td class="text-md" style="text-align: left; width: 40px"></td>
                <td class="text-md" style="text-align: left; width: 200px">
                    <label class="checkbox text-md">Ya
                        <input type="checkbox" id="pgd_kompensasi_ya" name="pgd_kompensasi" 
                                {{ ($items->pgd_kompensasi === 'Y') ? "checked" : "" }}>
                        <span class="check"></span>
                    </label>
                    <label class="checkbox text-md">Tidak
                        <input type="checkbox" id="pgd_kompensasi_tidak" name="pgd_kompensasi" 
                                {{ ($items->pgd_kompensasi === 'T') ? "checked" : "" }}>
                        <span class="check"></span>
                    </label>
                </td>
            </tr>
            <tr height="5px"></tr>
            <tr>
                <th class="text-md" colspan="3" style="width: 2000px; text-align: justify">
                    Laporan Gratifikasi ini saya sampaikan dengan sebenar-benarnya. Saya bersedia menyerahkan objek Gratifikasi kepada KPK
                    untuk proses analisa lebih lanjut atau status kepemilikan Gratifikasi telah ditetapkan menjadi milik Negara. Apabila ada yang
                    sengaja tidak saya laporkan atau saya laporkan kepada UPG Pembantu/UPG/KPK secara tidak benar, maka saya bersedia
                    mempertanggungjawabkannya secara hukum sesuai dengan peraturan perundang-undangan yang berlaku dan bersedia
                    memberikan keterangan lebih lanjut.
                </th>
            </tr>
            <tr>
                <td class="text-md" colspan="3" style="text-align: right; width: 2000px;">
                    <p id="pgd_tanggal_lapor" style="margin-bottom: 0px"></p>
                </td>
            </tr>
            <tr height="20px"></tr>
        </table>
    </div>

    <!--<div class="no-print text-center mt-6">
        <button onclick="window.print()" class="p-2 bg-blue-600 text-white rounded-md">Print</button>
    </div>-->

    <script>
        bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        tanggal = {!! $items !!};

        split_tanggal = tanggal.pgd_pelapor_tanggal_lahir.split("-");
        document.getElementById('pgd_pelapor_tanggal_lahir').innerHTML = split_tanggal[2]+' '+bulan[parseInt(split_tanggal[1]-1)]+' '+split_tanggal[0];

        split_tanggal = tanggal.pgd_tanggal.split("-");
        document.getElementById('pgd_tanggal').innerHTML = split_tanggal[2]+' '+bulan[parseInt(split_tanggal[1]-1)]+' '+split_tanggal[0];

        split_tanggal = tanggal.pgd_tanggal_lapor_upgp.split("-");
        document.getElementById('pgd_tanggal_lapor_upgp').innerHTML = split_tanggal[2]+' '+bulan[parseInt(split_tanggal[1]-1)]+' '+split_tanggal[0];

        split_tanggal = tanggal.pgd_tanggal_lapor.split("-");
        document.getElementById('pgd_tanggal_lapor').innerHTML = split_tanggal[2]+' '+bulan[parseInt(split_tanggal[1]-1)]+' '+split_tanggal[0];
    </script>
    
</body>

</html>