-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jul 2025 pada 15.49
-- Versi server: 10.6.22-MariaDB-cll-lve
-- Versi PHP: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigz1442_sigemoy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `user_id`, `nip`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 2, '197811192010122002', 'Drg Fajar Dini S', '088232324437', 'Gunung Kidul Yogyakarta', '2024-08-28 03:26:40', '2024-08-28 03:26:40'),
(2, 4, '002', 'Drg lalala', '806788678', 'adsafdsaf', '2024-09-04 07:34:42', '2024-09-04 07:34:42'),
(3, 7, NULL, 'terapis gigi', '088238591064', NULL, '2025-01-20 05:55:57', '2025-01-20 05:55:57'),
(4, 8, 'D3_Smt5_2025', 'MahasiswaD3', '0812345678', NULL, '2025-07-17 08:07:31', '2025-07-26 04:59:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `edukasi`
--

CREATE TABLE `edukasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `media_type` enum('foto','video_upload','video_url') NOT NULL,
  `media_path` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `edukasi`
--

INSERT INTO `edukasi` (`id`, `judul`, `deskripsi`, `media_type`, `media_path`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'Pentingnya Sistem Rekam Medis Gigi Digital dalam Praktik Modern', 'Sistem rekam medis gigi digital telah merevolusi cara dokter gigi mengelola informasi pasien. Tidak hanya meningkatkan efisiensi, sistem ini juga memungkinkan akurasi diagnosis yang lebih tinggi dan perawatan yang lebih personal. Rekam medis digital memungkinkan penyimpanan data yang komprehensif, termasuk riwayat perawatan, foto intraoral, radiografi, dan catatan perawatan. Sistem ini memfasilitasi akses cepat ke informasi pasien, memungkinkan dokter gigi untuk membuat keputusan klinis yang lebih baik. Selain itu, rekam medis digital mendukung kolaborasi antar profesional kesehatan, memungkinkan pertukaran informasi yang aman dan efisien. Implementasi sistem ini juga meningkatkan kepatuhan terhadap regulasi privasi pasien seperti HIPAA di Amerika Serikat. Meskipun investasi awal mungkin signifikan, manfaat jangka panjang dalam hal efisiensi, akurasi, dan perawatan pasien jauh melebihi biayanya.', 'foto', 'fotos/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', NULL, '2024-08-28 05:22:54', '2024-08-28 05:22:54'),
(2, 'Standarisasi Kode dalam Rekam Medis Gigi: Menuju Interoperabilitas Global', 'Standarisasi kode dalam rekam medis gigi adalah langkah krusial menuju interoperabilitas sistem kesehatan global. Penggunaan sistem kode yang seragam, seperti kode CDT (Current Dental Terminology) atau ICD-10-CM untuk diagnosis gigi, memungkinkan komunikasi yang lebih efektif antar penyedia layanan kesehatan. Standarisasi ini memfasilitasi pertukaran data yang akurat, mengurangi kesalahan interpretasi, dan meningkatkan kualitas perawatan pasien. Dalam konteks global, standarisasi memungkinkan analisis data kesehatan gigi lintas negara, mendukung penelitian epidemiologi, dan membantu dalam perumusan kebijakan kesehatan publik. Namun, implementasi standar global menghadapi tantangan seperti perbedaan sistem kesehatan antar negara dan resistensi terhadap perubahan. Diperlukan kolaborasi internasional yang kuat antara organisasi profesional, pemerintah, dan industri teknologi kesehatan untuk mencapai standarisasi yang efektif dan diterima secara luas.', 'foto', 'fotos/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', NULL, '2024-08-28 05:23:25', '2024-08-28 05:23:25'),
(3, 'Manajemen Risiko dan Keamanan Data dalam Rekam Medis Gigi Elektronik', 'Keamanan data dalam rekam medis gigi elektronik adalah prioritas utama dalam era digital. Informasi kesehatan yang sensitif harus dilindungi dari akses tidak sah, pelanggaran data, dan kehilangan. Manajemen risiko dalam konteks ini melibatkan implementasi berbagai lapisan keamanan, termasuk enkripsi data, autentikasi multi-faktor, dan audit trail yang komprehensif. Praktik gigi harus mengembangkan dan menerapkan kebijakan keamanan yang ketat, melakukan pelatihan staf secara reguler, dan melakukan penilaian risiko berkala. Backup data yang aman dan rencana pemulihan bencana juga merupakan komponen penting dalam strategi manajemen risiko. Selain itu, kepatuhan terhadap regulasi privasi data seperti GDPR di Eropa atau HIPAA di AS adalah wajib. Tantangan dalam manajemen risiko termasuk ancaman keamanan siber yang terus berkembang, kebutuhan akan pembaruan sistem yang konstan, dan keseimbangan antara aksesibilitas data untuk perawatan pasien dengan perlindungan privasi.', 'foto', 'fotos/4IdBwtO371DBKqqhLpAmS7jMdCZbgG3HIU2Ci4Sf.jpg', NULL, '2024-08-28 05:24:03', '2024-08-28 05:24:03'),
(4, 'Integrasi Kecerdasan Buatan dalam Analisis Rekam Medis Gigi: Potensi dan Tantangan', 'Integrasi kecerdasan buatan (AI) dalam analisis rekam medis gigi membuka peluang baru dalam diagnosis, perencanaan perawatan, dan penelitian. AI dapat menganalisis volume besar data pasien untuk mengidentifikasi pola, memprediksi risiko penyakit, dan bahkan merekomendasikan rencana perawatan. Misalnya, algoritma deep learning dapat digunakan untuk menganalisis radiografi gigi, membantu dalam deteksi dini karies atau penyakit periodontal. Sistem AI juga dapat membantu dalam manajemen praktik dengan mengoptimalkan penjadwalan dan mengidentifikasi tren dalam populasi pasien. Namun, integrasi AI juga menghadirkan tantangan signifikan. Keakuratan dan reliabilitas algoritma AI harus divalidasi secara ketat sebelum implementasi klinis. Isu etika, seperti tanggung jawab atas keputusan yang dibantu AI dan potensi bias dalam algoritma, harus diatasi. Selain itu, privasi data pasien dan kepatuhan terhadap regulasi kesehatan tetap menjadi perhatian utama. Diperlukan kolaborasi antara profesional gigi, ilmuwan data, dan pembuat kebijakan untuk mengembangkan kerangka kerja yang memungkinkan pemanfaatan AI secara aman dan etis dalam praktik gigi.', 'foto', 'fotos/EWnXeMZqPmq43ncc6WfkInhym89OZFb35Ha6en1P.jpg', NULL, '2024-08-28 05:24:40', '2024-11-18 15:46:53'),
(5, 'Medis Gigi dalam Kedokteran Gigi Forensik dan Identifikasi Korban Bencana', 'Rekam medis gigi memainkan peran vital dalam kedokteran gigi forensik dan identifikasi korban bencana. Gigi dan struktur mulut adalah sumber informasi identifikasi yang sangat berharga karena ketahanannya terhadap dekomposisi dan trauma. Rekam medis gigi yang akurat dan komprehensif dapat menjadi kunci dalam proses identifikasi, terutama dalam kasus di mana metode identifikasi lain tidak tersedia atau tidak dapat diandalkan. Dalam konteks forensik, rekam medis gigi mencakup tidak hanya catatan perawatan, tetapi juga radiografi, cetakan gigi, dan foto intraoral. Standardisasi format rekam medis gigi dan penggunaan notasi gigi universal seperti sistem FDI sangat penting untuk memfasilitasi proses identifikasi lintas batas. Dalam situasi bencana massal, database rekam medis gigi yang terdigitalisasi dapat mempercepat proses identifikasi korban. Namun, tantangan tetap ada, termasuk variasi dalam kualitas dan kelengkapan rekam medis antar praktik gigi, serta isu privasi terkait akses terhadap informasi medis pribadi untuk tujuan forensik. Pengembangan protokol yang jelas untuk penggunaan rekam medis gigi dalam konteks forensik, serta pelatihan khusus untuk profesional gigi dalam dokumentasi forensik, adalah langkah penting untuk meningkatkan efektivitas rekam medis gigi dalam identifikasi forensik.', 'foto', 'fotos/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', NULL, '2024-08-28 05:25:19', '2024-08-28 05:25:19'),
(6, 'Evolusi Rekam Medis Gigi: Dari Kertas ke Blockchain', 'Evolusi rekam medis gigi mencerminkan perkembangan teknologi dan perubahan kebutuhan dalam praktik kedokteran gigi. Dimulai dari sistem berbasis kertas yang sederhana, rekam medis gigi telah berkembang menjadi sistem digital yang canggih, dan kini bergerak menuju teknologi blockchain. Era kertas ditandai dengan catatan manual yang rawan kesalahan dan sulit diakses. Transisi ke sistem elektronik membawa peningkatan signifikan dalam aksesibilitas, keamanan, dan efisiensi. Sistem elektronik memungkinkan penyimpanan data yang lebih komprehensif, termasuk gambar digital dan rekaman video, serta memfasilitasi analisis data untuk meningkatkan perawatan pasien.\r\nSaat ini, teknologi blockchain menawarkan potensi revolusioner dalam manajemen rekam medis gigi. Blockchain menjanjikan tingkat keamanan dan integritas data yang belum pernah ada sebelumnya. Dengan sifatnya yang terdesentralisasi dan tidak dapat diubah, blockchain dapat mengatasi masalah kepercayaan dan keamanan yang melekat pada sistem terpusat. Ini memungkinkan pasien untuk memiliki kontrol lebih besar atas data kesehatan mereka, memfasilitasi berbagi data yang aman antar penyedia layanan kesehatan, dan meningkatkan transparansi dalam penelitian medis.\r\nNamun, adopsi blockchain dalam rekam medis gigi juga menghadapi tantangan signifikan. Ini termasuk masalah skalabilitas, konsumsi energi yang tinggi, kompleksitas teknis, dan kebutuhan untuk mengintegrasikan dengan sistem yang ada.', 'foto', 'fotos/hebPVnwK0cMUgA2ShoiHgurYM1BaKuVcKhMk0MQC.jpg', NULL, '2024-08-28 05:26:23', '2024-11-18 15:47:26'),
(11, 'Pentingnya Rekam Medis Gigi Anak', 'Rekam medis gigi anak adalah dokumen penting yang mencatat riwayat kesehatan gigi dan mulut anak dari waktu ke waktu. Dokumen ini membantu dokter gigi dalam memberikan perawatan yang tepat dan konsisten, serta memantau perkembangan kesehatan gigi anak secara komprehensif.', 'foto', 'fotos/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', NULL, '2024-08-28 03:00:00', '2024-08-28 03:00:00'),
(12, 'Komponen Utama Rekam Medis Gigi Anak', 'Rekam medis gigi anak terdiri dari beberapa komponen penting, termasuk data pribadi, riwayat kesehatan umum, riwayat kesehatan gigi, hasil pemeriksaan, diagnosis, rencana perawatan, dan catatan tindakan yang telah dilakukan. Semua informasi ini membantu dalam memberikan perawatan yang holistik dan berkelanjutan.', 'foto', 'fotos/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', NULL, '2024-08-28 03:15:00', '2024-08-28 03:15:00'),
(13, 'Manfaat Rekam Medis Gigi Digital untuk Anak', 'Rekam medis gigi digital menawarkan berbagai keuntungan dalam perawatan gigi anak. Sistem ini memungkinkan akses cepat ke informasi pasien, memudahkan kolaborasi antar dokter gigi, meningkatkan akurasi diagnosis, dan membantu dalam edukasi pasien dan orang tua melalui visualisasi yang lebih baik.', 'foto', 'fotos/4IdBwtO371DBKqqhLpAmS7jMdCZbgG3HIU2Ci4Sf.jpg', NULL, '2024-08-28 03:30:00', '2024-08-28 03:30:00'),
(14, 'Peran Orang Tua dalam Rekam Medis Gigi Anak', 'Orang tua memiliki peran penting dalam memastikan rekam medis gigi anak mereka akurat dan lengkap. Mereka harus memberikan informasi yang tepat tentang riwayat kesehatan anak, melaporkan perubahan kondisi kesehatan, dan memahami pentingnya kunjungan rutin ke dokter gigi untuk pembaruan rekam medis.', 'foto', 'fotos/he3KCiBEQuM1jkpskGRnFFCHL9pZryIqb7ZpXvJY.jpg', NULL, '2024-08-28 03:45:00', '2024-08-28 03:45:00'),
(15, 'Privasi dan Keamanan Rekam Medis Gigi Anak', 'Menjaga privasi dan keamanan rekam medis gigi anak sangat penting. Dokter gigi dan staf klinik harus mengikuti protokol ketat untuk melindungi informasi sensitif pasien, termasuk penggunaan sistem keamanan digital, pembatasan akses, dan pelatihan staf tentang pentingnya kerahasiaan data pasien.', 'foto', 'fotos/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', NULL, '2024-08-28 04:00:00', '2024-08-28 04:00:00'),
(16, 'Perkembangan Gigi Anak dalam Rekam Medis', 'Rekam medis gigi anak mencatat perkembangan gigi dari waktu ke waktu, termasuk pertumbuhan gigi susu, proses pergantian gigi, dan munculnya gigi permanen. Informasi ini membantu dokter gigi dalam memantau perkembangan normal dan mendeteksi potensi masalah sejak dini.', 'foto', 'fotos/8Mu9C2XYEjSBvgytwNn6IsfItM95a93sTQjKDVYr.jpg', NULL, '2024-08-28 04:15:00', '2024-08-28 04:15:00'),
(17, 'Pencatatan Prosedur Perawatan Gigi Anak', 'Dalam rekam medis gigi anak, setiap prosedur perawatan harus dicatat dengan detail. Ini termasuk tindakan preventif seperti aplikasi fluoride dan sealant, serta tindakan kuratif seperti penambalan gigi atau pencabutan. Pencatatan yang akurat membantu dalam perencanaan perawatan jangka panjang.', 'video_upload', 'videos/eKI4yGoBcAUAgPreH5hhlVoszWfLEziVct5sWKLG.mp4', NULL, '2024-08-28 04:30:00', '2024-08-28 04:30:00'),
(18, 'Penggunaan Teknologi Imaging dalam Rekam Medis Gigi Anak', 'Teknologi imaging seperti radiografi digital dan fotografi intraoral merupakan bagian penting dari rekam medis gigi anak modern. Gambar-gambar ini membantu dalam diagnosis yang lebih akurat, perencanaan perawatan yang lebih baik, dan memudahkan komunikasi dengan orang tua tentang kondisi gigi anak mereka.', 'video_upload', 'videos/njlsLUl55sTpOKr9BhkugyVkBCTyo8HxJ1sKnBhw.mp4', NULL, '2024-08-28 04:45:00', '2024-08-28 04:45:00'),
(19, 'Integrasi Rekam Medis Gigi Anak dengan Kesehatan Umum', 'Rekam medis gigi anak yang komprehensif harus terintegrasi dengan informasi kesehatan umum anak. Hal ini penting karena kondisi kesehatan umum dapat mempengaruhi kesehatan gigi dan sebaliknya. Integrasi ini memungkinkan pendekatan perawatan yang lebih holistik dan personalisasi.', 'foto', 'fotos/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', NULL, '2024-08-28 05:00:00', '2024-08-28 05:00:00'),
(20, 'Edukasi Anak dan Orang Tua Melalui Rekam Medis Gigi', 'Rekam medis gigi dapat menjadi alat edukasi yang efektif bagi anak dan orang tua. Dengan menunjukkan perubahan kondisi gigi dari waktu ke waktu, dokter gigi dapat menjelaskan pentingnya perawatan gigi yang baik dan memotivasi anak untuk menjaga kesehatan gigi dan mulut mereka.', 'foto', 'fotos/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', NULL, '2024-08-28 05:15:00', '2024-08-28 05:15:00'),
(21, 'Perkembangan Gigi Susu dalam Rekam Medis Anak', 'Rekam medis gigi anak mencatat detail penting tentang perkembangan gigi susu, termasuk waktu erupsi, urutan pertumbuhan, dan kondisi gigi susu. Informasi ini membantu dokter gigi memantau perkembangan normal dan mengidentifikasi potensi masalah sejak dini, memastikan kesehatan gigi anak yang optimal.', 'foto', 'fotos/4lB0UO1oSB32SLdLTz5IXXBPrfR6qJbjnFb3epdm.jpg', NULL, '2024-08-28 06:00:00', '2024-11-18 15:47:10'),
(22, 'Pencatatan Kebiasaan Oral pada Rekam Medis Gigi Anak', 'Kebiasaan oral seperti menghisap jempol, penggunaan dot, atau bruxism (menggerinding gigi) penting untuk dicatat dalam rekam medis gigi anak. Informasi ini membantu dokter gigi dalam menilai risiko masalah oklusi dan merencanakan intervensi dini jika diperlukan.', 'foto', 'fotos/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', NULL, '2024-08-28 06:15:00', '2024-08-28 06:15:00'),
(23, 'Pentingnya menyikat gigi sejak dini', '### Pentingnya Memeriksakan Gigi Anak Sejak Dini\r\n\r\nMerawat gigi anak sejak usia dini memiliki banyak manfaat. Semakin cepat anak mulai menjalani pemeriksaan gigi, semakin banyak keuntungan yang bisa mereka peroleh sepanjang hidup. Berikut adalah beberapa manfaatnya:\r\n\r\n1. **Anak Lebih Tenang Saat ke Dokter Gigi**  \r\n   Mengunjungi dokter gigi sejak awal membantu anak melihat kunjungan tersebut sebagai bagian rutin dari kehidupan mereka. Ini akan membuat mereka merasa lebih tenang saat memeriksakan gigi, mengurangi rasa takut atau cemas yang mungkin muncul jika mereka tidak terbiasa.\r\n\r\n2. **Edukasi untuk Orangtua**  \r\n   Pemeriksaan gigi sejak dini juga bermanfaat bagi orangtua. Mereka dapat belajar cara menyikat gigi yang benar, mendapatkan rekomendasi perawatan mulut, dan berdiskusi langsung dengan dokter gigi mengenai kebutuhan diet serta penggunaan fluoride untuk anak.\r\n\r\n3. **Mengatasi Masalah Gigi Sejak Dini**  \r\n   Anak-anak cenderung rentan terhadap kerusakan gigi. Dengan melakukan kunjungan ke dokter gigi sejak dini, ada peluang lebih besar untuk mendeteksi masalah yang mungkin berkembang, seperti gigi berlubang, yang merupakan penyakit kronis umum pada anak-anak. Pemeriksaan rutin memungkinkan penanganan masalah tersebut lebih awal.\r\n\r\n4. **Mencegah Kerusakan Gigi**  \r\n   Selain merawat gigi yang sudah rusak, anak mungkin juga memerlukan tindakan pencegahan seperti aplikasi sealant atau fluoride tambahan, terutama jika mereka berisiko tinggi terhadap kerusakan gigi.\r\n\r\nPemeriksaan gigi secara dini membantu melindungi gigi anak dan mencegah kerusakan. Ini penting untuk diperhatikan oleh orangtua, karena masalah gigi dan mulut dapat mengganggu, mengurangi nafsu makan, dan mengganggu konsentrasi anak.\r\n\r\nPerawatan di rumah juga tak kalah penting untuk menjaga kesehatan gigi dan mulut anak. Ajak anak menggosok gigi dua kali sehari—setelah sarapan dan sebelum tidur—dan ganti sikat gigi setiap 3-4 bulan untuk menghindari penumpukan kuman.', 'foto', 'fotos/HU97B7Dc5bWXO2RAfkGXrABhG69rAfhiQa5Qwbh2.jpg', NULL, '2024-08-28 06:30:00', '2024-10-07 07:47:27'),
(24, 'Karang Gigi', '### Perawatan Karang Gigi\r\n\r\nKarang gigi, atau kalkulus, adalah penumpukan plak yang mengeras pada gigi dan dapat menyebabkan berbagai masalah kesehatan mulut. Berikut adalah langkah-langkah perawatan dan pencegahan untuk karang gigi:\r\n\r\n#### 1. **Pembersihan Profesional**\r\n   - **Pemeriksaan Rutin**: Kunjungi dokter gigi setidaknya setiap enam bulan untuk pemeriksaan dan pembersihan profesional. Dokter gigi dapat menghilangkan karang gigi yang sudah terbentuk.\r\n   - **Scaling**: Proses pembersihan ini menghilangkan plak dan karang gigi dari permukaan gigi dan garis gusi.\r\n\r\n#### 2. **Perawatan di Rumah**\r\n   - **Sikat Gigi Secara Rutin**: Sikat gigi dua kali sehari dengan pasta gigi berfluoride untuk mencegah penumpukan plak.\r\n   - **Flossing**: Gunakan benang gigi setiap hari untuk membersihkan sela-sela gigi yang sulit dijangkau oleh sikat gigi.\r\n   - **Berkumur dengan Antiseptik**: Gunakan obat kumur yang mengandung antiseptik untuk membantu membunuh bakteri di mulut.\r\n\r\n#### 3. **Perubahan Pola Makan**\r\n   - **Batasi Makanan Manis**: Kurangi konsumsi gula dan makanan yang lengket, karena ini dapat memicu pertumbuhan plak.\r\n   - **Makan Buah dan Sayur**: Makanan yang kaya serat dapat membantu membersihkan gigi secara alami dan merangsang produksi air liur.\r\n\r\n#### 4. **Hidrasi yang Cukup**\r\n   - **Minum Air Putih**: Air membantu menjaga kebersihan mulut dan merangsang produksi air liur yang penting untuk melawan bakteri.\r\n\r\n#### 5. **Hindari Kebiasaan Buruk**\r\n   - **Berhenti Merokok**: Merokok dapat meningkatkan risiko penyakit gusi dan pembentukan karang gigi.\r\n   - **Kurangi Minuman Beralkohol**: Minuman beralkohol dapat mengeringkan mulut dan meningkatkan risiko penumpukan plak.\r\n\r\n### Kesimpulan\r\nPerawatan karang gigi sangat penting untuk menjaga kesehatan mulut. Dengan rutin memeriksakan gigi, menerapkan kebersihan gigi yang baik di rumah, dan mengubah pola makan, Anda dapat mencegah pembentukan karang gigi dan menjaga kesehatan gigi dan gusi. Jika Anda mengalami masalah dengan karang gigi, segera konsultasikan dengan dokter gigi untuk penanganan yang tepat.', 'video_upload', 'videos/4MqBrkV3pLv1Z2OtLvOSjFmXXF5ZOsdGPCZ7NFC2.mp4', NULL, '2024-08-28 06:45:00', '2024-10-07 07:49:01'),
(25, 'Pengertian Sariawan', '### Penyebab Sariawan\r\nPenyebab utama sariawan adalah jamur *Candida albicans*, yang biasanya ada dalam jumlah kecil di mulut tetapi dapat berkembang biak secara berlebihan. \r\n\r\nSelain itu, sariawan juga bisa disebabkan oleh berbagai faktor lain, seperti cedera, infeksi, atau alergi.\r\n\r\n### Faktor Risiko Sariawan\r\nSementara siapa saja bisa mengalami sariawan, beberapa faktor dapat memicu timbulnya masalah ini, antara lain:\r\n\r\n- Kebersihan mulut yang kurang terjaga.\r\n- Penggunaan gigi palsu yang tidak pas dan tidak dibersihkan secara rutin.\r\n- Kekurangan vitamin B dan zat besi.\r\n- Penggunaan antibiotik.\r\n- Mengonsumsi obat-obatan yang mengurangi produksi air liur.\r\n- Mengidap diabetes.\r\n- Sistem kekebalan tubuh yang lemah.\r\n- Kebiasaan merokok.\r\n- Menjalani pengobatan kemoterapi.\r\n\r\n### Gejala Sariawan\r\nSariawan biasanya tidak langsung terasa, melainkan berkembang perlahan dengan gejala sebagai berikut:\r\n\r\n- Sensasi terbakar di lidah.\r\n- Bagian dalam mulut dan tenggorokan tampak merah.\r\n- Ketidaknyamanan saat menelan.\r\n- Kemerahan dan nyeri pada area mulut yang terdapat gigi palsu.\r\n- Rasa tidak nyaman di dalam mulut.\r\n- Munculnya luka berwarna putih di lidah.\r\n- Pendarahan ringan saat terjadi gesekan.', 'foto', 'fotos/xAi9fW396Qj1gWjxAE1PW3aLlUiuFQEfiCgXeHWe.jpg', NULL, '2024-08-28 07:00:00', '2024-10-07 07:35:32'),
(26, 'Proses terjadinya lubang gigi', 'Beginilah proses terjadinya lubang gigi', 'video_upload', 'videos/yS1yTyvKWqIMu5NYkVShl41E2iUnDi8pvaeEdCtW.mp4', NULL, '2024-08-28 07:15:00', '2024-10-07 07:32:05'),
(27, 'Cara menggosok gigi anak-anak', 'Berikut adalah cara yang efektif untuk menggosok gigi anak-anak:\r\n\r\n1. **Pilih Sikat Gigi yang Sesuai**  \r\n   Gunakan sikat gigi dengan kepala kecil dan bulu yang lembut agar nyaman di mulut anak.\r\n\r\n2. **Gunakan Pasta Gigi Berfluoride**  \r\n   Pilih pasta gigi yang diformulasikan khusus untuk anak-anak. Gunakan jumlah kecil, sekitar ukuran biji kacang.\r\n\r\n3. **Ajak Anak untuk Duduk Nyaman**  \r\n   Pastikan anak duduk dengan nyaman di kursi, atau bisa juga duduk di pangkuan Anda untuk mendapatkan posisi yang lebih baik.\r\n\r\n4. **Gosok Gigi dengan Teknik yang Benar**  \r\n   - Mulailah dari gigi bagian depan, gosok dengan gerakan lembut dari gusi ke arah gigi.\r\n   - Lakukan gerakan melingkar atau dari atas ke bawah untuk membersihkan gigi belakang.\r\n   - Jangan lupa untuk membersihkan bagian dalam gigi dan lidah.\r\n\r\n5. **Durasi Menggosok Gigi**  \r\n   Ajak anak menggosok gigi selama sekitar 2 menit. Gunakan timer atau nyanyikan lagu pendek agar anak lebih terhibur.\r\n\r\n6. **Beri Contoh**  \r\n   Perlihatkan cara menggosok gigi yang benar. Anak-anak cenderung meniru apa yang dilakukan orang dewasa.\r\n\r\n7. **Buat Aktivitas Menyenangkan**  \r\n   Buat waktu menggosok gigi sebagai momen yang menyenangkan. Anda bisa menggunakan permainan atau mengajak anak memilih sikat gigi dengan karakter favorit mereka.\r\n\r\n8. **Ajarkan Pentingnya Kebersihan Gigi**  \r\n   Ceritakan kepada anak mengenai manfaat menjaga kesehatan gigi, seperti menghindari sakit gigi dan mendapatkan senyuman yang indah.\r\n\r\n9. **Periksa Hasilnya**  \r\n   Setelah selesai, periksa bersama anak untuk memastikan semua gigi sudah dibersihkan dengan baik.\r\n\r\nDengan pendekatan yang positif dan menyenangkan, anak-anak akan lebih suka menggosok gigi mereka!', 'video_upload', 'videos/eKI4yGoBcAUAgPreH5hhlVoszWfLEziVct5sWKLG.mp4', NULL, '2024-08-28 07:30:00', '2024-10-07 07:27:08'),
(28, 'Manfaat daun sirih', 'Berikut adalah beberapa manfaat daun sirih yang bisa Anda nikmati:\r\n\r\n**Mengurangi Bau Mulut**  \r\nGigi berlubang sering kali beriringan dengan bau mulut. Ketika gigi mengalami kerusakan, bakteri dan sisa makanan akan menumpuk, menyebabkan bau yang tidak sedap. Daun sirih mengandung minyak atsiri yang memberikan aroma segar, membantu mengurangi bau mulut yang tidak menyenangkan.\r\n\r\n**Mengurangi Bakteri di Mulut**  \r\nDaun sirih kaya akan kandungan antibakteri. Mengunyah daun sirih dapat menurunkan jumlah bakteri di mulut, yang juga membantu menjaga kesehatan gigi agar tidak mudah berlubang. Dengan demikian, gigi Anda akan tetap kuat dan terawat.\r\n\r\n**Meredakan Sakit Gigi**  \r\nGigi berlubang bisa menyebabkan sakit gigi yang dapat diredakan dengan mengunyah daun sirih. Sakit gigi akan semakin parah jika bakteri dan sisa makanan tertinggal di gigi yang berlubang. Dengan mengunyah daun sirih, bakteri dapat dibunuh, dan Anda bisa membersihkan sisa makanan yang ada.\r\n\r\n**Mencegah Gusi Bengkak**  \r\nGusi bengkak biasanya disebabkan oleh infeksi bakteri. Khasiat daun sirih yang dapat membunuh bakteri berfungsi untuk mencegah terjadinya gusi bengkak. Dengan membunuh bakteri sebelum infeksi terjadi, daun sirih membantu menjaga kesehatan gusi.\r\n\r\n**Mencegah Timbulnya Karang Gigi**\r\nKarang gigi terbentuk akibat penumpukan plak yang merusak enamel gigi. Daun sirih, yang efektif membunuh bakteri, juga dapat menghambat pembentukan plak, sehingga mencegah timbulnya karang gigi. Namun, tetaplah rutin menggosok gigi untuk hasil yang optimal.', 'foto', 'fotos/bzi9rdiVAuNGzSF0m4DWUzzpc8WqM7LzJOqUkjtn.jpg', NULL, '2024-08-28 07:45:00', '2024-10-07 07:23:45'),
(29, 'Cara Menjaga Gigi dan Mulut supaya sehat', 'Integrasi rekam medis gigi anak ke dalam sistem rekam medis elektronik yang lebih luas memungkinkan perawatan yang lebih terkoordinasi. Ini memfasilitasi berbagi informasi antara dokter gigi anak, dokter anak, dan spesialis lain, meningkatkan kualitas perawatan secara keseluruhan.', 'video_upload', 'videos/OZD6Prnp2wcvNeEywWQr9MtQt0ikgtK6Z0ZQNaU3.mp4', NULL, '2024-08-28 08:00:00', '2024-10-07 07:18:07'),
(30, 'Kebiasaan Menyikat Gigi yang Benar', '1. Genggam sikat gigi dan letakkan pasta gigi di atas sikat gigi\r\n2. Sikatlah gigi dengan gerakan melingkar selama 20 detik setiap bagian\r\n3. Berkumurlah secukupnya dengan air bersih untuk membersihkan gigi\r\nGigi kembali bersih bebas dari bakteri', 'video_upload', 'videos/vFpzIb6jXRoinKdsEDMNBAGPt8fFg1pzVHnRNTBE.mp4', NULL, '2024-08-28 08:15:00', '2024-10-07 07:07:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `icds`
--

CREATE TABLE `icds` (
  `code` varchar(255) NOT NULL,
  `name_id` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `icds`
--

INSERT INTO `icds` (`code`, `name_id`, `name_en`, `created_at`, `updated_at`) VALUES
('K02.0', 'Karies email', 'Dental caries limited to enamel', '2024-08-28 02:00:00', '2024-08-28 02:00:00'),
('K02.1', 'Karies dentin', 'Dental caries of dentine', '2024-08-28 02:05:00', '2024-08-28 02:05:00'),
('K02.2', 'Karies sementum', 'Dental caries of cementum', '2024-08-28 02:10:00', '2024-08-28 02:10:00'),
('K02.3', 'Karies gigi yang terhenti', 'Arrested dental caries', '2024-08-28 02:15:00', '2024-08-28 02:15:00'),
('K02.9', 'Karies gigi, tidak spesifik', 'Dental caries, unspecified', '2024-08-28 02:20:00', '2024-08-28 02:20:00'),
('K03.0', 'Atrisi gigi yang berlebihan', 'Excessive attrition of teeth', '2024-08-28 02:25:00', '2024-08-28 02:25:00'),
('K03.1', 'Abrasi gigi', 'Abrasion of teeth', '2024-08-28 02:30:00', '2024-08-28 02:30:00'),
('K03.2', 'Erosi gigi', 'Erosion of teeth', '2024-08-28 02:35:00', '2024-08-28 02:35:00'),
('K03.3', 'Resorpsi patologis gigi', 'Pathological resorption of teeth', '2024-08-28 02:40:00', '2024-08-28 02:40:00'),
('K03.4', 'Hipersementosis', 'Hypercementosis', '2024-08-28 02:45:00', '2024-08-28 02:45:00'),
('K03.5', 'Ankilosis gigi', 'Ankylosis of teeth', '2024-08-28 02:50:00', '2024-08-28 02:50:00'),
('K03.6', 'Deposit [akrasi] pada gigi', 'Deposits [accretions] on teeth', '2024-08-28 02:55:00', '2024-08-28 02:55:00'),
('K03.7', 'Perubahan warna keras jaringan gigi pasca-erupsi', 'Posteruptive colour changes of dental hard tissues', '2024-08-28 03:00:00', '2024-08-28 03:00:00'),
('K03.8', 'Gangguan lain pada jaringan keras gigi', 'Other specified diseases of hard tissues of teeth', '2024-08-28 03:05:00', '2024-08-28 03:05:00'),
('K03.9', 'Penyakit jaringan keras gigi, tidak spesifik', 'Disease of hard tissues of teeth, unspecified', '2024-08-28 03:10:00', '2024-08-28 03:10:00'),
('K04.0', 'Pulpitis', 'Pulpitis', '2024-08-28 03:15:00', '2024-08-28 03:15:00'),
('K04.1', 'Nekrosis pulpa', 'Necrosis of pulp', '2024-08-28 03:20:00', '2024-08-28 03:20:00'),
('K04.2', 'Degenerasi pulpa', 'Pulp degeneration', '2024-08-28 03:25:00', '2024-08-28 03:25:00'),
('K04.3', 'Pembentukan jaringan keras abnormal dalam pulpa', 'Abnormal hard tissue formation in pulp', '2024-08-28 03:30:00', '2024-08-28 03:30:00'),
('K04.4', 'Periodontitis apikal akut asal pulpa', 'Acute apical periodontitis of pulpal origin', '2024-08-28 03:35:00', '2024-08-28 03:35:00'),
('K04.5', 'Periodontitis apikal kronis', 'Chronic apical periodontitis', '2024-08-28 03:40:00', '2024-08-28 03:40:00'),
('K04.6', 'Abses periapikal dengan sinus', 'Periapical abscess with sinus', '2024-08-28 03:45:00', '2024-08-28 03:45:00'),
('K04.7', 'Abses periapikal tanpa sinus', 'Periapical abscess without sinus', '2024-08-28 03:50:00', '2024-08-28 03:50:00'),
('K04.8', 'Kista radikular', 'Radicular cyst', '2024-08-28 03:55:00', '2024-08-28 03:55:00'),
('K04.9', 'Penyakit pulpa dan jaringan periapikal lainnya', 'Other and unspecified diseases of pulp and periapical tissues', '2024-08-28 04:00:00', '2024-08-28 04:00:00'),
('K05.0', 'Gingivitis akut', 'Acute gingivitis', '2024-08-28 04:05:00', '2024-08-28 04:05:00'),
('K05.1', 'Gingivitis kronis', 'Chronic gingivitis', '2024-08-28 04:10:00', '2024-08-28 04:10:00'),
('K05.2', 'Periodontitis akut', 'Acute periodontitis', '2024-08-28 04:15:00', '2024-08-28 04:15:00'),
('K05.3', 'Periodontitis kronis', 'Chronic periodontitis', '2024-08-28 04:20:00', '2024-08-28 04:20:00'),
('K05.4', 'Periodontosis', 'Periodontosis', '2024-08-28 04:25:00', '2024-08-28 04:25:00'),
('K05.5', 'Penyakit periodontal lainnya', 'Other periodontal diseases', '2024-08-28 04:30:00', '2024-08-28 04:30:00'),
('K05.6', 'Penyakit periodontal, tidak spesifik', 'Periodontal disease, unspecified', '2024-08-28 04:35:00', '2024-08-28 04:35:00'),
('K06.0', 'Resesi gingiva', 'Gingival recession', '2024-08-28 04:40:00', '2024-08-28 04:40:00'),
('K06.1', 'Pembesaran gingiva', 'Gingival enlargement', '2024-08-28 04:45:00', '2024-08-28 04:45:00'),
('K06.2', 'Lesi gingiva dan ridge edentulous terkait trauma', 'Gingival and edentulous alveolar ridge lesions associated with trauma', '2024-08-28 04:50:00', '2024-08-28 04:50:00'),
('K06.8', 'Gangguan gingiva dan ridge alveolar edentulous lainnya', 'Other specified disorders of gingiva and edentulous alveolar ridge', '2024-08-28 04:55:00', '2024-08-28 04:55:00'),
('K06.9', 'Gangguan gingiva dan ridge alveolar edentulous, tidak spesifik', 'Disorder of gingiva and edentulous alveolar ridge, unspecified', '2024-08-28 05:00:00', '2024-08-28 05:00:00'),
('K07.0', 'Anomali besar rahang utama', 'Major anomalies of jaw size', '2024-08-28 05:05:00', '2024-08-28 05:05:00'),
('K07.1', 'Anomali hubungan rahang-dasar tengkorak', 'Anomalies of jaw-cranial base relationship', '2024-08-28 05:10:00', '2024-08-28 05:10:00'),
('K07.2', 'Anomali hubungan lengkung gigi', 'Anomalies of dental arch relationship', '2024-08-28 05:15:00', '2024-08-28 05:15:00'),
('K07.3', 'Anomali posisi gigi', 'Anomalies of tooth position', '2024-08-28 05:20:00', '2024-08-28 05:20:00'),
('K07.4', 'Maloklusi, tidak spesifik', 'Malocclusion, unspecified', '2024-08-28 05:25:00', '2024-08-28 05:25:00'),
('K07.5', 'Abnormalitas dentofasial fungsional', 'Dentofacial functional abnormalities', '2024-08-28 05:30:00', '2024-08-28 05:30:00'),
('K07.6', 'Gangguan sendi temporomandibular', 'Temporomandibular joint disorders', '2024-08-28 05:35:00', '2024-08-28 05:35:00'),
('K08.0', 'Eksfoliasi gigi karena penyebab sistemik', 'Exfoliation of teeth due to systemic causes', '2024-08-28 05:40:00', '2024-08-28 05:40:00'),
('K08.1', 'Hilangnya gigi karena kecelakaan, ekstraksi atau penyakit periodontal lokal', 'Loss of teeth due to accident, extraction or local periodontal disease', '2024-08-28 05:45:00', '2024-08-28 05:45:00'),
('K08.2', 'Atrofi ridge alveolar edentulous', 'Atrophy of edentulous alveolar ridge', '2024-08-28 05:50:00', '2024-08-28 05:50:00'),
('K08.3', 'Akar gigi yang tertinggal', 'Retained dental root', '2024-08-28 05:55:00', '2024-08-28 05:55:00'),
('K08.8', 'Gangguan lain pada gigi dan struktur pendukung', 'Other specified disorders of teeth and supporting structures', '2024-08-28 06:00:00', '2024-08-28 06:00:00'),
('K08.9', 'Gangguan gigi dan struktur pendukung, tidak spesifik', 'Disorder of teeth and supporting structures, unspecified', '2024-08-28 06:05:00', '2024-08-28 06:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_pasien`
--

CREATE TABLE `jawaban_pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan_id` bigint(20) UNSIGNED NOT NULL,
  `opsi_jawaban_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jawaban_pasien`
--

INSERT INTO `jawaban_pasien` (`id`, `pasien_id`, `pertanyaan_id`, `opsi_jawaban_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(582, 68, 1, 1, NULL, '2024-09-14 03:52:08', '2024-09-14 03:52:08'),
(583, 68, 30, 85, NULL, '2024-09-14 03:52:08', '2024-09-14 03:52:08'),
(584, 68, 31, 86, NULL, '2024-09-14 03:52:08', '2024-09-14 03:52:08'),
(585, 69, 1, 1, NULL, '2024-09-14 03:56:44', '2024-09-14 03:56:44'),
(586, 69, 15, 54, NULL, '2024-09-14 03:56:44', '2024-09-14 03:56:44'),
(587, 69, 27, 79, NULL, '2024-09-14 03:56:44', '2024-09-14 03:56:44'),
(588, 73, 5, 21, NULL, '2024-09-23 03:33:17', '2024-09-23 03:33:17'),
(589, 73, 7, 29, NULL, '2024-09-23 03:33:17', '2024-09-23 03:33:17'),
(590, 73, 11, 46, NULL, '2024-09-23 03:33:17', '2024-09-23 03:33:17'),
(591, 73, 20, 64, NULL, '2024-09-23 03:33:17', '2024-09-23 03:33:17'),
(592, 85, 2, 2, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(593, 85, 3, 14, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(594, 85, 4, 17, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(595, 85, 5, 21, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(596, 85, 10, 44, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(597, 85, 11, 47, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(598, 85, 16, 57, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(599, 85, 17, 59, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(600, 85, 26, 77, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(601, 85, 27, 79, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(602, 85, 29, 83, NULL, '2024-09-27 01:31:41', '2024-09-27 01:31:41'),
(603, 86, 2, 2, NULL, '2024-09-27 02:13:27', '2024-09-27 02:13:27'),
(604, 86, 8, 33, NULL, '2024-09-27 02:13:27', '2024-09-27 02:13:27'),
(605, 86, 12, 48, NULL, '2024-09-27 02:13:27', '2024-09-27 02:13:27'),
(606, 86, 13, 51, NULL, '2024-09-27 02:13:27', '2024-09-27 02:13:27'),
(607, 86, 17, 59, NULL, '2024-09-27 02:13:27', '2024-09-27 02:13:27'),
(608, 87, 1, 1, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(609, 87, 10, 44, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(610, 87, 11, 47, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(611, 87, 12, 49, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(612, 87, 13, 51, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(613, 87, 14, 53, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(614, 87, 15, 55, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(615, 87, 16, 57, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(616, 87, 17, 58, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(617, 87, 18, 61, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(618, 87, 19, 63, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(619, 87, 20, 65, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(620, 87, 21, 67, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(621, 87, 22, 69, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(622, 87, 23, 70, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(623, 87, 24, 72, 'teh', '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(624, 87, 25, 75, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(625, 87, 26, 77, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(626, 87, 27, 79, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(627, 87, 28, 81, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(628, 87, 29, 83, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(629, 87, 30, 85, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(630, 87, 31, 87, NULL, '2024-09-28 02:53:11', '2024-09-28 02:53:11'),
(631, 88, 2, 2, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(632, 88, 3, 12, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(633, 88, 4, 18, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(634, 88, 5, 21, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(635, 88, 6, 25, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(636, 88, 7, 30, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(637, 88, 8, 34, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(638, 88, 9, 43, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(639, 88, 10, 44, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(640, 88, 11, 47, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(641, 88, 12, 49, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(642, 88, 13, 51, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(643, 88, 14, 53, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(644, 88, 15, 55, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(645, 88, 16, 57, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(646, 88, 17, 58, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(647, 88, 18, 61, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(648, 88, 19, 62, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(649, 88, 20, 64, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(650, 88, 21, 66, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(651, 88, 22, 68, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(652, 88, 23, 70, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(653, 88, 24, 72, 'teh', '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(654, 88, 25, 75, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(655, 88, 26, 77, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(656, 88, 27, 79, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(657, 88, 28, 80, 'kanan', '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(658, 88, 29, 83, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(659, 88, 30, 84, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(660, 88, 31, 87, NULL, '2024-09-28 03:01:49', '2024-09-28 03:01:49'),
(661, 89, 1, 1, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(662, 89, 2, 2, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(663, 89, 3, 11, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(664, 89, 4, 20, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(665, 89, 5, 24, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(666, 89, 6, 28, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(667, 89, 7, 31, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(668, 89, 8, 33, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(669, 89, 9, 43, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(670, 89, 10, 44, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(671, 89, 11, 46, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(672, 89, 12, 49, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(673, 89, 13, 51, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(674, 89, 14, 53, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(675, 89, 15, 55, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(676, 89, 16, 57, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(677, 89, 17, 58, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(678, 89, 18, 61, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(679, 89, 19, 62, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(680, 89, 20, 64, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(681, 89, 21, 66, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(682, 89, 22, 68, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(683, 89, 23, 70, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(684, 89, 24, 73, 'tapi pernah meminum', '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(685, 89, 25, 75, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(686, 89, 26, 77, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(687, 89, 27, 79, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(688, 89, 28, 80, 'kiri', '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(689, 89, 29, 83, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(690, 89, 30, 85, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(691, 89, 31, 87, NULL, '2024-09-28 03:08:52', '2024-09-28 03:08:52'),
(692, 91, 1, 1, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(693, 91, 2, 8, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(694, 91, 3, 15, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(695, 91, 4, 20, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(696, 91, 5, 24, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(697, 91, 6, 28, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(698, 91, 9, 43, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(699, 91, 10, 44, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(700, 91, 11, 47, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(701, 91, 12, 49, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(702, 91, 13, 51, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(703, 91, 14, 53, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(704, 91, 15, 55, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(705, 91, 16, 56, 'alergi dingin', '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(706, 91, 17, 58, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(707, 91, 18, 61, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(708, 91, 19, 62, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(709, 91, 20, 64, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(710, 91, 21, 67, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(711, 91, 22, 69, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(712, 91, 23, 70, 'buah', '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(713, 91, 24, 72, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(714, 91, 25, 75, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(715, 91, 26, 77, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(716, 91, 27, 79, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(717, 91, 28, 80, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(718, 91, 29, 83, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(719, 91, 30, 85, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(720, 91, 31, 86, NULL, '2024-09-28 03:12:04', '2024-09-28 03:12:04'),
(721, 90, 2, 2, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(722, 90, 3, 10, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(723, 90, 4, 18, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(724, 90, 5, 22, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(725, 90, 6, 26, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(726, 90, 7, 31, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(727, 90, 8, 37, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(728, 90, 9, 42, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(729, 90, 10, 45, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(730, 90, 11, 47, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(731, 90, 12, 49, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(732, 90, 13, 51, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(733, 90, 14, 53, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(734, 90, 15, 55, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(735, 90, 16, 57, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(736, 90, 17, 58, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(737, 90, 18, 61, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(738, 90, 19, 62, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(739, 90, 20, 64, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(740, 90, 21, 66, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(741, 90, 22, 68, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(742, 90, 23, 70, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(743, 90, 24, 72, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(744, 90, 25, 75, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(745, 90, 26, 76, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(746, 90, 27, 79, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(747, 90, 28, 80, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(748, 90, 29, 83, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(749, 90, 30, 84, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(750, 90, 31, 87, NULL, '2024-09-28 03:14:29', '2024-09-28 03:14:29'),
(751, 92, 1, 1, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(752, 92, 2, 8, 'tidak ada', '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(753, 92, 3, 15, 'tidak ada', '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(754, 92, 9, 42, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(755, 92, 10, 44, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(756, 92, 11, 47, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(757, 92, 12, 49, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(758, 92, 13, 50, 'udang', '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(759, 92, 14, 53, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(760, 92, 15, 55, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(761, 92, 16, 57, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(762, 92, 17, 58, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(763, 92, 18, 61, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(764, 92, 19, 63, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(765, 92, 20, 64, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(766, 92, 21, 67, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(767, 92, 22, 69, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(768, 92, 23, 71, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(769, 92, 24, 73, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(770, 92, 25, 75, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(771, 92, 26, 77, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(772, 92, 27, 79, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(773, 92, 28, 80, 'kiri', '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(774, 92, 29, 83, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(775, 92, 30, 85, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(776, 92, 31, 86, NULL, '2024-09-28 03:17:31', '2024-09-28 03:17:31'),
(777, 95, 2, 2, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(778, 95, 3, 14, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(779, 95, 4, 17, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(780, 95, 5, 21, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(781, 95, 6, 25, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(782, 95, 7, 31, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(783, 95, 8, 34, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(784, 95, 9, 43, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(785, 95, 10, 44, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(786, 95, 11, 47, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(787, 95, 12, 49, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(788, 95, 13, 51, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(789, 95, 14, 53, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(790, 95, 15, 55, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(791, 95, 16, 56, 'alergi dingin', '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(792, 95, 17, 58, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(793, 95, 18, 61, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(794, 95, 19, 63, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(795, 95, 20, 64, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(796, 95, 21, 67, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(797, 95, 22, 69, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(798, 95, 23, 70, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(799, 95, 24, 72, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(800, 95, 25, 75, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(801, 95, 26, 77, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(802, 95, 27, 79, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(803, 95, 28, 81, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(804, 95, 29, 83, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(805, 95, 30, 84, NULL, '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(806, 95, 31, 86, 'ketika capek', '2024-09-28 03:20:43', '2024-09-28 03:20:43'),
(807, 98, 1, 1, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(808, 98, 2, 2, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(809, 98, 3, 12, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(810, 98, 4, 18, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(811, 98, 5, 21, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(812, 98, 6, 28, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(813, 98, 7, 32, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(814, 98, 8, 37, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(815, 98, 9, 43, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(816, 98, 10, 44, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(817, 98, 11, 47, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(818, 98, 12, 49, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(819, 98, 13, 51, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(820, 98, 14, 53, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(821, 98, 15, 55, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(822, 98, 16, 57, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(823, 98, 17, 59, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(824, 98, 18, 61, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(825, 98, 19, 62, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(826, 98, 20, 64, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(827, 98, 21, 66, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(828, 98, 22, 69, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(829, 98, 23, 70, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(830, 98, 24, 72, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(831, 98, 25, 75, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(832, 98, 26, 77, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(833, 98, 27, 79, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(834, 98, 28, 81, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(835, 98, 29, 82, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(836, 98, 30, 85, NULL, '2024-09-28 03:22:31', '2024-09-28 03:22:31'),
(837, 97, 2, 2, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(838, 97, 3, 10, 'belakang atas kanan', '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(839, 97, 4, 17, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(840, 97, 5, 21, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(841, 97, 6, 25, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(842, 97, 7, 32, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(843, 97, 8, 37, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(844, 97, 9, 42, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(845, 97, 10, 44, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(846, 97, 11, 47, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(847, 97, 12, 49, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(848, 97, 13, 51, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(849, 97, 14, 53, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(850, 97, 15, 55, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(851, 97, 16, 57, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(852, 97, 17, 58, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(853, 97, 18, 61, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(854, 97, 19, 63, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(855, 97, 20, 64, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(856, 97, 21, 67, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(857, 97, 22, 68, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(858, 97, 23, 70, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(859, 97, 24, 73, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(860, 97, 25, 75, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(861, 97, 26, 77, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(862, 97, 27, 79, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(863, 97, 28, 81, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(864, 97, 29, 83, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(865, 97, 30, 85, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(866, 97, 31, 87, NULL, '2024-09-28 03:23:13', '2024-09-28 03:23:13'),
(867, 96, 1, 1, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(868, 96, 10, 44, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(869, 96, 11, 47, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(870, 96, 12, 49, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(871, 96, 13, 51, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(872, 96, 14, 53, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(873, 96, 15, 55, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(874, 96, 16, 57, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(875, 96, 17, 59, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(876, 96, 18, 61, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(877, 96, 19, 62, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(878, 96, 20, 64, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(879, 96, 21, 66, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(880, 96, 23, 70, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(881, 96, 24, 73, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(882, 96, 25, 75, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(883, 96, 26, 77, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(884, 96, 27, 79, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(885, 96, 28, 80, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(886, 96, 29, 83, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(887, 96, 30, 84, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(888, 96, 31, 87, NULL, '2024-09-28 03:23:23', '2024-09-28 03:23:23'),
(889, 100, 2, 2, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(890, 100, 3, 10, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(891, 100, 5, 21, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(892, 100, 6, 25, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(893, 100, 7, 30, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(894, 100, 8, 33, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(895, 100, 9, 42, 'rencana mau ke dokter gigi', '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(896, 100, 10, 44, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(897, 100, 11, 47, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(898, 100, 12, 49, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(899, 100, 13, 51, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(900, 100, 14, 53, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(901, 100, 15, 55, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(902, 100, 16, 57, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(903, 100, 17, 58, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(904, 100, 18, 61, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(905, 100, 19, 62, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(906, 100, 20, 64, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(907, 100, 21, 66, 'Ya menurut anak anak', '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(908, 100, 22, 69, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(909, 100, 23, 71, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(910, 100, 24, 73, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(911, 100, 25, 75, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(912, 100, 26, 76, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(913, 100, 27, 79, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(914, 100, 28, 80, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(915, 100, 29, 83, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(916, 100, 30, 84, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(917, 100, 31, 87, NULL, '2024-09-28 03:23:48', '2024-09-28 03:23:48'),
(918, 101, 1, 1, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(919, 101, 2, 8, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(920, 101, 3, 15, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(921, 101, 4, 20, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(922, 101, 5, 24, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(923, 101, 6, 28, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(924, 101, 10, 44, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(925, 101, 11, 47, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(926, 101, 12, 49, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(927, 101, 13, 51, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(928, 101, 14, 53, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(929, 101, 15, 55, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(930, 101, 16, 57, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(931, 101, 17, 58, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(932, 101, 18, 61, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(933, 101, 19, 62, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(934, 101, 20, 64, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(935, 101, 21, 66, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(936, 101, 22, 69, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(937, 101, 23, 70, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(938, 101, 24, 72, 'teh', '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(939, 101, 25, 75, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(940, 101, 26, 77, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(941, 101, 27, 79, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(942, 101, 28, 80, 'kiri', '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(943, 101, 29, 83, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(944, 101, 30, 85, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(945, 101, 31, 87, NULL, '2024-09-28 03:25:33', '2024-09-28 03:25:33'),
(946, 99, 1, 1, 'pernah sakit gigi', '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(947, 99, 2, 2, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(948, 99, 3, 12, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(949, 99, 4, 17, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(950, 99, 5, 21, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(951, 99, 6, 25, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(952, 99, 7, 32, 'tidak', '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(953, 99, 8, 37, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(954, 99, 9, 42, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(955, 99, 10, 44, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(956, 99, 11, 46, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(957, 99, 12, 49, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(958, 99, 13, 51, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(959, 99, 14, 53, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(960, 99, 15, 55, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(961, 99, 16, 56, 'dingin', '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(962, 99, 17, 58, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(963, 99, 18, 61, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(964, 99, 19, 63, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(965, 99, 20, 64, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(966, 99, 21, 66, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(967, 99, 22, 69, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(968, 99, 23, 70, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(969, 99, 24, 72, 'teh sering', '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(970, 99, 25, 75, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(971, 99, 26, 77, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(972, 99, 27, 78, 'pernah', '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(973, 99, 28, 81, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(974, 99, 29, 83, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(975, 99, 30, 85, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(976, 99, 31, 87, NULL, '2024-09-28 03:26:25', '2024-09-28 03:26:25'),
(977, 103, 1, 1, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(978, 103, 2, 8, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(979, 103, 3, 15, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(980, 103, 4, 20, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(981, 103, 5, 24, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(982, 103, 6, 28, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(983, 103, 8, 37, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(984, 103, 9, 42, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(985, 103, 10, 44, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(986, 103, 11, 47, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(987, 103, 12, 49, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(988, 103, 13, 51, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(989, 103, 14, 53, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(990, 103, 15, 55, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(991, 103, 16, 57, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(992, 103, 17, 59, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(993, 103, 18, 61, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(994, 103, 19, 62, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(995, 103, 20, 64, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(996, 103, 21, 67, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(997, 103, 22, 68, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(998, 103, 23, 70, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(999, 103, 24, 72, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(1000, 103, 25, 75, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(1001, 103, 26, 76, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(1002, 103, 27, 79, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(1003, 103, 28, 80, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(1004, 103, 29, 83, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(1005, 103, 30, 84, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(1006, 103, 31, 87, NULL, '2024-09-28 03:29:39', '2024-09-28 03:29:39'),
(1007, 105, 1, 1, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1008, 105, 2, 8, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1009, 105, 3, 15, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1010, 105, 4, 20, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1011, 105, 5, 24, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1012, 105, 6, 28, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1013, 105, 10, 44, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1014, 105, 11, 46, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1015, 105, 12, 49, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1016, 105, 13, 50, 'kerang', '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1017, 105, 14, 53, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1018, 105, 15, 55, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1019, 105, 16, 57, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1020, 105, 17, 58, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1021, 105, 18, 61, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1022, 105, 19, 63, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1023, 105, 20, 64, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1024, 105, 21, 66, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1025, 105, 22, 68, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1026, 105, 23, 70, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1027, 105, 24, 72, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1028, 105, 25, 75, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1029, 105, 26, 77, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1030, 105, 27, 79, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1031, 105, 28, 80, 'kanan', '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1032, 105, 29, 83, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1033, 105, 30, 84, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1034, 105, 31, 87, NULL, '2024-09-28 03:30:17', '2024-09-28 03:30:17'),
(1065, 102, 2, 3, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1066, 102, 3, 11, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1067, 102, 4, 18, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1068, 102, 5, 21, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1069, 102, 6, 25, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1070, 102, 7, 32, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1071, 102, 8, 37, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1072, 102, 10, 44, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1073, 102, 11, 47, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1074, 102, 12, 49, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1075, 102, 13, 51, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1076, 102, 14, 53, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1077, 102, 15, 55, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1078, 102, 16, 57, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1079, 102, 17, 59, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1080, 102, 18, 61, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1081, 102, 19, 62, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1082, 102, 20, 64, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1083, 102, 21, 66, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1084, 102, 22, 68, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1085, 102, 23, 70, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1086, 102, 24, 72, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1087, 102, 25, 75, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1088, 102, 26, 77, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1089, 102, 27, 79, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1090, 102, 28, 80, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1091, 102, 29, 83, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1092, 102, 30, 85, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1093, 102, 31, 87, NULL, '2024-09-28 03:31:25', '2024-09-28 03:31:25'),
(1094, 104, 1, 1, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1095, 104, 2, 2, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1096, 104, 3, 12, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1097, 104, 4, 18, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1098, 104, 5, 21, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1099, 104, 6, 25, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1100, 104, 7, 32, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1101, 104, 8, 37, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1102, 104, 9, 43, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1103, 104, 10, 44, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1104, 104, 11, 47, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1105, 104, 12, 49, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1106, 104, 13, 51, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1107, 104, 14, 53, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1108, 104, 15, 55, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1109, 104, 16, 57, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1110, 104, 17, 58, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1111, 104, 18, 61, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1112, 104, 19, 62, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1113, 104, 20, 64, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1114, 104, 21, 66, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1115, 104, 22, 69, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1116, 104, 23, 70, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1117, 104, 24, 73, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1118, 104, 25, 75, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1119, 104, 26, 77, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1120, 104, 27, 79, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1121, 104, 28, 81, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1122, 104, 29, 83, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1123, 104, 30, 85, NULL, '2024-09-28 03:33:31', '2024-09-28 03:33:31'),
(1124, 106, 2, 2, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1125, 106, 3, 9, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1126, 106, 7, 31, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1127, 106, 8, 33, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1128, 106, 9, 42, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1129, 106, 10, 44, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1130, 106, 11, 47, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1131, 106, 12, 49, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1132, 106, 13, 51, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1133, 106, 14, 53, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1134, 106, 15, 55, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1135, 106, 16, 57, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1136, 106, 17, 59, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1137, 106, 18, 61, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1138, 106, 19, 62, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1139, 106, 20, 64, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1140, 106, 21, 67, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1141, 106, 22, 69, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1142, 106, 23, 71, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1143, 106, 24, 72, 'teh', '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1144, 106, 25, 75, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1145, 106, 26, 77, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1146, 106, 27, 79, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1147, 106, 28, 80, 'kanan', '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1148, 106, 29, 83, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1149, 106, 30, 85, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1150, 106, 31, 87, NULL, '2024-09-28 03:33:39', '2024-09-28 03:33:39'),
(1151, 108, 1, 1, 'ada keluhan', '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1152, 108, 2, 3, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1153, 108, 3, 14, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1154, 108, 4, 20, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1155, 108, 5, 24, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1156, 108, 6, 28, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1157, 108, 7, 29, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1158, 108, 8, 33, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1159, 108, 9, 43, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1160, 108, 10, 44, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1161, 108, 11, 46, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1162, 108, 12, 49, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1163, 108, 13, 51, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1164, 108, 14, 53, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1165, 108, 15, 55, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1166, 108, 16, 57, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1167, 108, 17, 58, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1168, 108, 18, 61, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1169, 108, 19, 62, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1170, 108, 20, 64, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1171, 108, 21, 67, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1172, 108, 22, 68, 'baru rencana', '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1173, 108, 23, 70, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1174, 108, 24, 73, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1175, 108, 25, 75, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1176, 108, 26, 77, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1177, 108, 27, 79, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1178, 108, 28, 81, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1179, 108, 29, 83, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1180, 108, 30, 84, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1181, 108, 31, 87, NULL, '2024-09-28 03:35:50', '2024-09-28 03:35:50'),
(1182, 107, 10, 44, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1183, 107, 11, 47, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1184, 107, 12, 49, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1185, 107, 13, 51, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1186, 107, 14, 53, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1187, 107, 15, 55, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1188, 107, 16, 57, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1189, 107, 17, 59, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1190, 107, 18, 61, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1191, 107, 19, 62, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1192, 107, 20, 64, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1193, 107, 21, 66, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1194, 107, 22, 69, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1195, 107, 23, 71, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1196, 107, 24, 73, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1197, 107, 25, 75, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1198, 107, 26, 77, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1199, 107, 27, 79, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1200, 107, 28, 80, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1201, 107, 29, 83, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1202, 107, 30, 85, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1203, 107, 31, 87, NULL, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(1204, 110, 1, 1, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1205, 110, 2, 8, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1206, 110, 3, 15, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1207, 110, 4, 20, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1208, 110, 5, 24, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1209, 110, 6, 28, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1210, 110, 7, 32, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1211, 110, 8, 37, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1212, 110, 9, 43, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1213, 110, 10, 44, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1214, 110, 11, 47, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1215, 110, 12, 49, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1216, 110, 13, 51, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1217, 110, 14, 53, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1218, 110, 15, 55, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1219, 110, 16, 57, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1220, 110, 17, 59, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1221, 110, 18, 61, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1222, 110, 19, 62, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1223, 110, 20, 64, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1224, 110, 21, 66, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1225, 110, 22, 68, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1226, 110, 23, 70, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1227, 110, 24, 72, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1228, 110, 25, 75, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1229, 110, 26, 76, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1230, 110, 27, 79, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1231, 110, 28, 80, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1232, 110, 29, 83, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1233, 110, 30, 84, 'Memiliki kebiasaa menguyah es batu', '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1234, 110, 31, 87, NULL, '2024-09-28 03:36:37', '2024-09-28 03:36:37'),
(1235, 112, 17, 58, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1236, 112, 18, 61, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1237, 112, 20, 64, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1238, 112, 21, 66, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1239, 112, 22, 68, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1240, 112, 23, 70, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1241, 112, 24, 73, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1242, 112, 25, 75, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1243, 112, 26, 77, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1244, 112, 27, 79, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1245, 112, 28, 80, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1246, 112, 29, 83, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1247, 112, 30, 85, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1248, 112, 31, 87, NULL, '2024-09-28 03:38:53', '2024-09-28 03:38:53'),
(1249, 113, 1, 1, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1250, 113, 2, 2, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1251, 113, 3, 11, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1252, 113, 4, 17, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1253, 113, 5, 21, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1254, 113, 6, 25, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1255, 113, 7, 31, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1256, 113, 8, 37, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1257, 113, 9, 42, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1258, 113, 10, 44, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1259, 113, 11, 47, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1260, 113, 12, 49, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1261, 113, 13, 51, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1262, 113, 14, 53, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1263, 113, 15, 55, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1264, 113, 16, 57, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1265, 113, 17, 58, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1266, 113, 18, 61, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1267, 113, 19, 62, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1268, 113, 20, 64, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1269, 113, 21, 66, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1270, 113, 22, 69, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1271, 113, 23, 70, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1272, 113, 24, 72, 'teh', '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1273, 113, 25, 75, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1274, 113, 26, 77, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1275, 113, 27, 79, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1276, 113, 28, 81, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1277, 113, 29, 83, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1278, 113, 30, 85, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1279, 113, 31, 87, NULL, '2024-09-28 03:39:29', '2024-09-28 03:39:29'),
(1280, 114, 1, 1, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1281, 114, 2, 8, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1282, 114, 3, 15, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1283, 114, 4, 20, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1284, 114, 5, 24, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1285, 114, 6, 28, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1286, 114, 10, 44, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1287, 114, 11, 47, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1288, 114, 12, 49, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1289, 114, 13, 51, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1290, 114, 14, 53, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1291, 114, 15, 55, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1292, 114, 16, 57, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1293, 114, 17, 58, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1294, 114, 18, 61, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1295, 114, 19, 62, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1296, 114, 20, 64, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1297, 114, 21, 66, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1298, 114, 22, 68, 'sedikit', '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1299, 114, 23, 70, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1300, 114, 24, 73, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1301, 114, 25, 75, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1302, 114, 26, 77, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1303, 114, 27, 79, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1304, 114, 28, 81, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1305, 114, 29, 83, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1306, 114, 30, 85, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1307, 114, 31, 87, NULL, '2024-09-28 03:39:41', '2024-09-28 03:39:41'),
(1308, 116, 1, 1, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1309, 116, 2, 2, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1310, 116, 3, 13, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1311, 116, 4, 18, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1312, 116, 5, 21, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1313, 116, 6, 27, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1314, 116, 7, 30, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1315, 116, 8, 37, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1316, 116, 9, 41, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1317, 116, 10, 44, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1318, 116, 11, 47, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1319, 116, 12, 49, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1320, 116, 13, 51, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1321, 116, 14, 53, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1322, 116, 15, 55, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1323, 116, 16, 57, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43');
INSERT INTO `jawaban_pasien` (`id`, `pasien_id`, `pertanyaan_id`, `opsi_jawaban_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1324, 116, 17, 58, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1325, 116, 18, 60, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1326, 116, 19, 62, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1327, 116, 20, 64, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1328, 116, 21, 66, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1329, 116, 22, 69, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1330, 116, 23, 70, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1331, 116, 24, 73, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1332, 116, 25, 75, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1333, 116, 26, 77, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1334, 116, 27, 79, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1335, 116, 29, 82, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1336, 116, 30, 85, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1337, 116, 31, 87, NULL, '2024-09-28 03:41:43', '2024-09-28 03:41:43'),
(1338, 115, 1, 1, 'gigi goyang', '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1339, 115, 2, 2, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1340, 115, 3, 9, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1341, 115, 4, 17, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1342, 115, 5, 21, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1343, 115, 6, 28, 'waktu menggosok gigi', '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1344, 115, 7, 32, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1345, 115, 8, 33, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1346, 115, 9, 42, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1347, 115, 10, 44, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1348, 115, 11, 47, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1349, 115, 12, 49, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1350, 115, 13, 51, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1351, 115, 14, 53, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1352, 115, 15, 55, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1353, 115, 16, 57, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1354, 115, 17, 59, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1355, 115, 18, 61, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1356, 115, 19, 62, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1357, 115, 20, 64, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1358, 115, 21, 67, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1359, 115, 22, 68, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1360, 115, 23, 70, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1361, 115, 24, 72, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1362, 115, 25, 75, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1363, 115, 26, 76, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1364, 115, 27, 79, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1365, 115, 28, 80, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1366, 115, 29, 83, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1367, 115, 30, 84, 'kebiasaan mengunyah es batu', '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1368, 115, 31, 87, NULL, '2024-09-28 03:41:51', '2024-09-28 03:41:51'),
(1369, 117, 2, 2, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1370, 117, 3, 14, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1371, 117, 4, 19, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1372, 117, 5, 21, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1373, 117, 7, 30, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1374, 117, 8, 33, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1375, 117, 9, 42, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1376, 117, 10, 44, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1377, 117, 11, 47, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1378, 117, 12, 49, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1379, 117, 13, 51, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1380, 117, 14, 53, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1381, 117, 15, 55, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1382, 117, 16, 57, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1383, 117, 17, 58, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1384, 117, 18, 60, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1385, 117, 19, 62, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1386, 117, 20, 64, '3 kali kadang kadang', '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1387, 117, 21, 66, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1388, 117, 22, 68, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1389, 117, 23, 71, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1390, 117, 24, 73, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1391, 117, 25, 75, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1392, 117, 26, 77, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1393, 117, 27, 79, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1394, 117, 28, 80, 'kanan', '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1395, 117, 29, 83, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1396, 117, 30, 84, 'es batu', '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1397, 117, 31, 87, NULL, '2024-09-28 03:44:50', '2024-09-28 03:44:50'),
(1398, 120, 1, 1, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1399, 120, 2, 8, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1400, 120, 3, 15, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1401, 120, 4, 20, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1402, 120, 5, 24, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1403, 120, 6, 28, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1404, 120, 10, 44, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1405, 120, 11, 47, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1406, 120, 12, 49, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1407, 120, 13, 51, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1408, 120, 14, 53, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1409, 120, 15, 55, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1410, 120, 16, 57, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1411, 120, 17, 59, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1412, 120, 18, 61, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1413, 120, 19, 62, 'sikat gigi', '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1414, 120, 20, 64, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1415, 120, 22, 69, 'cuman digosok gosok aja', '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1416, 120, 23, 71, 'jarang', '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1417, 120, 24, 73, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1418, 120, 25, 75, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1419, 120, 26, 77, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1420, 120, 27, 79, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1421, 120, 28, 80, 'kanan', '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1422, 120, 29, 83, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1423, 120, 30, 85, NULL, '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1424, 120, 31, 87, 'tidak tahu', '2024-09-28 03:46:58', '2024-09-28 03:46:58'),
(1425, 118, 2, 2, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1426, 118, 3, 10, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1427, 118, 4, 18, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1428, 118, 5, 21, 'Jarang', '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1429, 118, 6, 26, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1430, 118, 7, 31, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1431, 118, 8, 33, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1432, 118, 9, 42, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1433, 118, 10, 44, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1434, 118, 11, 47, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1435, 118, 12, 49, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1436, 118, 13, 51, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1437, 118, 14, 53, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1438, 118, 15, 55, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1439, 118, 16, 57, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1440, 118, 17, 59, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1441, 118, 18, 61, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1442, 118, 19, 63, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1443, 118, 20, 65, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1444, 118, 21, 67, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1445, 118, 22, 69, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1446, 118, 23, 71, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1447, 118, 24, 72, 'setiap hari minum teh', '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1448, 118, 25, 75, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1449, 118, 26, 77, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1450, 118, 27, 79, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1451, 118, 28, 81, 'mengunyah dua sisi', '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1452, 118, 29, 83, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1453, 118, 30, 84, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1454, 118, 31, 87, NULL, '2024-09-28 03:47:30', '2024-09-28 03:47:30'),
(1455, 119, 1, 1, 'gigi berlubang', '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1456, 119, 2, 2, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1457, 119, 3, 12, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1458, 119, 4, 20, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1459, 119, 5, 24, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1460, 119, 6, 28, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1461, 119, 7, 31, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1462, 119, 8, 37, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1463, 119, 9, 42, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1464, 119, 10, 45, 'batuk', '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1465, 119, 11, 46, 'demam', '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1466, 119, 12, 49, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1467, 119, 13, 51, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1468, 119, 14, 53, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1469, 119, 15, 55, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1470, 119, 16, 57, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1471, 119, 17, 59, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1472, 119, 18, 61, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1473, 119, 19, 63, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1474, 119, 20, 64, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1475, 119, 21, 66, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1476, 119, 22, 69, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1477, 119, 23, 70, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1478, 119, 24, 73, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1479, 119, 25, 75, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1480, 119, 26, 77, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1481, 119, 27, 79, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1482, 119, 28, 80, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1483, 119, 29, 83, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1484, 119, 30, 85, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1485, 119, 31, 87, NULL, '2024-09-28 03:48:05', '2024-09-28 03:48:05'),
(1486, 121, 2, 2, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1487, 121, 3, 10, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1488, 121, 4, 17, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1489, 121, 5, 21, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1490, 121, 6, 25, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1491, 121, 7, 31, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1492, 121, 8, 37, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1493, 121, 9, 40, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1494, 121, 10, 44, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1495, 121, 11, 47, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1496, 121, 12, 49, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1497, 121, 13, 51, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1498, 121, 15, 55, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1499, 121, 16, 57, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1500, 121, 17, 58, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1501, 121, 18, 61, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1502, 121, 19, 62, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1503, 121, 20, 64, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1504, 121, 21, 66, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1505, 121, 22, 68, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1506, 121, 23, 70, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1507, 121, 24, 72, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1508, 121, 25, 75, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1509, 121, 26, 76, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1510, 121, 27, 79, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1511, 121, 28, 81, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1512, 121, 29, 83, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1513, 121, 30, 85, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1514, 121, 31, 87, NULL, '2024-09-28 03:48:57', '2024-09-28 03:48:57'),
(1515, 122, 2, 2, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1516, 122, 3, 10, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1517, 122, 4, 18, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1518, 122, 5, 21, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1519, 122, 6, 26, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1520, 122, 7, 31, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1521, 122, 8, 33, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1522, 122, 9, 42, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1523, 122, 10, 44, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1524, 122, 11, 47, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1525, 122, 12, 49, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1526, 122, 13, 51, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1527, 122, 14, 53, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1528, 122, 15, 55, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1529, 122, 16, 57, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1530, 122, 17, 58, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1531, 122, 18, 61, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1532, 122, 19, 62, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1533, 122, 20, 64, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1534, 122, 21, 66, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1535, 122, 22, 69, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1536, 122, 23, 71, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1537, 122, 24, 72, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1538, 122, 25, 75, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1539, 122, 26, 77, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1540, 122, 27, 79, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1541, 122, 28, 80, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1542, 122, 29, 83, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1543, 122, 30, 85, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1544, 122, 31, 86, NULL, '2024-09-28 03:52:47', '2024-09-28 03:52:47'),
(1545, 124, 2, 2, 'gigi berlubang', '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1546, 124, 3, 11, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1547, 124, 4, 20, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1548, 124, 5, 24, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1549, 124, 6, 26, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1550, 124, 7, 31, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1551, 124, 8, 33, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1552, 124, 9, 43, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1553, 124, 10, 44, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1554, 124, 11, 47, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1555, 124, 12, 49, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1556, 124, 13, 51, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1557, 124, 14, 53, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1558, 124, 15, 55, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1559, 124, 16, 57, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1560, 124, 17, 58, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1561, 124, 18, 61, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1562, 124, 19, 62, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1563, 124, 20, 64, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1564, 124, 21, 66, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1565, 124, 22, 68, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1566, 124, 23, 70, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1567, 124, 24, 73, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1568, 124, 25, 75, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1569, 124, 26, 77, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1570, 124, 27, 79, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1571, 124, 28, 80, 'kiri', '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1572, 124, 29, 83, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1573, 124, 30, 85, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1574, 124, 31, 87, NULL, '2024-09-28 03:54:30', '2024-09-28 03:54:30'),
(1575, 123, 1, 1, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1576, 123, 10, 44, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1577, 123, 11, 47, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1578, 123, 12, 49, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1579, 123, 13, 51, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1580, 123, 14, 53, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1581, 123, 15, 55, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1582, 123, 16, 57, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1583, 123, 17, 59, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1584, 123, 18, 61, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1585, 123, 19, 62, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1586, 123, 20, 64, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1587, 123, 21, 66, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1588, 123, 22, 68, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1589, 123, 23, 70, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1590, 123, 24, 73, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1591, 123, 25, 75, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1592, 123, 26, 77, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1593, 123, 27, 79, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1594, 123, 28, 80, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1595, 123, 29, 83, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1596, 123, 30, 85, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1597, 123, 31, 87, NULL, '2024-09-28 03:54:56', '2024-09-28 03:54:56'),
(1598, 125, 2, 2, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1599, 125, 3, 13, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1600, 125, 5, 24, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1601, 125, 6, 28, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1602, 125, 7, 32, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1603, 125, 8, 33, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1604, 125, 9, 42, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1605, 125, 10, 44, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1606, 125, 11, 46, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1607, 125, 12, 49, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1608, 125, 13, 51, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1609, 125, 14, 53, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1610, 125, 15, 55, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1611, 125, 16, 57, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1612, 125, 17, 58, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1613, 125, 18, 61, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1614, 125, 19, 63, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1615, 125, 20, 65, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1616, 125, 21, 66, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1617, 125, 22, 68, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1618, 125, 23, 71, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1619, 125, 24, 73, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1620, 125, 25, 75, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1621, 125, 26, 77, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1622, 125, 27, 79, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1623, 125, 28, 80, 'kiri', '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1624, 125, 29, 83, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1625, 125, 30, 84, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1626, 125, 31, 87, NULL, '2024-09-28 04:00:07', '2024-09-28 04:00:07'),
(1627, 126, 2, 2, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1628, 126, 3, 10, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1629, 126, 4, 18, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1630, 126, 5, 22, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1631, 126, 6, 26, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1632, 126, 7, 32, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1633, 126, 8, 33, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1634, 126, 9, 43, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1635, 126, 10, 44, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1636, 126, 11, 47, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1637, 126, 12, 49, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1638, 126, 13, 50, 'udang', '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1639, 126, 14, 52, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1640, 126, 15, 55, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1641, 126, 16, 56, 'alergi dingin', '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1642, 126, 17, 58, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1643, 126, 18, 61, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1644, 126, 19, 62, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1645, 126, 20, 64, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1646, 126, 21, 66, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1647, 126, 22, 69, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1648, 126, 23, 70, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1649, 126, 24, 72, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1650, 126, 25, 75, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1651, 126, 26, 77, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1652, 126, 27, 79, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1653, 126, 28, 80, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1654, 126, 29, 83, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1655, 126, 30, 84, NULL, '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1656, 126, 31, 86, 'ketika capek', '2024-09-28 04:03:22', '2024-09-28 04:03:22'),
(1657, 128, 1, 1, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1658, 128, 2, 8, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1659, 128, 3, 15, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1660, 128, 4, 20, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1661, 128, 5, 24, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1662, 128, 6, 28, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1663, 128, 9, 43, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1664, 128, 10, 45, 'batuk', '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1665, 128, 11, 47, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1666, 128, 12, 49, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1667, 128, 13, 51, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1668, 128, 14, 53, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1669, 128, 15, 55, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1670, 128, 16, 57, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1671, 128, 17, 59, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1672, 128, 18, 61, 'belum pernah periksa', '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1673, 128, 19, 62, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1674, 128, 20, 64, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1675, 128, 21, 66, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1676, 128, 22, 69, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1677, 128, 23, 71, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1678, 128, 24, 73, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1679, 128, 25, 75, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1680, 128, 26, 77, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1681, 128, 27, 79, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1682, 128, 28, 81, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1683, 128, 29, 83, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1684, 128, 30, 85, NULL, '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1685, 128, 31, 87, 'jarang', '2024-09-28 04:07:05', '2024-09-28 04:07:05'),
(1686, 127, 1, 1, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1687, 127, 10, 44, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1688, 127, 11, 47, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1689, 127, 12, 49, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1690, 127, 13, 51, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1691, 127, 14, 53, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1692, 127, 15, 55, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1693, 127, 16, 57, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1694, 127, 17, 59, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1695, 127, 18, 61, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1696, 127, 19, 62, NULL, '2024-09-28 04:10:02', '2024-09-28 04:10:02'),
(1697, 127, 20, 64, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1698, 127, 21, 66, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1699, 127, 22, 68, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1700, 127, 23, 70, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1701, 127, 24, 73, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1702, 127, 25, 75, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1703, 127, 26, 77, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1704, 127, 27, 79, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1705, 127, 28, 80, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1706, 127, 29, 83, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1707, 127, 30, 85, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1708, 127, 31, 87, NULL, '2024-09-28 04:10:03', '2024-09-28 04:10:03'),
(1709, 129, 2, 2, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1710, 129, 3, 12, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1711, 129, 4, 17, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1712, 129, 7, 32, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1713, 129, 8, 33, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1714, 129, 9, 42, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1715, 129, 10, 44, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1716, 129, 11, 47, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1717, 129, 12, 49, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1718, 129, 13, 51, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1719, 129, 14, 53, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1720, 129, 15, 55, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1721, 129, 16, 57, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1722, 129, 17, 59, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1723, 129, 19, 63, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1724, 129, 20, 64, '3 kali', '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1725, 129, 21, 67, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1726, 129, 22, 68, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1727, 129, 23, 70, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1728, 129, 24, 73, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1729, 129, 25, 75, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1730, 129, 26, 77, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1731, 129, 27, 79, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1732, 129, 28, 80, 'kanan', '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1733, 129, 29, 83, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1734, 129, 30, 85, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1735, 129, 31, 86, NULL, '2024-09-28 10:07:34', '2024-09-28 10:07:34'),
(1736, 130, 2, 2, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1737, 130, 3, 9, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1738, 130, 4, 17, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1739, 130, 5, 21, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1740, 130, 6, 27, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1741, 130, 7, 31, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1742, 130, 8, 33, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1743, 130, 9, 42, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1744, 130, 10, 44, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1745, 130, 11, 47, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1746, 130, 12, 49, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1747, 130, 13, 51, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1748, 130, 14, 53, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1749, 130, 15, 55, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1750, 130, 16, 56, 'dingin', '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1751, 130, 17, 58, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1752, 130, 18, 61, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1753, 130, 19, 63, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1754, 130, 20, 64, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1755, 130, 21, 67, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1756, 130, 22, 68, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1757, 130, 23, 71, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1758, 130, 24, 73, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1759, 130, 25, 75, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1760, 130, 26, 77, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1761, 130, 27, 79, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1762, 130, 28, 80, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1763, 130, 29, 83, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1764, 130, 30, 85, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1765, 130, 31, 87, NULL, '2024-09-28 10:12:52', '2024-09-28 10:12:52'),
(1766, 131, 2, 2, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1767, 131, 3, 14, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1768, 131, 4, 18, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1769, 131, 5, 21, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1770, 131, 6, 25, 'dipakai mengunyah benda keras dan air es', '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1771, 131, 7, 32, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1772, 131, 8, 33, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1773, 131, 9, 42, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1774, 131, 10, 44, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1775, 131, 11, 47, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1776, 131, 12, 49, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1777, 131, 13, 51, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1778, 131, 14, 53, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1779, 131, 15, 55, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1780, 131, 16, 56, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1781, 131, 17, 58, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1782, 131, 18, 60, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1783, 131, 19, 63, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1784, 131, 20, 64, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1785, 131, 21, 66, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1786, 131, 22, 69, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1787, 131, 23, 70, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1788, 131, 24, 72, 'kopi', '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1789, 131, 25, 75, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1790, 131, 26, 77, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1791, 131, 27, 79, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1792, 131, 28, 80, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1793, 131, 29, 83, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1794, 131, 30, 84, 'kadang', '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1795, 131, 31, 86, NULL, '2024-09-28 10:18:19', '2024-09-28 10:18:19'),
(1796, 132, 2, 2, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1797, 132, 3, 12, 'bawah', '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1798, 132, 4, 17, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1799, 132, 5, 21, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1800, 132, 7, 31, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1801, 132, 8, 33, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1802, 132, 9, 42, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1803, 132, 10, 44, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1804, 132, 11, 47, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1805, 132, 13, 51, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1806, 132, 14, 53, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1807, 132, 16, 57, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1808, 132, 17, 59, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1809, 132, 19, 62, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1810, 132, 20, 64, 'kadang 3 kali', '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1811, 132, 21, 66, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1812, 132, 23, 70, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1813, 132, 24, 72, 'teh', '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1814, 132, 30, 84, NULL, '2024-09-28 10:23:51', '2024-09-28 10:23:51'),
(1815, 133, 2, 2, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1816, 133, 3, 13, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1817, 133, 7, 32, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1818, 133, 8, 33, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1819, 133, 9, 42, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1820, 133, 10, 44, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1821, 133, 11, 47, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1822, 133, 13, 51, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1823, 133, 14, 53, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1824, 133, 16, 57, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1825, 133, 17, 58, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1826, 133, 18, 61, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1827, 133, 19, 62, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1828, 133, 20, 64, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1829, 133, 21, 66, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1830, 133, 23, 70, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1831, 133, 24, 72, 'teh', '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1832, 133, 28, 81, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1833, 133, 30, 84, NULL, '2024-09-28 10:28:19', '2024-09-28 10:28:19'),
(1834, 134, 2, 2, 'dan gusi', '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1835, 134, 3, 13, 'dan bawah', '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1836, 134, 4, 18, 'dan berdarah gusinya', '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1837, 134, 5, 21, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1838, 134, 7, 32, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1839, 134, 8, 33, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1840, 134, 9, 42, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1841, 134, 10, 44, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1842, 134, 11, 47, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1843, 134, 13, 51, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1844, 134, 14, 53, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1845, 134, 16, 57, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1846, 134, 17, 59, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1847, 134, 19, 62, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1848, 134, 20, 64, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1849, 134, 22, 68, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1850, 134, 23, 70, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1851, 134, 24, 72, 'teh', '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1852, 134, 28, 80, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1853, 134, 30, 84, NULL, '2024-09-28 10:32:55', '2024-09-28 10:32:55'),
(1854, 135, 2, 2, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1855, 135, 3, 13, 'dan bawah', '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1856, 135, 4, 18, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1857, 135, 5, 21, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1858, 135, 6, 25, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1859, 135, 7, 32, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1860, 135, 8, 33, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1861, 135, 9, 42, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1862, 135, 10, 44, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1863, 135, 11, 47, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1864, 135, 12, 49, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1865, 135, 13, 51, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1866, 135, 14, 53, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1867, 135, 16, 57, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1868, 135, 17, 58, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1869, 135, 18, 61, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1870, 135, 19, 62, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1871, 135, 20, 64, '3 kali', '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1872, 135, 21, 66, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1873, 135, 22, 68, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1874, 135, 23, 70, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1875, 135, 24, 72, 'teh', '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1876, 135, 28, 80, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1877, 135, 30, 84, NULL, '2024-09-28 10:39:00', '2024-09-28 10:39:00'),
(1878, 136, 1, 1, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1879, 136, 9, 42, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1880, 136, 10, 44, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1881, 136, 11, 47, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1882, 136, 12, 49, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1883, 136, 13, 50, 'udang', '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1884, 136, 14, 53, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1885, 136, 15, 55, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1886, 136, 16, 56, 'dingin', '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1887, 136, 17, 58, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1888, 136, 18, 61, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1889, 136, 19, 62, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1890, 136, 20, 64, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1891, 136, 22, 69, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1892, 136, 23, 70, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1893, 136, 24, 72, 'teh', '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1894, 136, 25, 75, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1895, 136, 26, 77, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1896, 136, 27, 79, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1897, 136, 28, 80, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1898, 136, 29, 83, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1899, 136, 30, 84, NULL, '2024-09-28 10:44:36', '2024-09-28 10:44:36'),
(1900, 137, 2, 2, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1901, 137, 3, 12, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1902, 137, 7, 32, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1903, 137, 9, 42, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1904, 137, 10, 44, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1905, 137, 11, 47, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1906, 137, 12, 49, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1907, 137, 13, 51, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1908, 137, 15, 55, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1909, 137, 16, 57, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1910, 137, 17, 58, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1911, 137, 18, 61, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1912, 137, 19, 62, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1913, 137, 20, 64, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1914, 137, 21, 66, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1915, 137, 22, 68, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1916, 137, 23, 70, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1917, 137, 24, 72, 'teh', '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1918, 137, 25, 75, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1919, 137, 26, 77, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1920, 137, 27, 79, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1921, 137, 28, 80, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1922, 137, 29, 83, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1923, 137, 30, 84, NULL, '2024-09-28 10:48:45', '2024-09-28 10:48:45'),
(1924, 138, 9, 42, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1925, 138, 10, 44, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1926, 138, 11, 47, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1927, 138, 12, 49, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1928, 138, 13, 51, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1929, 138, 14, 53, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1930, 138, 15, 55, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1931, 138, 16, 57, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1932, 138, 17, 59, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1933, 138, 19, 62, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1934, 138, 20, 64, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1935, 138, 21, 66, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1936, 138, 22, 69, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1937, 138, 23, 70, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1938, 138, 24, 73, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1939, 138, 25, 75, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1940, 138, 26, 77, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1941, 138, 27, 79, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1942, 138, 28, 81, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1943, 138, 29, 83, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1944, 138, 30, 85, NULL, '2024-09-28 10:53:35', '2024-09-28 10:53:35'),
(1945, 139, 2, 2, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1946, 139, 3, 10, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1947, 139, 4, 18, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1948, 139, 5, 21, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1949, 139, 6, 25, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1950, 139, 7, 30, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1951, 139, 8, 33, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1952, 139, 9, 42, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1953, 139, 10, 44, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1954, 139, 11, 47, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1955, 139, 12, 49, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1956, 139, 13, 50, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1957, 139, 14, 53, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1958, 139, 15, 55, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1959, 139, 16, 56, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1960, 139, 17, 59, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1961, 139, 19, 63, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1962, 139, 20, 64, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1963, 139, 21, 66, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1964, 139, 22, 69, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1965, 139, 23, 70, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1966, 139, 24, 73, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1967, 139, 25, 75, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1968, 139, 26, 77, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1969, 139, 27, 79, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1970, 139, 28, 80, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1971, 139, 29, 83, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1972, 139, 30, 85, NULL, '2024-09-28 10:58:45', '2024-09-28 10:58:45'),
(1973, 140, 2, 2, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1974, 140, 3, 9, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1975, 140, 7, 32, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1976, 140, 8, 33, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1977, 140, 9, 42, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1978, 140, 10, 44, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1979, 140, 11, 47, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1980, 140, 13, 51, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1981, 140, 14, 53, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1982, 140, 16, 57, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1983, 140, 17, 58, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1984, 140, 19, 63, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1985, 140, 20, 64, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1986, 140, 21, 67, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1987, 140, 22, 69, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1988, 140, 23, 71, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1989, 140, 24, 72, 'teh', '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1990, 140, 28, 81, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1991, 140, 30, 85, NULL, '2024-09-28 11:03:14', '2024-09-28 11:03:14'),
(1992, 141, 2, 2, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(1993, 141, 3, 14, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(1994, 141, 7, 31, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(1995, 141, 8, 33, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(1996, 141, 9, 42, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(1997, 141, 10, 44, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(1998, 141, 11, 47, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(1999, 141, 12, 49, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2000, 141, 13, 51, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2001, 141, 14, 53, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2002, 141, 16, 57, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2003, 141, 17, 58, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2004, 141, 19, 63, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2005, 141, 20, 65, '1 kali', '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2006, 141, 21, 67, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2007, 141, 22, 69, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2008, 141, 23, 71, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2009, 141, 24, 73, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2010, 141, 28, 81, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2011, 141, 30, 85, NULL, '2024-09-28 11:07:45', '2024-09-28 11:07:45'),
(2012, 142, 1, 1, NULL, '2024-10-05 15:33:27', '2024-10-05 15:33:27'),
(2013, 142, 2, 2, NULL, '2024-10-05 15:33:27', '2024-10-05 15:33:27'),
(2014, 143, 1, 1, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2015, 143, 4, 20, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2016, 143, 10, 45, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2017, 143, 11, 47, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2018, 143, 12, 49, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2019, 143, 13, 51, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2020, 143, 14, 53, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2021, 143, 15, 55, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2022, 143, 16, 57, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25');
INSERT INTO `jawaban_pasien` (`id`, `pasien_id`, `pertanyaan_id`, `opsi_jawaban_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(2023, 143, 17, 59, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2024, 143, 18, 61, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2025, 143, 19, 63, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2026, 143, 20, 65, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2027, 143, 21, 67, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2028, 143, 22, 69, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2029, 143, 23, 71, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2030, 143, 24, 73, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2031, 143, 25, 75, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2032, 143, 26, 77, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2033, 143, 27, 79, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2034, 143, 28, 81, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2035, 143, 29, 83, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2036, 143, 30, 85, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2037, 143, 31, 87, NULL, '2024-10-20 07:55:25', '2024-10-20 07:55:25'),
(2038, 146, 1, 1, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2039, 146, 2, 2, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2040, 146, 3, 9, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2041, 146, 4, 17, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2042, 146, 5, 21, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2043, 146, 6, 28, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2044, 146, 7, 32, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2045, 146, 8, 37, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2046, 146, 9, 43, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2047, 146, 10, 44, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2048, 146, 11, 46, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2049, 146, 12, 48, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2050, 146, 13, 50, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2051, 146, 14, 52, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2052, 146, 15, 54, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2053, 146, 16, 56, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2054, 146, 17, 58, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2055, 146, 18, 60, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2056, 146, 19, 62, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2057, 146, 20, 64, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2058, 146, 21, 67, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2059, 146, 22, 68, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2060, 146, 23, 70, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2061, 146, 24, 72, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2062, 146, 25, 75, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2063, 146, 26, 77, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2064, 146, 27, 79, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2065, 146, 28, 81, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2066, 146, 29, 82, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2067, 146, 30, 84, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2068, 146, 31, 86, NULL, '2024-11-14 03:19:34', '2024-11-14 03:19:34'),
(2069, 147, 1, 1, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2070, 147, 2, 3, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2071, 147, 3, 14, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2072, 147, 4, 20, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2073, 147, 5, 23, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2074, 147, 6, 28, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2075, 147, 7, 31, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2076, 147, 8, 37, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2077, 147, 9, 40, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2078, 147, 10, 44, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2079, 147, 11, 46, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2080, 147, 12, 48, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2081, 147, 13, 50, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2082, 147, 14, 52, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2083, 147, 15, 55, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2084, 147, 16, 56, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2085, 147, 17, 59, NULL, '2024-11-14 03:37:00', '2024-11-14 03:37:00'),
(2086, 148, 1, 1, NULL, '2024-11-14 12:37:10', '2024-11-14 12:37:10'),
(2087, 148, 2, 2, NULL, '2024-11-14 12:37:10', '2024-11-14 12:37:10'),
(2088, 149, 1, 1, NULL, '2024-11-14 12:40:20', '2024-11-14 12:40:20'),
(2089, 150, 2, 3, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2090, 150, 3, 12, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2091, 150, 4, 18, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2092, 150, 5, 23, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2093, 150, 6, 26, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2094, 150, 7, 31, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2095, 150, 8, 35, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2096, 150, 9, 40, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2097, 150, 10, 44, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2098, 150, 11, 47, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2099, 150, 12, 48, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2100, 150, 13, 51, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2101, 150, 14, 52, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2102, 150, 15, 55, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2103, 150, 16, 56, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2104, 150, 17, 59, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2105, 150, 18, 60, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2106, 150, 19, 62, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2107, 150, 20, 64, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2108, 150, 21, 66, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2109, 150, 22, 68, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2110, 150, 23, 71, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2111, 150, 24, 73, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2112, 150, 26, 77, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2113, 150, 27, 79, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2114, 150, 28, 81, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2115, 150, 29, 83, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2116, 150, 30, 84, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2117, 150, 31, 86, NULL, '2024-11-18 15:24:13', '2024-11-18 15:24:13'),
(2118, 153, 2, 2, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2119, 153, 3, 10, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2120, 153, 4, 17, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2121, 153, 5, 21, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2122, 153, 6, 26, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2123, 153, 7, 30, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2124, 153, 8, 33, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2125, 153, 9, 38, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2126, 153, 10, 44, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2127, 153, 11, 47, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2128, 153, 12, 49, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2129, 153, 13, 51, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2130, 153, 14, 53, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2131, 153, 15, 55, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2132, 153, 16, 56, 'debu, bulu hewan', '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2133, 153, 17, 58, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2134, 153, 18, 61, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2135, 153, 19, 62, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2136, 153, 20, 64, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2137, 153, 21, 66, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2138, 153, 22, 68, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2139, 153, 23, 70, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2140, 153, 24, 73, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2141, 153, 25, 75, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2142, 153, 26, 77, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2143, 153, 27, 79, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2144, 153, 28, 81, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2145, 153, 29, 83, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2146, 153, 30, 85, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2147, 153, 31, 86, NULL, '2025-01-30 08:38:04', '2025-01-30 08:38:04'),
(2148, 154, 28, 81, NULL, '2025-02-10 04:02:51', '2025-02-10 04:02:51'),
(2149, 155, 1, 1, NULL, '2025-07-17 07:49:18', '2025-07-17 07:49:18'),
(2150, 156, 1, 1, NULL, '2025-07-17 07:57:55', '2025-07-17 07:57:55'),
(2151, 157, 2, 2, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2152, 157, 3, 12, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2153, 157, 4, 17, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2154, 157, 5, 23, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2155, 157, 6, 25, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2156, 157, 7, 30, '1', '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2157, 157, 8, 33, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2158, 157, 9, 39, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2159, 157, 10, 44, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2160, 157, 11, 47, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2161, 157, 12, 49, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2162, 157, 13, 51, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2163, 157, 14, 53, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2164, 157, 15, 55, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2165, 157, 16, 57, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2166, 157, 17, 58, 'scalling', '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2167, 157, 18, 61, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2168, 157, 19, 62, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2169, 157, 20, 65, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2170, 157, 21, 66, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2171, 157, 22, 68, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2172, 157, 23, 70, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2173, 157, 24, 72, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2174, 157, 25, 75, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2175, 157, 26, 77, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2176, 157, 27, 79, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2177, 157, 28, 80, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2178, 157, 29, 83, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2179, 157, 30, 85, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2180, 157, 31, 87, NULL, '2025-07-17 10:01:56', '2025-07-17 10:01:56'),
(2210, 158, 2, 2, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2211, 158, 3, 10, 'belakang kanan bawah', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2212, 158, 4, 18, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2213, 158, 5, 21, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2214, 158, 6, 27, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2215, 158, 7, 30, '2 minggu yang lalu', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2216, 158, 8, 33, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2217, 158, 9, 39, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2218, 158, 10, 44, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2219, 158, 11, 47, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2220, 158, 12, 49, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2221, 158, 13, 50, 'seafood', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2222, 158, 14, 52, 'antibiotik', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2223, 158, 15, 55, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2224, 158, 16, 56, 'alergi dingin', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2225, 158, 17, 58, 'cabut gigi 48, 2 bulan yang lalu', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2226, 158, 18, 60, 'cemas saat pencabutan', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2227, 158, 19, 62, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2228, 158, 20, 65, '2x sehari waktu mandi saja', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2229, 158, 21, 66, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2230, 158, 22, 68, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2231, 158, 24, 72, 'kopi', '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2232, 158, 25, 75, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2233, 158, 26, 77, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2234, 158, 27, 79, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2235, 158, 28, 80, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2236, 158, 29, 83, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2237, 158, 30, 85, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2238, 158, 31, 87, NULL, '2025-07-26 05:27:29', '2025-07-26 05:27:29'),
(2239, 159, 1, 1, NULL, '2025-07-26 10:01:48', '2025-07-26 10:01:48'),
(2240, 161, 1, 1, NULL, '2025-07-26 10:08:45', '2025-07-26 10:08:45'),
(2241, 162, 1, 1, NULL, '2025-07-26 10:12:43', '2025-07-26 10:12:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pertanyaan`
--

CREATE TABLE `kategori_pertanyaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_pertanyaan`
--

INSERT INTO `kategori_pertanyaan` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Keluhan Utama', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(2, 'Riwayat Kesehatan Umum', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(3, 'Riwayat Kesehatan Gigi', '2024-09-12 17:00:00', '2024-09-12 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_gigi`
--

CREATE TABLE `kondisi_gigi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kondisi_gigi`
--

INSERT INTO `kondisi_gigi` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, '_', 'Gigi belum erupsi', NULL, NULL),
(2, '∑', 'Gigi sudah di cabut/ tanggal', NULL, NULL),
(3, 'Ο', 'Gigi goyah', NULL, NULL),
(4, 'X', 'Gigi tinggal akar', NULL, NULL),
(5, 'V', 'Karies', NULL, NULL),
(6, '⚫', 'Tumpatan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_13_033136_create_pasien_table', 1),
(6, '2023_05_13_033149_create_dokter_table', 1),
(7, '2023_05_13_033209_create_obat_table', 1),
(8, '2023_05_13_033252_create_rekam_table', 1),
(9, '2023_05_18_235916_create_pengeluaran_obat_table', 1),
(10, '2023_05_19_233941_create_notifications_table', 1),
(11, '2023_05_20_133306_create_rekam_gigi_table', 1),
(12, '2023_05_20_163802_create_tindakan_table', 1),
(13, '2023_05_21_141004_create_kondisi_gigi_table', 1),
(14, '2023_05_21_141055_create_icds_table', 1),
(15, '2023_07_13_101007_create_rekam_diagnosa_table', 1),
(16, '2024_08_16_161038_create_kategori_pertanyaan_table', 1),
(17, '2024_08_16_161210_create_pertanyaan_table', 1),
(18, '2024_08_16_161303_create_opsi_jawaban_table', 1),
(19, '2024_08_16_161328_create_jawaban_pasien_table', 1),
(20, '2024_08_19_015204_create_edukasi_table', 1),
(21, '2024_08_19_171431_create_toga_table', 1),
(22, '2024_08_23_003704_create_namakondisigigi_table', 1),
(23, '2024_08_23_003731_create_rekammediskader_table', 1),
(24, '2024_08_27_071642_create_cache_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `namakondisigigi`
--

CREATE TABLE `namakondisigigi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kondisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `namakondisigigi`
--

INSERT INTO `namakondisigigi` (`id`, `nama_kondisi`, `created_at`, `updated_at`) VALUES
(1, 'Gigi Lubang', '2024-08-28 02:54:17', '2024-08-28 02:54:17'),
(3, 'Gigi Sariawan', '2024-08-28 02:54:41', '2024-09-08 06:14:28'),
(4, 'Karang', '2024-08-28 02:54:51', '2024-08-28 02:54:51'),
(5, 'Radang Gusi', '2024-08-28 02:55:03', '2024-08-28 02:55:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_obat` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `opsi_jawaban`
--

CREATE TABLE `opsi_jawaban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan_id` bigint(20) UNSIGNED NOT NULL,
  `teks_opsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opsi_jawaban`
--

INSERT INTO `opsi_jawaban` (`id`, `pertanyaan_id`, `teks_opsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tidak ada keluhan', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(2, 2, 'gigi', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(3, 2, 'gusi', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(4, 2, 'pipi', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(5, 2, 'bibir', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(6, 2, 'lidah', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(7, 2, 'langit langit', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(8, 2, 'lain lain', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(9, 3, 'depan', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(10, 3, 'belakang', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(11, 3, 'kiri', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(12, 3, 'kanan', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(13, 3, 'atas', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(14, 3, 'bawah', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(15, 3, 'lain-lain', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(16, 4, 'gatal', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(17, 4, 'linu', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(18, 4, 'sakit/nyeri', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(19, 4, 'berdarah', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(20, 4, 'lain lain', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(21, 5, 'kadang-kadang', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(22, 5, 'terus menerus', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(23, 5, 'spontan', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(24, 5, 'lain-lain', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(25, 6, 'Dipakai Mengunyah', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(26, 6, 'kemasukan sisa makanan', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(27, 6, 'kena rangsangan dingin', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(28, 6, 'lain lain', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(29, 7, 'hari', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(30, 7, 'minggu', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(31, 7, 'bulan', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(32, 7, 'tahun lalu', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(33, 8, 'sekarang', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(34, 8, 'hari', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(35, 8, 'minggu', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(36, 8, 'bulan yang lalu', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(37, 8, 'sekarang tidak sakit', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(38, 9, 'rawat', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(39, 9, 'tambal', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(40, 9, 'cabut', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(41, 9, 'rujuk', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(42, 9, 'konsul', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(43, 9, 'lain lain', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(44, 10, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(45, 10, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(46, 11, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(47, 11, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(48, 12, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(49, 12, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(50, 13, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(51, 13, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(52, 14, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(53, 14, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(54, 15, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(55, 15, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(56, 16, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(57, 16, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(58, 17, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(59, 17, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(60, 18, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(61, 18, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(62, 19, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(63, 19, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(64, 20, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(65, 20, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(66, 21, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(67, 21, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(68, 22, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(69, 22, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(70, 23, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(71, 23, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(72, 24, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(73, 24, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(74, 25, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(75, 25, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(76, 26, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(77, 26, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(78, 27, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(79, 27, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(80, 28, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(81, 28, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(82, 29, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(83, 29, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(84, 30, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(85, 30, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(86, 31, 'YA', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(87, 31, 'TIDAK', '2024-09-12 17:00:00', '2024-09-12 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `alamat_lengkap` longtext DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `kodepos` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT 'Islam',
  `status_menikah` enum('Menikah','Belum Menikah','Janda','Duda') DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT 'WNI',
  `no_hp` varchar(13) DEFAULT NULL,
  `alergi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat_lengkap`, `kelurahan`, `kecamatan`, `kabupaten`, `kodepos`, `agama`, `status_menikah`, `pendidikan`, `pekerjaan`, `kewarganegaraan`, `no_hp`, `alergi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(60, 'uji coba pasien terbaru', 'sdfsdfsdf', '2018-01-31', 'Perempuan', 'sdfsdfsd sdfsd sdf sdf sdf sdf', 'fsdfsdf', 'sdfsdfsd', 'sdfsdf', '45435', 'Kristen', 'Menikah', 'SMP', 'TNI/Polri', 'WNI', '3543543543', 'wefwefewewf', '2024-09-09 15:24:50', '2024-09-09 15:24:50', NULL),
(68, 'aku sayang kamu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-14 03:52:02', '2024-09-14 03:52:02', NULL),
(69, 'gobang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-14 03:56:37', '2024-09-14 03:56:37', NULL),
(70, 'Rizki Annisa Faiha', 'Sleman', '2014-03-15', 'Perempuan', 'Grogol Tempel Kadisoka Purwomartani Kalasan Sleman DIY', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, 'tidak ada', '2024-09-22 13:41:20', '2024-09-22 13:41:20', NULL),
(71, 'Harun fadli nasri', 'Sleman', '2014-03-09', 'Laki-Laki', 'Grogol tempel kadisoka', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-22 13:45:48', '2024-09-22 13:45:48', NULL),
(72, 'Nizham Ersa ramadhan', 'Sleman', '2013-07-18', 'Laki-Laki', 'Grogol tempel kadisoka RT 06 RW 02', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', 'Belum Menikah', 'SD', 'Lain-Lain', 'WNI', NULL, 'Tidak ada', '2024-09-22 13:51:18', '2024-09-22 13:51:18', NULL),
(73, 'diniiii', 'gunung kidul', '2004-12-05', 'Perempuan', 'KRANDOHAN, PENDOWOHARJO, SEWON, BANTUL, DIY', 'pendowoharjo', NULL, 'Kab. Bantul', '55184', 'Islam', 'Belum Menikah', 'SMA', 'Lain-Lain', 'WNI', NULL, 'debu', '2024-09-23 03:32:55', '2024-09-23 03:32:55', NULL),
(74, 'Harun fadli nasri', 'Sleman', '2014-03-09', 'Laki-Laki', 'Grogol tempel kadisoka', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-23 03:50:55', '2024-09-23 03:50:55', NULL),
(75, 'percobaan lagi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-24 09:49:52', '2024-09-24 09:49:52', NULL),
(76, 'Jasmine Alya Afifah', NULL, '2014-09-21', 'Perempuan', 'kalongan', NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-24 10:28:19', '2024-09-24 10:28:19', NULL),
(77, 'Jasmine Alya Afifah', NULL, '2014-09-21', 'Perempuan', 'kalongan', NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-24 10:28:20', '2024-09-24 10:28:20', NULL),
(78, 'Jasmine Alya Afifah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-24 10:29:50', '2024-09-24 10:29:50', NULL),
(79, 'jasmine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-24 10:38:30', '2024-09-24 10:38:30', NULL),
(80, 'jasmine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-24 10:38:44', '2024-09-24 10:38:44', NULL),
(81, 'jasmine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-24 10:38:47', '2024-09-24 10:38:47', NULL),
(82, 'jasmine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-24 10:39:45', '2024-09-24 10:39:45', NULL),
(83, 'Harun fadli nasri', 'Sleman', '2014-03-09', 'Laki-Laki', 'Grogol tempel kadisoka', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', NULL, 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, 'Tidak', '2024-09-24 12:33:07', '2024-09-24 12:33:07', NULL),
(84, 'Rizki Annisa Faiha', 'Sleman', '2014-03-15', 'Perempuan', 'Grogol tempel Kadisoka', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, 'tidak ada', '2024-09-24 14:21:06', '2024-09-24 14:21:06', NULL),
(85, 'nana', 'bantul', '2004-06-05', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Menikah', NULL, NULL, 'WNI', NULL, '-', '2024-09-27 01:30:49', '2024-09-27 01:30:49', NULL),
(86, 'nana', 'bantul', '2009-09-08', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Menikah', NULL, NULL, 'WNI', NULL, NULL, '2024-09-27 02:12:54', '2024-09-27 02:12:54', NULL),
(87, 'Aryan Putra Wibowo', 'sleman', '2013-07-18', 'Laki-Laki', NULL, NULL, NULL, NULL, '55571', 'Islam', 'Belum Menikah', 'SD', NULL, 'WNI', NULL, NULL, '2024-09-28 02:49:11', '2024-09-28 02:49:11', NULL),
(88, 'Raka Saputra', 'sleman', '2011-08-04', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 02:57:28', '2024-09-28 02:57:28', NULL),
(89, 'Andias Putra', 'sleman', '2013-12-05', NULL, NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:03:32', '2024-09-28 03:03:32', NULL),
(90, 'faisal adiasta ekfiki', 'Sleman', '2012-09-11', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Menikah', NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:08:08', '2024-09-28 03:08:08', NULL),
(91, 'Naufal Ega Saputra', 'Sleman', '2011-09-14', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMP', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:08:40', '2024-09-28 03:08:40', NULL),
(92, 'Ikbal Hisyra Malik', 'sleman', '2013-01-24', NULL, NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:11:48', '2024-09-28 03:11:48', NULL),
(93, 'Rizki Annisa Faiha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:16:08', '2024-09-28 03:16:08', NULL),
(94, 'Harun fadli nasri', 'Sleman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:16:54', '2024-09-28 03:16:54', NULL),
(95, 'Abihu saka', 'Sleman', '2014-03-31', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:17:12', '2024-09-28 03:17:12', NULL),
(96, 'Harun fadli nasri', 'Sleman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:17:24', '2024-09-28 03:17:24', NULL),
(97, 'muhammad aska pratama', 'Sleman', '2015-06-17', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:18:26', '2024-09-28 03:18:26', NULL),
(98, 'bisma hilal mahadika abiyu', 'malang', NULL, 'Laki-Laki', 'grogol tempel kadisoka', 'purwomartani', 'kalasan', 'sleman', NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, 'tidak', '2024-09-28 03:19:10', '2024-09-28 03:19:10', NULL),
(99, 'Bagus Tri Wibowo', 'sleman', '2011-07-31', NULL, NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:19:20', '2024-09-28 03:19:20', NULL),
(100, 'Rizki Annisa Faiha', 'Sleman', '2014-03-15', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', '0895806638040', 'tidak ada', '2024-09-28 03:20:15', '2024-09-28 03:20:15', NULL),
(101, 'Nizam Ersa Ramadhan', 'Sleman', '2013-07-18', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:23:00', '2024-09-28 03:23:00', NULL),
(102, 'Muna maimunah', 'Sleman', '2015-01-15', 'Perempuan', 'Grogol tempel kadisoka', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', 'Belum Menikah', 'SD', 'Lain-Lain', 'WNI', NULL, NULL, '2024-09-28 03:25:30', '2024-09-28 03:25:30', NULL),
(103, 'lautfia nasya', 'Sleman', '2011-11-08', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:26:24', '2024-09-28 03:26:24', NULL),
(104, 'Rehan ersa', 'sleman', '2023-08-23', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMP', 'Pelajar/Mahasiswa', 'WNI', NULL, 'tidak', '2024-09-28 03:27:40', '2024-09-28 03:27:40', NULL),
(105, 'Callista Azalla Naswa', 'Sleman', '2012-08-10', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:27:59', '2024-09-28 03:27:59', NULL),
(106, 'Arkana Lngit Erlangga', 'sleman', '2017-12-01', NULL, NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:28:20', '2024-09-28 03:28:20', NULL),
(107, 'Syarifah Rahadatul aisyi', 'Sleman', '2013-06-06', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', '089630727935', 'tidak ada', '2024-09-28 03:32:01', '2024-09-28 03:32:01', NULL),
(108, 'Kartika Syira Fedora', 'Sleman', '2010-04-12', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMP', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:32:21', '2024-09-28 03:32:21', NULL),
(109, 'Bianca candrakala', 'Sleman', '2015-09-14', 'Perempuan', 'Grogol tempel', 'Purwomartani', 'Kalasan', NULL, NULL, NULL, 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:32:47', '2024-09-28 03:32:47', NULL),
(110, 'nafsira maura yasmi', 'Gunung Kidul', '2012-11-15', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:33:05', '2024-09-28 03:33:05', NULL),
(111, 'Bianca candrakala', 'Sleman', '2015-09-14', 'Perempuan', 'Grogol tempel', 'Purwomartani', 'Kalasan', NULL, NULL, NULL, 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:35:09', '2024-09-28 03:35:09', NULL),
(112, 'Kayla almira', 'Sleman', '2015-11-06', 'Perempuan', 'Grogol tempel kadisoka', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', 'Belum Menikah', 'SD', 'Lain-Lain', 'WNI', NULL, NULL, '2024-09-28 03:35:41', '2024-09-28 03:35:41', NULL),
(113, 'putri yuni setiawati', 'sleman', '2010-06-06', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMP', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:36:41', '2024-09-28 03:36:41', NULL),
(114, 'Indah Setya Ningrum', 'Sleman', '2008-03-03', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:38:02', '2024-09-28 03:38:02', NULL),
(115, 'azrina fadila yasmi', 'Sleman', '2012-09-06', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:38:04', '2024-09-28 03:38:04', NULL),
(116, 'Bianca candrakala', 'Sleman', '2015-09-14', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:38:13', '2024-09-28 03:38:13', NULL),
(117, 'Salsa Bela Nur Hidayah', 'sleman', '2011-03-13', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMP', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:41:24', '2024-09-28 03:41:24', NULL),
(118, 'Raihan ersa ramadhan', 'Sleman', '2010-08-23', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, 'tidak ada', '2024-09-28 03:42:53', '2024-09-28 03:42:53', NULL),
(119, 'fitriah inayatullah', 'Sleman', '2015-12-09', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-09-28 03:42:59', '2024-09-28 03:42:59', NULL),
(120, 'Gina May fitri', 'Sleman', '2012-07-08', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:44:29', '2024-09-28 03:44:29', NULL),
(121, 'Latifa azzahra', 'Sleman', '2011-12-06', 'Perempuan', 'Grogol tempel kadisoka', 'Purwomartani', 'Kalasan', 'Sleman', '55571', 'Islam', 'Belum Menikah', 'SD', 'Lain-Lain', 'WNI', NULL, NULL, '2024-09-28 03:45:56', '2024-09-28 03:45:56', NULL),
(122, 'Rafael Satria Pinandhita', 'Sleman', '2009-02-06', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', NULL, 'tidak ada', '2024-09-28 03:50:51', '2024-09-28 03:50:51', NULL),
(123, 'Yoga cahya pratama', 'Sleman', '2008-12-30', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:51:52', '2024-09-28 03:51:52', NULL),
(124, 'Adinda Dwi Oktafiana', 'Sleman', '2007-10-15', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:52:13', '2024-09-28 03:52:13', NULL),
(125, 'jasmine alya afifah', 'Sleman', '2014-09-21', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:55:31', '2024-09-28 03:55:31', NULL),
(126, 'Al ahnaf zulkarnain', 'sleman', '2018-06-06', NULL, NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'Tidak Sekolah', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 03:59:38', '2024-09-28 03:59:38', NULL),
(127, 'Muhammad toric aditya', 'Sleman', '2006-07-21', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 04:04:47', '2024-09-28 04:04:47', NULL),
(128, 'Haidar Azka', 'sleman', '2020-05-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'Tidak Sekolah', 'Lain-Lain', 'WNI', NULL, NULL, '2024-09-28 04:04:56', '2024-09-28 04:04:56', NULL),
(129, 'Dita Rahayu', 'panti asuhan', '2009-03-06', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:04:16', '2024-09-28 10:04:16', NULL),
(130, 'Anggun Sinta Mawar Sari', 'panti asuhan', '2009-12-08', NULL, NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, 'SMP', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:09:28', '2024-09-28 10:09:28', NULL),
(131, 'kuriani', NULL, '2008-04-02', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:14:51', '2024-09-28 10:14:51', NULL),
(132, 'Safira Anggelina Putri', 'panti asuhan', '2011-03-31', NULL, NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:20:33', '2024-09-28 10:20:33', NULL),
(133, 'Sellenda Kaysa', 'panti asuhan', '2015-03-27', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:25:49', '2024-09-28 10:25:49', NULL),
(134, 'Indah Riyani', 'panti asuhan', '2013-01-02', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:30:00', '2024-09-28 10:30:00', NULL),
(135, 'Aqilah NUR Amalina', 'panti asuhan', '2014-06-25', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:35:43', '2024-09-28 10:35:43', NULL),
(136, 'Refania SeptyaNingsih', 'panti asuhan', '2011-09-17', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:41:03', '2024-09-28 10:41:03', NULL),
(137, 'Alika Khaira Wilda', 'panti asuhan', '2013-09-13', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:46:06', '2024-09-28 10:46:06', NULL),
(138, 'Indana Zulfa', 'panti asuhan', '2008-10-09', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:50:45', '2024-09-28 10:50:45', NULL),
(139, 'Adara', 'panti asuhan', '2016-01-19', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 10:55:51', '2024-09-28 10:55:51', NULL),
(140, 'aqila zahwa zayna', NULL, '2017-06-05', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, NULL, 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 11:00:47', '2024-09-28 11:00:47', NULL),
(141, 'Muhammad Misbahul Munir', 'sleman', '2020-07-10', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, NULL, 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2024-09-28 11:05:18', '2024-09-28 11:05:18', NULL),
(142, 'rapli', 'hhh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-10-05 15:33:16', '2024-10-05 15:33:16', NULL),
(143, 'qq', 'q', '2024-10-16', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-10-20 07:53:31', '2024-10-20 07:53:31', NULL),
(144, 'Hyffcnj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-11-10 13:23:04', '2024-11-10 13:23:04', NULL),
(145, 'isti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-11-14 02:59:29', '2024-11-14 02:59:29', NULL),
(146, 'Mahmudah', 'Sragen', '2024-11-14', 'Perempuan', 'Kwayon jambananan', 'Jambanan', 'Sidoharjo', 'SRAGEn', '57281', 'Islam', 'Belum Menikah', 'SMA', 'Pelajar/Mahasiswa', 'WNI', '0895391797767', NULL, '2024-11-14 03:17:34', '2024-11-14 03:17:34', NULL),
(147, 'Isal', 'Yogya', '2024-11-14', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-11-14 03:36:01', '2024-11-14 03:36:01', NULL),
(148, 'Mahmudah', 'Sragen', '2024-11-14', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Menikah', NULL, NULL, 'WNI', NULL, NULL, '2024-11-14 12:37:03', '2024-11-14 12:37:03', NULL),
(149, 'Mahmudah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-11-14 12:40:09', '2024-11-14 12:40:09', NULL),
(150, 'Vista Pramudya', 'Bantul', '2000-05-23', 'Laki-Laki', 'Mandungan, Srimartani, Piyungan, Bantul, Yogyakarta', 'Srimartani', 'Piyungan', 'Bantul', '55792', 'Islam', 'Belum Menikah', 'S1', 'Lain-Lain', 'WNI', '082232324437', 'Sakit Gigi Berlubang', '2024-11-18 15:21:36', '2024-11-18 15:21:36', NULL),
(151, 'Jasmine Alya Afifah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-11-28 08:28:58', '2024-11-28 08:28:58', NULL),
(152, 'Jasmine Alya Afifah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2024-11-28 08:30:21', '2024-11-28 08:30:21', NULL),
(153, 'elana', 'magelang', '2018-08-27', 'Perempuan', NULL, NULL, NULL, NULL, NULL, 'Islam', 'Belum Menikah', 'SD', 'Pelajar/Mahasiswa', 'WNI', NULL, NULL, '2025-01-30 07:52:33', '2025-01-30 07:52:33', NULL),
(154, 'hdjs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2025-02-10 04:02:41', '2025-02-10 04:02:41', NULL),
(155, 'sayang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2025-07-17 07:49:13', '2025-07-17 07:49:13', NULL),
(156, 'sayang 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2025-07-17 07:57:50', '2025-07-17 07:57:50', NULL),
(157, 'anita', 'magelang', '2000-01-12', 'Perempuan', 'karangrejo rt 1 rw 5', 'magelang utara', 'magelang', 'magelang', '56195', 'Islam', 'Menikah', 'S1', 'Guru/Pengajar', 'WNI', '08123456789', '-', '2025-07-17 09:56:04', '2025-07-17 09:56:04', NULL),
(158, 'pasien1', 'yogyakarta', '1999-02-01', NULL, 'JL Kapas', 'Bener', 'Tegalrejo', 'Kota Yogya', NULL, 'Islam', 'Belum Menikah', 'S1', 'Pelajar/Mahasiswa', 'WNI', '0812345678', '-', '2025-07-26 05:13:57', '2025-07-26 05:13:57', NULL),
(159, 'testing pasien', NULL, NULL, 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2025-07-26 10:01:36', '2025-07-26 10:01:36', NULL),
(160, 'testing 2 kuisioner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2025-07-26 10:07:07', '2025-07-26 10:07:07', NULL),
(161, 'pasien 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2025-07-26 10:08:38', '2025-07-26 10:08:38', NULL),
(162, 'testing 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, '2025-07-26 10:12:35', '2025-07-26 10:12:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_obat`
--

CREATE TABLE `pengeluaran_obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekam_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `teks_pertanyaan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `kategori_id`, `teks_pertanyaan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apakah ada keluhan?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(2, 1, 'Apa Yang Dikeluhkan?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(3, 1, 'Bagaian Mana?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(4, 1, 'Bagaimana Rasanya?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(5, 1, 'Frekuensinya?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(6, 1, 'Jika Dipakai?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(7, 1, 'Sejak?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(8, 1, 'Hingga?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(9, 1, 'Klien Ingin Di?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(10, 2, 'Pasien merasa dalam keadaaan sehat?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(11, 2, 'Selama 5 tahun terakhir ini, pasien pernah dinyatakan mengalami penyakit serius, menjalani operasi dan atau di rawat inap di rumah sakit?\r\nKalau YA...sebutkan nama penyakitnya', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(12, 2, 'Pasien mempunyai kelainan pembekuan darah', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(13, 2, 'Pasien mempunyai reaksi alergi terhadap hal-hal sebagai berikut :\r\nMakanan?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(14, 2, 'Obat-obatan?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(15, 2, 'Obat yang disuntik (obat bius)?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(16, 2, 'Cuaca dan lain-lain?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(17, 3, 'Pasien pernah di rawat / periksa gigi sebelumnya?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(18, 3, 'Kalau sudah pernah dirawat, apakah pengalaman perawatannya tidak memuaskan atau menjadikan cemas / takut untuk diperiksa ulang?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(19, 3, 'Pasien mengetahui bagaimana cara memelihara kesehatan gigi dan mulut yang baik dan benar?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(20, 3, 'Pasien melakukan menyikat gigi minimal 2 kali sehari setelah makan pagi dan sebelum tidur malam?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(21, 3, 'Pasien menyikat gigi dengan cara yang benar, tepat dan cermat?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(22, 3, 'Pasien mengurangi makanan yang manis dan lengket?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(23, 3, 'Pasien memperbanyak makan buah-buahan dan sayuran yang berserat?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(24, 3, 'Pasien mempunyai kebiasaan sebagai berikut :\r\nMinum teh / kopi?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(25, 3, 'Minum minuman beralkohol?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(26, 3, 'Minum minuman bersoda?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(27, 3, 'Merokok?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(28, 3, 'Mengunyah satu sisi?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(29, 3, 'Mengunyah sirih/tembakau?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(30, 3, 'Menggigit-gigit benda keras?', '2024-09-12 17:00:00', '2024-09-12 17:00:00'),
(31, 3, 'Bruxism?', '2024-09-12 17:00:00', '2024-09-12 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam`
--

CREATE TABLE `rekam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rekam` varchar(255) NOT NULL,
  `tgl_rekam` varchar(255) NOT NULL,
  `pasien_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `pemeriksaan` varchar(255) DEFAULT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `biaya_pemeriksaan` int(11) NOT NULL DEFAULT 0,
  `biaya_tindakan` int(11) NOT NULL DEFAULT 0,
  `biaya_obat` int(11) NOT NULL DEFAULT 0,
  `total_biaya` int(11) NOT NULL DEFAULT 0,
  `petugas_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekam`
--

INSERT INTO `rekam` (`id`, `no_rekam`, `tgl_rekam`, `pasien_id`, `user_id`, `keluhan`, `pemeriksaan`, `diagnosa`, `tindakan`, `biaya_pemeriksaan`, `biaya_tindakan`, `biaya_obat`, `total_biaya`, `petugas_id`, `created_at`, `updated_at`) VALUES
(73, 'REG#2024090960', '2024-09-09', 60, 1, 'sakit', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2024-09-09 15:25:11', '2024-09-09 15:25:11'),
(78, 'REG#2024091468', '2024-09-14', 68, 1, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2024-09-14 03:52:12', '2024-09-14 03:52:12'),
(79, 'REG#2024091469', '2024-09-14', 69, 2, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 2, '2024-09-14 03:56:47', '2024-09-14 03:56:47'),
(80, 'REG#2024092373', '2024-09-23', 73, 3, 'gigi lubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-23 03:33:30', '2024-09-23 03:33:30'),
(81, 'REG#2024092785', '2024-09-27', 85, 3, 'pasien mengeluhkan gigi sakit dibagian bawah sebelah kanan belakang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-27 01:32:10', '2024-09-27 01:32:10'),
(82, 'REG#2024092786', '2024-09-27', 86, 3, 'pasien memiliki keluhan pada gigi bagian bawah kanan belakang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-27 02:13:57', '2024-09-27 02:13:57'),
(83, 'REG#2024092887', '2024-09-28', 87, 3, 'tidak ada sakit gigi', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 02:53:41', '2024-09-28 02:53:41'),
(84, 'REG#2024092888', '2024-09-28', 88, 3, 'gigi berlubang 1 dibagian kanan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:02:04', '2024-09-28 03:02:04'),
(85, 'REG#2024092889', '2024-09-28', 89, 3, 'berlubang 1 tetapi tidak sakit', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:09:09', '2024-09-28 03:09:09'),
(86, 'REG#2024092891', '2024-09-28', 91, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:14:10', '2024-09-28 03:14:10'),
(87, 'REG#2024092890', '2024-09-28', 90, 3, 'terdaoat gigi berlubang pada bagian kiri bawah', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:16:11', '2024-09-28 03:16:11'),
(88, 'REG#2024092892', '2024-09-28', 92, 3, 'tidak ada', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:17:42', '2024-09-28 03:17:42'),
(89, 'REG#2024092895', '2024-09-28', 95, 3, 'sakit gigi bagian bawah', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:21:23', '2024-09-28 03:21:23'),
(90, 'REG#2024092898', '2024-09-28', 98, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:22:53', '2024-09-28 03:22:53'),
(91, 'REG#2024092897', '2024-09-28', 97, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:23:29', '2024-09-28 03:23:29'),
(92, 'REG#2024092896', '2024-09-28', 96, 3, 'Tidak ada', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:24:20', '2024-09-28 03:24:20'),
(93, 'REG#20240928100', '2024-09-28', 100, 3, 'gigi geraham goyang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:24:44', '2024-09-28 03:24:44'),
(94, 'REG#20240928101', '2024-09-28', 101, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:25:48', '2024-09-28 03:25:48'),
(95, 'REG#2024092899', '2024-09-28', 99, 3, 'pernah sakit gigi', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:26:41', '2024-09-28 03:26:41'),
(96, 'REG#20240928103', '2024-09-28', 103, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:29:57', '2024-09-28 03:29:57'),
(97, 'REG#20240928105', '2024-09-28', 105, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:30:29', '2024-09-28 03:30:29'),
(98, 'REG#20240928104', '2024-09-28', 104, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:30:56', '2024-09-28 03:30:56'),
(99, 'REG#20240928102', '2024-09-28', 102, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:31:50', '2024-09-28 03:31:50'),
(100, 'REG#20240928104', '2024-09-28', 104, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:33:37', '2024-09-28 03:33:37'),
(101, 'REG#20240928106', '2024-09-28', 106, 3, 'berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:34:36', '2024-09-28 03:34:36'),
(102, 'REG#20240928108', '2024-09-28', 108, 3, 'sakit gusi', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:36:00', '2024-09-28 03:36:00'),
(103, 'REG#20240928107', '2024-09-28', 107, 3, 'tidak ada keluhan. Pasien sehat', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:36:31', '2024-09-28 03:36:31'),
(104, 'REG#20240928110', '2024-09-28', 110, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:36:58', '2024-09-28 03:36:58'),
(105, 'REG#20240928107', '2024-09-28', 107, 3, 'tidak ada keluhan. Pasien sehat', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:38:05', '2024-09-28 03:38:05'),
(106, 'REG#20240928112', '2024-09-28', 112, 3, 'Pasien dalam keadaan sehat', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:39:36', '2024-09-28 03:39:36'),
(107, 'REG#20240928113', '2024-09-28', 113, 3, 'gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:39:46', '2024-09-28 03:39:46'),
(108, 'REG#20240928114', '2024-09-28', 114, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:39:51', '2024-09-28 03:39:51'),
(109, 'REG#20240928115', '2024-09-28', 115, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:42:02', '2024-09-28 03:42:02'),
(110, 'REG#20240928116', '2024-09-28', 116, 3, 'Gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:42:07', '2024-09-28 03:42:07'),
(111, 'REG#20240928117', '2024-09-28', 117, 3, 'gigi berlubang ada 2', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:45:08', '2024-09-28 03:45:08'),
(112, 'REG#20240928120', '2024-09-28', 120, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:47:09', '2024-09-28 03:47:09'),
(113, 'REG#20240928118', '2024-09-28', 118, 3, 'gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:48:06', '2024-09-28 03:48:06'),
(114, 'REG#20240928119', '2024-09-28', 119, 3, 'terdapat gigi berlubang pada bagian kiri bawah', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:48:25', '2024-09-28 03:48:25'),
(115, 'REG#20240928121', '2024-09-28', 121, 3, 'Karang gigi bagian atas', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:49:36', '2024-09-28 03:49:36'),
(116, 'REG#20240928122', '2024-09-28', 122, 3, 'gigi geraham kanan atas dan kiri bawah  berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:53:28', '2024-09-28 03:53:28'),
(117, 'REG#20240928124', '2024-09-28', 124, 3, 'gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:54:45', '2024-09-28 03:54:45'),
(118, 'REG#20240928123', '2024-09-28', 123, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 03:55:10', '2024-09-28 03:55:10'),
(119, 'REG#20240928125', '2024-09-28', 125, 3, 'gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 04:00:22', '2024-09-28 04:00:22'),
(120, 'REG#20240928126', '2024-09-28', 126, 3, 'gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 04:03:35', '2024-09-28 04:03:35'),
(121, 'REG#20240928128', '2024-09-28', 128, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 04:07:17', '2024-09-28 04:07:17'),
(122, 'REG#20240928127', '2024-09-28', 127, 3, 'Tidak ada', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 04:10:13', '2024-09-28 04:10:13'),
(123, 'REG#20240928129', '2024-09-28', 129, 3, 'gigi berlubang 3', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:07:49', '2024-09-28 10:07:49'),
(124, 'REG#20240928130', '2024-09-28', 130, 3, 'gigi depan terasa linu setelah membersihkan karang gigi', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:13:17', '2024-09-28 10:13:17'),
(125, 'REG#20240928131', '2024-09-28', 131, 3, 'gigi berlubang di bawah kanan dan kiri', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:18:33', '2024-09-28 10:18:33'),
(126, 'REG#20240928132', '2024-09-28', 132, 3, 'gigi sakit atau terasa tertarik ketika mau menelan makanan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:24:13', '2024-09-28 10:24:13'),
(127, 'REG#20240928133', '2024-09-28', 133, 3, 'gigi berlubang tetapi tidak terasa sakit', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:28:42', '2024-09-28 10:28:42'),
(128, 'REG#20240928134', '2024-09-28', 134, 3, 'gusinya bengkak, giginya berlubang, giginya goyang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:33:34', '2024-09-28 10:33:34'),
(129, 'REG#20240928135', '2024-09-28', 135, 3, 'gigi berlubang di atas dan bawah', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:39:17', '2024-09-28 10:39:17'),
(130, 'REG#20240928136', '2024-09-28', 136, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:44:48', '2024-09-28 10:44:48'),
(131, 'REG#20240928137', '2024-09-28', 137, 3, 'gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:48:58', '2024-09-28 10:48:58'),
(132, 'REG#20240928138', '2024-09-28', 138, 3, 'tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:53:45', '2024-09-28 10:53:45'),
(133, 'REG#20240928139', '2024-09-28', 139, 3, 'gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 10:58:57', '2024-09-28 10:58:57'),
(134, 'REG#20240928140', '2024-09-28', 140, 3, 'gigi berlubang dibagian depan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 11:03:28', '2024-09-28 11:03:28'),
(135, 'REG#20240928141', '2024-09-28', 141, 3, 'gigi berlubang', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-09-28 11:07:55', '2024-09-28 11:07:55'),
(136, 'REG#20241005142', '2024-10-05 22:35:05', 142, 1, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2024-10-05 15:33:32', '2024-10-05 15:35:05'),
(137, 'REG#20241020143', '2024-10-20', 143, 3, 'sehat', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-10-20 07:55:58', '2024-10-20 07:55:58'),
(138, 'REG#20241110144', '2024-11-10', 144, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-11-10 13:23:23', '2024-11-10 13:23:23'),
(139, 'REG#20241114145', '2024-11-14', 145, 1, 'px mengeluhkan sakit gigi', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2024-11-14 03:00:00', '2024-11-14 03:00:00'),
(140, 'REG#20241114146', '2024-11-14', 146, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-11-14 03:19:50', '2024-11-14 03:19:50'),
(141, 'REG#20241114147', '2024-11-14', 147, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-11-14 03:37:03', '2024-11-14 03:37:03'),
(142, 'REG#20241114148', '2024-11-14', 148, 3, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-11-14 12:37:17', '2024-11-14 12:37:17'),
(143, 'REG#20241114149', '2024-11-18 21:47:12', 149, 1, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 2, '2024-11-14 12:40:26', '2024-11-18 14:47:12'),
(144, 'REG#20241118150', '2024-11-18 22:55:16', 150, 1, 'Tidak ada keluhan', '<p>sakit gigi pada gigi</p>', NULL, NULL, 0, 0, 0, 0, 1, '2024-11-18 15:24:37', '2025-07-02 17:11:45'),
(145, 'REG#20241128151', '2024-11-28', 151, 3, 'sakit gigi', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-11-28 08:29:15', '2024-11-28 08:29:15'),
(146, 'REG#20241128152', '2024-11-28', 152, 3, 'sakit gigi', NULL, NULL, NULL, 0, 0, 0, 0, 3, '2024-11-28 08:30:36', '2024-11-28 08:30:36'),
(147, 'REG#20250130153', '2025-01-30', 153, 7, 'pasien datang dengan keluhan gigi kiri atas sebelah belakang terasa tidak enak setelah ditambal', NULL, NULL, NULL, 0, 0, 0, 0, 7, '2025-01-30 09:20:28', '2025-01-30 09:20:28'),
(148, 'REG#20250210154', '2025-02-10', 154, 7, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 7, '2025-02-10 04:02:57', '2025-02-10 04:02:57'),
(149, 'REG#20250717155', '2025-07-17', 155, 1, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-07-17 07:49:22', '2025-07-17 07:49:22'),
(150, 'REG#20250717156', '2025-07-17', 156, 1, 'test', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-07-17 07:58:00', '2025-07-17 07:58:00'),
(151, 'REG#20250717157', '2025-07-17', 157, 8, 'pasien datang dengan keluhan gigi belakang kanan bawah sakit', NULL, NULL, NULL, 0, 0, 0, 0, 8, '2025-07-17 10:02:31', '2025-07-17 10:02:31'),
(152, 'REG#20250726158', '2025-07-26', 158, 8, 'pasien datang dengan keluhan....', NULL, NULL, NULL, 0, 0, 0, 0, 8, '2025-07-26 05:19:38', '2025-07-26 05:19:38'),
(153, 'REG#20250726158', '2025-07-26', 158, 8, 'pasien datang dengan keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 8, '2025-07-26 05:28:19', '2025-07-26 05:28:19'),
(154, 'REG#20250726159', '2025-07-26', 159, 1, 'test', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-07-26 10:02:31', '2025-07-26 10:02:31'),
(155, 'REG#20250726161', '2025-07-26', 161, 1, 'testing', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-07-26 10:08:53', '2025-07-26 10:08:53'),
(156, 'REG#20250726161', '2025-07-26', 161, 1, 'testing', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-07-26 10:09:07', '2025-07-26 10:09:07'),
(157, 'REG#20250726161', '2025-07-26', 161, 1, 'Tidak ada keluhan', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-07-26 10:09:41', '2025-07-26 10:09:41'),
(158, 'REG#20250726162', '2025-07-26', 162, 1, 'test', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-07-26 10:12:52', '2025-07-26 10:12:52'),
(159, 'REG#20250726162', '2025-07-26', 162, 1, 'test', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-07-26 10:12:53', '2025-07-26 10:12:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammediskader`
--

CREATE TABLE `rekammediskader` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `namakondisigigi_id` bigint(20) UNSIGNED NOT NULL,
  `total` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekammediskader`
--

INSERT INTO `rekammediskader` (`id`, `pasien_id`, `user_id`, `namakondisigigi_id`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES
(28, 73, 3, 1, '3', 'bagian atas kanan', '2024-09-23 03:34:03', '2024-09-23 03:34:03'),
(29, 73, 3, 4, '3', '-', '2024-09-23 03:34:03', '2024-09-23 03:34:03'),
(30, 85, 3, 1, '2', 'di sisi kanan bawah belakang', '2024-09-27 01:32:53', '2024-09-27 01:32:53'),
(31, 85, 3, 5, '3', 'di sisi bawah depan', '2024-09-27 01:32:53', '2024-09-27 01:32:53'),
(32, 86, 3, 1, '3', 'gigi bagian bawah belakang', '2024-09-27 02:14:41', '2024-09-27 02:16:08'),
(33, 86, 3, 5, '2', 'bagian depan bawah', '2024-09-27 02:14:41', '2024-09-27 02:14:41'),
(34, 87, 3, 1, '1', NULL, '2024-09-28 02:54:35', '2024-09-28 02:54:35'),
(35, 88, 3, 1, '1', 'gigi bagian kanan', '2024-09-28 03:02:20', '2024-09-28 03:02:20'),
(36, 89, 3, 1, '1', 'bagian kiri bawah', '2024-09-28 03:09:43', '2024-09-28 03:09:43'),
(37, 91, 3, 1, '111111', NULL, '2024-09-28 03:15:55', '2024-09-28 03:15:55'),
(38, 90, 3, 1, '1', 'bagian belakang kiri bawah', '2024-09-28 03:17:09', '2024-09-28 03:17:09'),
(39, 92, 3, 1, '1', 'tidak ada', '2024-09-28 03:18:15', '2024-09-28 03:18:15'),
(40, 95, 3, 1, '1', NULL, '2024-09-28 03:21:35', '2024-09-28 03:21:35'),
(41, 97, 3, 1, '5', 'terdapat gigi berlubag pada bagian atas kanan, bawah kanan, da bawah kiri', '2024-09-28 03:24:35', '2024-09-28 03:24:35'),
(42, 96, 3, 1, '1112112', 'Tdk afs', '2024-09-28 03:26:02', '2024-09-28 03:26:02'),
(43, 101, 3, 1, '1', NULL, '2024-09-28 03:26:04', '2024-09-28 03:26:04'),
(44, 100, 3, 1, '1', 'gigi geraham  berlubang dan goyang', '2024-09-28 03:26:37', '2024-09-28 03:26:37'),
(45, 100, 3, 1, '1', 'gigi geraham berlubang dan goyang', '2024-09-28 03:26:37', '2024-09-28 03:26:37'),
(46, 99, 3, 1, '1', 'kanan bawah', '2024-09-28 03:26:58', '2024-09-28 03:26:58'),
(47, 105, 3, 1, '1', NULL, '2024-09-28 03:30:36', '2024-09-28 03:30:36'),
(48, 103, 3, 4, '0', 'tidak ada keluhan', '2024-09-28 03:32:02', '2024-09-28 03:32:02'),
(49, 106, 3, 1, '5', 'gigi berlubang bagian bawah atas dan bawah', '2024-09-28 03:34:59', '2024-09-28 03:34:59'),
(50, 108, 3, 5, '1', NULL, '2024-09-28 03:36:29', '2024-09-28 03:36:29'),
(51, 110, 3, 4, '0', 'tidak ada keluhan', '2024-09-28 03:37:19', '2024-09-28 03:37:19'),
(52, 107, 3, 1, '0', 'gigi bagus', '2024-09-28 03:37:25', '2024-09-28 03:37:25'),
(53, 107, 3, 1, '0', 'gigi bagus', '2024-09-28 03:37:25', '2024-09-28 03:37:25'),
(54, 107, 3, 1, '0', 'gigi bagus', '2024-09-28 03:37:48', '2024-09-28 03:37:48'),
(55, 114, 3, 1, '0', NULL, '2024-09-28 03:39:58', '2024-09-28 03:39:58'),
(56, 113, 3, 1, '1', 'bagian bawah', '2024-09-28 03:39:59', '2024-09-28 03:39:59'),
(57, 115, 3, 4, '0', 'tidak ada keluhan', '2024-09-28 03:42:19', '2024-09-28 03:42:19'),
(58, 112, 3, 4, '646', 'Gigi berkarang', '2024-09-28 03:42:40', '2024-09-28 03:42:40'),
(59, 112, 3, 4, '66', 'Gigi berkarang', '2024-09-28 03:42:40', '2024-09-28 03:42:40'),
(60, 112, 3, 4, '0', NULL, '2024-09-28 03:42:40', '2024-09-28 03:42:40'),
(61, 116, 3, 1, '111', 'Satu', '2024-09-28 03:44:48', '2024-09-28 03:44:48'),
(62, 117, 3, 1, '2', 'bagian bawah kanan dan kiri', '2024-09-28 03:45:30', '2024-09-28 03:45:30'),
(63, 120, 3, 1, '0', NULL, '2024-09-28 03:47:16', '2024-09-28 03:47:16'),
(64, 119, 3, 1, '1', 'bagian kiri bawah', '2024-09-28 03:48:41', '2024-09-28 03:48:41'),
(65, 118, 3, 1, '2', 'gigi geraham atas berlubang', '2024-09-28 03:48:42', '2024-09-28 03:48:42'),
(66, 121, 3, 4, '22', 'Gigi berkarang', '2024-09-28 03:51:55', '2024-09-28 03:51:55'),
(67, 121, 3, 4, '22', 'Gigi berkarang', '2024-09-28 03:51:55', '2024-09-28 03:51:55'),
(68, 121, 3, 4, '22', 'Gigi berkarang', '2024-09-28 03:51:55', '2024-09-28 03:51:55'),
(69, 121, 3, 4, '2', 'Gigi berkarang', '2024-09-28 03:51:55', '2024-09-28 03:51:55'),
(70, 121, 3, 4, '2', 'Gigi berkarang', '2024-09-28 03:51:55', '2024-09-28 03:51:55'),
(71, 121, 3, 4, '2', 'Gigi berkarang', '2024-09-28 03:51:55', '2024-09-28 03:51:55'),
(72, 122, 3, 1, '1', NULL, '2024-09-28 03:53:50', '2024-09-28 03:53:50'),
(73, 124, 3, 1, '1', NULL, '2024-09-28 03:54:57', '2024-09-28 03:54:57'),
(74, 123, 3, 4, '1', 'Belakang', '2024-09-28 03:56:16', '2024-09-28 03:56:16'),
(75, 125, 3, 1, '2', 'bagian atas', '2024-09-28 04:00:43', '2024-09-28 04:00:43'),
(76, 126, 3, 1, '1', NULL, '2024-09-28 04:03:43', '2024-09-28 04:03:43'),
(77, 128, 3, 1, '0', NULL, '2024-09-28 04:07:26', '2024-09-28 04:07:26'),
(78, 127, 3, 1, '21885211111', 'Atas belakang', '2024-09-28 04:12:38', '2024-09-28 04:12:38'),
(79, 127, 3, 1, '4414155588521', 'Atas belakang', '2024-09-28 04:12:38', '2024-09-28 04:12:38'),
(80, 129, 3, 1, '3', 'gigi sudah tidak ada tapi masih terasa sakit', '2024-09-28 10:08:19', '2024-09-28 10:08:19'),
(81, 130, 3, 1, '0', 'tidak ada', '2024-09-28 10:13:35', '2024-09-28 10:13:35'),
(82, 131, 3, 1, '6', 'bagian bawah', '2024-09-28 10:18:55', '2024-09-28 10:18:55'),
(83, 132, 3, 1, '0', 'gigi terasa sakit atau tertarik ketika ingin menelan', '2024-09-28 10:24:44', '2024-09-28 10:24:44'),
(84, 133, 3, 1, '1', 'bagian bawah depan tetapi tidak sakit', '2024-09-28 10:29:03', '2024-09-28 10:29:03'),
(85, 134, 3, 1, '2', 'tidak ada', '2024-09-28 10:34:19', '2024-09-28 10:34:19'),
(86, 134, 3, 5, '1', 'gusi nya ada benjolan', '2024-09-28 10:34:19', '2024-09-28 10:34:19'),
(87, 135, 3, 1, '3', 'diatas dan dibawah', '2024-09-28 10:39:33', '2024-09-28 10:39:33'),
(88, 136, 3, 1, '0', 'tidak ada berlubang', '2024-09-28 10:45:04', '2024-09-28 10:45:04'),
(89, 137, 3, 1, '1', 'tetapi tidak sakit berada dibagian bawah', '2024-09-28 10:49:27', '2024-09-28 10:49:27'),
(90, 138, 3, 1, '0', 'tidak ada berlubang', '2024-09-28 10:54:01', '2024-09-28 10:54:01'),
(91, 139, 3, 1, '3', 'terasa sakit', '2024-09-28 10:59:18', '2024-09-28 10:59:18'),
(92, 140, 3, 1, '5', 'dibagian atas depan', '2024-09-28 11:03:50', '2024-09-28 11:03:50'),
(93, 141, 3, 1, '2', 'tidak sakit', '2024-09-28 11:08:11', '2024-09-28 11:08:11'),
(94, 143, 3, 1, '1', 'bawah', '2024-10-20 07:56:33', '2024-10-20 07:56:33'),
(95, 144, 3, 1, '1', NULL, '2024-11-10 13:23:57', '2024-11-10 13:23:57'),
(96, 145, 1, 1, '1', NULL, '2024-11-14 03:00:23', '2024-11-14 03:00:23'),
(97, 146, 3, 1, '1', 'sakit', '2024-11-14 03:20:34', '2024-11-14 03:20:34'),
(98, 147, 3, 5, '66', NULL, '2024-11-14 03:37:20', '2024-11-14 03:37:20'),
(99, 147, 3, 4, '9', NULL, '2024-11-14 03:37:20', '2024-11-14 03:37:20'),
(100, 147, 3, 5, '66', NULL, '2024-11-14 03:37:54', '2024-11-14 03:37:54'),
(101, 150, 1, 1, '2', 'gigi bawah dan gigi atas', '2024-11-18 15:25:45', '2024-11-18 15:25:45'),
(102, 150, 1, 3, '3', 'gigi samping', '2024-11-18 15:25:45', '2024-11-18 15:25:45'),
(103, 150, 1, 4, '2', 'gigi gusi', '2024-11-18 15:25:45', '2024-11-18 15:25:45'),
(104, 151, 3, 1, '11111', '1', '2024-11-28 08:29:32', '2024-11-28 08:29:32'),
(105, 152, 3, 1, '1', '1', '2024-11-28 08:30:48', '2024-11-28 08:30:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_diagnosa`
--

CREATE TABLE `rekam_diagnosa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekam_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_gigi`
--

CREATE TABLE `rekam_gigi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rekam_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `elemen_gigi` varchar(255) NOT NULL,
  `pemeriksaan` varchar(255) DEFAULT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekam_gigi`
--

INSERT INTO `rekam_gigi` (`id`, `user_id`, `rekam_id`, `pasien_id`, `elemen_gigi`, `pemeriksaan`, `diagnosa`, `tindakan`, `created_at`, `updated_at`) VALUES
(34, 1, 73, 60, '32', '⚫', NULL, 'P1', NULL, NULL),
(35, 1, 73, 60, '21', '∑', 'K02.3', NULL, NULL, NULL),
(38, 1, 78, 68, '21', '⚫', NULL, 'P1', NULL, NULL),
(39, 1, 78, 68, '23', 'Ο', NULL, NULL, NULL, NULL),
(40, 2, 79, 69, '11', '⚫', NULL, 'P1', NULL, NULL),
(41, 1, 136, 142, '16', 'X', NULL, 'P1', NULL, NULL),
(42, 1, 136, 142, '18', '⚫', NULL, NULL, NULL, NULL),
(44, 1, 143, 149, '61', '_', NULL, 'P1', NULL, NULL),
(45, 1, 143, 149, '11', '∑', NULL, 'P1', NULL, NULL),
(46, 1, 143, 149, '31', '∑', 'K02.9', NULL, NULL, NULL),
(47, 1, 143, 149, '33', 'Ο', 'K02.1', NULL, NULL, NULL),
(48, 1, 143, 149, '48', 'X', 'K04.4', NULL, NULL, NULL),
(49, 1, 143, 149, '55', 'V', 'K04.9', NULL, NULL, NULL),
(50, 1, 143, 149, '84', '⚫', 'K04.5', NULL, NULL, NULL),
(51, 1, 144, 150, '61', '_', 'K02.0', 'P1', NULL, NULL),
(52, 1, 144, 150, '51', '∑', 'K02.1', 'P1', NULL, NULL),
(53, 1, 144, 150, '62', 'Ο', 'K02.3', 'R1', NULL, NULL),
(54, 1, 144, 150, '52', 'X', 'K03.9', 'P2', NULL, NULL),
(55, 1, 144, 150, '63', 'V', 'K03.5', 'P1', NULL, NULL),
(56, 1, 144, 150, '53', '⚫', 'K04.7', 'P1', NULL, NULL),
(57, 8, 151, 157, '46', 'V', 'K02.1', 'P1', NULL, NULL),
(58, 1, 158, 162, '22', '⚫', NULL, 'P1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id`, `kode`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(51, 'P1', 'Promotif', 0, '2024-09-09 10:55:55', '2024-09-09 10:55:55'),
(52, 'P2', 'Preventif', 0, '2024-09-09 10:56:20', '2024-09-09 10:56:20'),
(53, 'R1', 'Rujukan', 0, '2024-09-09 10:56:30', '2024-09-09 10:56:30'),
(54, 'P3', 'Kuratif', 0, '2025-07-26 05:42:57', '2025-07-26 05:42:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toga`
--

CREATE TABLE `toga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `toga`
--

INSERT INTO `toga` (`id`, `judul`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Kunyit untuk Sakit Gigi', 'Kunyit, dengan sifat anti-inflamasi dan antimikrobanya, telah lama digunakan sebagai obat tradisional untuk meredakan sakit gigi. Caranya sederhana: campurkan bubuk kunyit dengan sedikit air hingga membentuk pasta, lalu oleskan pada gigi dan gusi yang sakit. Biarkan selama beberapa menit sebelum dibilas. Penggunaan rutin dapat membantu mengurangi peradangan dan membunuh bakteri penyebab sakit gigi.', 'toga/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(2, 'Cengkeh Pereda Nyeri Gigi', 'Cengkeh mengandung eugenol, zat alami dengan sifat analgesik kuat yang efektif meredakan nyeri gigi. Untuk menggunakannya, rendam beberapa buah cengkeh dalam air hangat selama beberapa menit, lalu berkumurlah dengan air rendaman tersebut. Alternatifnya, Anda bisa mengunyah langsung sebuah cengkeh di dekat gigi yang bermasalah. Efek mati rasa dari cengkeh akan segera terasa, memberikan kelegaan dari rasa sakit.', 'toga/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(3, 'Daun Sirih untuk Kesehatan Gigi dan Gusi', 'Daun sirih telah lama dikenal memiliki sifat antiseptik dan antimikroba yang sangat baik untuk kesehatan mulut. Cara penggunaannya cukup mudah: kunyah langsung 1-2 lembar daun sirih segar, atau rebus beberapa lembar dalam air dan gunakan air rebusan untuk berkumur. Penggunaan rutin dapat membantu mencegah bau mulut, mengurangi plak gigi, dan menjaga kesehatan gusi.', 'toga/4IdBwtO371DBKqqhLpAmS7jMdCZbgG3HIU2Ci4Sf.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(4, 'Bawang Putih: Antibiotik Alami untuk Gigi', 'Bawang putih dikenal luas akan sifat antibiotik alaminya yang kuat. Untuk masalah gigi, hancurkan satu siung bawang putih hingga membentuk pasta, lalu oleskan langsung pada gigi yang bermasalah. Biarkan selama beberapa menit sebelum dibilas. Meskipun aromanya mungkin kurang menyenangkan, kemampuannya dalam membunuh bakteri penyebab infeksi gigi sangat efektif.', 'toga/he3KCiBEQuM1jkpskGRnFFCHL9pZryIqb7ZpXvJY.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(5, 'Minyak Kelapa untuk Perawatan Gigi', 'Minyak kelapa memiliki sifat antimikroba dan anti-inflamasi yang baik untuk kesehatan gigi dan mulut. Teknik oil pulling, yaitu berkumur dengan minyak kelapa selama 15-20 menit setiap pagi, dapat membantu mengurangi plak, menyegarkan nafas, dan memperkuat gusi. Selain itu, minyak kelapa juga dapat digunakan sebagai pasta gigi alami dengan mencampurkannya bersama sedikit baking soda.', 'toga/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(6, 'Jahe untuk Meredakan Nyeri Gusi', 'Jahe memiliki sifat anti-inflamasi yang kuat, membuatnya efektif untuk meredakan nyeri dan pembengkakan gusi. Cara menggunakannya, iris tipis jahe segar dan gosokkan perlahan pada gusi yang sakit. Alternatifnya, Anda bisa membuat teh jahe dan berkumur dengan air teh tersebut setelah didinginkan. Penggunaan rutin dapat membantu mengurangi peradangan dan meningkatkan kesehatan gusi secara keseluruhan.', 'toga/8Mu9C2XYEjSBvgytwNn6IsfItM95a93sTQjKDVYr.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(7, 'Lidah Buaya: Penyembuh Alami Luka Mulut', 'Lidah buaya terkenal akan sifat penyembuh dan anti-inflamasinya. Untuk luka di mulut atau gusi yang berdarah, potong selembar daun lidah buaya dan aplikasikan gelnya langsung pada area yang terkena. Sifat antibakterinya akan membantu mencegah infeksi, sementara kandungan vitaminnya mempercepat proses penyembuhan. Penggunaan rutin juga dapat membantu menjaga kesehatan gusi.', 'toga/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(8, 'Teh Hijau untuk Kesehatan Gigi', 'Teh hijau kaya akan antioksidan dan senyawa polifenol yang baik untuk kesehatan mulut. Minum teh hijau secara teratur atau berkumur dengan teh hijau yang telah didinginkan dapat membantu mengurangi bakteri penyebab bau mulut dan plak gigi. Selain itu, kandungan fluoride alami dalam teh hijau juga membantu memperkuat enamel gigi, melindunginya dari kerusakan dan pembusukan.', 'toga/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(9, 'Propolis untuk Perawatan Gigi Berlubang', 'Propolis, produk lebah yang kaya akan senyawa antimikroba, telah digunakan sejak lama untuk perawatan gigi. Untuk gigi berlubang, oleskan langsung tincture propolis pada area yang terkena. Sifat antibakterinya akan membantu membunuh kuman penyebab pembusukan, sementara kemampuannya dalam merangsang regenerasi jaringan dapat membantu memperbaiki kerusakan pada gigi.', 'toga/4IdBwtO371DBKqqhLpAmS7jMdCZbgG3HIU2Ci4Sf.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(10, 'Daun Jambu Biji untuk Gusi Berdarah', 'Daun jambu biji kaya akan vitamin C dan antioksidan yang sangat baik untuk kesehatan gusi. Untuk mengatasi gusi berdarah, kunyah langsung 1-2 lembar daun jambu biji segar, atau rebus beberapa lembar dalam air dan gunakan air rebusan untuk berkumur. Penggunaan rutin dapat membantu memperkuat jaringan gusi, mengurangi pendarahan, dan mencegah infeksi pada gusi.', 'toga/he3KCiBEQuM1jkpskGRnFFCHL9pZryIqb7ZpXvJY.jpg', '2024-08-28 05:36:24', '2024-08-28 05:36:24'),
(11, 'Kayu Manis untuk Nafas Segar', 'Kayu manis tidak hanya memberikan aroma yang harum, tetapi juga memiliki sifat antibakteri yang efektif melawan bakteri penyebab bau mulut. Untuk menggunakannya, rebus beberapa batang kayu manis dalam air, biarkan dingin, dan gunakan sebagai obat kumur alami. Selain menyegarkan nafas, kayu manis juga dapat membantu mengurangi plak gigi dan menjaga kesehatan gusi berkat kandungan antiinflamasinya.', 'toga/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(12, 'Daun Kemangi untuk Gusi Sehat', 'Daun kemangi kaya akan minyak esensial yang memiliki sifat antibakteri dan antiinflamasi. Mengunyah beberapa lembar daun kemangi segar setiap hari dapat membantu membersihkan mulut dari bakteri, menyegarkan nafas, dan menjaga kesehatan gusi. Alternatifnya, Anda bisa membuat teh kemangi dan menggunakannya sebagai obat kumur alami untuk melawan bakteri penyebab plak dan radang gusi.', 'toga/8Mu9C2XYEjSBvgytwNn6IsfItM95a93sTQjKDVYr.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(13, 'Minyak Tea Tree untuk Perawatan Gigi', 'Minyak tea tree terkenal akan sifat antimikrobanya yang kuat. Untuk perawatan gigi, campurkan beberapa tetes minyak tea tree dengan air dan gunakan sebagai obat kumur. Ini dapat membantu membunuh bakteri penyebab bau mulut, plak, dan gingivitis. Namun, penting untuk tidak menelan campuran ini dan selalu mengencerkan minyak tea tree sebelum digunakan, karena konsentrasi tinggi dapat menyebabkan iritasi.', 'toga/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(14, 'Biji Adas untuk Sakit Gigi', 'Biji adas memiliki sifat analgesik alami yang dapat membantu meredakan sakit gigi. Kunyah sedikit biji adas di dekat gigi yang sakit, atau buat teh dengan merebus biji adas dan gunakan sebagai obat kumur. Komponen aktif dalam biji adas dapat membantu mengurangi rasa sakit dan peradangan, memberikan kelegaan sementara dari ketidaknyamanan gigi.', 'toga/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(15, 'Daun Mint untuk Kesegaran Mulut', 'Daun mint tidak hanya menyegarkan nafas, tetapi juga memiliki sifat antibakteri yang dapat membantu menjaga kesehatan mulut. Kunyah langsung beberapa lembar daun mint segar, atau buat teh mint untuk berkumur. Mentol dalam daun mint memberikan sensasi dingin yang dapat membantu meredakan nyeri gusi ringan, sementara sifat antibakterinya membantu melawan bakteri penyebab bau mulut dan plak gigi.', 'toga/4IdBwtO371DBKqqhLpAmS7jMdCZbgG3HIU2Ci4Sf.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(16, 'Buah Delima untuk Gusi Kuat', 'Buah delima kaya akan antioksidan dan senyawa anti-inflamasi yang sangat baik untuk kesehatan gusi. Konsumsi buah delima secara teratur atau berkumur dengan jus delima yang diencerkan dapat membantu mengurangi peradangan gusi, mencegah plak, dan memperkuat jaringan gusi. Kandungan tanin dalam delima juga memiliki efek astringen yang dapat membantu mengencangkan gusi dan mengurangi pendarahan.', 'toga/he3KCiBEQuM1jkpskGRnFFCHL9pZryIqb7ZpXvJY.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(17, 'Minyak Zaitun untuk Oil Pulling', 'Minyak zaitun, selain bermanfaat untuk kesehatan secara umum, juga dapat digunakan untuk teknik oil pulling. Berkumur dengan minyak zaitun selama 15-20 menit setiap pagi dapat membantu menarik keluar toksin dari mulut, mengurangi plak, dan memperkuat gusi. Sifat anti-inflamasi minyak zaitun juga dapat membantu meredakan gusi yang bengkak dan sensitif.', 'toga/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(18, 'Daun Sage untuk Perawatan Gusi', 'Daun sage memiliki sifat antiseptik dan astringen yang baik untuk kesehatan gusi. Rebus beberapa lembar daun sage dalam air, biarkan dingin, dan gunakan sebagai obat kumur. Ini dapat membantu mengurangi peradangan gusi, menyembuhkan luka kecil di mulut, dan mengurangi produksi air liur berlebih. Penggunaan rutin dapat membantu menjaga kesehatan gusi dan mencegah infeksi mulut.', 'toga/8Mu9C2XYEjSBvgytwNn6IsfItM95a93sTQjKDVYr.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(19, 'Akar Licorice untuk Gigi Berlubang', 'Akar licorice mengandung senyawa antibakteri yang dapat membantu melawan bakteri penyebab gigi berlubang. Kunyah sepotong kecil akar licorice atau gunakan bubuk licorice untuk menggosok gigi. Selain membantu mencegah pembusukan gigi, licorice juga dapat membantu mengurangi plak dan menyegarkan nafas. Namun, penggunaan dalam jangka panjang harus dikonsultasikan dengan dokter gigi karena dapat mempengaruhi tekanan darah.', 'toga/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(20, 'Jeruk Nipis untuk Memutihkan Gigi', 'Jeruk nipis, dengan kandungan asam sitratnya, dapat membantu memutihkan gigi secara alami. Campurkan perasan jeruk nipis dengan sedikit baking soda hingga membentuk pasta, lalu oleskan pada gigi menggunakan sikat gigi. Biarkan selama beberapa menit sebelum dibilas. Penggunaan sekali atau dua kali seminggu dapat membantu menghilangkan noda pada gigi dan memberikan kilau alami. Namun, karena sifat asamnya, penggunaan berlebihan dapat merusak enamel gigi, jadi gunakan dengan hati-hati.', 'toga/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', '2024-08-28 05:37:07', '2024-08-28 05:37:07'),
(21, 'Daun Salam untuk Kesehatan Gigi', 'Daun salam, selain dikenal sebagai bumbu masak, juga memiliki manfaat untuk kesehatan gigi dan mulut. Kandungan minyak esensial dalam daun salam memiliki sifat antibakteri yang dapat membantu melawan bakteri penyebab bau mulut dan plak gigi. Cara penggunaannya cukup sederhana: kunyah beberapa lembar daun salam segar atau rebus beberapa lembar dalam air, kemudian gunakan air rebusannya untuk berkumur. Penggunaan rutin dapat membantu menjaga kesegaran nafas dan kebersihan mulut secara alami.', 'toga/4IdBwtO371DBKqqhLpAmS7jMdCZbgG3HIU2Ci4Sf.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(22, 'Madu untuk Perawatan Gusi', 'Madu telah lama dikenal memiliki sifat antibakteri dan penyembuh alami. Untuk kesehatan gusi, oleskan sedikit madu murni pada gusi yang bengkak atau berdarah. Biarkan selama beberapa menit sebelum dibilas dengan air hangat. Sifat antibakteri madu dapat membantu melawan infeksi, sementara kandungan antiinflamasinya membantu mengurangi pembengkakan. Penggunaan rutin dapat membantu mempercepat penyembuhan gusi yang bermasalah dan menjaga kesehatan mulut secara keseluruhan.', 'toga/he3KCiBEQuM1jkpskGRnFFCHL9pZryIqb7ZpXvJY.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(23, 'Biji Wijen untuk Gigi Kuat', 'Biji wijen kaya akan kalsium dan mineral lainnya yang penting untuk kesehatan gigi. Konsumsi biji wijen secara teratur dapat membantu memperkuat struktur gigi dan tulang rahang. Selain itu, mengunyah biji wijen juga dapat membantu membersihkan sisa makanan di antara gigi. Untuk penggunaan topikal, Anda bisa membuat pasta dari biji wijen yang dihaluskan dan sedikit air, lalu oleskan pada gigi dan gusi. Biarkan selama beberapa menit sebelum dibilas untuk membantu remineralisasi gigi dan menjaga kesehatan gusi.', 'toga/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(24, 'Daun Pegagan untuk Penyembuhan Luka Mulut', 'Daun pegagan atau centella asiatica dikenal memiliki kemampuan luar biasa dalam mempercepat penyembuhan luka. Untuk luka di dalam mulut atau sariawan, haluskan beberapa lembar daun pegagan segar dan oleskan pada area yang terkena. Sifat antiinflamasi dan regeneratif dari pegagan dapat membantu meredakan rasa sakit dan mempercepat proses penyembuhan. Alternatifnya, Anda bisa membuat teh dari daun pegagan kering dan gunakan sebagai obat kumur untuk perawatan mulut secara menyeluruh.', 'toga/8Mu9C2XYEjSBvgytwNn6IsfItM95a93sTQjKDVYr.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(25, 'Bunga Chamomile untuk Nyeri Gigi', 'Chamomile tidak hanya baik untuk menenangkan pikiran, tetapi juga efektif dalam meredakan nyeri gigi. Kandungan antiinflamasi dan antispasmodik dalam chamomile dapat membantu mengurangi rasa sakit dan pembengkakan. Buat teh chamomile dengan menyeduh bunga chamomile kering dalam air panas, biarkan dingin, lalu gunakan untuk berkumur atau kompres pada pipi di area gigi yang sakit. Penggunaan rutin juga dapat membantu menenangkan gusi yang sensitif dan mengurangi risiko infeksi mulut.', 'toga/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(26, 'Daun Kelor untuk Gigi dan Gusi Sehat', 'Daun kelor kaya akan vitamin C, kalsium, dan antioksidan yang sangat bermanfaat untuk kesehatan gigi dan gusi. Konsumsi daun kelor secara teratur, baik dalam bentuk segar maupun bubuk, dapat membantu memperkuat struktur gigi dan meningkatkan kesehatan gusi. Untuk penggunaan topikal, buat pasta dari daun kelor yang dihaluskan dan sedikit air, lalu oleskan pada gigi dan gusi. Biarkan selama beberapa menit sebelum dibilas. Sifat antibakteri daun kelor juga dapat membantu melawan bakteri penyebab plak dan bau mulut.', 'toga/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(27, 'Minyak Oregano untuk Infeksi Gigi', 'Minyak oregano dikenal memiliki sifat antimikroba yang kuat, membuatnya efektif dalam melawan infeksi gigi. Untuk menggunakannya, campurkan beberapa tetes minyak oregano dengan minyak kelapa sebagai pengencer, lalu oleskan pada gigi yang terinfeksi menggunakan cotton bud. Biarkan selama beberapa menit sebelum dibilas. Penggunaan rutin dapat membantu mengurangi rasa sakit, membunuh bakteri penyebab infeksi, dan mempercepat proses penyembuhan. Namun, karena konsentrasinya yang kuat, selalu encerkan minyak oregano sebelum digunakan dan hindari menelannya.', 'toga/4IdBwtO371DBKqqhLpAmS7jMdCZbgG3HIU2Ci4Sf.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(28, 'Daun Ketumbar untuk Nafas Segar', 'Daun ketumbar tidak hanya memberikan rasa segar pada masakan, tetapi juga efektif dalam menyegarkan nafas. Kandungan klorofil dalam daun ketumbar membantu menetralisir bau mulut, sementara sifat antibakterinya dapat membantu melawan bakteri penyebab bau tidak sedap. Kunyah beberapa lembar daun ketumbar segar setelah makan, atau buat jus dari daun ketumbar dan minum secara rutin. Selain menyegarkan nafas, konsumsi rutin daun ketumbar juga dapat membantu meningkatkan kesehatan mulut secara keseluruhan.', 'toga/he3KCiBEQuM1jkpskGRnFFCHL9pZryIqb7ZpXvJY.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(29, 'Bawang Merah untuk Sakit Gigi', 'Meskipun aromanya kuat, bawang merah memiliki sifat antimikroba dan analgesik yang dapat membantu meredakan sakit gigi. Potong sepotong kecil bawang merah segar dan tempelkan langsung pada gigi yang sakit atau gusi di sekitarnya. Biarkan selama beberapa menit sebelum dibilas. Komponen sulfur dalam bawang merah dapat membantu membunuh bakteri penyebab infeksi, sementara sifat anti-inflamasinya membantu mengurangi pembengkakan. Penggunaan ini mungkin tidak nyaman karena aromanya, tetapi dapat memberikan kelegaan cepat dari rasa sakit.', 'toga/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57'),
(30, 'Daun Beluntas untuk Perawatan Mulut', 'Daun beluntas, tanaman yang umum ditemukan di Asia Tenggara, memiliki sifat antibakteri dan antioksidan yang bermanfaat untuk kesehatan mulut. Kunyah beberapa lembar daun beluntas segar atau buat teh dengan merebus daunnya dan gunakan sebagai obat kumur. Cara ini dapat membantu mengurangi plak gigi, menyegarkan nafas, dan menjaga kesehatan gusi. Kandungan flavonoid dalam daun beluntas juga dapat membantu memperkuat sistem kekebalan tubuh di dalam mulut, mencegah infeksi dan penyakit gusi.', 'toga/8Mu9C2XYEjSBvgytwNn6IsfItM95a93sTQjKDVYr.jpg', '2024-08-28 05:37:57', '2024-08-28 05:37:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '\n            1 => Admin\n            2 => Petugas Registrasi\n            3 => Dokter\n            4 => Petugas Obat\n            ',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '08123456789', 'sigemoy@gmail.com', '2024-08-28 02:30:29', '$2y$10$O1pBexZUn/ofI1hrRtU8zeye.8cnRNWNXwF3jL4i/U7LcTv5WmMu6', 1, 'mnABtKEshbHzTgDdKtdyGnQEate1otRemoSBfEVICXqoXzX6lzoPiFVakDEI', '2024-08-28 02:30:29', '2024-08-28 02:30:29'),
(2, 'Drg Fajar Dini S', '088232324437', 'drgfajardini@gmail.com', NULL, '$2y$10$69hfwRNWefKpi7RgkEB43OJgeKz.XVy4EOK/rXlS2IsOmPhmH2rai', 3, NULL, '2024-08-28 03:26:40', '2024-08-28 03:26:40'),
(3, 'kader', '089523090508', 'kader@gmail.com', NULL, '$2y$10$arfjBK8hZfY3WL5ma0o3aOsbTFyYOJ2vU4.bE/baoZoibe1A0mcS2', 2, NULL, '2024-08-28 03:29:44', '2025-01-20 05:53:45'),
(4, 'Drg lalala', '806788678', 'lal@gmail.com', NULL, '$2y$10$0ZE7grkuujT83xIPBiOqSekRcpxbtJr16TwBK8trZP6wfOGSCyjfG', 3, NULL, '2024-09-04 07:34:42', '2024-09-04 07:34:42'),
(5, 'Fitri Nur Janah', '0', 'dwi.eni@poltekkesjogja.ac.id', NULL, '$2y$10$sZNgH/9VUoNeRS4g/Z8eT..Mm.xbsHDNi0jKbiPKEY0j9.2SIB4Ga', 2, NULL, '2024-09-08 11:18:55', '2024-09-08 11:18:55'),
(7, 'terapis gigi', '088238591064', 'terapis@gmail.com', NULL, '$2y$10$9Y5ZJDXrZbJkrc7gxdCe2uLcKYQWbd21xavIqJLOEeUAvB6tzQIJa', 3, NULL, '2025-01-20 05:55:57', '2025-01-20 05:55:57'),
(8, 'MahasiswaD3', '0812345678', 'd3kg2025@gmail.com', NULL, '$2y$10$LA7Bq/xw0lvQRrKXjuKM5OHt82h/i8qKjY/xJ/rC5srkvia0srxbC', 3, NULL, '2025-07-17 08:07:31', '2025-07-26 04:59:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `edukasi`
--
ALTER TABLE `edukasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `icds`
--
ALTER TABLE `icds`
  ADD PRIMARY KEY (`code`);

--
-- Indeks untuk tabel `jawaban_pasien`
--
ALTER TABLE `jawaban_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawaban_pasien_pasien_id_foreign` (`pasien_id`),
  ADD KEY `jawaban_pasien_pertanyaan_id_foreign` (`pertanyaan_id`),
  ADD KEY `jawaban_pasien_opsi_jawaban_id_foreign` (`opsi_jawaban_id`);

--
-- Indeks untuk tabel `kategori_pertanyaan`
--
ALTER TABLE `kategori_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisi_gigi`
--
ALTER TABLE `kondisi_gigi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `namakondisigigi`
--
ALTER TABLE `namakondisigigi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opsi_jawaban`
--
ALTER TABLE `opsi_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opsi_jawaban_pertanyaan_id_foreign` (`pertanyaan_id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengeluaran_obat`
--
ALTER TABLE `pengeluaran_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `rekam`
--
ALTER TABLE `rekam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekammediskader`
--
ALTER TABLE `rekammediskader`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekammediskader_pasien_id_foreign` (`pasien_id`),
  ADD KEY `rekammediskader_user_id_foreign` (`user_id`),
  ADD KEY `rekammediskader_namakondisigigi_id_foreign` (`namakondisigigi_id`);

--
-- Indeks untuk tabel `rekam_diagnosa`
--
ALTER TABLE `rekam_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekam_gigi`
--
ALTER TABLE `rekam_gigi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_gigi_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toga`
--
ALTER TABLE `toga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `edukasi`
--
ALTER TABLE `edukasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban_pasien`
--
ALTER TABLE `jawaban_pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2242;

--
-- AUTO_INCREMENT untuk tabel `kategori_pertanyaan`
--
ALTER TABLE `kategori_pertanyaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kondisi_gigi`
--
ALTER TABLE `kondisi_gigi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `namakondisigigi`
--
ALTER TABLE `namakondisigigi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `opsi_jawaban`
--
ALTER TABLE `opsi_jawaban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_obat`
--
ALTER TABLE `pengeluaran_obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `rekam`
--
ALTER TABLE `rekam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT untuk tabel `rekammediskader`
--
ALTER TABLE `rekammediskader`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `rekam_diagnosa`
--
ALTER TABLE `rekam_diagnosa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rekam_gigi`
--
ALTER TABLE `rekam_gigi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `toga`
--
ALTER TABLE `toga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban_pasien`
--
ALTER TABLE `jawaban_pasien`
  ADD CONSTRAINT `jawaban_pasien_opsi_jawaban_id_foreign` FOREIGN KEY (`opsi_jawaban_id`) REFERENCES `opsi_jawaban` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `jawaban_pasien_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_pasien_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `opsi_jawaban`
--
ALTER TABLE `opsi_jawaban`
  ADD CONSTRAINT `opsi_jawaban_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_pertanyaan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekammediskader`
--
ALTER TABLE `rekammediskader`
  ADD CONSTRAINT `rekammediskader_namakondisigigi_id_foreign` FOREIGN KEY (`namakondisigigi_id`) REFERENCES `namakondisigigi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekammediskader_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekammediskader_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekam_gigi`
--
ALTER TABLE `rekam_gigi`
  ADD CONSTRAINT `rekam_gigi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
