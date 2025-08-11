-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2019 pada 02.46
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scomptec_inspektorat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tanggal` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_selesai` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agendas`
--

INSERT INTO `agendas` (`id`, `title`, `deskripsi`, `tanggal`, `tanggal_selesai`, `lokasi`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Educational Philosophyy', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '12/15/2019', '12/18/2019', 'Surabayaaa', '976912016.jpg', '2019-10-19 06:55:16', '2019-11-07 01:11:04'),
(2, 'Educational Biographic', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '10/13/2019', '10/31/2019', 'Gresikk', '221385218.jpg', '2019-10-19 06:56:49', '2019-10-27 23:47:47'),
(3, 'We can’t forget', '<p>You have seen hell and made it back again<br />\r\nHow to forget? We can&rsquo;t forget<br />\r\nThe lives that were lost along the way<br />\r\nAnd then you realize that wherever you go<br />\r\nThere you are<br />\r\nTime won&rsquo;t stop</p>', '10/31/2019', '11/29/2019', 'Arabb', '306233082.jpg', '2019-10-19 19:36:52', '2019-10-27 23:47:59'),
(4, 'What did it leave behind?', '<p>What did it take from us and wash away?<br />\r\nIt may be long<br />\r\nBut with our hearts start a new<br />\r\nAnd keep it up and not give up<br />\r\nWith our heads held high</p>', '10/31/2019', '10/31/2019', 'Nganjuk', '1386702351.jpg', '2019-10-19 19:39:07', '2019-10-27 23:54:24'),
(5, 'Educational Philosophy', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.<img alt=\"\" src=\"https://www.google.com/url?sa=i&amp;rct=j&amp;q=&amp;esrc=s&amp;source=images&amp;cd=&amp;ved=2ahUKEwin1eq4lqzlAhVaWysKHdBIB8cQjRx6BAgBEAQ&amp;url=https%3A%2F%2Fwww.indiatoday.in%2Ftechnology%2Ftalking-points%2Fstory%2Fa-day-without-google-apps-the-good-the-bad-and-the-ugly-1100453-2017-12-05&amp;psig=AOvVaw3LCBKrK2VMzNPdbZwXfuUF&amp;ust=1571706854770410\" /></p>', '10/31/2019', '10/31/2019', 'SUrabaya', '556055183.jpg', '2019-10-20 18:16:04', '2019-10-20 19:29:28'),
(6, 'Educational Philosophyy', '<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/1░6359~1.JPG\" style=\"height:421px; width:300px\" /></p>\r\n\r\n<p>middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/1.jpg\" style=\"height:300px; width:300px\" /></p>', '10/25/2019', '10/31/2019', NULL, '696836037.jpg', '2019-10-21 01:37:40', '2019-10-21 01:40:04'),
(7, 'AGENDA PRIORITAS', '<p>$qryRec = &quot;SELECT r.id, r.reception_number, r.year, r.instrument_type, r.book, r.page, t1.grantor, t2.grantee FROM tblreception AS r LEFT JOIN (SELECT name_information AS grantor , reception_id FROM tblreception_information t1 WHERE code=&#39;R&#39; ORDER BY t1.id ASC) AS t1 ON r.id = t1.reception_id LEFT JOIN (SELECT name_information AS grantee , reception_id FROM tblreception_information t2 WHERE code=&#39;E&#39; ORDER BY t2.id ASC) AS t2 ON r.id = t2.reception_id WHERE 1 AND r.year = &#39;2016&#39; GROUP BY r.reception_number ORDER BY r.book&quot;;<br />\r\n$reception = DB::select($qryRec);<br />\r\nreturn Datatables::of($reception)-&gt;make(true);</p>', '10/26/2019', '10/31/2019', 'Nganjuk', '670287683.jpg', '2019-10-22 00:00:21', '2019-10-22 00:10:30'),
(10, 'We can’t forget', '<h2>the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h2>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/1.jpg\" style=\"height:100px; width:100px\" /></p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/jati.jpg\" style=\"height:75px; width:100px\" /></p>', '10/26/2019', '10/31/2019', NULL, '383918166.jpg', '2019-10-23 18:55:51', '2019-10-31 02:11:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beritas`
--

