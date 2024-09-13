-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Sep 2024 pada 22.24
-- Versi server: 10.6.17-MariaDB-cll-lve
-- Versi PHP: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumn7534_sigemoy`
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
(2, 4, '002', 'Drg lalala', '806788678', 'adsafdsaf', '2024-09-04 07:34:42', '2024-09-04 07:34:42');

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
(4, 'Integrasi Kecerdasan Buatan dalam Analisis Rekam Medis Gigi: Potensi dan Tantangan', 'Integrasi kecerdasan buatan (AI) dalam analisis rekam medis gigi membuka peluang baru dalam diagnosis, perencanaan perawatan, dan penelitian. AI dapat menganalisis volume besar data pasien untuk mengidentifikasi pola, memprediksi risiko penyakit, dan bahkan merekomendasikan rencana perawatan. Misalnya, algoritma deep learning dapat digunakan untuk menganalisis radiografi gigi, membantu dalam deteksi dini karies atau penyakit periodontal. Sistem AI juga dapat membantu dalam manajemen praktik dengan mengoptimalkan penjadwalan dan mengidentifikasi tren dalam populasi pasien. Namun, integrasi AI juga menghadirkan tantangan signifikan. Keakuratan dan reliabilitas algoritma AI harus divalidasi secara ketat sebelum implementasi klinis. Isu etika, seperti tanggung jawab atas keputusan yang dibantu AI dan potensi bias dalam algoritma, harus diatasi. Selain itu, privasi data pasien dan kepatuhan terhadap regulasi kesehatan tetap menjadi perhatian utama. Diperlukan kolaborasi antara profesional gigi, ilmuwan data, dan pembuat kebijakan untuk mengembangkan kerangka kerja yang memungkinkan pemanfaatan AI secara aman dan etis dalam praktik gigi.', 'foto', 'fotos/he3KCiBEQuM1jkpskGRnFFCHL9pZryIqb7ZpXvJY.jpg', NULL, '2024-08-28 05:24:40', '2024-08-28 05:24:40'),
(5, 'Medis Gigi dalam Kedokteran Gigi Forensik dan Identifikasi Korban Bencana', 'Rekam medis gigi memainkan peran vital dalam kedokteran gigi forensik dan identifikasi korban bencana. Gigi dan struktur mulut adalah sumber informasi identifikasi yang sangat berharga karena ketahanannya terhadap dekomposisi dan trauma. Rekam medis gigi yang akurat dan komprehensif dapat menjadi kunci dalam proses identifikasi, terutama dalam kasus di mana metode identifikasi lain tidak tersedia atau tidak dapat diandalkan. Dalam konteks forensik, rekam medis gigi mencakup tidak hanya catatan perawatan, tetapi juga radiografi, cetakan gigi, dan foto intraoral. Standardisasi format rekam medis gigi dan penggunaan notasi gigi universal seperti sistem FDI sangat penting untuk memfasilitasi proses identifikasi lintas batas. Dalam situasi bencana massal, database rekam medis gigi yang terdigitalisasi dapat mempercepat proses identifikasi korban. Namun, tantangan tetap ada, termasuk variasi dalam kualitas dan kelengkapan rekam medis antar praktik gigi, serta isu privasi terkait akses terhadap informasi medis pribadi untuk tujuan forensik. Pengembangan protokol yang jelas untuk penggunaan rekam medis gigi dalam konteks forensik, serta pelatihan khusus untuk profesional gigi dalam dokumentasi forensik, adalah langkah penting untuk meningkatkan efektivitas rekam medis gigi dalam identifikasi forensik.', 'foto', 'fotos/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', NULL, '2024-08-28 05:25:19', '2024-08-28 05:25:19'),
(6, 'Evolusi Rekam Medis Gigi: Dari Kertas ke Blockchain', 'Evolusi rekam medis gigi mencerminkan perkembangan teknologi dan perubahan kebutuhan dalam praktik kedokteran gigi. Dimulai dari sistem berbasis kertas yang sederhana, rekam medis gigi telah berkembang menjadi sistem digital yang canggih, dan kini bergerak menuju teknologi blockchain. Era kertas ditandai dengan catatan manual yang rawan kesalahan dan sulit diakses. Transisi ke sistem elektronik membawa peningkatan signifikan dalam aksesibilitas, keamanan, dan efisiensi. Sistem elektronik memungkinkan penyimpanan data yang lebih komprehensif, termasuk gambar digital dan rekaman video, serta memfasilitasi analisis data untuk meningkatkan perawatan pasien.\r\nSaat ini, teknologi blockchain menawarkan potensi revolusioner dalam manajemen rekam medis gigi. Blockchain menjanjikan tingkat keamanan dan integritas data yang belum pernah ada sebelumnya. Dengan sifatnya yang terdesentralisasi dan tidak dapat diubah, blockchain dapat mengatasi masalah kepercayaan dan keamanan yang melekat pada sistem terpusat. Ini memungkinkan pasien untuk memiliki kontrol lebih besar atas data kesehatan mereka, memfasilitasi berbagi data yang aman antar penyedia layanan kesehatan, dan meningkatkan transparansi dalam penelitian medis.\r\nNamun, adopsi blockchain dalam rekam medis gigi juga menghadapi tantangan signifikan. Ini termasuk masalah skalabilitas, konsumsi energi yang tinggi, kompleksitas teknis, dan kebutuhan untuk mengintegrasikan dengan sistem yang ada.', 'foto', 'fotos/8Mu9C2XYEjSBvgytwNn6IsfItM95a93sTQjKDVYr.jpg', NULL, '2024-08-28 05:26:23', '2024-08-28 05:26:23'),
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
(21, 'Perkembangan Gigi Susu dalam Rekam Medis Anak', 'Rekam medis gigi anak mencatat detail penting tentang perkembangan gigi susu, termasuk waktu erupsi, urutan pertumbuhan, dan kondisi gigi susu. Informasi ini membantu dokter gigi memantau perkembangan normal dan mengidentifikasi potensi masalah sejak dini, memastikan kesehatan gigi anak yang optimal.', 'foto', 'fotos/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', NULL, '2024-08-28 06:00:00', '2024-08-28 06:00:00'),
(22, 'Pencatatan Kebiasaan Oral pada Rekam Medis Gigi Anak', 'Kebiasaan oral seperti menghisap jempol, penggunaan dot, atau bruxism (menggerinding gigi) penting untuk dicatat dalam rekam medis gigi anak. Informasi ini membantu dokter gigi dalam menilai risiko masalah oklusi dan merencanakan intervensi dini jika diperlukan.', 'foto', 'fotos/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', NULL, '2024-08-28 06:15:00', '2024-08-28 06:15:00'),
(23, 'Monitoring Pertumbuhan Rahang dalam Rekam Medis Anak', 'Rekam medis gigi anak juga mencakup pemantauan pertumbuhan rahang. Dokter gigi mencatat perkembangan rahang atas dan bawah, yang penting untuk mendeteksi potensi masalah ortodontik sejak dini dan merencanakan perawatan yang tepat waktu.', 'foto', 'fotos/4IdBwtO371DBKqqhLpAmS7jMdCZbgG3HIU2Ci4Sf.jpg', NULL, '2024-08-28 06:30:00', '2024-08-28 06:30:00'),
(24, 'Pencatatan Riwayat Trauma Gigi pada Anak', 'Trauma gigi pada anak, seperti gigi yang terbentur atau patah, harus dicatat dengan detail dalam rekam medis. Informasi ini penting untuk perawatan jangka panjang dan dapat mempengaruhi keputusan perawatan di masa depan.', 'foto', 'fotos/he3KCiBEQuM1jkpskGRnFFCHL9pZryIqb7ZpXvJY.jpg', NULL, '2024-08-28 06:45:00', '2024-08-28 06:45:00'),
(25, 'Penggunaan Kode Diagnosis dalam Rekam Medis Gigi Anak', 'Rekam medis gigi anak modern menggunakan sistem koding diagnosis standar. Ini membantu dalam komunikasi antar profesional kesehatan, memudahkan klaim asuransi, dan memungkinkan analisis data untuk penelitian dan peningkatan kualitas perawatan.', 'foto', 'fotos/GqR6RYL9MpCDTjP9rZv0E7I6vfYOKIVPIsmlCpy0.jpg', NULL, '2024-08-28 07:00:00', '2024-08-28 07:00:00'),
(26, 'Pencatatan Pola Makan dan Kebiasaan Higienis dalam Rekam Medis Anak', 'Informasi tentang pola makan anak dan kebiasaan higiene oral dicatat dalam rekam medis gigi. Data ini membantu dokter gigi dalam memberikan saran pencegahan yang disesuaikan dan mengidentifikasi faktor risiko karies gigi.', 'foto', 'fotos/8Mu9C2XYEjSBvgytwNn6IsfItM95a93sTQjKDVYr.jpg', NULL, '2024-08-28 07:15:00', '2024-08-28 07:15:00'),
(27, 'Dokumentasi Foto dalam Rekam Medis Gigi Anak', 'Foto intraoral dan ekstraoral merupakan bagian penting dari rekam medis gigi anak. Dokumentasi visual ini membantu dalam melacak perubahan visual dari waktu ke waktu, merencanakan perawatan estetik, dan berkomunikasi dengan orang tua tentang kondisi gigi anak mereka.', 'video_upload', 'videos/eKI4yGoBcAUAgPreH5hhlVoszWfLEziVct5sWKLG.mp4', NULL, '2024-08-28 07:30:00', '2024-08-28 07:30:00'),
(28, 'Pencatatan Riwayat Fluoride dalam Rekam Medis Gigi Anak', 'Rekam medis gigi anak harus mencakup riwayat lengkap paparan fluoride, termasuk penggunaan pasta gigi berfluoride, suplemen fluoride, dan aplikasi fluoride topikal di klinik. Informasi ini penting untuk menilai risiko karies dan merencanakan perawatan preventif.', 'video_upload', 'videos/njlsLUl55sTpOKr9BhkugyVkBCTyo8HxJ1sKnBhw.mp4', NULL, '2024-08-28 07:45:00', '2024-08-28 07:45:00'),
(29, 'Integrasi Rekam Medis Gigi Anak dengan Sistem Elektronik', 'Integrasi rekam medis gigi anak ke dalam sistem rekam medis elektronik yang lebih luas memungkinkan perawatan yang lebih terkoordinasi. Ini memfasilitasi berbagi informasi antara dokter gigi anak, dokter anak, dan spesialis lain, meningkatkan kualitas perawatan secara keseluruhan.', 'foto', 'fotos/JuS87FLdL1wy43UmypfZ3MhyVT9Er7eAVJxU5PQW.jpg', NULL, '2024-08-28 08:00:00', '2024-08-28 08:00:00'),
(30, 'Penggunaan AI dalam Analisis Rekam Medis Gigi Anak', 'Teknologi kecerdasan buatan (AI) mulai digunakan dalam analisis rekam medis gigi anak. AI dapat membantu dalam deteksi dini anomali gigi, prediksi perkembangan oklusi, dan personalisasi rencana perawatan berdasarkan pola yang teridentifikasi dari data rekam medis.', 'foto', 'fotos/ACcOSteECf9nQ5A8mZ1ciLu8rwRC6RN4fpQ1F6Kf.jpg', NULL, '2024-08-28 08:15:00', '2024-08-28 08:15:00');

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
(60, 'uji coba pasien terbaru', 'sdfsdfsdf', '2018-01-31', 'Perempuan', 'sdfsdfsd sdfsd sdf sdf sdf sdf', 'fsdfsdf', 'sdfsdfsd', 'sdfsdf', '45435', 'Kristen', 'Menikah', 'SMP', 'TNI/Polri', 'WNI', '3543543543', 'wefwefewewf', '2024-09-09 15:24:50', '2024-09-09 15:24:50', NULL);

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
(73, 'REG#2024090960', '2024-09-09', 60, 1, 'sakit', NULL, NULL, NULL, 0, 0, 0, 0, 1, '2024-09-09 15:25:11', '2024-09-09 15:25:11');

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
(35, 1, 73, 60, '21', '∑', 'K02.3', NULL, NULL, NULL);

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
(53, 'R1', 'Rujukan', 0, '2024-09-09 10:56:30', '2024-09-09 10:56:30');

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
(1, 'Admin', '08123456789', 'sigemoy@gmail.com', '2024-08-28 02:30:29', '$2y$10$O1pBexZUn/ofI1hrRtU8zeye.8cnRNWNXwF3jL4i/U7LcTv5WmMu6', 1, 'HiGlwK2E8WpZItXVcZ8yJgHapDEGHD4hUpGb1QkdKTndugSEqnc8XekYe6Ba', '2024-08-28 02:30:29', '2024-08-28 02:30:29'),
(2, 'Drg Fajar Dini S', '088232324437', 'drgfajardini@gmail.com', NULL, '$2y$10$69hfwRNWefKpi7RgkEB43OJgeKz.XVy4EOK/rXlS2IsOmPhmH2rai', 3, NULL, '2024-08-28 03:26:40', '2024-08-28 03:26:40'),
(3, 'Drg Mahmudah Eka Cahyawati', '089523090508', 'drgmahmudah@gmail.com', NULL, '$2y$10$c2cy3TguYaYsY5UhjEtyn.7dEg9kW4Qsz85cEucJV/ssgCJuSGSzG', 2, NULL, '2024-08-28 03:29:44', '2024-08-28 03:30:01'),
(4, 'Drg lalala', '806788678', 'lal@gmail.com', NULL, '$2y$10$0ZE7grkuujT83xIPBiOqSekRcpxbtJr16TwBK8trZP6wfOGSCyjfG', 3, NULL, '2024-09-04 07:34:42', '2024-09-04 07:34:42'),
(5, 'Fitri Nur Janah', '0', 'dwi.eni@poltekkesjogja.ac.id', NULL, '$2y$10$sZNgH/9VUoNeRS4g/Z8eT..Mm.xbsHDNi0jKbiPKEY0j9.2SIB4Ga', 2, NULL, '2024-09-08 11:18:55', '2024-09-08 11:18:55');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=582;

--
-- AUTO_INCREMENT untuk tabel `kategori_pertanyaan`
--
ALTER TABLE `kategori_pertanyaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `rekam`
--
ALTER TABLE `rekam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `rekammediskader`
--
ALTER TABLE `rekammediskader`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `rekam_diagnosa`
--
ALTER TABLE `rekam_diagnosa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rekam_gigi`
--
ALTER TABLE `rekam_gigi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `toga`
--
ALTER TABLE `toga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
