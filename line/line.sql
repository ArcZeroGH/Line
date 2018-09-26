-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 08. 12 2017 kl. 08:02:10
-- Serverversion: 5.6.24
-- PHP-version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `line`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `p_id` int(32) NOT NULL,
  `p_content` varchar(1024) COLLATE utf16_danish_ci NOT NULL,
  `p_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `p_creator` int(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_danish_ci;

--
-- Data dump for tabellen `posts`
--

INSERT INTO `posts` (`p_id`, `p_content`, `p_created`, `p_creator`) VALUES
(1, 'New post by by Aries Cayetano. creator 1', '2017-10-24 10:49:51', 1),
(2, 'Another post by Fernando. creator 2', '2017-10-24 10:49:51', 2),
(3, 'Another post aries', '2017-10-24 14:58:56', 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(12) NOT NULL,
  `user_name` varchar(32) COLLATE utf16_danish_ci NOT NULL,
  `user_email` varchar(64) COLLATE utf16_danish_ci NOT NULL,
  `user_password` varchar(32) COLLATE utf16_danish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_danish_ci;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Aries Cayetano', 'cayetanoaries@hotmail.com', '123'),
(2, 'Fernando Rodriguez', 'fernando@hotmail.com', '123'),
(3, 'Nina Reyes', 'ninareyes@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `ssid` varchar(256) COLLATE utf16_danish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf16 COLLATE=utf16_danish_ci;

--
-- Data dump for tabellen `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `ssid`, `created`) VALUES
(68, 1, '1508494805202#fpyw014zd4qxvvy2zq9f2zrdgnkqyjpigplakli53c90jbl2', '2017-10-20 10:20:05'),
(69, 1, '1508497115382#h0rqtt3un3hf2u67qfx4mv00bjz3y7qfyvxixts1agovxke2', '2017-10-20 10:58:35'),
(70, 1, '1508497663990#5qzdofatp7c0qctpqp3vqnmrk0vo8oaninee0vc7qtvhhuq8', '2017-10-20 11:07:43'),
(71, 1, '1508499177020#2gb092rlk4dvpodlwvsjsojjosx9h18i2t5t0gap0p68t98x', '2017-10-20 11:32:57'),
(72, 2, '1508499902389#569nppe9gi9zzi4nntv0m1mv6favuf1vndimo0r0selguemn', '2017-10-20 11:45:02'),
(73, 1, '1508739705299#gm7u5dqd81e9gqdb31j4k3ir8tguiw2pos0tzcbkrvluz5ry', '2017-10-23 06:21:45'),
(74, 2, '1508740745564#2u72f7yfqitioh3r3w5b157it7lqa1ff51sf7jtopzf2nk58', '2017-10-23 06:39:05'),
(75, 1, '1508741358039#gkaav2jbk14gp22hkcav8r3er16zubwk63th8cvflm92vuul', '2017-10-23 06:49:18'),
(76, 1, '1508742487744#i7dg8vajlp6gmceug1mxpxqire8167505bffvois8t24ji7b', '2017-10-23 07:08:07'),
(77, 2, '1508747174952#5he8dcc0ay6qspklxx3jpzzicg9vel8tg02ksmy43kyk1rku', '2017-10-23 08:26:14'),
(78, 1, '1508747190458#uc2atnbenvr2dt6zvs9pfpnhniobm769mssmd1b6fm7mecau', '2017-10-23 08:26:30'),
(79, 1, '1508757118490#a5k3x9k41evudzp13uzpux447tdplop3glmkhumzh3xm63bh', '2017-10-23 11:11:58'),
(80, 1, '1508760314027#ie8imac7t6lj9kkfcutc2sa9lgqdhtod7yvsqww3irsxfi0l', '2017-10-23 12:05:14'),
(81, 1, '1508825548774#2eatbxqg4n39z6e46cm9givphge2an63bdkjkvtq9uh3g4dr', '2017-10-24 06:12:28'),
(82, 1, '1508839544630#0akvlzc9vasefrmywsrsjdasssa2pk5sdyic28yh1puxth1o', '2017-10-24 10:05:44'),
(83, 1, '1508840474639#k8qffgtmbd1ak5vsjfd11xhub6nqlba5rjr2dlijp8dir7aa', '2017-10-24 10:21:14'),
(84, 1, '1508845199595#t2xkpjhgbqa8w4d7l82odkb17fq1opv04qdxg42ce70uizaq', '2017-10-24 11:39:59'),
(85, 1, '1508845211656#p1ofg59178m0az6co1d8r4zur2un061lf2445w3q98vjw7xi', '2017-10-24 11:40:11'),
(86, 1, '1508845640970#tvqoyf2aqpxjq2nnnug36q9rurvemgb2viovbzq3aasm2n3n', '2017-10-24 11:47:20'),
(87, 1, '1508845667901#gzqhbo80lgvnjpoxa40oegee0w6ovjjar0vlp7k0whqj6ef1', '2017-10-24 11:47:47'),
(88, 1, '1508846951349#yqrmflfrj9pdg0e2io0cgxbz423utyfr5ndedlywtlqqnhht', '2017-10-24 12:09:11'),
(89, 2, '1508846966033#e02afp9tpjf7ppez8d12b605j2xag10in7b25xa7yk3f50f2', '2017-10-24 12:09:26'),
(90, 1, '1508847308389#b203j26xety10h0uz0vtu58b6gez6uaipn8rewz0njjekpwz', '2017-10-24 12:15:08'),
(91, 1, '1508847476776#med6h74yy0mstey69wnom3w8avj19fuq4xmpfdx8yan9c8d7', '2017-10-24 12:17:56'),
(92, 2, '1508847699679#g44m4r9txep2eufg362n82bhydua5498mn6uk07s3wjpv7i6', '2017-10-24 12:21:39'),
(93, 3, '1508848518534#olcdvy2za57ehub7ath7ljwrcjyocfesoauky90hbostv6up', '2017-10-24 12:35:18'),
(94, 1, '1508848986507#oqrtnbq5xxgqabgsm7u0bxqa0f6k10wu0j8qcfbpzf4moidp', '2017-10-24 12:43:06'),
(95, 1, '1508850046915#be08jxcewu8p3qc9r02xxcoaltjui7uzfzak4qacruvtxckz', '2017-10-24 13:00:46'),
(96, 1, '1508850982488#206d1rols8ibrdq4c85x51tes61xebk1xbvjmtyeibt69ecn', '2017-10-24 13:16:22'),
(97, 1, '1508851053865#r0pifxvr4rsjlmx0zrojljwn0nlq9wuh8vak6mdivor0cbqf', '2017-10-24 13:17:33'),
(98, 1, '1508851201828#112b7rb3y1rnaxul6lsuj74ajyt4j8ie2j49h4ec93jpdekh', '2017-10-24 13:20:01'),
(99, 3, '1508851262028#ir805xuwuqgkaqhm38cldvgkctt7klu4vxjl30tcx3ljgy7n', '2017-10-24 13:21:02'),
(100, 3, '1508851300432#dqk5bq748mi2cehzjnkktyyklkibdoy2onfn5nt6nhx957tb', '2017-10-24 13:21:40'),
(101, 3, '1508851478059#ishep0v40xpws2bbok6p75fm2703vavxxsnglyrjouxree20', '2017-10-24 13:24:38'),
(102, 3, '1508851567834#56mdmdyvfm1brwrw7uyk226bzm3vxq53ivz8b3b4f931vdb1', '2017-10-24 13:26:07'),
(103, 1, '1508851724442#bkfr1qzzpbjqm9nijmfdohx37uubpytsazoiwq418bb7j7kt', '2017-10-24 13:28:44'),
(104, 3, '1508851814317#kctn49x6tjbmriovs3weos432kmsluwc9m5u4zbkjj9ipmed', '2017-10-24 13:30:14'),
(105, 3, '1508851839727#jsdfm36b0uu7f2wrvdeg7nc6h1c5t3hwrli75026rgn9ouct', '2017-10-24 13:30:39'),
(106, 3, '1508851854876#dowmn9szscr3rwq1dh2duqz5mgn1of4hb2o7qr7zwbwq0le4', '2017-10-24 13:30:54'),
(107, 1, '1508851957722#kbzeshxrlfizdfqbhnuv98yuprqwe1wtu7wi0b0epnzg7cdm', '2017-10-24 13:32:37'),
(108, 1, '1508852014574#1b5j9pjbh4k3ns4g71s6ai1xqzp20egtei9hmfoby5ec19s7', '2017-10-24 13:33:34'),
(109, 1, '1508913059623#lyptxjq0yrwpowf08h2cwdl7op0exul2i8ty31axls8xltjb', '2017-10-25 06:30:59');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks for tabel `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tilføj AUTO_INCREMENT i tabel `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
DELIMITER $$
--
-- Hændelser
--
CREATE DEFINER=`root`@`localhost` EVENT `sss` ON SCHEDULE EVERY 3600 SECOND STARTS '2017-10-19 13:27:36' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `line`.user_sessions where now() - user_sessions.created > 3600$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