INSERT INTO `beritas` (`id`, `id_kategori`, `title`, `tag`, `deskripsi`, `images`, `created_at`, `updated_at`) VALUES
(5, 1, 'Memperingati Hari Jadi Pemprov Jatim ke 74, CDK Sumenenp wilker Pamekasan bersama segenap komponen masyarakat Kab. \r\n', 'Selamatkan Hutan Mangrove', '<p>Hutan Mangrove atau yang biasa disebut hutan bakau merupakan suatu area sabuk hijau yang melindungi daratan dari bahaya tsunami, abrasi serta infiltrasi air laut ke darat. Selain sebagai habitat bagi berbagai macam satwa dan tanaman, hutan mangrove juga mampu menyerap karbondioksida 10 kali lebih kuat daripada hutan kota. Sungguh mengherankan mengingat betapa besar manfaat mangrove dalam menyelamatkan lingkungan justru manusia banyak yang mengabaikan dan malah melakukan perusakan dengan dalih reklamasi sehingga populasi hutan mangrove semakin tahun semakin berkurang.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Untuk itu dalam rangka memperingati Hari Ulang Tahun Provinsi Jawa Timur yang ke 74 yang akan jatuh pada tanggal 12 Oktober 2019, maka Cabang dinas Kehutanan Wilayah Sumenep Wilayah Kerja Pamekasan berinisiatif melakukan suatu aksi bertajuk &ldquo;SELAMATKAN HUTAN MANGROVE&rdquo; yang di isi dengan program pembelajaran serta pengenalan hutan mangrove terhadap masyarakat yang dilanjutkan dengan penanaman&nbsp; mangrove. Aksi ini di laksanakan pada hari Minggu 06 Oktober 2019 di wilayah binaan KTH Sabuk Hijau Desa Lembung, Kec Galis Kab Pamekasan yang diikuti 155 relawan dari berbagai instansi pemerintah dan organisasi masyarakat antara lain&nbsp; SMPN 2 Pamekasan, SMK 1 Proppo, BKSDA, KPH Madura, Saka Wana Bhakti, Saka Bhakti Husada Puskesmas Teja, IAIN Pamekasan, Kelompok Peduli Mangrove Madura (KPMM), OISCA, KPA Manpala Naviri, Forum Relawan Penanggulangan Bencana (FRPB) serta Forum Wartawan Pamekasan (FWP). Target bibit yang ditanam sejumlah 1.300 yang terdiri dari 300 bibit mangrove siap tanam yang merupakan bantuan dari KTH Sabuk Hijau dan 1000 propagul bantuan dari OISCA.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Melalui kegiatan aksi ini kami ingin kembali mengajak kepada seluruh elemen masyarakat untuk mengenal dan&nbsp; lebih peduli dalam upaya penyelamatan hutan mangrove. Hal ini sebagai bentuk kepedulian kita terhadap lingkungan alam yang semakin lama semakin rusak yang disebabkan oleh semakin rendahnya kesadaran masyarakat terhadap kelestarian lingkungan,&quot; ujar A. Katri Atmodjo Kasi Rehabilitasi Lahan dan Peberdayaan Masyarakat Dinas Kehutanan Pamekasan, Ahad (06/10/19).</p>', '842755148.jpg', '2019-10-30 20:11:32', '2019-10-30 20:11:32'),
(6, 1, 'Hari Bhakti Rimbawan ke-36 di Jawa Timur', 'Hari Bhakti', '<p><strong>Mojokerto</strong>, Selasa (26 Maret 2019) - Setiap tanggal 16 Maret para Rimbawan seluruh Indonesia memperingati Hari Bakti Rimbawan, yang mana peringatan pada tahun ini adalah peringatan ke-36 sejak tahun 1983. Peringatan Hari Bakti Rimbawan ke-36 di Jawa Timur, sepenuhnya dilaksanakan oleh IKARI (Ikatan Rimbawan Jawa Timur). IKARI berasal dari (i) unsur orang atau perseorangan yang peduli atau bekerja di bidang/sektor kehutanan, (ii) pensiunan bidang/sektor kehutanan dan (iii) alumni dari sekolah/jurusan /fakultas kehutanan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Peringatan ini, dari tahun ke tahun dilaksanakan untuk memotivasi Rimbawan di&nbsp;seluruh nusantara supaya terus berkiprah dalam mendukung pembangunan&nbsp;kehutanan di Indonesia. Hari Bakti Rimbawan pada tahun 2019 ini mengangkat tema&nbsp;<strong>&ldquo;Hutan Untuk Kesejahteraan Rakyat dan Lingkungan Sehat&rdquo;.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pelaksanaan puncak acara Hari Bakti Rimbawan ke 36 Tahun 2019 ini dilaksanakan&nbsp;di Bumi Perkemahan Tahura Raden Soerjo di Desa Claket, Kecamatan Pacet,&nbsp;Kabupaten Mojokerto. Tahura Raden Soerjo secara ekologi, merupakan ekosistem&nbsp;pegunungan yang kaya akan flora dan fauna sebagai penyangga ekosistem di 6&nbsp;Kabupaten/Kota (Kabupaten Mojokerto, Kabupaten Malang, Kota Batu, Kabupaten&nbsp;Pasuruan, Kabupaten Jombang dan Kabupaten Kediri). Potensi flora secara umum&nbsp;terdiri dari : Anggrung, aren, bayur, dadap, beringin, cemara gunung, jambu hutan,&nbsp;kaliandra merah, kaliandra putih, salam, misopsis, nangka, pakis tiang, palem jawa,&nbsp;</p>\r\n\r\n<p>pasang, pinang jawa, pinus, puspa, siwalan, suren, trembesi, dll. Adapun potensi&nbsp;fauna terdiri dari : Elang Jawa, alap-alap, bajing, bangau putih, bangau, lutung,&nbsp;celeng, ganggarangan, glatik gunung, jelarang, kalong, kancil, kidang, kuntul putih,&nbsp;landak, luwak, macan tutul, trenggiling, tupai tanah, walang kopo, dll.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Secara ekonomi, potensi obyek wisata alam yang dimiliki antara lain adalah : Sumber&nbsp;Air Panas Cangar, Goa Jepang di tengah hutan, Arboretum, Petung Sewu yang&nbsp;merupakan tegakan bambu yang alami, Air Terjun Watu Ondo, Air Terjun Watu&nbsp;Lumpang, Air Terjun Tretes, dan Slimpring serta jalur pendakian dll. Selain itu&nbsp;Tahura Raden Soerjo memberikan kontribusi PAD kepada Pemerintah Provinsi Jawa&nbsp;Timur pada tahun 2018 sebesar Rp. 3.556.974.000,00 dengan jumlah pengunjung&nbsp;sebanyak 293.606 pengunjung baik dari nusantara maupun manca negara.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Secara sosial budaya, Tahura Raden Soerjo mempunyai potensi seperti petilasan yang&nbsp;merupakan peninggalan situs purbakala yang berasal dari Kerajaan Majapahit dan&nbsp;Singosari diantaranya adalah petilasan Eyang Sakri, Goa Wejangan, Eyang Semar,&nbsp;Mangkutoromo, Sendang Widodari, Selipar, Candi Whesi dan Candi Jawa Dipa.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kegiatan ini mendapatkan dukungan dari seluruh pihak yang meliputi Ibu Gubernur&nbsp;dan Bapak Wakil Gubernur Jawa Timur, Organisasi Perangkat Daerah (OPD)&nbsp;Lingkup Provinsi Jawa Timur, OPD Lingkup Kabupaten Mojokerto, serta dukungan&nbsp;pembiayaan dari mitra PT. Bumi Suksesindo, PT. Tera Widyagama, Rimbawan&nbsp;Perhutani Jawa Timur, PT. Agung Satrya Abadi, PT. Pertamina Gas, dan mitra&nbsp;lainnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Peserta Hari Bakti Rimbawan Ke 36 di Provinsi Jawa Timur ini sebanyak 1.000 orang&nbsp;yang berasal dari Rimbawan se Jawa Timur yang terdiri dari Rimbawan yang masih&nbsp;aktif dan sudah purna tugas lingkup Dinas Kehutanan Provinsi Jawa Timur,&nbsp;Rimbawan lingkup UPT Kementerian LHK, Rimbawan lingkup Perum Perhutani&nbsp;Divre Jawa Timur, serta undangan lainnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Adapun rangkaian kegiatan Hari Bakti Rimbawan Jawa Timur Tahun 2019 yang&nbsp;telah dilaksanakan antara lain jalan sehat Keluarga Rimbawan, donor darah, pentas&nbsp;seni dan santunan anak yatim pada tanggal 22 Maret 2019.&nbsp;Sedangkan untuk rangkaian Puncak acara pada hari ini (tanggal 26 Maret 2019) di&nbsp;Bumi Perkemahan Tahura Raden Soerjo, Pacet, Mojokerto adalah penanaman dan&nbsp;penyerahan bibit secara simbolis kepada Kelompok Tani Hutan dan LMDH,</p>\r\n\r\n<p>pelepasliaran burung dan peresmian penangkaran.&nbsp;</p>', '440893426.jpg', '2019-10-30 20:20:39', '2019-10-30 20:21:59'),
(7, 1, 'Pelepasliaran 32 ekor Monyet Ekor Panjang ke Suakamargasatwa (SM) Pulau Nusa Barong Jember', 'Monyet', '<p><strong>Tanggal&nbsp;25&nbsp;Maret 2019</strong>.&nbsp;Pelepasliaran 32 ekor Monyet Ekor Panjang dilaksanakan pada hari&nbsp;Senin,&nbsp;&nbsp;bertempat&nbsp;di&nbsp;Pantai Nyamplung Kobong, Desa Kepanjen, Kecamatan Gumukmas, Kabupaten Jember.</p>\r\n\r\n<p>Penanganan Konflik Monyet Ekor Panjang terus dilakukan sejak lama. Kerusakan habitat serta perilaku manusia yang menjadikan monyet ekor panjang sebagai hewan peliharaan menjadi sebab utama terjadinya konflik. Sejak tahun 2018, Balai Besar KSDA Jawa Timur bekerjasama dengan para pihak mengintensifkan penanganan konflik Monyet Ekor panjang. Tercatat selama tahun 2018, sebanyak 25 ekor Monyet ekor panjang diselamatkan dari konflik baik yang disebabkan karena kerusakan habitat, monyet bekas pemeliharaan atau bekas pertunjukkan topeng monyet. Sebagai penguatan hukum pada bulan Oktober 2018, Balai Besar KSDA Jawa Timur mendorong terbitnya Surat Gubernur JawaTimur Nomor : 522/368/022.3/2019 tanggal 8 Januari 2019 tentang Pelarangan Pertunjukan Topeng Monyet di Jawa Timur.</p>\r\n\r\n<p>Sebagai rangkaian dari penanganan konflik Monyet Ekor Panjang hasil konflik, sejak bulan Agustus 2018, dilakukan tahapan-tahapan pelepasliaran. Bulan Agustus 2018, dilakukan pemeriksaan kesehatan tahap 1, dilanjutkan tahap 2 pada bulan September 2018&nbsp;&nbsp;dan tahap 3 pada Bulan November 2019. Tujuannya agar monyet yang nantinya dilepasliarkan dalam kondisi sehat, sehingga tidak merusak habitat yang nantinya dipakai untuk pelepasliaran. Monyet-monyet yang telah lolos dari pemeriksaan kesehatan, selanjutnya direhabilitasi di kandang rehabilitasi Forest City and Farm H.M Arum Sabil Jember. Tujuannya agar terbentuk group ideal (jantan alpha, betina alpha, remaja dan anakan) serta meningkatkan sifat liarnya.</p>\r\n\r\n<p>Penentuan lokasi pelepsliaran yang tepat menjadi faktor keberhasilan program pelepasliaran Monyet Ekor Panjang. Dari beberapa lokasi yang disurvey, Suaka Margasatwa Pulau Nusa Barung dinilai paling cocok sebagai lokasi pelepasliaran. berdasarkan Survey habitat yang dilaksanakan pada bulan Oktober 2018 di Suakamargasawata Pulau Nusa Barung, Blok Jeruk-Ketapang, Blok Pasir Panjang dan Blok Jambok merupakan habitat yang cocok untuk pelepasliaran Monyet Ekor Panjang dikarenakan banyaknya sumber pakan yang terdiri 33 famii dari 59 jenis pohon diantaranya merupakan jenis Ficus yang merupakan pohon kunci bagi primata ataupun satwa lain, tersedianya sumber air tawar, jauh dari pemukiman masyarakat, di blok tersebut tidak ditemukannya Monyet local.</p>\r\n\r\n<p>Untuk meningkatkan pemahaman masyarakat terkait dengan penanganan konflik monyet ekor panjang, pada tanggal 8 Februari 2019, dilakukan sosialisasi penangaanan konflik Monyet Ekor panjang kepada para pihak di Kabupaten Jember. Kegiatan ini dilaksanakan di Forest City and Farm H.M Arum Sabil Jember. Hadir dalam kegiatan tersebut JAAN, Kapolres Jember, Bapak Arum Sabil (Tokoh Masyarakat Jember) dan para pihak di Kabupaten Jember yang concern terhadap penanganan konflik Monyet Ekor Panjang.</p>\r\n\r\n<p>Sebagai puncak dari tahapan pelepasliaran, dilakukan pelepasliaran Monyet ekor panjang sebanyak 31 ekor. Sebanyak 13 ekor merupakan hasil rehabilitasi dari kandang rehabilitasi Forest City and Farm H.M Arum Sabil Jember serta 18 ekor merupakan hasil rehabilitasi dari rumah sakit hewan Cikole, Jawa Barat. Kegiatan pelepasliaran dilakukan pada tanggal 20 Maret 2018 sebanyak 13 ekor dan pada tanggal 25 Maret 2019 sebanyak 18 ekor.</p>\r\n\r\n<p>Kegiatan ini merupakan hasil kolaborasi para pihak yang&nbsp;<em>concern&nbsp;</em>terhadap penanganan konflik monyet ekor panjang, Balai Besar KSDA JawaTimur, Balai Besar KSDA Jawa Barat, JAAN, Pemerintah Provinsi Jawa Timur, Pemerintah Kabupaten Jember, Bapak Arum Sabil, dan para pihak yang tidak dapat disebutkan satu per satu. Semoga dengan kegiatan pelepasliaran ini dapat menjadi momentum untuk bersama-sama melakukan pengendalian konflik monyet ekor panjang.</p>', '1314962015.jpg', '2019-10-30 20:24:27', '2019-10-30 20:24:27'),
(8, 1, 'PERINGATAN HARI MENANAM POHON INDONESIA (HMPI) DAN BULAN MENANAM NASIONAL (BMN) TINGKAT PROVINSI JAWA TIMUR TAHUN 2018', 'tanam pohon', '<p>Pada Kamis, 6 Desember 2018, Wakil Gubernur Jawa Timur, Saifullah Yusuf, menghadiri peringatan Hari Menanam Pohon Indonesia (HMPI) dan Bulan Menanam Nasional (BMN) Provinsi Jawa Timur Tahun 2018 di Fakultas Kedokteran dan Ilmu Kesehatan Kampus III UIN Maulana Malik Ibrahim, Kota Batu. Acara ini juga dihadiri oleh Kepala Dinas Kehutanan Provinsi Jawa Timur beserta jajarannya, Kementerian Lingkungan Hidup dan Kehutanan RI, Walikota Batu, Forkopimda Batu, Perum Perhutani Divisi Regional Jawa Timur, Perguruan Tinggi Jawa Timur, BKOW Jawa Timur, Muslimat NU Jawa Timur, Aisyiyah Jawa Timur, Pondok Pesantren Bahrul Maghfiroh Malang, Perwakilan Kelompok Tani (KT Sumber Harapan Mulya) dan Komunitas Pecinta Lingkungan Hidup Jawa Timur.</p>\r\n\r\n<p>Dalam kesempatan ini, Bapak Wagub menyampaikan bahwa menanam pohon saja belum cukup untuk tujuan besar melakukan pemulihan kondisi lahan atau hutan secara lebih luas, yaitu dalam sebuah satuan ekosistem Daerah Aliran Sungai atau DAS.&nbsp; Yang perlu segera dipulihkan adalah fungsi hidrologi DAS agar kembali sehat dan berkontribusi bagi pencegahan bencana serta peningkatan produktifitas dan kesejahteraan masyarakat. Mengembalikan kondisi vegetasi adalah bagian dari tindakan menyeluruh yang diperlukan. Oleh sebab itu, mulai tahun 2018 dan selanjutnya, yang akan kita peringati adalah Pemulihan DAS.&nbsp;</p>\r\n\r\n<p>Peringatan Hari Menanam Pohon Indonesia dan Bulan Menanam Nasional pada tahun 2018 ini berbeda dari tahun-tahun sebelumnya, karena tahun ini HMPI dilebur, disatukan dengan pencanangan Gerakan Nasional Pemulihan Daerah Aliran Sungai (GN PDAS). Pencanangan Gerakan Nasional Pemulihan DAS (GN PDAS) tahun ini mengambil tema &ldquo;DAS Sehat, Sejahterakan Rakyat&rdquo;. Perubahan simbolisasi dari Peringatan HMPI dan BMN menjadi GN PDAS harus dimaknai sebagai momentum untuk menempatkan betapa pentingnya dan mendesaknya pemulihan DAS sebagai sebuah bentang alam,&nbsp; dan kegiatan penanaman pohon sebagai salah satu strategi yang tidak berdiri-sendiri dalam pemulihan DAS.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bapak Wagub menyampaikan harapannya supaya berbagai program pengelolaan sumberdaya alam dapat dilaksanakan dengan pendekatan yang lebih holistik dalam konteks DAS, serta dapat diinternalisasikan ke dalam tata ruang, sehingga harmonisasi program dapat dilakukan berdasarkan pertimbangan dampak dan manfaat. Secara langsung, kita jadikan tata ruang sebagai instrumen berdayaguna dalam mendorong terjadinya koordinasi, integrasi, sinkronisasi dan sinergi program.</p>\r\n\r\n<p>&nbsp; &nbsp;</p>\r\n\r\n<p>Rangkaian acara Peringatan HMPI dan BMN Tingkat Provinsi Jawa Timur Tahun 2018 juga meliputi Deklarasi Green Campus Se-Jawa Timur dalam rangka Gerakan Pemulihan DAS, penyerahan bibit secara simbolis dari Bapak Wagub kepada peserta, Peresmian Bio Techno Park&nbsp; UIN Maulana Malik Ibrahim sekaligus penandatangan Prasasti, serta pembagian bibit gratis kepada para peserta.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Peringatan HMPI dan BMN Tingkat Provinsi Jawa Timur Tahun 2018 ini diakhiri dengan Penanaman pohon bersama oleh Bapak Wagub, Kepala Dinas Kehutanan Provinsi Jawa Timur, Walikota Batu, Forkompida Kota Batu serta mahasiswa UIN Maulana Malik Ibarahim. Bapak Wagub menanam pohon Bisbul yang dilanjutkan dengan penandatanganan Komitmen Bersama Gerakan Pemulihan DAS Jawa Timur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Semoga setelah Peringatan ini seluruh stakeholders dapat meningkatkan komitmen dan kerjasama yang baik dalam upaya peningkatan kualitas lingkungan hidup dan kesejahteraan masyarakat (trw).</p>', '1109401680.jpg', '2019-10-30 20:25:58', '2019-10-30 20:25:58'),
(9, 14, 'Kegiatan Pembinaan Kepegawaian dan Buka Bersama Anak Yatim Dinas Kehutanan Provinsi Jawa Timur', 'anak yatim', '<p>Surabaya, 16 Mei 2019,<br />\r\n&nbsp;</p>\r\n\r\n<p>Dinas Kehutanan Provinsi Jawa Timur mengadakan Kegiatan Pembinaan Kepegawaian yang bersamaan dengan acara berbuka bersama 50 anak yatim dari Yayasan Laksanamana Moeljadi dan Yayasan Ar-Rahmah. Kegiatan ini di hadiri oleh seluruh staff dan pimpinan di dalam lingkup dinas kehutanan Provinsi Jawa Timur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kegiatan yang diadakan di Ruang Rapat Tectona Dinas Kehutanan Prov. Jawa Timur tersebut menghadirkan motivator yang sekaligus sebagai narasumber yaitu dr. H. Agus Ali Fauzi, PGD Pall Med (ECU). Dalam kesempatan tersebut beliau memberikan motivasi kepada para pegawai Dinas Kehutanan Provinsi Jawa Timur agar selalu melaksanakan tugasnya sebaik mungkin, karena tugas tersebut adalah amanah yang akan dimintai pertanggung jawabannya kelak. Dan juga dalam hal akhirat, agar mereka juga tidak lupa untuk melakukan kewajiban kepada tuhan NYA, sebagaimana mereka tidak lupa terhadap tugas-tugas mereka di kantor.</p>\r\n\r\n<p>Dalam serangkaian acara pada kegiatan tersebut, terdapat sesi pemberian santunan kepada seluruh anak yatim yang di lakukan secara simbolis oleh Kepala dan Sekretaris Dinas Kehutanan Provinsi Jawa Timur. Setelah melalui serangkaian acara yang dimulai sejak pukul 16.00 tersebut, acara di tutup dengan berbuka bersama setelah sholat Magrib berjamaah.</p>\r\n\r\n<p>&nbsp;</p>', '1804323848.jpg', '2019-10-30 20:28:07', '2019-10-30 20:29:57'),
(10, 14, 'Siapkan Pergub Perampingan OPD, Gubernur Sulsel Konsultasi ke Kemendagri', 'Politik', '<p><strong>Makassar</strong>&nbsp;- Gubernur Sulawesi Selatan (Sulsel)&nbsp;<a href=\"https://www.detik.com/tag/nurdin-abdullah\">Nurdin Abdullah</a>&nbsp;tengah menyiapkan peraturan gubernur (<a href=\"https://www.detik.com/tag/pergub\">pergub</a>) terkait peleburan sejumlah organisasi perangkat daerah (OPD) yang peraturan daerahnya baru disepakati bersama DPRD. Nurdin juga akan berkonsultasi ke Kemendagri.<br />\r\n<br />\r\n&quot;Tunggu pergubnya (peleburan sejumlah OPD), setelah itu kita minta konsultasi lagi&nbsp;<a href=\"https://www.detik.com/tag/kemendagri\">Kemendagri</a>&nbsp;pentepannya turun,&quot; kata Nurdin di Kantor Gubernur Sulsel, Jalan Urip Sumoharjo, Makassar, Senin (4/11/2019).<br />\r\n&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Baca juga:&nbsp;</strong><a href=\"https://news.detik.com/read/2019/11/01/175355/4768905/10/raperda-opd-disahkan-dprd-struktur-pemprov-sulsel-jadi-ramping\">Raperda OPD Disahkan DPRD, Struktur Pemprov Sulsel Jadi Ramping</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\nDiketahui, dalam peleburan OPD yang dibacakan di sidang paripurna&nbsp;<a href=\"https://www.detik.com/tag/dprd-sulsel\">DPRD Sulsel</a>, peleburan Biro Humas ke Kominfo tidak dibacakan. Nurdin mengatakan peleburan Humas ke Kominfo tidak dibahas dalam Perda OPD karena sudah merupakan aturan terbaru.<br />\r\n<br />\r\n&quot;Itu (Humas gabung dengan Kominfo) bukan ide dari kita, memang aturannya seperti itu. Ini kan usulan kita yang kemarin (OPD lainnya yang dileburkan), kalau yang Humas ke Kominfo itu memang aturannya, regulasi,&quot; ujarnya.<br />\r\n<br />\r\nDiketahui, sejumlah OPD yang dilebur di antaranya Dinas Bina Marga dan Bina Konstruksi; Dinas Sumber Daya Air, Cipta Karya dan Tata Ruang. OPD tersebut dilebur menjadi Dinas Pekerjaan Umum Dan Penataan Ruang dengan tipe A. Plt Kepala Bappeda Sulsel, Rudy Jamaluddin mengatakan tupoksi kerja OPD tersebut tetap sama meski telah dilebur.<br />\r\n&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Baca juga:&nbsp;</strong><a href=\"https://news.detik.com/read/2019/10/31/161702/4767244/10/paripurna-dprd-sulsel-dihujani-interupsi-dewan-pertanyakan-ranperda-opd\">Paripurna DPRD Sulsel Dihujani Interupsi, Dewan Pertanyakan Ranperda OPD</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '1250415597.jpg', '2019-11-04 02:22:18', '2019-11-04 02:22:18'),
(11, 14, 'Serapan Anggaran SKPD Pemkot Bandung Rendah', 'Politik', '<p><strong>Bandung</strong>&nbsp;- Serapan anggaran Satuan Kerja Perangkat Daerah (SKPD) di Kota Bandung sampai saat ini masih ada yang di bawah 50 persen. Bahkan Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan (DPKP3) baru sekitar 27 persen.<br />\r\n<br />\r\nSekretaris Daerah Kota Bandung Ema Sumarna menuturkan, rata-rata serapan anggaran SKPD di Kota Bandung telah mencapai 60 persen. Namun dia mengakui masih ada dinas yang serapannya masih sangat rendah.<br />\r\n&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Baca juga:&nbsp;</strong><a href=\"https://news.detik.com/read/2019/11/04/153610/4771553/486/polisi-dalami-tersangka-baru-kasus-penipuan-mobil-murah-akumobil\">Polisi Dalami Tersangka Baru Kasus Penipuan Mobil Murah Akumobil</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\nBerdasarkan laporan, kata Ema, DPKP3 merupakan dinas dengan serapan anggaran paling rendah di antara SKPD lainnya yakni sekitar 27 persen. Hal itu disebabkan ada beberapa pekerjaan yang kemungkinan tidak tereksekusi seperti pembangunan proyek rumah deret di Tamansari.<br />\r\n<br />\r\n&quot;DPKP3 paling jelek, karena ada rumah deret (yang kemungkinan tidak tereksekusi tahun ini). Laporannya sekitar 27 persen koma sekian,&quot; kata Ema di Pendopo Kota Bandung, Senin (4/11/2019).<br />\r\n<br />\r\nSementara level kewilayahan adalah Kecamatan Astana Anyar dengan penyerapan anggaran paling rendah sampai saat ini sebesar kurang lebih 31 persen. &quot;Kalau yang paling tinggi itu Kecamatan Andir sudah 81 persen. Kalau dinas itu Dispora paling tinggi sekitar 82 koma sekian persen,&quot; ucapnya.<br />\r\n&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Baca juga:&nbsp;</strong><a href=\"https://finance.detik.com/read/2019/11/04/150406/4771508/4/kalah-saing-sama-damri-gratis-berapa-harga-tiket-bus-ke-kertajati\">Kalah Saing sama Damri Gratis, Berapa Harga Tiket Bus ke Kertajati?</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\nMenurut Ema, sampai saat ini proses pekerjaan masih terus berlangsung. Dia memperkirakan secara keseluruhan serapan APBD Kota Bandung sampai akhir tahun ini sekitar 80 persen.<br />\r\n<br />\r\n&quot;Serapan anggaran itu memang diperkirakan (sampai akhir tahun) di angka 80 koma sekian persen. Karena ada rumah deret, kolam retensi yang bisa berpengaruh (ke penyerapan anggaran). Disdik juga ada beberapa yang tidak dipaksakan. Tapi secara keseluruhan program masih berjalan,&quot; ujarnya.<br />\r\n<strong>(mso/tro)</strong></p>', '732210202.jpg', '2019-11-04 02:23:42', '2019-11-04 02:27:04'),
(12, 14, 'Catat! Jembatan Pemali Brebes Akan Ditutup 4 Hari untuk Perbaikan', 'Politik', '<p>&nbsp;</p>\r\n\r\n<p><strong>Brebes</strong>&nbsp;- Jembatan Pemali sisi selatan di jalur Pantura Kabupaten Brebes, Jawa Tengah, akan ditutup pada 8-11 November 2019 untuk perbaikan. Kondisi jembatan yang melintang di atas Sungai Pemali ini melengkung pada bagian chamber atau badan jembatan.<br />\r\n<br />\r\nKonsultan Bina Marga Provinsi Jawa Tengah, Mohammad Iqbal, mengatakan chamber Jembatan Pemali melengkung karena beban kendaraan dan faktor usia. Perbaikan jembatan yang dibangun pada tahun 1997 atau berusia 22 tahun ini akan dilaksanakan dengan sistem external stressing.<br />\r\n<br />\r\n&quot;Bagian chamber jembatan mengalami penurunan yang disebabkan beban jalur Pantura yang cukup berat. Sehingga, kondisi chamber menurun dan melengkung. Ini harus dinormalkan agar bentuknya kembali normal,&quot; kata Iqbal saat ditemui di sela persiapan perbaikan Jembatan Pemali, Senin (4/11/2019).<br />\r\n&nbsp;</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"Catat! Jembatan Pemali Brebes Akan Ditutup 4 Hari Untuk Perbaikan\" src=\"https://akcdn.detik.net.id/community/media/visual/2019/11/04/703b7f3c-686f-4f4e-a327-fd49e3a651a8_169.png?w=620\" />Imam Suripto/detikcom</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\nSaat ini, tahapan persiapan dengan pemasangan kabel slink sejumlah 32 buah untuk dua bentangan. Kabel slink tersebut dipasang untuk proses external stressing. Iqbal menyebutkan pihaknya membutuhkan waktu 4 hari karena dalam perbaikan tersebut juga akan dilakukan pengecoran.<br />\r\n<br />\r\n&quot;Sehingga diperlukan juga menunggu umur beton agar kering sempurna. Tak hanya itu, kondisi jembatan juga harus bebas dari beban. Karena itu, jembatan harus ditutup total,&quot; jelas Iqbal.<br />\r\n&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Baca juga:&nbsp;</strong><a href=\"https://finance.detik.com/read/2019/10/24/122254/4758124/1772/operator-tol-pemalang-batang-kantongi-pinjaman-rp-600-m\">Operator Tol Pemalang-Batang Kantongi Pinjaman Rp 600 M</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\nSementara bagi kendaraan angkutan barang, seperti truk akan dialihkan melalui Tol Brebes Timur dan Tol Brebes Barat. Sedangkan untuk kendaraan kecil, akan dialihkan melalui Jembatan Pemali sisi utara.<br />\r\n<br />\r\nIqbal menambahkan, selama proses perbaikan jembatan pihaknya berharap semua pengguna jalan bisa mematuhi pengalihan arus lalu lintas. Hal itu agar proses perbaikan bisa selesai tepat waktu.<br />\r\n<strong>(rih/rih)</strong></p>', '1653959561.png', '2019-11-04 02:24:40', '2019-11-04 02:25:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tlp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo1` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id`, `alamat`, `tlp`, `email`, `title`, `fax`, `logo1`, `logo2`, `facebook`, `twitter`, `youtube`, `instagram`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Jl. Raya Juanda No.8, Sidoarjo', '(031) 8540616', 'admin@inspektorat.jatimprov.go.id', 'Inspektorat Provinsi Jawa Timur', '(031) 8548153', NULL, NULL, 'https://www.facebook.com', 'https://www.twitter.comm', 'https://www.youtube.com', 'https://www.instagram.com', '<h3>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</h3>', '2019-10-27 19:54:14', '2019-11-05 19:50:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_statistikas`
--

CREATE TABLE `data_statistikas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_statistikas`
--

INSERT INTO `data_statistikas` (`id`, `title`, `tahun`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Data statistika 2016', '2016', '854072727.pdf', '2019-10-24 18:55:41', '2019-10-24 18:55:41'),
(2, 'Data statistika 2017', '2017', '253073765.pdf', '2019-10-24 18:57:00', '2019-10-24 18:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download_materis`
--

CREATE TABLE `download_materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `download_materis`
--

INSERT INTO `download_materis` (`id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Membangun Etika Profesi ASN Purbalingga', '2090832290.pdf', '2019-10-31 17:53:59', '2019-10-31 17:53:59'),
(2, 'Manajemen Kinerja KASN – Purbalingga 2019', '1042538767.pdf', '2019-10-31 17:54:18', '2019-10-31 17:54:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  `link_vidio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeris`
--

INSERT INTO `galeris` (`id`, `deskripsi`, `images`, `status`, `link_vidio`, `created_at`, `updated_at`) VALUES
(1, '<p>Kegiatan Pembinaan Kepegawaian dan Buka Bersama Anak Yatim Dinas Kehutanan Provinsi Jawa Timur Surabaya, 16 Mei 2019, Dinas Kehutanan Provinsi Jawa Timur mengadakan Kegiatan Pembinaan Kepegawaian yang bersamaan dengan acara berbuka bersama 50 anak yatim</p>', '2006909120.jpg', 'aktif', 'https://www.youtube.com/watch?v=1ldB1ITGL4U', NULL, '2019-10-22 18:14:02'),
(2, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>', '1054984370.jpg', 'aktif', 'https://www.youtube.com/watch?v=1ldB1ITGL4U', '2019-10-22 01:11:23', '2019-10-28 01:21:48'),
(3, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>', '1605805287.jpg', 'aktif', 'https://www.youtube.com/watch?v=pmanD_s7G3U&list=PLVH_c0JJpuSpTf3MI7vqz_6UKwvbbtitk', '2019-10-22 01:28:52', '2019-10-28 01:22:29'),
(4, '<p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it&#39;s seen all around the web; on templates, websites, and stock designs. Use our&nbsp;<a href=\"https://loremipsum.io/#generator\">generator</a>&nbsp;to get your own, or read on for the authoritative history of&nbsp;<em>lorem ipsum</em>.</p>', '1064577379.jpg', 'aktif', 'https://www.youtube.com/watch?v=1ldB1ITGL4U', '2019-10-22 01:29:09', '2019-10-22 18:14:56'),
(6, '<p>The purpose of&nbsp;<em>lorem ipsum</em>&nbsp;is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn&#39;t distract from the layout. A practice not without&nbsp;<a href=\"https://loremipsum.io/#controversy\">controversy</a>, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.</p>', '1625603745.jpg', 'aktif', NULL, '2019-10-22 18:14:37', '2019-10-22 18:14:37'),
(9, '<p>Goddess Listarte, the savior of the super hard-mode world Gairbrunde, summons a hero to her aid. The hero, Seiya Ryuuguuin, holds the cheat-rank status, but he is ridiculously cautious. For instance, he would buy three sets of armor: one to wear, a spare, and a spare for the spare. Beyond keeping an absurd amount of item stock, he remains in his room for muscle training till he reaches the max level and fights slimes at full power just to stay on the safe side.</p>', '143402852.jpg', 'tidak aktif', NULL, '2019-10-23 00:49:44', '2019-10-28 01:21:36'),
(10, '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '547644637.jpg', 'aktif', 'https://www.youtube.com/watch?v=5tREULADxBc', '2019-10-28 01:13:59', '2019-10-28 01:13:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutan_rakyats`
--

CREATE TABLE `hutan_rakyats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hutan_rakyats`
--

INSERT INTO `hutan_rakyats` (`id`, `title`, `deskripsi`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Hutan Rakyat', '<p><em>D</em>alam Undang-undang No. 41 Tahun 1999 tentang Kehutanan disebutkan bahwa luas kawasan hutan yang harus dipertahankan minimal 30 % dari luas daerah aliran sungai (DAS) dan atau pulau dengan sebaran yang proporsional. Kebijakan tersebut dimaksudkan untuk menjamin optimalisasi peran kawasan hutan dalam hal manfaat lingkungan, manfaat sosial, dan manfaat ekonomi masyarakat setempat.</p>\r\n\r\n<p>Salah satu upaya untuk memenuhi kecukupan 30 % tutupan lahan berupa hutan adalah melalui hutan rakyat. Keberadaan hutan rakyat di Jawa Timur berkembang dengan pesat dari tahun ke tahun. Perkembangan hutan rakyat yang terus meningkat seiring dengan gencarnya program rehabilitasi hutan dan lahan yang dilaksanakan oleh pemerintah dan didukung minat budidaya kayu oleh masyarakat yang cukup tinggi karena meningkatnya permintaan kayu rakyat untuk pemenuhan industri primer hasil hutan kayu di Jawa Timur maupun di luar Jawa Timur.</p>\r\n\r\n<p>Dalam kurun waktu tiga tahun yaitu 2013 &ndash; 2016 hutan rakyat di Jawa Timur telah mengalami perkembangan rata-rata sebesar + 5 % per tahun, pada tahun 2016</p>\r\n\r\n<p>diperkirakan luas aktual hutan rakyat di Jawa Timur mencapai + 739.156,93 ha dengan produksi sebesar 3.102.302,8181 m3.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/Luas dan Lokasi Hutan Rakyat-001(4).jpg\" style=\"height:640px; width:468px\" /></p>', '', '2019-10-22 20:15:17', '2019-10-31 19:17:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi_kehutanans`
--

CREATE TABLE `instansi_kehutanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instansi_kehutanans`
--

INSERT INTO `instansi_kehutanans` (`id`, `title`, `link`, `created_at`, `updated_at`) VALUES
(1, 'KEMENTRIAN LHK', 'http://www.baungcamp.com/', '2019-10-28 02:21:14', '2019-10-31 01:53:23'),
(2, 'PERHUTANI DIVRE JATIM', 'http://www.unit2.perumperhutani.com/', '2019-10-28 02:21:25', '2019-10-31 02:01:16'),
(3, 'BALAI BESAR KSDA JATIM', 'http://www.baungcamp.com/', '2019-10-28 02:21:39', '2019-10-31 02:03:22'),
(4, 'BP DAS HL BRANTAS SAMPEAN', 'http://dishut.jatimprov.go.id/hutan.php?id=12#', '2019-10-28 02:21:55', '2019-10-31 02:04:05'),
(5, 'BP DAS HL SOLO', 'http://www.bpdassolo.net/', '2019-10-28 02:22:07', '2019-10-31 02:04:24'),
(6, 'BALAI GAKKUM JAWA BALI NUSRA', 'http://dishut.jatimprov.go.id/hutan.php?id=12#', '2019-10-28 02:22:24', '2019-10-31 02:04:39'),
(7, 'BALAI TAHURA', 'http://tahura-rsoerjo.com/', '2019-10-31 01:37:37', '2019-10-31 01:37:37'),
(8, 'BTN BROMO TENGGER SEMERU', 'http://www.tnalaspurwo.org/', '2019-10-31 01:37:59', '2019-10-31 01:37:59'),
(9, 'BTN BLAURAN', 'http://www.balurannationalpark.web.id/', '2019-10-31 01:38:20', '2019-10-31 01:38:20'),
(10, 'BTN MERU BETIRI', 'http://www.merubetiri.com/', '2019-10-31 01:38:42', '2019-10-31 01:38:42'),
(11, 'BTN ALAS PURWO', 'http://www.tnalaspurwo.org/', '2019-10-31 01:39:00', '2019-10-31 01:39:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_beritas`
--

CREATE TABLE `kategori_beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_berita` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_beritas`
--

INSERT INTO `kategori_beritas` (`id`, `kategori_berita`, `created_at`, `updated_at`) VALUES
(1, 'Artikel', '2019-10-23 20:49:51', '2019-10-30 20:06:09'),
(14, 'Berita Umum', '2019-10-28 23:02:58', '2019-10-30 20:06:21'),
(15, 'Berita Teknis', '2019-10-28 23:03:12', '2019-10-30 20:06:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link_informasis`
--

CREATE TABLE `link_informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `link_informasis`
--

INSERT INTO `link_informasis` (`id`, `title`, `deskripsi`, `file`, `created_at`, `updated_at`) VALUES
(1, '1914 translation by H. Rackham', '<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', NULL, '2019-10-24 00:48:18', '2019-10-24 00:48:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link_layanans`
--

CREATE TABLE `link_layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `link_layanans`
--

INSERT INTO `link_layanans` (`id`, `title`, `deskripsi`, `link`, `images`, `created_at`, `updated_at`) VALUES
(1, 'PPID', '<p>Pejabat Pengelola Informasi dan Dokumentasi</p>', 'https://www.lipsum.com', '48076837.png', '2019-10-23 23:47:06', '2019-11-01 02:26:53'),
(3, 'PBJ', NULL, NULL, NULL, '2019-11-03 22:59:39', '2019-11-03 22:59:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lkjips`
--

CREATE TABLE `lkjips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lkjips`
--

INSERT INTO `lkjips` (`id`, `title`, `tahun`, `file`, `created_at`, `updated_at`) VALUES
(1, 'LKJIP 2019', '2019', '931071314.pdf', '2019-11-03 21:29:57', '2019-11-03 21:32:26'),
(2, 'LKJIP 2018', '2018', '493821735.pdf', '2019-11-03 21:37:16', '2019-11-03 21:37:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `halaman` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logs`
--

INSERT INTO `logs` (`id`, `ip`, `deskripsi`, `halaman`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'visitor', 'dashboard', '2019-11-06 20:55:21', '2019-11-06 20:55:21'),
(2, '10.20.30.253', 'visitor', 'agenda', '2019-11-06 21:05:16', '2019-11-06 21:05:16'),
(3, '10.20.30.253', 'visitor', 'galeri', '2019-11-06 21:10:31', '2019-11-06 21:10:31'),
(4, '10.20.30.253', 'visitor', 'galeri', '2019-11-06 21:10:40', '2019-11-06 21:10:40'),
(5, '127.0.0.1', 'visitor', 'dashboard', '2019-11-06 22:04:18', '2019-11-06 22:04:18'),
(6, '127.0.0.1', 'visitor', 'agenda', '2019-11-06 23:56:26', '2019-11-06 23:56:26'),
(7, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:07:19', '2019-11-07 00:07:19'),
(8, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 00:08:23', '2019-11-07 00:08:23'),
(9, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 00:08:25', '2019-11-07 00:08:25'),
(10, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 00:09:39', '2019-11-07 00:09:39'),
(11, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 00:12:21', '2019-11-07 00:12:21'),
(12, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:12:33', '2019-11-07 00:12:33'),
(13, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:13:47', '2019-11-07 00:13:47'),
(14, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:13:57', '2019-11-07 00:13:57'),
(15, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:16:01', '2019-11-07 00:16:01'),
(16, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:16:25', '2019-11-07 00:16:25'),
(17, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:18:12', '2019-11-07 00:18:12'),
(18, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:27:52', '2019-11-07 00:27:52'),
(19, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:28:30', '2019-11-07 00:28:30'),
(20, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:28:48', '2019-11-07 00:28:48'),
(21, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:29:29', '2019-11-07 00:29:29'),
(22, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:29:44', '2019-11-07 00:29:44'),
(23, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:32:16', '2019-11-07 00:32:16'),
(24, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 00:33:16', '2019-11-07 00:33:16'),
(25, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 01:14:59', '2019-11-07 01:14:59'),
(26, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 01:22:44', '2019-11-07 01:22:44'),
(27, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 01:23:48', '2019-11-07 01:23:48'),
(28, '127.0.0.1', 'visitor', 'profil', '2019-11-07 01:24:09', '2019-11-07 01:24:09'),
(29, '127.0.0.1', 'visitor', 'profil', '2019-11-07 01:25:12', '2019-11-07 01:25:12'),
(30, '127.0.0.1', 'visitor', 'berita', '2019-11-07 01:25:25', '2019-11-07 01:25:25'),
(31, '127.0.0.1', 'visitor', 'link layanan', '2019-11-07 01:30:23', '2019-11-07 01:30:23'),
(32, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 01:33:18', '2019-11-07 01:33:18'),
(33, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 01:49:03', '2019-11-07 01:49:03'),
(34, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 01:49:16', '2019-11-07 01:49:16'),
(35, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 02:03:05', '2019-11-07 02:03:05'),
(36, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 02:05:58', '2019-11-07 02:05:58'),
(37, '127.0.0.1', 'visitor', 'berita', '2019-11-07 02:05:59', '2019-11-07 02:05:59'),
(38, '127.0.0.1', 'visitor', 'renstra strategis', '2019-11-07 02:06:39', '2019-11-07 02:06:39'),
(39, '127.0.0.1', 'visitor', 'rencana kerja', '2019-11-07 02:06:47', '2019-11-07 02:06:47'),
(40, '127.0.0.1', 'visitor', 'galeri', '2019-11-07 02:07:20', '2019-11-07 02:07:20'),
(41, '127.0.0.1', 'visitor', 'galeri', '2019-11-07 02:07:55', '2019-11-07 02:07:55'),
(42, '127.0.0.1', 'visitor', 'download materi', '2019-11-07 02:10:06', '2019-11-07 02:10:06'),
(43, '127.0.0.1', 'visitor', 'link layanan', '2019-11-07 02:20:20', '2019-11-07 02:20:20'),
(44, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 02:22:02', '2019-11-07 02:22:02'),
(45, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 02:22:13', '2019-11-07 02:22:13'),
(46, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 17:56:40', '2019-11-07 17:56:40'),
(47, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 17:59:23', '2019-11-07 17:59:23'),
(48, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 18:42:43', '2019-11-07 18:42:43'),
(49, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 18:46:09', '2019-11-07 18:46:09'),
(50, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 18:50:11', '2019-11-07 18:50:11'),
(51, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 19:03:05', '2019-11-07 19:03:05'),
(52, '127.0.0.1', 'visitor', 'peraturan perundangan', '2019-11-07 19:03:21', '2019-11-07 19:03:21'),
(53, '127.0.0.1', 'visitor', 'peraturan perundangan', '2019-11-07 19:05:52', '2019-11-07 19:05:52'),
(54, '127.0.0.1', 'visitor', 'peraturan perundangan', '2019-11-07 19:06:20', '2019-11-07 19:06:20'),
(55, '127.0.0.1', 'visitor', 'peraturan perundangan', '2019-11-07 19:06:44', '2019-11-07 19:06:44'),
(56, '127.0.0.1', 'visitor', 'renstra strategis', '2019-11-07 19:06:57', '2019-11-07 19:06:57'),
(57, '127.0.0.1', 'visitor', 'peraturan perundangan', '2019-11-07 19:07:23', '2019-11-07 19:07:23'),
(58, '127.0.0.1', 'visitor', 'peraturan perundangan', '2019-11-07 19:08:07', '2019-11-07 19:08:07'),
(59, '127.0.0.1', 'visitor', 'agenda', '2019-11-07 19:28:25', '2019-11-07 19:28:25'),
(60, '127.0.0.1', 'visitor', 'profil', '2019-11-07 19:30:57', '2019-11-07 19:30:57'),
(61, '127.0.0.1', 'visitor', 'profil', '2019-11-07 19:33:55', '2019-11-07 19:33:55'),
(62, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 20:03:41', '2019-11-07 20:03:41'),
(63, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 23:15:57', '2019-11-07 23:15:57'),
(64, '127.0.0.1', 'visitor', 'dashboard', '2019-11-07 23:16:00', '2019-11-07 23:16:00'),
(65, '127.0.0.1', 'visitor', 'dashboard', '2019-11-08 01:43:40', '2019-11-08 01:43:40'),
(66, '127.0.0.1', 'visitor', 'profil', '2019-11-08 01:44:43', '2019-11-08 01:44:43'),
(67, '127.0.0.1', 'visitor', 'dashboard', '2019-11-10 18:02:59', '2019-11-10 18:02:59'),
(68, '127.0.0.1', 'visitor', 'dashboard', '2019-11-10 18:13:50', '2019-11-10 18:13:50'),
(69, '127.0.0.1', 'visitor', 'dashboard', '2019-11-10 18:14:50', '2019-11-10 18:14:50'),
(70, '127.0.0.1', 'visitor', 'dashboard', '2019-11-10 18:15:16', '2019-11-10 18:15:16'),
(71, '127.0.0.1', 'visitor', 'dashboard', '2019-11-10 18:17:22', '2019-11-10 18:17:22'),
(72, '127.0.0.1', 'visitor', 'dashboard', '2019-11-10 18:19:06', '2019-11-10 18:19:06'),
(73, '127.0.0.1', 'visitor', 'dashboard', '2019-11-11 18:06:12', '2019-11-11 18:06:12'),
(74, '127.0.0.1', 'visitor', 'dashboard', '2019-11-11 18:06:15', '2019-11-11 18:06:15'),
(75, '127.0.0.1', 'visitor', 'dashboard', '2019-11-11 18:08:43', '2019-11-11 18:08:43'),
(76, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:09:03', '2019-11-11 18:09:03'),
(77, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:12:09', '2019-11-11 18:12:09'),
(78, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:22:36', '2019-11-11 18:22:36'),
(79, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:23:22', '2019-11-11 18:23:22'),
(80, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:23:52', '2019-11-11 18:23:52'),
(81, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:25:29', '2019-11-11 18:25:29'),
(82, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:26:53', '2019-11-11 18:26:53'),
(83, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:27:41', '2019-11-11 18:27:41'),
(84, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:29:40', '2019-11-11 18:29:40'),
(85, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:31:21', '2019-11-11 18:31:21'),
(86, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:33:16', '2019-11-11 18:33:16'),
(87, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:35:12', '2019-11-11 18:35:12'),
(88, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:36:26', '2019-11-11 18:36:26'),
(89, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:41:09', '2019-11-11 18:41:09'),
(90, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:41:49', '2019-11-11 18:41:49'),
(91, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:44:08', '2019-11-11 18:44:08'),
(92, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:46:17', '2019-11-11 18:46:17'),
(93, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:47:32', '2019-11-11 18:47:32'),
(94, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:49:34', '2019-11-11 18:49:34'),
(95, '127.0.0.1', 'visitor', 'profil', '2019-11-11 18:56:54', '2019-11-11 18:56:54'),
(96, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 00:04:59', '2019-11-12 00:04:59'),
(97, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:17:30', '2019-11-12 00:17:30'),
(98, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:43:04', '2019-11-12 00:43:04'),
(99, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:43:44', '2019-11-12 00:43:44'),
(100, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:44:27', '2019-11-12 00:44:27'),
(101, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:45:13', '2019-11-12 00:45:13'),
(102, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:45:32', '2019-11-12 00:45:32'),
(103, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:48:53', '2019-11-12 00:48:53'),
(104, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:49:07', '2019-11-12 00:49:07'),
(105, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:49:49', '2019-11-12 00:49:49'),
(106, '127.0.0.1', 'visitor', 'profil', '2019-11-12 00:58:23', '2019-11-12 00:58:23'),
(107, '127.0.0.1', 'visitor', 'profil', '2019-11-12 01:07:54', '2019-11-12 01:07:54'),
(108, '127.0.0.1', 'visitor', 'profil', '2019-11-12 01:08:29', '2019-11-12 01:08:29'),
(109, '127.0.0.1', 'visitor', 'profil', '2019-11-12 01:08:53', '2019-11-12 01:08:53'),
(110, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:17:55', '2019-11-12 01:17:55'),
(111, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:19:01', '2019-11-12 01:19:01'),
(112, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:19:07', '2019-11-12 01:19:07'),
(113, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:19:08', '2019-11-12 01:19:08'),
(114, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:19:33', '2019-11-12 01:19:33'),
(115, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:19:46', '2019-11-12 01:19:46'),
(116, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:20:14', '2019-11-12 01:20:14'),
(117, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:22:01', '2019-11-12 01:22:01'),
(118, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:22:47', '2019-11-12 01:22:47'),
(119, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:23:16', '2019-11-12 01:23:16'),
(120, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:23:16', '2019-11-12 01:23:16'),
(121, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:23:17', '2019-11-12 01:23:17'),
(122, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:23:17', '2019-11-12 01:23:17'),
(123, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:23:18', '2019-11-12 01:23:18'),
(124, '10.20.30.103', 'visitor', 'galeri', '2019-11-12 01:24:02', '2019-11-12 01:24:02'),
(125, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:24:20', '2019-11-12 01:24:20'),
(126, '10.20.30.103', 'visitor', 'profil', '2019-11-12 01:24:57', '2019-11-12 01:24:57'),
(127, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:25:01', '2019-11-12 01:25:01'),
(128, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:25:31', '2019-11-12 01:25:31'),
(129, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:25:55', '2019-11-12 01:25:55'),
(130, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:26:35', '2019-11-12 01:26:35'),
(131, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:26:53', '2019-11-12 01:26:53'),
(132, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:27:14', '2019-11-12 01:27:14'),
(133, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:28:02', '2019-11-12 01:28:02'),
(134, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:29:20', '2019-11-12 01:29:20'),
(135, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:36:49', '2019-11-12 01:36:49'),
(136, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:38:36', '2019-11-12 01:38:36'),
(137, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:39:09', '2019-11-12 01:39:09'),
(138, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:39:54', '2019-11-12 01:39:54'),
(139, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:40:29', '2019-11-12 01:40:29'),
(140, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:40:50', '2019-11-12 01:40:50'),
(141, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:42:20', '2019-11-12 01:42:20'),
(142, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 01:43:51', '2019-11-12 01:43:51'),
(143, '127.0.0.1', 'visitor', 'profil', '2019-11-12 01:53:36', '2019-11-12 01:53:36'),
(144, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:09', '2019-11-12 01:55:09'),
(145, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:09', '2019-11-12 01:55:09'),
(146, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:11', '2019-11-12 01:55:11'),
(147, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:16', '2019-11-12 01:55:16'),
(148, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:19', '2019-11-12 01:55:19'),
(149, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:23', '2019-11-12 01:55:23'),
(150, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:29', '2019-11-12 01:55:29'),
(151, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:38', '2019-11-12 01:55:38'),
(152, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:40', '2019-11-12 01:55:40'),
(153, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:42', '2019-11-12 01:55:42'),
(154, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:44', '2019-11-12 01:55:44'),
(155, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:55:52', '2019-11-12 01:55:52'),
(156, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:06', '2019-11-12 01:56:06'),
(157, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:08', '2019-11-12 01:56:08'),
(158, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:10', '2019-11-12 01:56:10'),
(159, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:15', '2019-11-12 01:56:15'),
(160, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:21', '2019-11-12 01:56:21'),
(161, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:27', '2019-11-12 01:56:27'),
(162, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:28', '2019-11-12 01:56:28'),
(163, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:31', '2019-11-12 01:56:31'),
(164, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:34', '2019-11-12 01:56:34'),
(165, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:42', '2019-11-12 01:56:42'),
(166, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:46', '2019-11-12 01:56:46'),
(167, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:49', '2019-11-12 01:56:49'),
(168, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:51', '2019-11-12 01:56:51'),
(169, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:56:57', '2019-11-12 01:56:57'),
(170, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:08', '2019-11-12 01:57:08'),
(171, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:14', '2019-11-12 01:57:14'),
(172, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:19', '2019-11-12 01:57:19'),
(173, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:20', '2019-11-12 01:57:20'),
(174, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:25', '2019-11-12 01:57:25'),
(175, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:26', '2019-11-12 01:57:26'),
(176, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:30', '2019-11-12 01:57:30'),
(177, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:32', '2019-11-12 01:57:32'),
(178, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 01:57:37', '2019-11-12 01:57:37'),
(179, '127.0.0.1', 'visitor', 'profil', '2019-11-12 01:58:29', '2019-11-12 01:58:29'),
(180, '127.0.0.1', 'visitor', 'profil', '2019-11-12 02:01:07', '2019-11-12 02:01:07'),
(181, '127.0.0.1', 'visitor', 'profil', '2019-11-12 02:01:39', '2019-11-12 02:01:39'),
(182, '127.0.0.1', 'visitor', 'profil', '2019-11-12 02:02:51', '2019-11-12 02:02:51'),
(183, '10.20.30.103', 'visitor', 'dashboard', '2019-11-12 02:15:59', '2019-11-12 02:15:59'),
(184, '10.20.30.103', 'visitor', 'profil', '2019-11-12 02:16:56', '2019-11-12 02:16:56'),
(185, '10.20.30.103', 'visitor', 'profil', '2019-11-12 02:17:46', '2019-11-12 02:17:46'),
(186, '127.0.0.1', 'visitor', 'dashboard', '2019-11-12 02:23:40', '2019-11-12 02:23:40'),
(187, '127.0.0.1', 'visitor', 'profil', '2019-11-12 02:23:53', '2019-11-12 02:23:53'),
(188, '127.0.0.1', 'visitor', 'profil', '2019-11-12 02:25:49', '2019-11-12 02:25:49'),
(189, '127.0.0.1', 'visitor', 'profil', '2019-11-12 02:32:49', '2019-11-12 02:32:49'),
(190, '10.20.30.103', 'visitor', 'profil', '2019-11-12 02:43:01', '2019-11-12 02:43:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_19_034306_create_agendas_table', 2),
(5, '2019_10_21_033455_create_profils_table', 4),
(6, '2019_10_21_064716_create_pembangunan_hutans_table', 5),
(7, '2019_10_22_013558_create_phbms_table', 6),
(8, '2019_10_22_035505_create_sliders_table', 7),
(9, '2019_10_22_072913_create_galeris_table', 8),
(10, '2019_10_23_012004_create_hutan_rakyats_table', 9),
(11, '2019_10_23_035540_create_peraturan_perundangans_table', 10),
(12, '2019_10_23_063636_create_objek_wisata_alams_table', 11),
(13, '2019_10_24_025044_create_kategori_beritas_table', 12),
(14, '2019_10_24_025337_create_beritas_table', 12),
(15, '2019_10_24_061731_create_link_layanans_table', 13),
(16, '2019_10_24_070029_create_link_informasis_table', 14),
(17, '2019_10_25_012721_create_data_statistikas_table', 15),
(18, '2019_10_25_020059_create_sakips_table', 16),
(19, '2019_10_25_075118_create_renstra_strategis_table', 17),
(20, '2019_10_25_085013_create_rencana_kerjas_table', 18),
(21, '2019_10_28_014308_create_produks_table', 19),
(22, '2019_10_28_014414_create_contact_us_table', 20),
(23, '2019_10_28_032318_create_pps_jatims_table', 21),
(24, '2019_10_28_085855_create_instansi_kehutanans_table', 22),
(25, '2019_10_31_094018_create_download_materis_table', 23),
(26, '2019_11_04_035851_create_lkjips_table', 24),
(27, '2019_11_07_034022_create_logs_table', 25),
(28, '2019_11_08_063303_create_struktur_organisasi2s_table', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `objek_wisata_alams`
--

CREATE TABLE `objek_wisata_alams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `objek_wisata_alams`
--

INSERT INTO `objek_wisata_alams` (`id`, `title`, `deskripsi`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Wisata Gunung Baung', '<p>Taman Wisata Alam [TWA] Gunung Baung terletak di Desa Cowek, Kecamatan Purwosari, Kabupaten Pasuruan, Propinsi Jawa Timur.Gunung Baung yang berdampingan dengan Kebun Raya Purwodadi ini mempunyai keanekaragaman hayati dan keindahan alam.&nbsp;</p>\r\n\r\n<p>&nbsp;<br />\r\nDi kawasan ini &nbsp;berbagai sarana dan prasarana untuk aktifitas wisata alam sekaligus pendidikan diadakan, seperti pendidikan Sumber Daya Alam (SDA), konservasi lingkungan hidup, inventarisasi flora dan fauna, praktek teknologi ramah lingkungan, kegiatan wisata petualangan, serta wahana kegiatan alam terbuka.<br />\r\n&nbsp;<br />\r\nUntuk menuju lokasi, &nbsp;bisa dengan kendaraan umum maupun kendaraan pribadi, karena berada di tepi jalan raya Surabaya &ndash; Malang, tepatnya di belakang Kebun Raya Purwodadi. Secara tepatnya lokasi ini berbatasan Desa Kertasari Kecamatan Purwosari di utara, sebelah timur Desa Lebakrejo Kecamatan Purwodadi, di selatan berbatasan dengan Desa Cowek Kecamatan Purwosari, dan di sebelah Barat berbatasan dengan Kebun Raya Purwodadi.<br />\r\n&nbsp;<br />\r\nMengunjungi Taman Wisata Alam ini bisa beragam hal dinikmati dan dijamin akan terpuaskan, terutama bagi mereka yang gemar berpetualang dialam bebas, menjelajah hutan [hiking], berkemah [camping], serta kegiatan alam terbuka lainnya. Dengan topografi di kawasan ini bergelombang sampai berbukit, hanya sebagian kecil bertopografi landai dan curam dengan puncak tertinggi Gunung Baung [501 mdpl] dan terendah 250 m di atas permukaan laut.<br />\r\n&nbsp;<br />\r\nKawasan TWA Gunung Baung memiliki hutan tropis dataran rendah yang menyimpan keanekaragaman hayati yang masih alami. Salah satunya yang paling unik adalah kawasan komunitas hutan bambu. Selain itu juga terdapat pohon beringin (Ficus benyamina), walikukun (Scoutenis ovata), dan saga (Abrus precatorius) yang turut menghiasi hutan tropis yang ada.&nbsp;<br />\r\n&nbsp;<br />\r\nPanorama alam yang asri dan sejuk dengan latar belakang dua buah gunung, serta Kebun Raya Purwodadi turut melengkapi keindahan kawasan TWA Gunung Baung. Keindahan alam pegunungan tersebut bisa dinikmati pengunjung melalui menara pandang yang memeiliki tower dan teleskop pengindra.&nbsp;<br />\r\n&nbsp;<br />\r\nTidak hanya itu jika ingin menantang diri dengan menyusur sungai bisa dilakukan disini. &nbsp;Karena di kawasan TWA Gunung Baung terdapat dua sungai permanen yang terus mengalir sepanjang tahun, yaitu Sungai Welang dan Sungai Beji.&nbsp;<br />\r\n&nbsp;<br />\r\nUntuk menyeberangi Sungai Welang, di bagian hulu terdapat jembatan layang yang membentang di atas sungai. Kedua aliran sungai tersebut dapat digunakan untuk sarana air bersih dan irigasi, pembangkit energi, memancing, atau kegiatan susur sungai [fun-rafting &amp; river boat].&nbsp;<br />\r\n&nbsp;<br />\r\nKegiatan susur sungai menggunakan perahu karet dengan memanfaatkan batuan sungai sebagai lintasan / track. Selama melakukan pengarungan, pengunjung juga dapat menonton aksi kelelawar besar yang bertengger di pohon pada musim tertentu.&nbsp;<br />\r\n&nbsp;<br />\r\nSatu loaksi yang menjadi primadonanya adalah air terjun Coban Baung dengan ketinggian &plusmn; 100 m. Air terjun ini merupakan pertemuan dua aliran sungai, yaitu Sungai Welang dan Sungai Beji. Tebing-tebing yang tinggi di sekitar Coban Baung juga bakal menambah keindahan tempat ini. Selain air terjun Coban Baung, di sisi timur TWA Gunung Baung juga terdapat empat air terjun dengan ketinggian 10 &ndash; 20 meter yang terletak di sepanjang aliran Sungai Beji. Keindahannya juga tidak kalah dengan air terjun Coban Baung.<br />\r\n&nbsp;<br />\r\nJika ingin lebih berlama-lama di &nbsp;lokasi ini dengan tidak meninggalkan hobi yang kini lagi digadrungi adalah berselancar di dunia maya (internet) di Pusat Pendidikan Konservasi SDA di TWA Baung Camp bisa dilakukan. Karena dilengkapi fasilitas &quot;HOTSPOT&quot;. Cakupan areal &quot;HOTSPOT&quot; Baung Camp meliput sekitar 2 km2, sehingga beberapa desa di sekitar Baung Camp dapat memanfaatkan fasilitas &quot;HOTSPOT&quot; Baung Camp ini.<br />\r\n&nbsp;</p>', '572717570.jpg', '2019-10-22 23:55:45', '2019-10-22 23:57:10'),
(2, 'Wisata Blauran', '<p>Taman Nasional Baluran merupakan perwakilan ekosistem hutan yang spesifik kering di Pulau Jawa, terdiri dari tipe vegetasi savana, hutan mangrove, hutan musim, hutan pantai, hutan pegunungan bawah, hutan rawa dan hutan yang selalu hijau sepanjang tahun. Sekitar 40 persen tipe vegetasi savana mendominasi kawasan Taman Nasional Baluran.</p>\r\n\r\n<p>Tumbuhan yang ada di taman nasional ini sebanyak 444 jenis, diantaranya terdapat tumbuhan asli yang khas dan menarik yaitu widoro bukol (Ziziphus rotundifolia), mimba (Azadirachta indica), dan pilang (Acacia leucophloea). Widoro bukol, mimba, dan pilang merupakan tumbuhan yang mampu beradaptasi dalam kondisi yang sangat kering (masih kelihatan hijau), walaupun tumbuhan lainnya sudah layu dan mengering.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tumbuhan yang lain seperti asam (Tamarindus indica), gadung (Dioscorea hispida), kemiri (Aleurites moluccana), gebang (Corypha utan), api-api (Avicennia sp.), kendal (Cordia obliqua), manting (Syzygium polyanthum), dan kepuh (Sterculia foetida).</p>\r\n\r\n<p>Terdapat 26 jenis mamalia diantaranya banteng (Bos javanicus javanicus), kerbau liar (Bubalus bubalis), ajag (Cuon alpinus javanicus), kijang (Muntiacus muntjak muntjak), rusa (Cervus timorensis russa), macan tutul (Panthera pardus melas), kancil (Tragulus javanicus pelandoc), dan kucing bakau (Prionailurus viverrinus).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Satwa banteng merupakan maskot/ciri khas dari Taman Nasional Baluran .</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://dishut.jatimprov.go.id/imagefck/image/banteng.jpg\" style=\"float:left; height:133px; width:200px\" />Selain itu, terdapat sekitar 155 jenis burung diantaranya termasuk yang langka seperti layang-layang api (Hirundo rustica), tuwuk/tuwur asia (Eudynamys scolopacea), burung merak (Pavo muticus), ayam hutan merah (Gallus gallus), kangkareng (Anthracoceros convecus), rangkong (Buceros rhinoceros), dan bangau tong-tong (Leptoptilos javanicus).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pada Hm. 80 Batangan &ndash; Bekol , terdapat sumur tua yang menjadi legenda masyarakat sekitar. Legenda tersebut menceritakan bahwa kota Banyuwangi, Bali dan Baluran sama-sama menggali sumur. Apabila, sumur di masing-masing kota tersebut lebih dahulu mengeluarkan air dan mengibarkan bendera, berarti kota tersebut akan merupakan sentral keramaian/ kebudayaan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Beberapa lokasi/obyek yang menarik untuk dikunjungi &nbsp;:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Batangan</strong></p>\r\n\r\n<p>Melihat peninggalan sejarah/situs berupa goa Jepang, makam putra Maulana Malik Ibrahim, atraksi tarian burung merak pada musim kawin antara bulan Oktober/November dan berkemah.</p>\r\n\r\n<p><strong>Fasilitas</strong>: pusat informasi dan bumi perkemahan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Bekol dan Semiang</strong></p>\r\n\r\n<p>Pengamatan satwa seperti ayam hutan, merak, rusa, kijang, banteng, kerbau liar, burung.</p>\r\n\r\n<p><strong>Fasilitas yang ada</strong>&nbsp;: wisma peneliti, wisma tamu, menara pandang.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Bama, Balanan, Bilik</strong></p>\r\n\r\n<p>Wisata bahari, memancing, menyelam/snorkeling, dan perkelahian antara rusa jantan pada bulan Juli/Agustus; dan sekawanan kera abu-abu yang memancing kepiting/rajungan dengan ekornya pada saat air laut surut.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Manting, Air Kacip</strong></p>\r\n\r\n<p>Sumber air yang tidak pernah kering sepanjang tahun, habitat macan tutul .</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Popongan, Sejile, Sirontoh, Kalitopo</strong></p>\r\n\r\n<p>Bersampan di laut yang tenang, melihat berbagai jenis ikan hias, pengamatan burung migran.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Curah Tangis</strong></p>\r\n\r\n<p>Kegiatan panjat tebing setinggi 10-30 meter, dengan kemiringan sampai 85%.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Candi Bang, Labuan Merak, Kramat</strong></p>\r\n\r\n<p>Wisata budaya.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Musim kunjungan terbaik :</strong></p>\r\n\r\n<p>bulan Maret s/d Agustus setiap tahunnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Cara pencapaian lokasi :</strong></p>\r\n\r\n<p>Banyuwangi-Batangan dengan jarak 35 km, yang dilanjutkan ke Bekol dengan waktu 45 menit (12 km) atau Situbondo-Batangan dengan jarak 60 km menggunakan mobil.&nbsp;</p>', '796892731.jpg', '2019-10-31 23:38:25', '2019-11-01 00:04:06'),
(3, 'Hutan Joyoboyo', '<p>Taman Hutan Joyoboyo dulunya sangat tak terawat dan kumuh. Namun, setelah disulap menjadi taman wisata hutan, destinasi ini menjadi diminati oleh masyarakat. Wisata hutan tersebut menjadi bersih dan nyaman untuk dikunjungi.</p>\r\n\r\n<p>Joyoboyo yang terletak di jantung kota Kediri ini selalu ramai pengunjung. Saat weekend dan hari libur pun wisata ini salalu padat. Tak hanya anak muda, karyawan hingga orang tua mengajak anak-anaknya untuk menghabiskan waktu luang di hutan Joyoboyo.</p>', '1147335303.jpg', '2019-10-31 23:42:51', '2019-10-31 23:42:51'),
(4, 'Hutan De Djawatan', '<p>Sebuah hutan bernama De Djawatan di Banyuwangi Jawa Timur disulap menjadi spot foto yang kekinian dan keren. Awalnya di hutan ini terdapat bangunan yang digunakan sebagai tempat pengelolaan kereta api.</p>\r\n\r\n<p>Namun, kini hutan yang berisi pohon trembesi tersebut sudah berganti fungsi menjadi destinasi wisata yang Instagramable. Banyak pengunjung yang menyebut hutan tersebut seperti pada film Lord of The Rings.</p>\r\n\r\n<p>Hutan De Djawatan biasanya ramai dikunjungi pada sore hari, ketika cahaya matahari samar-samar menelusup di rimbunnya pepohonan di hutan. Wisata hutan ini dipercantik dengan pernak-pernik ala wisata hits seperti payung warna-warni dan papan nama.</p>', '589958101.jpg', '2019-10-31 23:44:10', '2019-10-31 23:44:10'),
(5, 'Hutan Pinus Gogoniti', '<p>Hutan Pinus Gogoniti terletak di Kelurahan Kemirigede, Kecamatan Kesamben, Blitar, Jawa Timur. Wisata hutan yang dibuka sejak pertengahan 2017 ini menjadi salah satu wisata alam dengan banyak spot foto Instagramable. Mulai dari gembok cinta, rumah pohon dan masih banyak lagi.</p>\r\n\r\n<p>Hutan Gogoniti terkenal rindang, jadi saat berada di sana kamu akan disuguhkan dengan hawa sejuk dan suasana asri. Wisata ini sangat cocok digunakan sebagai tempat relaksasi diri ketika masuki liburan. Menghabiskan waktu liburan bersama keindahan alam akan lebih berkesan dan menyenangkan.</p>', '994288427.jpg', '2019-10-31 23:44:51', '2019-10-31 23:44:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembangunan_hutans`
--

CREATE TABLE `pembangunan_hutans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembangunan_hutans`
--

INSERT INTO `pembangunan_hutans` (`id`, `title`, `deskripsi`, `images`, `created_at`, `updated_at`) VALUES
(1, 'TUJUAN UMUM PEMBANGUNAN', '<p>.: TUJUAN UMUM PEMBANGUNAN</p>\r\n\r\n<p>Dalam RPJMD Misi mewujudkan Makmur bersama Wong Cilik melalui APBD untuk Rakyat bertujuan meningkatkan kesejahteraan dan kemakmuran bersama seluruh rakyat Jawa Timur. Pembangunan Jawa Timur diarahkan untuk&nbsp;<em><strong>agawe wong cilik bisa melu gemuyu</strong></em>.<br />\r\n<br />\r\nMasyarakat yang berdomisili di sekitar hutan adalah potret dari masyarakat &ldquo;Wong Cilik&rdquo; yang selama ini termarginalisasi, sehingga kondisi sosial ekonomi mereka jauh dari berkecukupan. Banyak dari mereka yang menggantungkan sumber penghasilannya dari keberadaan sumber daya hutan, baik sebagai petani pesanggem, maupun pencari daun Jati dan perencek kayu bakar. Selama ini akses mereka terhadap sumber daya hutan, sangat kurang karena keterbatasan kemudahan yang mereka terima dari pengelola hutan atau pemangku kawasan.</p>', '1873594538.jpg', '2019-10-21 00:03:19', '2019-10-24 20:11:04'),
(2, 'KEGIATAN PEMBANGUNAN', '<p>.: Kegiatan Pembangunan</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Untuk mengimplementasikan kebijakan yang telah dirumuskan dalam dokumen RPJMD Provinsi Jawa Timur Tahun 2014-2019, Dinas Kehutanan Provinsi Jawa Timur telah menyusun program dan kegiatan pembangunan dalam pengelolaan hutan dan lahan tahun 2014-2019&nbsp;sebagai berikut:</p>\r\n\r\n<p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program pelayanan administrasi perkantoran.</p>\r\n\r\n<p>Dengan kegiatan :</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelaksanaan&nbsp;Administrasi&nbsp;Perkantoran.</p>\r\n\r\n<p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program&nbsp;Peningkatan&nbsp;Sarana dan&nbsp;Prasarana&nbsp;Aparatur.</p>\r\n\r\n<p>Kegiatan berupa :</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penyediaan&nbsp;Peralatan dan&nbsp;Kelengkapan&nbsp;Sarana&nbsp;dan Prasarana.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemeliharaan&nbsp;Peralatan dan&nbsp;Kelengkapan&nbsp;Sarana&nbsp;dan Prasarana.</p>\r\n\r\n<p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program&nbsp;Peningkatan&nbsp;Kapasitas&nbsp;Kelembagaan&nbsp;Pemerintah&nbsp;Daerah.</p>\r\n\r\n<p>Kegiatan berupa :</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peningkatan&nbsp;Kapasitas&nbsp;Sumberdaya&nbsp;Aparatur.</p>\r\n\r\n<p>4.&nbsp;&nbsp;&nbsp;&nbsp;Program&nbsp;Penyusunan,&nbsp;Pengendalian dan&nbsp;Evaluasi&nbsp;Dokumen&nbsp;Penyelenggaraan&nbsp;Pemerintahan.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kegiatan berupa :</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penyusunan&nbsp;Dokumen&nbsp;Perencanaan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penyusunan&nbsp;Laporan&nbsp;Hasil&nbsp;Pelaksanaan&nbsp;Rencana&nbsp;Program dan&nbsp;Anggaran.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penyusunan,&nbsp;Pengembangan,&nbsp;Pemeliharaan dan&nbsp;Pelaksanaan&nbsp;Sistem&nbsp;Informasi&nbsp;Data.</p>\r\n\r\n<p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program&nbsp;Pemanfaatan&nbsp;Potensi&nbsp;Sumber&nbsp;Daya&nbsp;Hutan.</p>\r\n\r\n<p>Kegiatan berupa :</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monitoring, Evaluasi dan Pelaporan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peningkatan Kerjasama Antar Daerah.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pengembangan Hutan Rakyat dan Pemanfaatan Lahan di Bawah Tegakan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemberdayaan UPT Peredaran Hasil Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;APP Bidang Kehutanan.</p>\r\n\r\n<p>-&nbsp;Peningkatan Partisipasi Masyarakat melalui Pengelolaan Hutan Bersama Masyarakat (PHBM).</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fasilitasi&nbsp;Ekolabeling&nbsp;Hutan&nbsp;Rakyat.</p>\r\n\r\n<p>-&nbsp;&nbsp;Pendidikan Kemasyarakatan Produktif dalam rangka Mendukung Pelatihan Masyarakat Desa Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peningkatan dan Pengembangan Kelembagaan Kelompok.</p>\r\n\r\n<p>-&nbsp;&nbsp;Pendidikan Kemasyarakatan Produktif dalam Mendukung Manajemen dan Pemasaran Pasca Produk Hasil Hutan Masyarakat Sekitar Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemberdayaan dan Pengembangan UPT Perbenihan Tanaman Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembinaan dan Pengendalian Produksi Hasil Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penatausahaan Hasil Hutan dan Pengawasan Pungutan Iuran Kehutanan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembinaan dan Pengawasan Industri Hasil Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peningkatan SDM Kehutanan dalam rangka Pengelolaan Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;Pengembangan Perhutanan Sosial (Pengembangan Aneka Usaha Kehutanan dan Kemitraan).</p>\r\n\r\n<p>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program&nbsp;Perlindungan dan&nbsp;Konservasi&nbsp;Sumber&nbsp;Daya&nbsp;Hutan.</p>\r\n\r\n<p>Kegiatan berupa :</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Pelestarian dan Penataan Kawasan Tahura R. Soerjo.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Operasi Perlindungan dan Pengamanan Hutan (DAK).</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Pemantapan dan Pemantauan Status Kawasan Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Perlindungan Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Konservasi Ekosistem Sumberdaya Hutan.</p>\r\n\r\n<p>&nbsp;&nbsp;7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program rehabilitasi sumberdaya hutan &nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kegiatan berupa :</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; -&nbsp;&nbsp;Pengawasan Kegiatan Rehabilitasi Hutan dan Lahan serta Reklamasi di Dalam dan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Luar Hutan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Peningkatan Peran serta Masyarakat dalam Rehabilitasi Hutan dan Lahan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Rehabilitasi Hutan dan Lahan (Penanaman di sekitar Sumber Air, Penghijauan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lingkungan, Rehabilitasi Mangrove dan Pantai).</p>', '871299247.jpg', '2019-10-21 00:05:54', '2019-10-24 20:11:20'),
(3, 'NAWA BHAKTI SATYA', '<p>.: VISI dan MISI</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dinas Kehutanan Provinsi Jawa Timur juga berkontribusi dalam mendukung visi dan misi Gubernur Jawa Timur terpilih &nbsp;dalam upaya peningkatan kemakmuran&nbsp;&nbsp;serta&nbsp;kemajuan masyarakat Jawa Timur&nbsp;yang telah dituangkan dalam Rencana Pembangunan Jangka Menengah Daerah (RPJMD) Jawa Timur Tahun 2014-2019 terutama pada misi yang kedua dan ketiga yaitu<strong>&nbsp;:&nbsp;</strong>Meningkatkan pembangunan ekonomi yang inklusif,&nbsp;mandiri, dan berdaya saing, berbasis agrobisnis/agroindustri, dan industrialisasi; dan&nbsp;Meningkatkan pembangunan yang berkelanjutan, dan penataan ruang.</p>\r\n\r\n<p><strong>&nbsp;</strong>Untuk mewujudkan pembangunan kehutanan yang optimal, lestari dan berkelanjutan di Provinsi Jawa Timur bagi sebesar-besarnya kemakmuran dan kesejahteraan masyarakat, telah ditetapkan visi pembangunan kehutanan Jawa Timur&nbsp; yang tertuang dalam renstra Dinas Kehutanan yaitu<strong>&nbsp;</strong>:</p>\r\n\r\n<p>&ldquo;Terwujudnya kelestarian hutan untuk kesejahteraan masyarakat&rdquo;.</p>\r\n\r\n<p>Untuk mencapai visi tersebut, maka disusun misi Dinas Kehutanan Provinsi Jawa Timur yaitu :</p>\r\n\r\n<p>&ldquo;Optimalisasi pengelolaan hutan lestari&rdquo;</p>', '1623224199.jpg', '2019-10-21 00:07:11', '2019-10-29 01:15:34'),
(4, 'KEBIJAKAN STRATEGI', '<p>.: Kebijakan Strategi</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Untuk mewujudkan visi, dan menjalankan misi pembangunan kehutanan Jawa Timur Tahun 2014-2019, dilakukan melalui&nbsp;dua&nbsp;strategi pokok pembangunan:</p>\r\n\r\n<p>1.&nbsp;&nbsp;Perluasan areal hutan rakyat, pemanfaatan lahan di bawah tegakan sekitar hutan melalui pengembangan usaha non kayu di kawasan hutan.</p>\r\n\r\n<p>2.&nbsp;&nbsp;Peningkatan pengamanan hutan melalui operasi gabungan dan pengamanan swakarsa masyarakat serta upaya rehabilitasi dan rekonstruksi lingkungan hidup khususnya kawasan hutan.</p>\r\n\r\n<p>Pembangunan kehutanan yang berpusat pada masyarakat desa disekitar hutan menempatkan individu sebagai subyek pelaku yang menetapkan tujuan, mengendalikan sumber daya disekitar hutan dan lahan. Pembangunan kehutanan yang berpusat pada masyarakat desa hutan melalui penguatan kelembagaan yang ada, merupakan bentuk&nbsp;&nbsp;penghargaan atas kehendak dan kepentingan masyarakat setempat dengan memperhatikan dan mempertimbangkan, prakarsa, kreativitas, serta kearifan lokal. Prakarsa, kreativitas masyarakat desa hutan, dan kearifan lokal merupakan sumber daya pembangunan kehutanan utama, yang diarahkan pada upaya pencapaian kesejahteraan material dan spiritual masyarakat desa sekitar hutan.</p>\r\n\r\n<p>Adapun arah kebijakan Dinas Kehutanan Provinsi Jawa Timur terdiri atas :</p>\r\n\r\n<p>1.&nbsp;&nbsp;Program Pelayanan Administrasi Perkantoran,&nbsp;&nbsp;meliputi :</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelaksanaan Administrasi Perkantoran.</p>\r\n\r\n<p>2.&nbsp;&nbsp;Program Peningkatan Sarana dan Prasarana Aparatur,&nbsp;&nbsp;meliputi :</p>\r\n\r\n<p>a.&nbsp;&nbsp;&nbsp;&nbsp;Penyediaan&nbsp;Peralatan dan&nbsp;Kelengkapan Sarana&nbsp;dan Prasarana.</p>\r\n\r\n<p>b.&nbsp;Pemeliharaan Peralatan dan&nbsp;Kelengkapan Sarana&nbsp;dan Prasarana.</p>\r\n\r\n<p>3.&nbsp;&nbsp;Program Peningkatan Kapasitas Kelembagaan Pemerintah Daerah,&nbsp;yaitu:</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;Peningkatan Kapasitas Sumber Daya Aparatur.</p>\r\n\r\n<p>4.&nbsp;&nbsp;Program Penyusunan Pengendalian dan Evaluasi Dokumen Penyelenggaraan Pemerintah,&nbsp;&nbsp;meliputi :</p>\r\n\r\n<p>a.&nbsp;&nbsp;Penyusunan Dokumen Perencanaan.</p>\r\n\r\n<p>b.&nbsp;&nbsp;Penyusunan Laporan Hasil Pelaksanaan Rencana Program dan Anggaran.</p>\r\n\r\n<p>c.&nbsp;Penyusunan, Pengembangan, Pemeliharaan dan Pelaksanaan Sistem Informasi Data.</p>\r\n\r\n<p>5.&nbsp;&nbsp;&nbsp;&nbsp;Program Pemanfaatan Potensi Sumberdaya Hutan, meliputi :</p>\r\n\r\n<p>a.&nbsp;&nbsp;&nbsp;&nbsp;Monitoring dan evaluasi pembangunan kehutanan Jawa Timur.</p>\r\n\r\n<p>b.&nbsp;&nbsp;&nbsp;&nbsp;Peningkatan Kerjasama Antar Daerah.</p>\r\n\r\n<p>c.&nbsp;Pengembangan Hutan Rakyat dan Pemanfaatan Lahan di Bawah Tegakan.</p>\r\n\r\n<p>d.&nbsp;&nbsp;&nbsp;&nbsp;Pemberdayaan UPT Peredaran Hasil Hutan.</p>\r\n\r\n<p>e.&nbsp;&nbsp;&nbsp;&nbsp;APP Bidang Kehutanan.</p>\r\n\r\n<p>f.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peningkatan partisipasi masyarakat melalui Pengelolaan Hutan Bersama Masyarakat (PHBM).</p>\r\n\r\n<p>g.&nbsp;&nbsp;&nbsp;&nbsp;Fasilitasi&nbsp;Ekolabeling&nbsp;Htan&nbsp;Rakyat.</p>\r\n\r\n<p>h.&nbsp;Pendidikan Kemasyarakatan Produktif dalam rangka Mendukung Pelatihan Masyarakat Desa Hutan.</p>\r\n\r\n<p>i.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peningkatan dan Pengembangan Kelembagaan Kelompok.</p>\r\n\r\n<p>j.&nbsp;Pendidikan Kemasyarakatan Produktif dalam mendukung manajemen dan Pemasaran Pasca Produk Hasil Hutan Masyarakat Sekitar Hutan.</p>\r\n\r\n<p>k.&nbsp;&nbsp;&nbsp;&nbsp;Pemberdayaan dan Pengembangan UPT Perbenihan Tanaman Hutan.</p>\r\n\r\n<p>l.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembinaan dan Pengendalian Produksi Hasil Hutan.</p>\r\n\r\n<p>m.&nbsp;&nbsp;Penatausahaan Hasil Hutan dan Pengawasan Pungutan Iuran Kehutanan.</p>\r\n\r\n<p>n.&nbsp;&nbsp;&nbsp;&nbsp;Pembinaan dan Pengawasan Industri Hasil Hutan.</p>\r\n\r\n<p>o.&nbsp;&nbsp;&nbsp;Peningkatan SDM Kehutanan dalam rangka Pengelolaan Hutan.</p>\r\n\r\n<p>p.&nbsp;Pengembangan Perhutanan Sosial (Pengembangan Aneka Usaha Kehutanan dan Kemitraan).</p>\r\n\r\n<p>6.&nbsp;&nbsp;Program Perlindungan dan Konservasi Sumberdaya Hutan, meliputi :</p>\r\n\r\n<p>a.&nbsp;&nbsp;&nbsp;&nbsp;Pelestarian dan Penataan Kawasan Tahura R. Soerjo.</p>\r\n\r\n<p>b.&nbsp;&nbsp;&nbsp;&nbsp;Operasi Perlindungan dan Pengamanan Hutan (DAK).</p>\r\n\r\n<p>c.&nbsp;&nbsp;&nbsp;&nbsp;Pemantapan dan Pemantauan Status Kawasan Hutan</p>\r\n\r\n<p>d.&nbsp;&nbsp;&nbsp;&nbsp;Perlindungan Hutan</p>\r\n\r\n<p>e.&nbsp;&nbsp;&nbsp;&nbsp;Konservasi Ekosistem Sumberdaya Hutan.</p>\r\n\r\n<p>7.&nbsp;&nbsp;&nbsp;&nbsp;Program Rehabilitasi Sumberdaya Hutan, meliputi :</p>\r\n\r\n<p>a.&nbsp;&nbsp;Pengawasan Kegiatan Rehabilitasi Hutan dan Lahan serta Reklamasi di Dalam dan Luar Hutan.</p>\r\n\r\n<p>b.&nbsp;&nbsp;&nbsp;&nbsp;Peningkatan Peran serta Masyarakat dalam Rehabilitasi Hutan dan Lahan.</p>\r\n\r\n<p>c.&nbsp;&nbsp;&nbsp;&nbsp;Rehabilitasi Hutan dan Lahan (Penanaman di sekitar Sumber Air, Penghijauan Lingkungan, Rehabilitasi Mangrove dan Pantai).</p>', '154391435.jpg', '2019-10-21 00:08:18', '2019-10-24 20:12:14'),
(5, 'AGENDA PRIORITAS', '<p>.: Agenda Prioritass</p>\r\n\r\n<p>Berdasarkan visi, misi, tujuan dan sasaran, dan strategi pembangunan kehutanan, maka disusun dua agenda utama pembangunan kehutanan daerah Jawa Timur 2009-2014, sebagai berikut:<br />\r\n1. Agenda pertama: meningkatkan percepatan pemerataan pembangunan dan pertumbuhan ekonomi bidang kehutanan yang berkualitas dan berkelanjutan, terutama melalui pengembangan agroindustri/agrobisnis bidang kehutanan, serta pembangunan dan perbaikan infrastruktur terutama pertanian dan pedesaan, dengan sub Agenda : Revitalisasi Pertanian dan Pengembangan Agroindustri/ Agrobisnis, dengan program: Optimalisasi Pemanfaatan dan Pengembangan Potensi Sumberdaya Kehutanan.<br />\r\n2. Agenda kedua: memelihara kualitas dan fungsi lingkungan hidup dan sumber daya hutan dan lahan, serta meningkatkan perbaikan pengelolaan sumber daya alam, hutan dan lahan, dalam rangka pemantapan kawasan hutan / penataan ruang; dengan sub Agenda: memelihara kualitas dan fungsi lingkungan hidup dan sumber daya hutan dan lahan, serta meningkatkan perbaikan pengelolaan sumber daya alam, hutan dan lahan.<br />\r\n<br />\r\nBerdasarkan agenda utama pembangunan kehutanan daerah Jawa Timur Tahun 2009-2014 yang telah diuraikan sebelumnya, maka disusunlah prioritas kegiatan pembangunan kehutanan� sebagai berikut:<br />\r\n1. Peningkatan Aksesibilitas dan Kualitas Pengelolaan Hutan dan Lahan.<br />\r\n2. Perluasan Lapangan Kerja Bidang Kehutanan.<br />\r\n3. Peningkatan Efektivitas Penanggulangan Kemiskinan.<br />\r\n4. Peningkatan Kesejahteraan Sosial Masyarakat Sekitar Hutan.<br />\r\n5. Revitalisasi Kehutanan dan Pengembangan Agroindustri/ Agrobisnis Bidang Kehutanan.<br />\r\n6. Pemberdayaan Koperasi, Usaha Mikro, Kecil, dan Menengah Bidang Kehutanan.<br />\r\n7. Peningkatan Investasi, Daya Saing Industri Manufaktur Bidang Kehutanan.<br />\r\n8. Pemeliharaan Kualitas dan Fungsi Sumberdaya Alam, Hutan dan Lahan, serta Perbaikan Pengelolaan Sumber Daya Alam, dan Penatagunaan Hutan dan Lahan.<br />\r\n9. Percepatan Pelaksanaan Reformasi Birokrasi, dan Peningkatan Pelayanan Publik bidang kehutanan.<br />\r\n&nbsp;</p>', '844111031.jpg', '2019-10-21 00:10:06', '2019-10-24 20:12:00'),
(6, 'PROGRAM PEMBANGUNAN', '<p>.: Program Pembangunan</p>\r\n\r\n<p>Dalam kaitannya dengan pelaksanaan pembangunan kehutanan di Provinsi Jawa Timur, Dinas Kehutanan Provinsi Jawa Timur telah<br />\r\n<br />\r\nmerumuskan program-program dan kegiatan untuk mewujudkan sub Agenda sebagai berikut :<br />\r\n1)��� Sub agenda Revitalisasi Pertanian dengan Program Optimalisasi Pemanfaatan dan Pengembangan Potensi Sumberdaya<br />\r\n<br />\r\nKehutanan.<br />\r\nUntuk mencapai misi mengembangkan kelembagaan dan meningkatkan kualitas sumber daya manusia, sarana dan prasarana,� meliputi<br />\r\n<br />\r\nstrategi-strategi sebagai berikut:<br />\r\n1. Meningkatkan kesejahteraan masyarakat desa sekitar hutan dan peningkatan kualitas lingkungan masyarakat desa hutan.<br />\r\nKegiatan:<br />\r\na.��� Anti Poverty Program (APP) Bidang Kehutanan.<br />\r\nb.��� Bantuan Gerdu Taskin.<br />\r\n2. Meningkatkan sarana dan prasarana, data dan sistem informasi serta kualitas SDM.�<br />\r\nKegiatan:<br />\r\na.��� Maintenance content website Dinas Kehutanan.<br />\r\nb.��� Peningkatan SDM bagian data dan informasi, melalui pemberian stimulan dan reward.<br />\r\nc.��� Inventarisasi data pembangunan kehutanan Jawa Timur.<br />\r\nd.��� Monitoring dan evaluasi pembangunan kehutanan Jawa Timur.<br />\r\n3. Melaksanakan kerjasama pengelolaan hutan dan kehutanan serta kerjasama investasi bidang kehutanan.<br />\r\nKegiatan :<br />\r\na.��� Kerjasama antar daerah dalam rangka peningkatan investasi kehutanan.<br />\r\nb.��� Koordinasi kerjasama Mitra Praja Utama.<br />\r\n4. Membuat sarana promosi, mengikuti pameran serta pembuatan booklet dan leaflet.<br />\r\nKegiatan:<br />\r\na.��� Pameran kehutanan.<br />\r\nb.��� Bulletin Kehutanan.<br />\r\nc.��� Booklet dan leaflet.<br />\r\nd.��� Buku statistik kehutanan.<br />\r\ne.��� Buku informasi kehutanan<br />\r\n5. Kegiatan rehabilitasi hutan dan lahan kritis di dalam dan luar kawasan hutan untuk mewujudkan Jawa Timur hijau.<br />\r\nKegiatan :<br />\r\na.��� Pengembangan Hutan Rakyat.<br />\r\nb.��� Pemanfaatan lahan di bawah tegakan (wana farma/ wana tani).<br />\r\nc.��� Inventarisasi hutan dan lahan kritis di dalam maupun di luar kawasan hutan.<br />\r\nd.��� Penyelenggaraan rehabilitasi hutan dan lahan kritis di luar dan di dalam kawasan hutan.<br />\r\ne.��� Pembuatan Kebun Bibit Desa untuk mendukung penyelenggaraan rehabilitasi hutan dan lahan kritis.<br />\r\nf.��� Monitoring dan evaluasi pelaksanaan kegiatan rehabilitasi hutan dan lahan kritis di dalam dan di luar kawasan hutan.<br />\r\ng.��� Pembinaan kelompok tani dalam rangka penanganan hutan dan lahan kritis<br />\r\n6. Pengelolaan DAS secara terpadu.<br />\r\nKegiatan :<br />\r\na.��� Kegiatan vegetatif dan sipil teknis.<br />\r\n7. Mendorong peningkatan usaha melalui pola agribisnis dan bekerjasama dengan berbagai pihak (pihak ke-III) guna<br />\r\n<br />\r\nkeberhasilan usaha.<br />\r\nKegiatan :<br />\r\na.��� Pelatihan dan pembinaan Lembaga Masyarakat Desa Hutan (LMDH).<br />\r\nb.��� Peningkatan partisipasi masyarakat melalui Pengelolaan Sumberdaya Hutan Bersama Masyarakat (PHBM).<br />\r\nc.��� Pemberdayaan Kelompok Usaha Produktif (KUP).<br />\r\nd.��� Pengembangan Aneka Usaha Kehutanan.<br />\r\ne.��� Pembinaan pasca panen hutan rakyat dan Aneka Usaha Kehutanan.<br />\r\n8.��� Penyediaan bibit yang cukup baik, kualitas maupun kuantitasnya.<br />\r\nKegiatan :<br />\r\na.��� Pengawasan peredaran dan mutu benih tanaman hutan.<br />\r\nb.��� Pelaksanaan Kecil Menanam Dewasa Memanen (KMDM) dan pembuatan KBS.<br />\r\n9.��� Peningkatan penyuluhan masyarakat dan peningkatan aktualitas SDM Penyuluh Kehutanan.<br />\r\nKegiatan :<br />\r\na.��� Pengembangan kelembagaan Penyuluh Kehutanan Swadaya Masyarakat (PKSM).<br />\r\nb.��� Pembinaan dan peningkatan SDM Penyuluh Kehutanan.<br />\r\nc.��� Pembinaan Sentra Penyuluhan Kehutanan Pedesaan (SPKP)<br />\r\nd.��� Lomba penghijauan dan konservasi alam.<br />\r\n10.��� Percepatan rehabilitasi hutan mangrove.<br />\r\nKegiatan :<br />\r\n-��� Rehabilitasi hutan mangrove<br />\r\n11.��� Koordinasi antar stakeholders.<br />\r\nKegiatan :<br />\r\n-��� Penanaman pohon sepanjang jalan nasional dan jalan provinsi.<br />\r\n12.��� Pengawasan dan pengendalian peredaran hasil hutan dan pengawasan pungutan iuran kehutanan.<br />\r\nKegiatan :<br />\r\n-��� Pemasaran, pengawasan dan pengendalian peredaran hasil hutan serta pengawasan pungutan iuran kehutanan.<br />\r\na. Koordinasi kebijakan penatausahaan hasil hutan di Provinsi Jawa Timur.<br />\r\nb. Sosialisasi peraturan dan ketentuan penatausahaan hasil hutan.<br />\r\nc. Rekonsisliasi penerimaan Pendapatan Asli Daerah (PAD).<br />\r\nd. Rekonsiliasi penerimaan Provisi Sumberdaya Hutan (PSDH).<br />\r\ne. Evaluasi pelaksanaan Jatah Produksi Tahunan (JPT) Perum Perhutani Unit II Jawa Timur.<br />\r\nf. Koordinasi penyusunan rencana penetapan JPT Perum Perhutani Unit II Jawa Timur.<br />\r\ng. Penyegaran petugas Penatausahaan Hasil Hutan (PUHH).<br />\r\nh. Sosialisasi kebijakan peraturan industri hasil hutan.<br />\r\ni. Koordinasi pemenuhan bahan baku industri hasil hutan.<br />\r\nj. Pembinaan pengawasan dan pengendalian penatausahaan hasil hutan.<br />\r\nk. Pemantauan Pendapatan Asli Daerah (PAD).<br />\r\nl. Monitoring penerimaan Provisi Sumberdaya Hutan (PSDH).<br />\r\nm. Peninjauan lapangan penetapan JPT Perum Perhutani Unit II Jawa Timur.<br />\r\nn. Koordinasi perencanaan JPT Perum Perhutani Unit II Jawa Timur.<br />\r\no. Pemeriksaan tebangan dan produksi.<br />\r\np. Inventarisasi pemantauan produksi hasil hutan rakyat.<br />\r\nq. Uji petik penerbitan dokumen angkutan (FA-KB).<br />\r\nr. Inventarisasi industri hasil hutan.<br />\r\ns. Cross chek dokumen ke provinsi asal.<br />\r\nt. Bimbingan dan pengawasan industri hasil hutan.<br />\r\nu. Pemeriksaan rencana dan atau realisasi tebangan bencana alam.<br />\r\n13.��� Pengaturan pengelolaan hutan rakyat sesuai dengan kaidah pengelolaan hutan secara lestari.<br />\r\nKegiatan :<br />\r\n-��� Sosialisasi ecolabelling Hutan Rakyat.<br />\r\n14.��� Peningkatan SDM stakeholders.<br />\r\nKegiatan :<br />\r\n-��� Sosialisasi Standar Verifikasi Legalitas Kayu.<br />\r\n15.��� Pemanfaatan lahan di bawah tegakan Jati.<br />\r\nKegiatan :<br />\r\na.��� Pendidikan kemasyarakatan dalam rangka mendukung peningkatan usaha masyarakat sekitar hutan produksi.<br />\r\n-��� �Pelatihan kelembagaan dalam upaya peningkatan usaha masyarakat sekitar hutan produksi.<br />\r\n-��� �Pelatihan usaha ekonomi dalam upaya peningkatan usaha masyarakat sekitar hutan produksi.<br />\r\n-��� �Sosialisasi kelola kawasan dan pengamanan hutan dalam upaya peningkatan usaha masyarakat sekitar hutan produksi.<br />\r\n-��� �Koordinasi dan evaluasi pelaksanaan peningkatan usaha masyarakat sekitar hutan produksi.<br />\r\nb.��� Pengembangan pengelolaan pemanfaatan hutan alam.<br />\r\n-��� �Pembentukan lembaga usaha dan pelatihan usaha ekonomi.<br />\r\n- ��� Pemeliharaan tanaman.<br />\r\n16.��� Pembinaan penatausahaan di industri.<br />\r\nKegiatan :<br />\r\n-��� Restrukturisasi industri primer kehutanan.<br />\r\na. Pelaksanaan evrik IPHHK kapasitas s/d 6000 m3.<br />\r\nb. Sosialisasi peraturan penatausahaan dan perdagangan hasil hutan.<br />\r\nc. Inventarisasi industri primer hasil hutan kayu.<br />\r\nd. Pembinaan kelembagaan industri primer hasil hutan kayu.<br />\r\ne. Monitoring dan evaluasi harga pemasaran produksi industri hasil hutan kayu dan non kayu.<br />\r\nf. Bimbingan teknis dan monev pedagang/ eksportir industri hasil hutan kayu dan non kayu.<br />\r\n17.��� Meningkatkan pengelolaan kawasan hutan sesuai fungsi dan peruntukannya.<br />\r\nKegiatan :<br />\r\n-��� Perencanaan, pemantauan dan pemantapan status kawasan, perlindungan hutan dan penggunaan sesuai fungsi dan<br />\r\n<br />\r\nperuntukannya.<br />\r\n18.��� Pemeliharaan batas kawasan hutan.<br />\r\nKegiatan :<br />\r\na. Rencana rekonstruksi tata batas Tahura.<br />\r\nb. Optimalisasi pengelolaan kawasan hutan.<br />\r\nc. Rekonstruksi tata batas kawasan Tahura.<br />\r\nd. Pemantauan dan pemantapan kawasan hutan.<br />\r\ne. Monitoring penggunaan kawasan hutan dan pemantapan kawasan hutan.<br />\r\nf. Sosialisasi peraturan keplanologian.<br />\r\ng. Pemeliharaan tata batas kawasan Tahura R. Soerjo.<br />\r\nh. Identifikasi permasalahan kawasan hutan.<br />\r\ni. Meningkatkan keterpaduan antar pengelola kawasan hutan menuju pengelolaan kawasan hutan yang mantap.<br />\r\nj. Menyediakan informasi/ data kawasan untuk kepentingan pembangunan di luar sektor kehutanan.<br />\r\n19.��� Peningkatan pengamanan dan perlindungan hutan, pengembangan jasa lingkungan dan pengendalian peredaran hasil hutan.<br />\r\nKegiatan :<br />\r\na. Operasi pengamanan hutan.<br />\r\nb. Rehabilitasi dan pemulihan wilayah pasca bencana.<br />\r\nc. Perlindungan dan pengendalian peredaran hasil hutan.<br />\r\nd. Koordinasi pengamanan hutan.<br />\r\n20.��� Peningkatan kualitas SDM dan perekonomian di desa penyangga kawasan hutan.<br />\r\nKegiatan :<br />\r\na. Pembinaan SDM mandiri di daerah desa penyangga.<br />\r\nb. Pelaksanaan kegiatan KPA dan PPA.<br />\r\nc. Pelatihan masyarakat di desa penyangga kawasan hutan.<br />\r\n21.��� Percepatan penyelesaian proses pinjam pakai dan tukar menukar kawasan hutan.<br />\r\nKegiatan :<br />\r\na. Penatagunaan hutan dan pengendalian alih fungsi serta status kawasan hutan.<br />\r\nb. Penyelesaian tukar menukar kawasan hutan.<br />\r\nc. Penyelesaian pinjam pakai kawasan hutan.<br />\r\nd. Penyelesaian kasus perambahan kawasan hutan.<br />\r\n22.��� Pemberdayaan masyarakat sekitar hutan dalam upaya penanggulangan kebakaran hutan.<br />\r\nKegiatan :<br />\r\na. Pemberdayaan masyarakat sekitar hutan dan jagawana.<br />\r\nb. Penanggulangan kebakaran hutan.<br />\r\nc. Pelatihan dan apel siaga kebakaran.<br />\r\nd. Pemantauan titik api/ hot spot.<br />\r\n23.��� Pembinaan, monitoring dan pengawasan peredaran hasil hutan.<br />\r\nKegiatan :<br />\r\na. Saksi ahli penyelesaian kasus pelanggaran kehutanan.<br />\r\nb. Pengawasan peredaran hasil hutan.<br />\r\nc. Pengukuran hasil hutan sitaan.<br />\r\nd. Bimbingan teknis penatausahaan hasil hutan.<br />\r\ne. Penyegaran pejabat pemeriksa dan penerima hasil hutan.<br />\r\nf. Sewa kantor pelayanan.<br />\r\n<br />\r\n2. sub Agenda kedua: Pemeliharaan lingkungan hidup, pengelolaan sumberdaya alam, dan penataan ruang dengan Program<br />\r\n<br />\r\nPerlindungan dan Konservasi Sumberdaya Alam; strategi-strategi yang diterapkan sebagai berikut:<br />\r\n1.��� Meningkatkan fungsi dan pengamanan kawasan Tahura R. Soerjo.<br />\r\nKegiatan :<br />\r\na. pelestarian dan penataan kawasan Tahura R. Soerjo.<br />\r\nb. Pemberdayaan masyarakat sekitar kawasan Tahura R. Soerjo.<br />\r\n2.��� Meningkatkan pelayanan bagi pengunjung OWA dan pihak ketiga.<br />\r\nKegiatan :<br />\r\n-��� Peningkatan dan pemeliharaan sarana dan prasarana OWA.<br />\r\n3.��� Meningkatkan pemanfaatan dan pengembangan kawasan Tahura.<br />\r\nKegiatan :<br />\r\na.��� Peningkatan pemanfaatan Tahura oleh pihak ketiga<br />\r\nb.��� Peningkatan pemanfaatan Tahura perkantoran UPT Tahura.<br />\r\n4.��� Meningkatkan kinerja pegawai UPT Tahura R. Soerjo.<br />\r\nKegiatan :<br />\r\na.��� Peningkatan pelayanan publik mealui pelatihan pegawai.<br />\r\nb.��� Rehabilitasi hutan melalui reboisasi.<br />\r\nc.��� Pengamanan dan perlindungan kawasan hutan.<br />\r\nd.��� Pengadaan sarana dan prasarana pengamanan hutan.<br />\r\ne.��� Pemeliharaan batas kawasan hutan.<br />\r\nf.��� Promosi Obyek Wisata Alam (OWA) Tahura.<br />\r\ng.��� Pemenuhan sarana prasarana OWA.<br />\r\nh.��� Pelayanan publik perijinan pemanfaatan Tahura.<br />\r\ni.��� Pengadaan dan pemeliharaan peralatan kantor.<br />\r\nj.��� Pelayanan publik.<br />\r\nk.��� Rehabilitasi lahan kritis.<br />\r\nl.��� Operasi gangguan keamanan hutan.<br />\r\nm.��� Penertiban retribusi masuk kawasan Tahura.<br />\r\nn.��� Pembinaan dan pengawasan kinerja pegawai.<br />\r\n5.��� Meningkatkan peran serta masyarakat dalam pelestarian dan pengamanan kawasan hutan.<br />\r\nKegiatan :<br />\r\na.��� Pendidikan kemasyarakatan dalam rangka mendukung pelestarian dan penataan kawasan Tahura R. Soerjo.<br />\r\nb.��� Pemberdayaan masyarakat sekitar hutan.<br />\r\n6.��� Meningkatkan ekonomi masyarakat sekitar kawasan hutan.<br />\r\nKegiatan :<br />\r\na.��� Peningkatan ketrampilan dan pengetahuan masyarakat sekitar hutan.<br />\r\nb.��� Pelatihan aneka usaha kehutanan.<br />\r\nc.��� Penngkatan peran serta masyarakat dalam pengamanan hutan.<br />\r\nd.��� Pemberdayaan usaha ekonomi masyarakat melalui aneka usaha kehutanan.<br />\r\ne.��� Pemberdayaan peningkatan akses masyarakat sekitar kawasan hutan dalam pengelolaan kawasan hutan.<br />\r\nf.��� Pelestarian kawasan hutan sesuai fungsinya.<br />\r\n<br />\r\n3. sub Agenda kedua: Pemeliharaan lingkungan hidup, pengelolaan sumberdaya alam, dan penataan ruang dengan Program Peningkatan Kualitas dan Akses Informasi Sumberdaya Alam dan Lingkungan Hidup; strategi-strategi yang diterapkan sebagai berikut :<br />\r\n1.��� Penyusunan buku informasi dan data Sumberdaya Hutan Provinsi Jawa Timur.<br />\r\nKegiatan :<br />\r\na.��� Inventarisasi potensi/ Neraca Sumber Daya Hutan (NSDH).<br />\r\nb.��� Penerbitan buku NSDH.<br />\r\nc.��� Pemantauan potensi dan Nerca Sumber Daya Hutan.</p>\r\n\r\n<p>&nbsp;</p>', '1992551835.jpg', '2019-10-21 00:11:50', '2019-10-24 20:11:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan_perundangans`
--

CREATE TABLE `peraturan_perundangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peraturan_perundangans`
--

INSERT INTO `peraturan_perundangans` (`id`, `title`, `deskripsi`, `images`, `created_at`, `updated_at`) VALUES
(1, 'PERATURAN GUBERNUR JAWA TIMUR NOMOR 45 TAHUN 2018', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution</p>', '2001638193.pdf', '2019-10-22 22:06:23', '2019-11-03 21:13:28'),
(2, 'PERATURAN GUBERNUR JAWA TIMUR NOMOR 48 TAHUN 2018', '<p>of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their</p>', '298012556.pdf', '2019-10-24 19:29:13', '2019-10-30 18:59:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phbms`
--

CREATE TABLE `phbms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `phbms`
--

INSERT INTO `phbms` (`id`, `title`, `deskripsi`, `images`, `created_at`, `updated_at`) VALUES
(1, 'TENTANG PERHUTANAN SOSIAL', '<p><strong>PENGELOLAAN HUTAN BERSAMA MASYARAKAT (PHBM)</strong></p>\r\n\r\n<p>Latar Belakang</p>\r\n\r\n<p>&nbsp;Pulau Jawa memiliki luasan hanya 6% dari luas wilayah Indonesia, tetapi 60% dari jumlah penduduk Indonesia tinggal di Jawa. Perhutani sebagai BUMN yang diberi mandat untuk mengelola hutan negara dituntut untuk memberikan perhatian yang besar kepada masalah sosial ekonomi masyarakat, terutama masyarakat pedesaan yang sebagian besar tinggal di sekitar hutan. Interaksi antara masyarakat dengan hutan tidak mungkin dapat dipisahkan. Oleh karena itu, pendekatan yang dilakukan dalam pengelolaan hutan harus memperhatikan keberlanjutan ekosistem hutan dan peduli dengan masyarakat miskin di sekitar hutan. Sejalan dengan terjadinya reformasi di bidang kehutanan, Perhutani menyempurnakan sistem pengelolaan sumberdaya hutan dengan Pengelolaan Hutan Bersama Masyarakat (PHBM).</p>\r\n\r\n<p>&nbsp;Sistem PHBM ini dilaksanakan dengan jiwa BERSAMA, BERDAYA, dan BERBAGI yang meliputi pemanfaatan lahan/ruang, waktu, dan hasil dalam pengelolaan sumberdaya hutan dengan prinsip saling menguntungkan, memperkuat dan mendukung serta kesadaran akan tanggung jawab sosial. Sampai dengan tahun ke-6 pelaksanaan PHBM disadari bahwa masih ditemukan berbagai kendala dan permasalahan, maka pada tahun 2007 disempurnakan kembali dalam PHBM PLUS. Dengan PHBM PLUS diharapkan pelaksanaan pengelolaan sumberdaya hutan di Jawa akan lebih fleksibel, akomodatif, partisipatif dan dengan kesadaran tanggung jawab sosial yang tinggi, sehingga mampu memberikan kontribusi peningkatan Indeks Pembangunan Manusia (IPM) menuju</p>\r\n\r\n<p>Masyarakat Desa Hutan Mandiri dan Hutan Lestari</p>\r\n\r\n<p>&nbsp;2. Pengertian PHBM</p>\r\n\r\n<p>Pengelolaan Hutan Bersama Masyarakat adalah sistem pengelolaan sumberdaya hutan dengan pola kolaborasi yang bersinergi antara Perhutani dan masyarakat desa hutan atau para pihak yang berkepentingan dalam upaya mencapai keberlanjutan fungsi dan manfaat sumberdaya hutan yang optimal dan peningkatan IPM yang bersifat fleksibel, partisipatif dan akomodatif.</p>\r\n\r\n<p>&nbsp;3. Maksud dan Tujuan</p>\r\n\r\n<p>PHBM dimaksudkan untuk memberikan arah pengelolaan sumberdaya hutan dengan memadukan aspek ekonomi, ekologi dan sosial secara proporsional dan profesional.</p>\r\n\r\n<p>PHBM bertujuan untuk meningkatkan peran dan tanggung jawab Perhutani, masyarakat desa hutan dan pihak yang berkepentingan terhadap keberlanjutan fungsi dan manfaat sumberdaya hutan, melalui pengelolaan sumberdaya hutan dengan model kemitraan.</p>\r\n\r\n<p>4. Ruang Lingkup PHBM</p>\r\n\r\n<p>PHBM dilaksanakan di dalam dan di luar kawasan hutan dengan mempertimbangkan skala prioritas berdasarkan perencanaan partisipatif. PHBM yang dilaksanakan di dalam kawasan hutan tidak bertujuan untuk mengubah status kawasan hutan, fungsi hutan dan status tanah negara.</p>\r\n\r\n<p>5. Organisasi-organisasi dalam PHBM</p>\r\n\r\n<p>a. Lembaga Masyarakat Desa Hutan (LMDH)</p>\r\n\r\n<p>merupakan suatu lembaga yang dibentuk oleh masyarakat desa hutan dalam rangka kerjasama pengelolaan sumberdaya hutan dengan sistem PHBM. LMDH merupakan</p>\r\n\r\n<p>lembaga yang berbadan hukum, mempunyai fungsi sebagai wadah bagi masyarakat desa hutan untuk menjalin kerjasama degan Perhutani dalam PHBM dengan prinsip kemitraan. LMDH memiliki hak kelola di petak hutan pangkuan di wilayah desa dimana LMDH itu berada, bekerjasama dengan Perhutani dan mendapat bagi hasil dari kerjasama tersebut. Dalam menjalankan kegiatan pengelolaan hutan, LMDH mempunyai aturan main yang dituangkan dalam Anggaran Dasar (AD) dan Anggaran Rumah Tangga (ART).</p>\r\n\r\n<p>b. Forum Komunikasi PHBM (FK PHBM)</p>\r\n\r\n<p>merupakan salah satu lembaga pendukung dalam pelaksanaan PHBM.</p>\r\n\r\n<p>FK PHBM dibentuk disetiap tingkat pemerintahan, mulai dari Pemerintah Desa, Pemerintah Kecamatan, Pemerintah Kabupaten dan Pemerintah Provinsi. Secara hukum FK bertanggung jawab kepada Pemerintah di tingkat mana FK tersebut dibentuk.</p>', '374431542.jpg', '2019-10-21 18:57:32', '2019-10-22 18:10:18'),
(2, 'KELOMPOK LMDH', '<p>DAFTAR KELOMPOK</p>\r\n\r\n<p>1. JATI MAS SEJAHTERAH</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/jati.jpg\" style=\"height:188px; width:250px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. LEBAH BAROKAH</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/1.jpg\" style=\"height:250px; width:250px\" /></p>\r\n\r\n<p>3. RUKUN MAKMUR</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/tembakau.jpg\" style=\"height:165px; width:250px\" /><br />\r\n&nbsp;</p>\r\n\r\n<p>4. SWADAYA SEJAHTERAH</p>\r\n\r\n<p>5. KELOMPOK SUKACITA</p>\r\n\r\n<p>6. DATA LMDH PERHUTANI DRIVE JATIM</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/REKAP DATA LMDH-001(1).jpg\" style=\"height:800px; width:504px\" /></p>', '2138022511.jpg', '2019-10-21 19:25:58', '2019-10-22 18:10:38'),
(3, 'SHARING DAN PRODUKSI', '<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>', '816032958.jpg', '2019-10-21 19:35:43', '2019-10-22 18:10:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pps_jatims`
--

CREATE TABLE `pps_jatims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pps_jatims`
--

INSERT INTO `pps_jatims` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>', '2019-10-27 20:37:25', '2019-10-31 19:42:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `title`, `deskripsi`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Tembakau', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '865044350.jpg', '2019-10-27 19:27:44', '2019-10-27 19:27:44'),
(2, 'Hutan Jati', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '1910681260.jpg', '2019-10-27 19:28:34', '2019-10-27 19:28:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profils`
--

INSERT INTO `profils` (`id`, `title`, `deskripsi`, `images`, `created_at`, `updated_at`) VALUES
(2, 'SEKRETARIAT DAN BIDANG', '<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometime<img alt=\"\" src=\"https://www.lipsum.com/banners\" />s by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p><a href=\"https://www.lipsum.com/banners\"><img alt=\"\" src=\"https://www.lipsum.com/banners\" /></a></p>', '967518380.jpg', '2019-10-20 21:44:17', '2019-10-28 21:54:47'),
(3, 'PROFIL KEPALA DINAS', '<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '1447299041.jpg', '2019-10-20 21:46:04', '2019-10-20 21:47:47'),
(4, 'SDM', '<p>Sesuai Peraturan Gubernur Jawa Timur No 84 Tahun 2016, Dinas Kehutanan merupakan unsur pelaksana urusan pemerintahan di bidang kehutanan yang dipimpin oleh Kepala Dinas yang berkedudukan di bawah dan bertanggung jawab kepada Gubernur melalui Sekretaris Daerah Provinsi Jawa Timur.</p>\r\n\r\n<p>Susunan organisasi Dinas Kehutanan Provinsi Jawa Timur terdiri atas:</p>\r\n\r\n<p>a. Sekretariat, membawahi :</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;1. Sub Bagian Tata Usaha;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;2. Sub Bagian Penyusunan Program dan Anggaran; dan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;3. Sub Bagian Keuangan.</p>\r\n\r\n<p>b. Bidang Planologi Kehutanan, membawahi:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Seksi Tata Kelola Hutan;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;2. Seksi Pemantauan Kawasan Hutan dan Pengendalian Perubahan&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Iklim; dan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Seksi Statistik, Informasi dan Kerjasama.</p>\r\n\r\n<p>c. Bidang Pemantapan Kawasan Hutan dan Konservasi Alam, membawahi:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;1. Seksi Pemantapan dan Perpetaan Kawasan Hutan;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;2. Seksi Perlindungan Hutan; dan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;3. Seksi Konservasi dan Wisata Alam.</p>\r\n\r\n<p>d. Bidang Pengelolaan Hutan Produksi Lestari , membawahi:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;1. Seksi Pengelolaan Hutan Produksi;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;2. Seksi Tertib Peredaran dan Iuran Hasil Hutan; dan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;3. Seksi Industri Hasil Hutan.</p>\r\n\r\n<p>e. Bidang Rehabilitasi, Kelembagaan dan Perhutanan Sosial, membawahi:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;1. Seksi Rehabilitasi Hutan dan Lahan;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;2. Seksi Kelembagaan dan Pengembangan SDM; dan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;3. Seksi Perhutanan Sosial.</p>\r\n\r\n<p>&nbsp;f. Cabang Dinas</p>\r\n\r\n<p>g. UPT dan</p>\r\n\r\n<p>h. Kelompok Jabatan Fungsional.</p>', '424813883.jpg', '2019-10-20 21:47:15', '2019-10-30 20:09:06'),
(5, 'STRUKTUR ORGANISASI', NULL, '1596738848.png', '2019-10-20 21:49:15', '2019-11-03 20:39:25'),
(6, 'KEDUDUKAN DAN ALAMAT', '<p><strong>KEDUDUKAN</strong></p>\r\n\r\n<p>Dinas Kehutanan Provinsi Jawa Timur sebagai salah satu unsur pelaksana&nbsp; &nbsp;otonomi daerah Pemerintah Provinsi Jawa Timur dipimpin oleh Kepala Dinas Kehutanan yang berada di bawah dan bertanggung jawab kepada Gubernur Jawa Timur, mempunyai tanggung jawab untuk selalu meningkatkan kualitas penyelenggaraan pemerintahan dan pembangunan serta meningkatkan pelayanan kepada masyarakat di bidang kehutanan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ALAMAT</strong><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Dinas Kehutanan Provinsi Jawa Timur</strong></p>\r\n\r\n<p>Jl. Bandara Juanda, Sidoarjo<br />\r\n<br />\r\nemail : dishutjatim@yahoo.co.id</p>\r\n\r\n<p>website : http://dishut.jatimprov.go.id<br />\r\nTelp. (031) 86666549&nbsp; |&nbsp; Fax (031) 86667858</p>', '1142334580.jpg', '2019-10-20 21:49:49', '2019-10-30 20:08:19'),
(7, 'TUGAS DAN FUNGSI', '<h2>Tugas</h2>\r\n\r\n<ol>\r\n	<li>Melaksanakan pengawasan terhadap pelaksanaan urusan pemerintahan di daerah provinsi;</li>\r\n	<li>Pelaksanaan pembinaan atas penyelenggaraan pemerintah daerah kabupaten/kota</li>\r\n	<li>Pelaksanaan urusan pemerintahan di kabupaten/kota</li>\r\n</ol>\r\n\r\n<h2>Fungsi</h2>\r\n\r\n<ol>\r\n	<li>Perencanaan Program Pengawasan</li>\r\n	<li>Perumusan kebijakan dan fasilitasi pengawasan, dan</li>\r\n	<li>Pemeriksaan, pengusutan, pengujian dan penilaian tugas pengawasan</li>\r\n</ol>', '1841866550.jpg', '2019-10-23 19:27:32', '2019-11-03 20:38:39'),
(8, 'VISI DAN MISI', '<h3>Visi</h3>\r\n\r\n<p>Menjadi Aparat Pengawasan Internal Pemerintah Provinsi Jawa Timur yang profesional dan akuntabel dalam rangka mewujudkan Good Governance menuju Clean Government di Jawa Timur</p>\r\n\r\n<h3>Misi</h3>\r\n\r\n<p>Melaksanakan Pengawasan dan Pembinaan Internal atas penyelenggaraan pemerintahan di Jawa Timur secara Profesional, Obyektif, dan Akuntabel</p>', NULL, '2019-11-03 20:35:29', '2019-11-03 20:35:29'),
(9, 'TUJUAN', '<p>Meningkatnya Akuntabilitas Pengelolaan Keuangan dan Kinerja di Lingkungan Pemerintah Provinsi Jawa Timur</p>', NULL, '2019-11-03 20:35:57', '2019-11-03 20:35:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana_kerjas`
--

CREATE TABLE `rencana_kerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rencana_kerjas`
--

INSERT INTO `rencana_kerjas` (`id`, `deskripsi`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>', '2019', '2019-10-25 02:09:14', '2019-10-30 21:03:08'),
(2, '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', '2020', '2019-10-25 02:09:36', '2019-10-30 21:03:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `renstra_strategis`
--

CREATE TABLE `renstra_strategis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tahun1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `renstra_strategis`
--

INSERT INTO `renstra_strategis` (`id`, `deskripsi`, `tahun1`, `tahun2`, `created_at`, `updated_at`) VALUES
(2, '<h1>Programming Skills and Experiences</h1>\r\n\r\n<ul>\r\n	<li>Good understanding for Object Oriented Programming concepts</li>\r\n	<li>Good understanding and skills for Java programming, web development and database programming</li>\r\n	<li>Experienced in Android applications development using Android Stuido</li>\r\n	<li>Experienced in web applications development using Laravel</li>\r\n	<li>Design Network Topology</li>\r\n	<li>Installing a Network cable</li>\r\n	<li>Configuring the network switchesProgramming Skills and Experiences</li>\r\n	<li>Good understanding for Object Oriented Programming concepts</li>\r\n	<li>Good understanding and skills for Java programming, web development and database programming</li>\r\n	<li>Experienced in Android applications development using Android Stuido</li>\r\n	<li>Experienced in web applications development using Laravel</li>\r\n	<li>Design Network Topology</li>\r\n	<li>Installing a Network cable</li>\r\n	<li>Configuring the network switches</li>\r\n</ul>', '2019', '2024', '2019-10-25 01:45:27', '2019-10-25 01:45:27'),
(3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu f</p>', '2024', '2029', '2019-10-30 19:13:22', '2019-10-30 19:13:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sakips`
--

CREATE TABLE `sakips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sakips`
--

INSERT INTO `sakips` (`id`, `title`, `deskripsi`, `tahun`, `file`, `created_at`, `updated_at`) VALUES
(1, 'SASARAN KERJA PEGAWAI', 'Sedangkan LAKIP adalah Laporan Akuntabilitas Kinerja Instansi Pemerintahan. LAKIP merupakan produk akhir SAKIP yang menggambarkan kinerja yang dicapai oleh suatu instansi pemerintah atas pelaksanaan program dan kegiatan yang dibiayai APBN/APBD. ', '2013', '881990580.pdf', '2019-10-24 19:19:32', '2019-10-24 19:19:32'),
(2, 'SISTEM PENGANGGARAN', '<p>SAKIP merupakan integrasi dari sistem perencanaan, sistem penganggaran dan sistem pelaporan kinerja, yang selaras dengan pelaksanaan sistem akuntabilitas keuangan. Dalam hal ini, setiap organisasi diwajibkan mencatat dan melaporkan setiap penggunaan keuangan negara serta kesesuaiannya dengan ketentuan yang berlaku</p>', '2014', '820857655.pdf', '2019-10-24 19:20:25', '2019-11-01 01:16:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `deskripsi`, `images`, `status`, `created_at`, `updated_at`) VALUES
(1, '<p>Hutan Mangrove atau yang biasa disebut hutan bakau merupakan suatu area sabuk hijau yang melindungi daratan dari bahaya tsunami, abrasi serta infiltrasi air laut ke darat. Selain sebagai habitat bagi berbagai macam satwa dan tanaman, hutan mangrove juga mampu menyerap karbondioksida 10 kali lebih kuat daripada hutan kota</p>', '2024972453.jpg', 'aktif', '2019-10-21 21:34:04', '2019-10-27 22:21:27'),
(3, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '12785107.jpg', 'aktif', '2019-10-22 00:57:02', '2019-10-22 18:07:10'),
(4, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>', '143079140.jpg', 'aktif', '2019-10-22 00:57:38', '2019-10-22 18:07:43'),
(5, '<p>The Eloquent&nbsp;<code>all</code>&nbsp;method will return all of the results in the model&#39;s table. Since each Eloquent model serves as a&nbsp;query builder,</p>', '935974487.jpg', 'aktif', '2019-10-27 23:39:52', '2019-10-27 23:39:52'),
(6, '<p>Since Eloquent models are query builders, you should review all of the methods available on the&nbsp;<a href=\"https://laravel.com/docs/5.8/queries\">query builder</a>. You may use any of these methods in your Eloquent queries.</p>', '1870308841.jpg', 'aktif', '2019-10-27 23:43:12', '2019-10-27 23:43:12'),
(7, '<p>You can refresh models using the&nbsp;<code>fresh</code>&nbsp;and&nbsp;<code>refresh</code>&nbsp;methods. The&nbsp;<code>fresh</code>&nbsp;method will re-retrieve the model from the database. The existing model instance will not be affected:</p>', '11366541.jpg', 'aktif', '2019-10-27 23:44:10', '2019-10-27 23:44:10'),
(8, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni.</p>', '1102367707.jpg', 'aktif', '2019-11-04 20:08:33', '2019-11-04 20:08:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_organisasi2s`
--

CREATE TABLE `struktur_organisasi2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_urut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `is_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `struktur_organisasi2s`
--

INSERT INTO `struktur_organisasi2s` (`id`, `title`, `nama`, `parent_id`, `images`, `no_urut`, `is_heading`, `created_at`, `updated_at`) VALUES
(8, 'INSPEKTUR', 'FAIZ', NULL, '466896661.jpg', '1', '1', '2019-11-11 02:09:47', '2019-11-11 02:22:44'),
(10, 'SEKERTARIS', 'DAMAR', '8', '952130047.jpg', '1', '1', '2019-11-11 02:23:59', '2019-11-11 02:23:59'),
(16, 'KABAG TATA USAHA', 'HERNANDA', '10', '1979139608.jpg', '1', '1', '2019-11-11 02:28:59', '2019-11-11 02:28:59'),
(17, 'KABAG PENYUSUNAN ANGGARAN', 'FAIZU', '10', '916016209.jpg', '1', '1', '2019-11-11 02:45:36', '2019-11-11 02:45:36'),
(19, 'KEPALA SUB BAGIAN KEUANGAN', 'DAIMARU', '10', '217122361.jpg', '1', '1', '2019-11-11 02:47:55', '2019-11-11 02:47:55'),
(20, 'COBA', 'SCOMPTEC', '8', '1032418240.jpg', '1', '1', '2019-11-11 18:15:02', '2019-11-11 18:15:02'),
(21, 'KOSONG', 'KOSONGAN', '20', 'defimage.png', '1', '1', '2019-11-11 19:13:44', '2019-11-11 19:13:44'),
(22, 'KOSONG 2', 'KOSONGAN 2', '20', 'defimage.png', '1', '1', '2019-11-11 19:17:39', '2019-11-11 19:17:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', 'admin', NULL, '$2y$10$ggA2WBTzARZ8AbcV3uCNmeEk.jYuCMQ3xZhRDFPVtbn45t4O0CIQG', NULL, '2019-10-18 17:54:23', '2019-10-18 17:54:23'),
(2, 'admin2', 'admin2@mail.com', 'guest', NULL, '$2y$10$zaYwI.Jp7IYIbBJmxwKsxOz9gwk629.cXUvggPRmRBK.HM1gYXAjy', NULL, '2019-10-18 20:12:34', '2019-10-18 20:12:34'),
(3, 'admin3', 'admin3@mail.com', 'admin', NULL, '$2y$10$9/87y6bnU2tqMhmZDbu9bOyuPvvDiysC6ZSC2Q3h0DbJaOq2asChi', NULL, '2019-10-18 20:14:53', '2019-10-18 20:14:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beritas_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_statistikas`
--
ALTER TABLE `data_statistikas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `download_materis`
--
ALTER TABLE `download_materis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hutan_rakyats`
--
ALTER TABLE `hutan_rakyats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instansi_kehutanans`
--
ALTER TABLE `instansi_kehutanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_beritas`
--
ALTER TABLE `kategori_beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `link_informasis`
--
ALTER TABLE `link_informasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `link_layanans`
--
ALTER TABLE `link_layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lkjips`
--
ALTER TABLE `lkjips`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `objek_wisata_alams`
--
ALTER TABLE `objek_wisata_alams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembangunan_hutans`
--
ALTER TABLE `pembangunan_hutans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peraturan_perundangans`
--
ALTER TABLE `peraturan_perundangans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `phbms`
--
ALTER TABLE `phbms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pps_jatims`
--
ALTER TABLE `pps_jatims`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rencana_kerjas`
--
ALTER TABLE `rencana_kerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `renstra_strategis`
--
ALTER TABLE `renstra_strategis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sakips`
--
ALTER TABLE `sakips`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur_organisasi2s`
--
ALTER TABLE `struktur_organisasi2s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_statistikas`
--
ALTER TABLE `data_statistikas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `download_materis`
--
ALTER TABLE `download_materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `hutan_rakyats`
--
ALTER TABLE `hutan_rakyats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `instansi_kehutanans`
--
ALTER TABLE `instansi_kehutanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori_beritas`
--
ALTER TABLE `kategori_beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `link_informasis`
--
ALTER TABLE `link_informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `link_layanans`
--
ALTER TABLE `link_layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lkjips`
--
ALTER TABLE `lkjips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `objek_wisata_alams`
--
ALTER TABLE `objek_wisata_alams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembangunan_hutans`
--
ALTER TABLE `pembangunan_hutans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `peraturan_perundangans`
--
ALTER TABLE `peraturan_perundangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `phbms`
--
ALTER TABLE `phbms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pps_jatims`
--
ALTER TABLE `pps_jatims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rencana_kerjas`
--
ALTER TABLE `rencana_kerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `renstra_strategis`
--
ALTER TABLE `renstra_strategis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sakips`
--
ALTER TABLE `sakips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `struktur_organisasi2s`
--
ALTER TABLE `struktur_organisasi2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `beritas_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_beritas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
