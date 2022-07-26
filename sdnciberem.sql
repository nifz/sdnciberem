-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 10:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdnciberem`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `title` text NOT NULL,
  `thumbnail` text NOT NULL,
  `content` text NOT NULL,
  `tags` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `id_users`, `title`, `thumbnail`, `content`, `tags`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'My First Blog', 'images/blog/kocak.png', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod iusto non unde voluptates exercitationem ab repellat. Aperiam maiores laudantium quasi alias facilis voluptatum possimus nihil corporis, explicabo deserunt asperiores molestiae ad excepturi quisquam! Dolorum doloremque nemo voluptates delectus quibusdam! Vitae minima ad cumque nam itaque? Dolor beatae aliquid unde architecto? Ipsum optio voluptatem fugit necessitatibus soluta consectetur repellat aperiam quia autem vel odit quam eveniet vero debitis laudantium rem id nemo alias perferendis, officia possimus deserunt. Soluta ullam quas, deleniti debitis eaque eos doloribus illum illo dolores molestias dolore molestiae dignissimos, officiis sunt porro tempore in suscipit asperiores ad beatae? Ipsam doloribus veritatis, placeat maiores doloremque nam ab error consequuntur dolorem debitis suscipit cum minima? Reprehenderit, hic provident sed quidem quos nulla minima harum similique deleniti repellat, ea dicta minus quisquam ut maxime molestias! Debitis aspernatur nostrum error velit dolore illo nam consectetur distinctio ut quae necessitatibus animi eius, exercitationem dolorem id minus voluptatum expedita beatae in itaque magnam. Sequi quaerat quae quasi accusamus similique soluta officia esse, dignissimos sapiente? Quisquam sint et ea quae obcaecati dolore earum. Iusto, nihil ex! Assumenda maiores deleniti, porro, obcaecati ab reiciendis accusamus minus eligendi facilis eaque beatae quidem sed aliquam alias quasi unde et? Consequuntur accusantium, quod maxime nostrum officiis, vero quibusdam harum quasi soluta in, saepe alias. Natus id sunt harum, exercitationem quod aliquid minus illum aperiam consequuntur, magnam dolorem necessitatibus expedita quasi voluptas accusamus sequi, architecto dolorum in sed? Temporibus iusto quam unde laudantium at quasi, fugiat, quia neque earum quibusdam modi dolores cupiditate amet ab quod distinctio similique in consectetur ut deserunt sint? Delectus, itaque facere aperiam incidunt mollitia saepe tempore officiis eligendi laborum impedit neque rerum. Nihil recusandae quos officia odit aut modi voluptatum quaerat dolorum qui quod cumque nemo id mollitia deserunt ad, nulla tempore. Nobis obcaecati itaque ex. Dolores tenetur ratione minima itaque, eligendi repudiandae expedita quasi voluptatem deleniti consequuntur nobis natus quae perferendis? Molestias inventore animi officiis, autem minima soluta. Minima nobis ad sapiente dicta ipsam eius error consequatur, saepe maiores doloribus deleniti qui totam doloremque corrupti veritatis, ipsum velit! Voluptatum eaque quidem debitis vitae delectus omnis reprehenderit, doloribus deserunt aliquam. Aliquam sit qui labore vero tempora libero doloremque! Fugiat nisi quisquam, quae vero id accusantium maiores corporis iure esse odio recusandae! Totam fugit doloribus ab ipsam soluta magnam quos expedita itaque eveniet. Cum totam eveniet pariatur molestias voluptatibus? Quo totam perferendis nesciunt nostrum quisquam expedita nemo illo? Quaerat, consequatur! Nobis accusamus voluptatum corrupti molestias, vel nisi non sequi? </p><p>Quod vero quibusdam excepturi iste non praesentium nisi ex eos! Magni veritatis eaque recusandae sapiente quaerat laudantium similique voluptates eum quod optio labore est quae inventore placeat assumenda, rem repudiandae necessitatibus officiis a dolores! Excepturi, aliquid enim aut necessitatibus sapiente totam minima corporis error corrupti nobis ad hic iste dicta! Atque cum eligendi neque earum, fugit tempora cupiditate voluptatibus voluptas libero aliquam totam perspiciatis! Nemo eaque quidem repudiandae! Tempore nam rem suscipit iusto ducimus ratione illo. Aspernatur deleniti veritatis reprehenderit voluptatibus unde illum qui corporis quibusdam id aliquam labore quae, necessitatibus cum sint, vel odio dignissimos assumenda dicta hic dolorum consequatur incidunt? Sequi blanditiis labore consequatur? Sequi labore, voluptates aperiam eum repellendus molestiae aut fugit ullam doloremque, explicabo quibusdam ipsum aliquid odio at illum eius laborum sint earum obcaecati omnis excepturi. Illo explicabo, deleniti dolorem ullam expedita dolor reprehenderit amet? Sit repellendus suscipit blanditiis temporibus, eius ipsum minima voluptatum earum, iure corporis nihil autem. Velit nulla dolorum sint quos libero inventore corporis laudantium alias maxime eos porro, sit illo asperiores deleniti impedit quidem, eum repellat voluptatem quia. Aliquid accusamus, nulla neque quasi quis eum non facere obcaecati soluta dicta officia quas! Culpa molestiae ipsum praesentium amet obcaecati nam aperiam magni sunt! Voluptates, a, perferendis, quisquam architecto veniam quia corporis enim aliquid saepe temporibus quidem quam facilis deserunt doloribus molestiae ducimus debitis labore earum doloremque provident libero at cum quae laborum. Sint facilis ullam maiores repellendus harum fugiat suscipit recusandae alias repellat, vel ducimus error totam, facere sapiente earum corporis! Aut mollitia maxime, eius doloremque incidunt ad! Alias dolorum accusamus nam possimus deleniti, aspernatur optio non tenetur quod laudantium quae necessitatibus ex vel magnam veritatis, earum error, eius commodi dolore eos officia esse. Iusto alias iure dolores, distinctio officiis labore delectus magni cumque, doloremque magnam expedita iste maxime veritatis hic, tempore neque explicabo quidem pariatur beatae vel aspernatur. Cum, mollitia distinctio. Dolores quo officia assumenda aspernatur a rerum ex facilis ipsam minus. Ea nulla eveniet velit eaque itaque assumenda, hic dignissimos eos quidem aspernatur voluptate possimus, pariatur consectetur fugit deserunt animi debitis perspiciatis aut. Eum magni odio quidem quasi repudiandae est, animi aliquam laboriosam corporis consectetur harum voluptatum, voluptates provident excepturi accusantium corrupti reprehenderit dolor officiis? Animi ullam id odit modi. Unde quisquam, in culpa sapiente mollitia adipisci beatae suscipit, excepturi similique perspiciatis explicabo quod consequatur deleniti iusto facilis voluptatem recusandae, saepe inventore quibusdam! Nemo autem vero quidem illo, a optio alias possimus temporibus consequatur ratione animi delectus neque, sapiente minima provident expedita hic saepe dignissimos cupiditate placeat. Recusandae explicabo rem mollitia officia beatae. Nihil quidem tenetur natus, animi explicabo est repellendus cum totam quas iusto corporis fuga culpa modi laboriosam! Quos quod, laudantium sapiente asperiores qui officiis. Dolorum quos ad officia veritatis! Voluptatum ea provident quae quam consectetur delectus officiis exercitationem maxime, esse assumenda reiciendis possimus veritatis magni ad dignissimos quas similique alias quaerat! Iure minima beatae at dolor praesentium distinctio! Nihil quisquam voluptatem laboriosam, ut ducimus adipisci dolorem alias autem temporibus vero! Hic cum asperiores reprehenderit mollitia, similique enim quas provident voluptatum unde at commodi ut voluptas voluptatibus! Tempore hic reiciendis laudantium harum quibusdam doloribus fugit vel nesciunt facilis blanditiis sit, possimus quos, aliquam nulla in, alias eum nihil qui assumenda sed ea ipsa? Maiores dolor blanditiis hic unde officiis repellat voluptates, tenetur magnam dignissimos temporibus sint iste reiciendis, consectetur ullam soluta similique quasi harum ea asperiores architecto incidunt recusandae suscipit. Quia accusantium molestias sed corporis ipsam quis ipsum, aliquam, a veritatis, voluptatibus eum animi. Vero perspiciatis minus vitae eligendi velit dolorum explicabo iste necessitatibus nihil!<br></p>', 'Test,News', 'my-first-blog-1780337773', '2022-07-12 15:30:48', '2022-07-12 15:30:48'),
(2, 1, 'My Second Blog', 'images/blog/meme.png', '<p><b>Lorem ipsum dolor</b>, sit amet consectetur adipisicing elit. Quod iusto non unde voluptates exercitationem ab repellat. Aperiam maiores laudantium quasi alias facilis voluptatum possimus nihil corporis, explicabo deserunt asperiores molestiae ad excepturi quisquam! Dolorum doloremque nemo voluptates delectus quibusdam!</p>', 'Test', 'my-second-blog-2750137631', '2022-07-12 15:32:08', '2022-07-12 15:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `dinamis`
--

CREATE TABLE `dinamis` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dinamis`
--

INSERT INTO `dinamis` (`id`, `name`, `data`) VALUES
(1, 'Nama Sekolah', 'SD Negeri Ciberem'),
(2, 'Logo', 'images/dinamis/tut-wuri-logo.png'),
(3, 'Deskripsi', 'SD Negeri Ciberem merupakan sekolah dasar yang berada di kecamatan Sumbang, Banyumas.'),
(4, 'Alamat', 'Sumbang, Banyumas.'),
(5, 'Iframe (Google Maps)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.887490152004!2d109.27448201428037!3d-7.36650647453498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f4c33e3b0bb%3A0x7902a3f0b78369f1!2sSDN%20Ciberem!5e0!3m2!1sid!2sid!4v1651050760040!5m2!1sid!2sid\" width=\"100%\" height=\"200\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(6, 'Email', 'sdnciberem@gmail.com'),
(7, 'Telepon', '085747202820'),
(8, 'Tentang Sekolah', 'SD Negeri Ciberem merupakan salah satu SD di Kabupaten Banyumas yang terletak di kaki Gunung Slamet, lebih tepatnya berada di Kecamatan Sumbang Desa Ciberem. Karena letaknya itu, SDN Ciberem terasa masih asri dan nyaman. Cocok untuk kegiatan belajar, sehingga anak-anak akan lebih fokus dalam belajar. SDN Ciberem berdiri pada tanggal 01 Mei 1953 di atas tanah milik desa Ciberem seluas 2.850m2. Pada awalnya terdapat dua sekolah, yaitu SDN 1 Ciberem dan SDN 2 Ciberem. Pada perkembangannya di tahun 2008 karena suatu alasan, mungkin supaya lebih efisien karena dua sekolah itu berdampingan sehingga dilaksanakan re-grouping.'),
(9, 'Tentang Sekolah (Gambar)', 'images/dinamis/IMG_5344_2.webp'),
(10, 'Visi', 'Terwujudnya peserta didik yang bertaqwa, berprestasi, berbudi pekerti, cakap, terampil, dan ramah terhadap lingkungan.'),
(11, 'Misi', 'Melaksanakan pembelajaran yang aktif, inovatif, kreatif, efektif, dan menyenangkan untuk mencapai hasil belajar peserta didik yang maksimal. \r\nMelaksanakan bimbingan kepada peserta didik secara berkelanjutan dalam bidang akademik dan non akademik, keagamaan, olah raga, dan seni untuk membentuk kepribadian peserta didik yang mantap dan dinamis berdasarkan nilai-nilai keimanan dan ketaqwaan. \r\nMelaksanakan kegiatan literasi dan kegiatan pembiasaan untuk membentuk karakter peserta didik yang baik. \r\nMendorong warga sekolah dan stikholder yang lain untuk menciptakan lingkungan sekolah dan suasana belajar yang aman, nyaman, bersih, dan indah. \r\nMengembangkan kegiatan akademik dan non akademik yang berorientasi pada keunggulan lokal, nasional, dan gloal, sehingga peserta didik tanggap dan mampu menghadapi tantangan kehidupan dan perkembangan jaman.'),
(12, 'Prestasi (Gambar)', 'images/dinamis/IMG_5356.webp');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `carousel` tinyint(1) NOT NULL DEFAULT 0,
  `facility` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `id_users`, `name`, `description`, `image`, `carousel`, `facility`) VALUES
(1, 1, 'SD Negeri Ciberem', 'Sumbang, Banyumas', 'images/gallery/IMG_5344_2.webp', 1, 0),
(2, 1, 'Perpustakaan Cerdik', 'SD Negeri Ciberem. Sumbang, Banyumas', 'images/gallery/IMG_5364.webp', 1, 1),
(3, 1, 'Taman Bermain', 'SD Negeri Ciberem. Sumbang, Banyumas', 'images/gallery/IMG_5363.webp', 0, 1),
(4, 1, 'Ruang Kelas', 'SD Negeri Ciberem. Sumbang, Banyumas', 'images/gallery/IMG_5354.webp', 0, 1),
(5, 1, 'Mushola', 'SD Negeri Ciberem. Sumbang, Banyumas', 'images/gallery/IMG_5339.webp', 0, 1),
(6, 1, 'Ruang Kelas', 'SD Negeri Ciberem. Sumbang, Banyumas', 'images/gallery/IMG_5348.webp', 0, 1),
(7, 1, 'Lorong Kelas', 'SD Negeri Ciberem. Sumbang, Banyumas', 'images/gallery/IMG_5352.webp', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `tahun` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `id_users`, `tahun`, `keterangan`) VALUES
(1, 1, '2021', 'Juara 1 Lomba Tilawatil Qur\'an Tingkat Kecamatan<br />\r\nJuara 2 Putra dan Putri Sumbang Scout Festival<br />\r\nJuara 2 Lomba Menggambar FLS2N'),
(2, 1, '2022', 'Juara 1 Putri Pesta Siaga Ranting Sumbang<br />\r\nJuara 3 Putra Pesta Siaga Ranting Sunbang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL DEFAULT 'images/user/user.jpg',
  `role` enum('superadmin','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `role`) VALUES
(1, 'Mochammad Hanif', 'me@hanifz.com', '5bacd9f25613659b2fbd2f3a58822e5c', 'images/user/kocak.png', 'superadmin'),
(2, 'meh', 'meh@hanifz.com', '5bacd9f25613659b2fbd2f3a58822e5c', 'images/user/user.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `dinamis`
--
ALTER TABLE `dinamis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dinamis`
--
ALTER TABLE `dinamis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
