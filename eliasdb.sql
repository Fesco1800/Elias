-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 04:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eliasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aliases`
--

CREATE TABLE `aliases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aliases`
--

INSERT INTO `aliases` (`id`, `user_id`, `url`, `password`, `email`, `phone`, `username`, `firstname`, `middlename`, `lastname`, `birthdate`, `address`, `created_at`) VALUES
(3, 1, 'https://example.com', '-_$EL2DJ~fRZqHasdsf', 'p4jlc41hhi@outlook.com', '+639273429663', 'unamusinglybusadf', 'Xerxes', 'Eismann', 'Rodell', '1924-08-08', ' West Joshuah, Faroe Islands', '2023-05-24'),
(6, 1, 'http://localhost/Elias', '33gw_qRf@uPF;mdsfd', '8gbe8p6g7u@protonmail.com', '+639737828648', 'Apatornisinterje', 'Gay', 'Demarest', 'Dimitriou', '1931-05-20', ' Brooklynshire, Eritrea', '2023-05-24'),
(8, 1, 'https://celebritymensbarbershop.com/dashboard', 'i4l>&Q|j*>Y_R{;t', 'pinkbaby780@gmail.com', '09669326333', 'weeklongeyebath8', 'Jacqui', 'Valtas', 'Tien', '1981-03-17', ' Schusterfurt, Tonga', '2023-05-24'),
(9, 1, 'https://celebritymensbarbershop.com/dashboard', 'h,IN88yIiO::C_5Y', '1ciscocomelon@gmail.com', '+639509450697', 'stoplessfinless6', 'Carlotta', 'Montrose', 'Regal', '1974-07-22', ' Port Letitiaport, Denmark', '2023-05-24'),
(13, 1, 'https://10fastfingers.com/settings', 'b]h+R#8}:&.>d$x7', 'yurisher99@gmail.com', '09175847193', 'GroznyTertia8718', 'Abra', 'Luria', 'Daugaard', '1972-02-11', ' New Dangelo, Macedonia', '2023-05-24'),
(14, 1, 'http://localhost/Elias/client/', 'b]h+R#8}:&.>d$x7', 'yurisher99@gmail.com', '09175847193', 'GroznyTertia8718', 'Abra', 'Luria', 'Daugaard', '1972-02-11', ' New Dangelo, Macedonia', '2023-05-24'),
(15, 1, 'https://10fastfingers.com/login', '7xJ{>/91mH@I}qkT', 'meowming999@gmail.com', '+639191959748', 'subjoinsVitry453', 'Traver', 'Cedillos', 'Winders', '1987-07-06', ' West Sage, Tonga', '2023-05-24'),
(17, 1, 'https://celebritymensbarbershop.com/dashboard', 'TwBR~,nq?-F[Rf4=', 'artrol69@gmail.com', '+639895694715', 'holdsmancharque2', 'Amalea', 'Tillberry', 'Bulinski', '1981-11-03', ' Lake Elisafort, Sri Lanka', '2023-05-24'),
(23, 4, 'https://www.instructables.com/account/login/?nxtPg=', '%k-l5j`w*5V!~gFu', 'jgt59bwq83@zohomail.com', '09116749226', 'harlequinsatocia', 'Carlsen', 'Ring', 'Fassio', '1984-08-10', 'United States', '2023-05-24'),
(58, 4, 'https://example.com', 'Zqy[;Qv!:0X+k^R<', '4wk3m0j412@aol.com', '+639829542247', 'nonrepairablewob', 'Eulalie', 'Hofbauer', 'Kenealy', '2000-12-10', 'Jaedentown, Ecuador', '2023-05-25'),
(79, 4, 'https://codepen.io/login', 'dM&K8CJ[9LScp(Uo', 'n9yw729t60@outlook.com', '+639639306943', 'unhonoredlongwor', 'Merle', 'Finchman', 'Humbard', '1968-12-25', ' Steubershire, Japan', '2023-05-29'),
(80, 4, 'https://www.metacritic.com/', '(CYk;d_eK*Qr_~RP', '8i4ihzks9p@icloud.com', '09206988162', 'dialyzationkiss', 'Parrnell', 'Thiengtham', 'Credit', '1934-06-21', ' New Elisabethmouth, Iran', '2023-05-29'),
(82, 4, 'https://www.wattpad.com/?nextUrl=https://www.wattpad.com/home', '=_irbJ2_;Y.F?$0k', '5mb1vtm54v@zohomail.com', '+639630328840', 'spurtlesinocyte1', 'Lynda', 'Tokar', 'Sparacino', '1995-06-25', ' Dickinsontown, Guyana', '2023-05-29'),
(83, 4, 'https://10fastfingers.com/create-account', 'password', 'yurisher99@gmail.com', '09913757690', 'yurisher', 'Sarge', 'Kuczenski', 'Concannon', '1986-03-28', 'Westport, Panama', '2023-05-29'),
(84, 4, 'https://animesuge.to/', ';CgoD!wa)yTQRHV,', '3ku0hwj2vu@gmail.com', '+639296397677', 'coloristicallyme', 'Benn', 'Jennrich', 'Dolman', '1959-06-12', ' North Armanimouth, Panama', '2023-05-29'),
(85, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/required-action?execution=OAUTH_GRANT&client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=s-1kQNtbbGk', '*V>4Cuv]Pbt(/I+@', 'parkhallp4340@gmail.com', '+639715822537', 'sweepingnoncompr', 'Jackie', 'Mckerlie', 'Hoglen', '1966-06-21', 'Lemuelstad, Palestinian Territories', '2023-05-29'),
(86, 4, 'https://en.wiktionary.org/w/index.php?title=Special:UserLogout&returnto=ogag', 'Bi#<1<`M#)xj6Zj>', '4biraejs6i@icloud.com', '09118155708', 'unmeekkharroubah', 'Moss', 'Heyveld', 'Arbogust', '1989-06-18', ' West Daxside, Mauritius', '2023-05-29'),
(88, 4, 'https://www.abcya.com/', 'aBFt>ZdPRn|qX&dO', 'vkqcuk2qlb@protonmail.com', '+639443519351', 'samshusothygroma', 'Denice', 'Trojecki', 'Nohel', '1990-08-11', ' Rosannafurt, Faroe Islands', '2023-05-29'),
(89, 4, 'https://www.cracked.com/', '?v3b)p_~O-pBEnK2', 'gtewpfp5fw@gmx.com', '+639469034336', 'Trishaunsentfo7', 'Ardeen', 'Damewood', 'Kenniston', '1942-08-23', ' Rosannafurt, Faroe Islands', '2023-05-29'),
(90, 4, 'https://iqtest.com/my-account/', '=qk@@2mk{nZGea<H', 'u8pkuoqsai@zohomail.com', '+639994595582', 'outraprepasted61', 'Gilles', 'Zufelt', 'Mcgiboney', '1937-10-10', 'Chaddton, Brunei Darussalam', '2023-05-29'),
(91, 4, 'https://www.facebook.com/', '4myPersonalSocialMedia_2022', 'frte1775@gmail.com', '09216755335', 'pedroP123', 'Binni', 'Prabhakar', 'Pedro', '1971-08-19', ' Mathewview, Sierra Leone', '2023-05-29'),
(93, 4, 'https://www.typing.com/student/lessons', 'j(kTwQgwhWPB)h+N', 'kt6i1qaec9@aol.com', '+639180669934', 'KastropRauxelAet', 'Corly', 'Mclaughin', 'Nopper', '1957-11-19', ' West Deshawntown, Kiribati', '2023-05-30'),
(94, 4, 'https://www.marcopolohotels.com/en/group/my_profile/profile.html', '6R~6vwHzn)kdl;SU', 'q5ucd6gw9v@aol.com', '+639012091642', 'provisionarybroc', 'Valentine', 'Mcglothlin', 'Varajas', '1942-06-23', ' West Leonelmouth, Croatia', '2023-05-30'),
(95, 6, 'https://celebritymensbarbershop.com/', ':Z1r:igUC}lT;T29', 'meowming999@gmail.com', '+639535033487', 'laughablenessRic', 'Hedvige', 'Joseph', 'Shelling', '1936-11-15', ' North Althea, San Marino', '2023-06-01'),
(97, 7, 'https://example2.com', 'QW6Iet=8L<9i(g[T', 'hewl1mpzmm@zohomail.com', '09253776032', 'analogisedCoix', 'Tuesday', 'Chiera', 'Bonavia', '1996-05-19', 'East Bayleemouth, Svalbard & Jan Mayen Islands', '2023-06-02'),
(98, 7, 'https://iqtest.com/my-account/', '$7My0e%mdcoT$Mak', '46qgtdgqda@yahoo.com', '+639794890751', 'paraproctitisven', 'Paloma', 'Narkier', 'Deglanville', '1999-03-27', ' West Gabriellaside, Haiti', '2023-06-02'),
(99, 7, 'https://web.facebook.com/?stype=lo&jlou=AffoHs8sqtvmx2WccLvWLKaJMD3QZWAUoCWOS3asslN0odNSwnaDz3-IkhvAs3rKHI0IqRGFN1TbJd48zPUnKlJm1cg9v9A13dbGzKxSNGZXhQ&smuh=20665&lh=Ac-f-HK0kkrmhRa8ly8', 'HL.dmJ#_XAw1<,nE', 'il5y9bjvhe@aol.com', '09019408671', 'Casatusfomite893', 'Homer', 'Gauldin', 'Mcmillin', '1937-10-21', 'South Rolandoborough, Samoa', '2023-06-02'),
(100, 7, 'https://10fastfingers.com/create-account', 'UMXrjSZ@E|h~Q31N', 'htupasjr@gmail.com', '+639155031312', 'conceivedfinelea', 'Sarette', 'Tartar', 'Reio', '1957-08-29', 'Trompmouth, Kazakhstan', '2023-06-02'),
(101, 7, 'https://en.wiktionary.org/w/index.php?title=Special:CreateAccount&returnto=Wiktionary%3AMain+Page', '${0S1D#Z0pX0:t?6', 'k194ulxk8n@aol.com', '+639994858174', 'deemulsivityGlen', 'Ram', 'Deep', 'Ackerley', '1983-11-24', 'Trompmouth, Kazakhstan', '2023-06-02'),
(102, 7, 'https://www.cracked.com/', ']Prm(]3sc_Ql,GwD', 'meowming999@gmail.com', '09951387466', 'basquedmegawatts', 'Clement', 'Bertozzi', 'Argento', '1976-12-25', 'East Jayne, Denmark', '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `auth_type` varchar(255) NOT NULL,
  `selector` text NOT NULL,
  `token` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `user_email`, `auth_type`, `selector`, `token`, `created_at`, `expires_at`) VALUES
(7, 'yurisher99@gmail.com', 'account_verify', 'c003d15aa73b6875', '$2y$10$KranCT2JfwjVe8Qbxf6mfuLBgzqR/pxMG2plEFTiydvpy4gwieog.', '2023-05-24 09:45:23', '2023-05-24 10:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `alias_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edit_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `old_url` varchar(255) DEFAULT NULL,
  `new_url` varchar(255) DEFAULT NULL,
  `old_password` varchar(255) DEFAULT NULL,
  `new_password` varchar(255) DEFAULT NULL,
  `old_email` varchar(255) DEFAULT NULL,
  `new_email` varchar(255) DEFAULT NULL,
  `old_phone` varchar(255) DEFAULT NULL,
  `new_phone` varchar(255) DEFAULT NULL,
  `old_username` varchar(255) DEFAULT NULL,
  `new_username` varchar(255) DEFAULT NULL,
  `old_firstname` varchar(255) DEFAULT NULL,
  `new_firstname` varchar(255) DEFAULT NULL,
  `old_middlename` varchar(255) DEFAULT NULL,
  `new_middlename` varchar(255) DEFAULT NULL,
  `old_lastname` varchar(255) DEFAULT NULL,
  `new_lastname` varchar(255) DEFAULT NULL,
  `old_birthdate` date DEFAULT NULL,
  `new_birthdate` date DEFAULT NULL,
  `old_address` varchar(255) DEFAULT NULL,
  `new_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `alias_id`, `user_id`, `edited_by`, `edit_timestamp`, `old_url`, `new_url`, `old_password`, `new_password`, `old_email`, `new_email`, `old_phone`, `new_phone`, `old_username`, `new_username`, `old_firstname`, `new_firstname`, `old_middlename`, `new_middlename`, `old_lastname`, `new_lastname`, `old_birthdate`, `new_birthdate`, `old_address`, `new_address`) VALUES
(3, 6, 1, 'supahot', '2023-05-24 01:46:37', 'http://localhost/Elias', 'http://localhost/Elias', '33gw_qRf@uPF;mz$', '33gw_qRf@uPF;mdsfd', '8gbe8p6g7u@protonmail.com', '8gbe8p6g7u@protonmail.com', '+639737828648', '+639737828648', 'Apatornisinterje', 'Apatornisinterje', 'Gay', 'Gay', 'Demarest', 'Demarest', 'Dimitriou', 'Dimitriou', '1931-05-20', '1931-05-20', ' Brooklynshire, Eritrea', ' Brooklynshire, Eritrea'),
(4, 3, 1, 'supahot', '2023-05-24 02:28:36', 'https://example.com', 'https://example.com', '-_$EL2DJ~fRZqHTJ', '-_$EL2DJ~fRZqHasdsf', 'p4jlc41hhi@outlook.com', 'p4jlc41hhi@outlook.com', '+639273429663', '+639273429663', 'unamusinglybutti', 'unamusinglybutti', 'Xerxes', 'Xerxes', 'Eismann', 'Eismann', 'Rodell', 'Rodell', '1924-08-08', '1924-08-08', ' West Joshuah, Faroe Islands', ' West Joshuah, Faroe Islands'),
(5, 3, 1, 'supahot', '2023-05-24 02:29:05', 'https://example.com', 'https://example.com', '-_$EL2DJ~fRZqHasdsf', '-_$EL2DJ~fRZqHasdsf', 'p4jlc41hhi@outlook.com', 'p4jlc41hhi@outlook.com', '+639273429663', '+639273429663', 'unamusinglybutti', 'unamusinglybusadf', 'Xerxes', 'Xerxes', 'Eismann', 'Eismann', 'Rodell', 'Rodell', '1924-08-08', '1924-08-08', ' West Joshuah, Faroe Islands', ' West Joshuah, Faroe Islands'),
(10, 23, 4, 'pedroP123', '2023-05-27 04:51:08', 'https://www.instructables.com/account/login/?nxtPg=', 'https://www.instructables.com/account/login/?nxtPg=', '%k-l5j`w*5V!~gFu', '%k-l5j`w*5V!~gFu', 'jgt59bwq83@zohomail.com', 'jgt59bwq83@zohomail.com', '09116749226', '09116749226', 'harlequinsatocia', 'harlequinsatocia', 'Carsten', 'Carlsen', 'Rings', 'Rings', 'Fassio', 'Fassio', '1984-07-18', '1984-07-18', 'United States', 'United States'),
(11, 23, 4, 'pedroP123', '2023-05-27 04:52:47', 'https://www.instructables.com/account/login/?nxtPg=', 'https://www.instructables.com/account/login/?nxtPg=', '%k-l5j`w*5V!~gFu', '%k-l5j`w*5V!~gFu', 'jgt59bwq83@zohomail.com', 'jgt59bwq83@zohomail.com', '09116749226', '09116749226', 'harlequinsatocia', 'harlequinsatocia', 'Carlsen', 'Carlsen', 'Rings', 'Ring', 'Fassio', 'Fassio', '1984-07-18', '1984-07-18', 'United States', 'United States'),
(12, 23, 4, 'pedroP123', '2023-05-27 05:02:54', 'https://www.instructables.com/account/login/?nxtPg=', 'https://www.instructables.com/account/login/?nxtPg=', '%k-l5j`w*5V!~gFu', '%k-l5j`w*5V!~gFu', 'jgt59bwq83@zohomail.com', 'jgt59bwq83@zohomail.com', '09116749226', '09116749226', 'harlequinsatocia', 'harlequinsatocia', 'Carlsen', 'Carlsen', 'Ring', 'Ring', 'Fassio', 'Fassio', '1984-07-18', '1984-08-10', 'United States', 'United States'),
(13, 83, 4, 'pedroP123', '2023-05-29 00:16:04', 'https://10fastfingers.com/create-account', 'https://10fastfingers.com/create-account', '/pCZDxpUES!d7;Y6', '/pCZDxpUES!d7;Y6', 'crmsaobg4p@aol.com', 'bphr2b81rt@gmail.com', '09913757690', '09913757690', 'twicetransported', 'twicetransported', 'Sarge', 'Sarge', 'Kuczenski', 'Kuczenski', 'Concannon', 'Concannon', '1986-03-28', '1986-03-28', 'Westport, Panama', 'Westport, Panama'),
(14, 83, 4, 'pedroP123', '2023-05-29 00:19:02', 'https://10fastfingers.com/create-account', 'https://10fastfingers.com/create-account', '/pCZDxpUES!d7;Y6', '/pCZDxpUES!d7;Y6', 'bphr2b81rt@gmail.com', 'bphr2b81rt@gmail.com', '09913757690', '09913757690', 'twicetransported', 'y', 'Sarge', 'Sarge', 'Kuczenski', 'Kuczenski', 'Concannon', 'Concannon', '1986-03-28', '1986-03-28', 'Westport, Panama', 'Westport, Panama'),
(15, 83, 4, 'pedroP123', '2023-05-29 00:19:32', 'https://10fastfingers.com/create-account', 'https://10fastfingers.com/create-account', '/pCZDxpUES!d7;Y6', 'password', 'bphr2b81rt@gmail.com', 'yurisher99@gmail.com', '09913757690', '09913757690', 'y', 'yurisher', 'Sarge', 'Sarge', 'Kuczenski', 'Kuczenski', 'Concannon', 'Concannon', '1986-03-28', '1986-03-28', 'Westport, Panama', 'Westport, Panama'),
(16, 91, 4, 'pedroP123', '2023-05-29 02:22:54', 'https://www.facebook.com/', 'https://www.facebook.com/', '4myPersonalSocialMedia_2022', '4myPersonalSocialMedia_2022', 'francis.escoton.3@facebook.com', 'frte1775@gmail.com', '09216755335', '09216755335', 'pedroP123', 'pedroP123', 'Binni', 'Binni', 'Prabhakar', 'Prabhakar', 'pedroP123', 'Pedro', '1971-08-19', '1971-08-19', ' Mathewview, Sierra Leone', ' Mathewview, Sierra Leone'),
(17, 95, 6, 'tyson123', '2023-06-01 02:29:10', 'https://celebritymensbarbershop.com/', 'https://celebritymensbarbershop.com/', ':Z1r:igUC}lT;T29', ':Z1r:igUC}lT;T29', 'rkkc6ngaua@zohomail.com', 'meowming999@gmail.com', '+639535033487', '+639535033487', 'laughablenessRic', 'laughablenessRic', 'Hedvige', 'Hedvige', 'Joseph', 'Joseph', 'Shelling', 'Shelling', '1936-11-15', '1936-11-15', ' North Althea, San Marino', ' North Althea, San Marino'),
(18, 97, 7, 'user123', '2023-06-02 00:56:52', 'https://example2.com', 'https://example2.com', 'QW6Iet=8L<9i(g[T', 'QW6Iet=8L<9i(g[T', 'hewl1mpzmm@zohomail.com', 'hewl1mpzmm@zohomail.com', '09253776032', '09253776032', 'analogisedCoix27', 'analogisedCoix', 'Tuesday', 'Tuesday', 'Chiera', 'Chiera', 'Bonavia', 'Bonavia', '1996-05-19', '1996-05-19', 'East Bayleemouth, Svalbard & Jan Mayen Islands', 'East Bayleemouth, Svalbard & Jan Mayen Islands');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `user_id`, `url`, `status`, `username`, `email`, `password`, `created_at`) VALUES
(2, 1, 'https://web.facebook.com/logout.php?button_location=settings&button_name=logout', 'logout', '', '', '', '5/24/2023 01:05 PM'),
(4, 1, 'https://web.facebook.com/logout.php?button_location=settings&button_name=logout', 'logout', '', '', '', '5/24/2023 01:09 PM'),
(6, 1, 'https://web.facebook.com/logout.php?button_location=settings&button_name=logout', 'logout', '', '', '', '5/24/2023 01:15 PM'),
(7, 1, 'https://web.facebook.com/login/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjg0OTA1MzMxLCJjYWxsc2l0ZV9pZCI6MzgxMjI5MDc5NTc1OTQ2fQ%3D%3D', 'login', '', 'frte1775@gmail.com', '', '5/24/2023 01:15 PM'),
(8, 1, 'https://web.facebook.com/logout.php?button_location=settings&button_name=logout', 'logout', '', '', '', '5/24/2023 02:51 PM'),
(9, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 03:02 PM'),
(10, 1, 'https://celebritymensbarbershop.com/login', 'login', '', 'dcdmisal@gmail.com', 'W|W:(0HYZr4Q-J;r', '5/24/2023 03:03 PM'),
(11, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 03:03 PM'),
(12, 1, 'https://celebritymensbarbershop.com/login', 'login', '', 'dcdmisal@gmail.com', 'W|W:(0HYZr4Q-gh', '5/24/2023 03:05 PM'),
(13, 1, 'https://celebritymensbarbershop.com/login', 'login', '', 'dcdmisal@gmail.com', 'W|W:(0HYZr4Q-J;r', '5/24/2023 03:05 PM'),
(14, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 03:19 PM'),
(15, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 03:27 PM'),
(16, 1, 'https://celebritymensbarbershop.com/login', 'login', '', 'pinkbaby780@gmail.com', 'i4l>&Q|j*>Y_R{;t', '5/24/2023 03:28 PM'),
(17, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 03:36 PM'),
(18, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 03:37 PM'),
(19, 1, 'https://celebritymensbarbershop.com/register', 'register', '', '1ciscocomelon@gmail.com', 'h,IN88yIiO::C_5Y', '5/24/2023 03:40 PM'),
(20, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 03:41 PM'),
(21, 1, 'https://celebritymensbarbershop.com/login', 'login', '', '1ciscocomelon@gmail.com', 'h,IN88yIiO::C_5Y', '5/24/2023 03:42 PM'),
(22, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 03:42 PM'),
(23, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '5/24/2023 04:19 PM'),
(24, 1, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/24/2023 04:25 PM'),
(25, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '5/24/2023 05:13 PM'),
(26, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '5/24/2023 05:14 PM'),
(27, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '5/24/2023 05:22 PM'),
(28, 1, 'https://celebritymensbarbershop.com/register', 'register', '', 'meowming999@gmail.com', 'hVGz&G*M8efX?Xm$', '5/24/2023 05:27 PM'),
(29, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 05:29 PM'),
(30, 1, 'https://celebritymensbarbershop.com/login', 'login', '', 'meowming999@gmail.com', 'hVGz&G*M8efX?Xm$', '5/24/2023 05:30 PM'),
(31, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 05:32 PM'),
(32, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '5/24/2023 05:47 PM'),
(33, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '5/24/2023 05:49 PM'),
(34, 1, 'https://celebritymensbarbershop.com/register', 'register', '', 'artrol69@gmail.com', 'TwBR~,nq?-F[Rf4=', '5/24/2023 05:51 PM'),
(35, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 05:53 PM'),
(36, 1, 'https://celebritymensbarbershop.com/login', 'login', '', 'artrol69@gmail.com', 'TwBR~,nq?-F[Rf4=', '5/24/2023 05:54 PM'),
(37, 1, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/24/2023 05:56 PM'),
(38, 4, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '5/25/2023 12:39 AM'),
(39, 4, 'https://celebritymensbarbershop.com/login', 'login', '', 'ferot73334@mevori.com', 'i*|_T4,(;/ZPm)t?', '5/25/2023 12:39 AM'),
(40, 4, 'https://www.wattpad.com/login?nextUrl=/home', 'login', 'undistinguishabl', '', ',_J#WTMJHXq0&1NI', '5/25/2023 01:30 AM'),
(41, 4, 'https://web.facebook.com/login/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjg1MDAyMjU0LCJjYWxsc2l0ZV9pZCI6MzgxMjI5MDc5NTc1OTQ2fQ%3D%3D', 'login', '', 'frte1775@gmail.com', '', '5/25/2023 04:10 PM'),
(42, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '5/26/2023 06:22 AM'),
(43, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '5/26/2023 06:24 AM'),
(44, 4, 'https://www.wattpad.com/login?nextUrl=/home', 'login', 'spurtlesinocyte1', '', '=_irbJ2_;Y.F?$0k', '5/29/2023 01:33 PM'),
(45, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/29/2023 02:16 PM'),
(46, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/29/2023 02:17 PM'),
(47, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/29/2023 02:22 PM'),
(48, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/29/2023 02:25 PM'),
(49, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/29/2023 02:28 PM'),
(50, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/29/2023 02:28 PM'),
(51, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/consent?client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=s-1kQNtbbGk', 'login', '', '', '', '5/29/2023 03:20 PM'),
(52, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/consent?client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=s-1kQNtbbGk', 'login', '', '', '', '5/29/2023 03:20 PM'),
(53, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/consent?client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=s-1kQNtbbGk', 'login', '', '', '', '5/29/2023 03:20 PM'),
(54, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/consent?client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=s-1kQNtbbGk', 'login', '', '', '', '5/29/2023 03:20 PM'),
(55, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/consent?client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=s-1kQNtbbGk', 'login', '', '', '', '5/29/2023 03:20 PM'),
(56, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/consent?client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=s-1kQNtbbGk', 'login', '', '', '', '5/29/2023 03:21 PM'),
(57, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/authenticate?session_code=zJVV512uAG1fm-m7SissyQMk9BFWYTF4vodkfvHC81Q&execution=89ea2a15-782f-4018-b3f5-3423234ff457&client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=je4Ze2Fcy8I', 'login', 'sweepingnoncompr', '', '*V>4Cuv]Pbt(/I+@', '5/29/2023 03:21 PM'),
(58, 4, 'https://idp.azerionconnect.com/auth/realms/spil/login-actions/authenticate?session_code=lmTYZJzgV8Yb7dYLtRWYmVY3ULi7yB5V4qi2gfeGzBI&execution=89ea2a15-782f-4018-b3f5-3423234ff457&client_id=39c6f0dd-0ace-42db-aa86-b9dd1907764b&tab_id=je4Ze2Fcy8I', 'login', 'pharyngoplegicpa', '', 'qAZ]DZVIgx', '5/29/2023 03:21 PM'),
(59, 4, 'https://www.facebook.com/login/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjg1MzQ4NDQyLCJjYWxsc2l0ZV9pZCI6MzgxMjI5MDc5NTc1OTQ2fQ%3D%3D', 'login', '', 'francis.escoton.3@facebook.com', '', '5/29/2023 04:20 PM'),
(60, 4, 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1', 'login', '', 'francis.escoton.3@facebook.com', '', '5/29/2023 04:20 PM'),
(61, 4, 'https://www.facebook.com/login/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjg1MzQ4NDY5LCJjYWxsc2l0ZV9pZCI6MzgxMjI5MDc5NTc1OTQ2fQ%3D%3D', 'login', '', 'francis.escoton.3@facebook.com', '', '5/29/2023 04:21 PM'),
(62, 4, 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=120&lwc=1348028', 'login', '', 'francis.escoton.3@facebook.com', '', '5/29/2023 04:21 PM'),
(63, 4, 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=100', 'login', '', 'francis.escoton.3@facebook.com', '', '5/29/2023 04:21 PM'),
(64, 4, 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=120&lwc=1348028', 'login', '', 'frte1775@gmail.com', '', '5/29/2023 04:21 PM'),
(65, 4, 'https://www.facebook.com/logout.php?button_location=settings&button_name=logout', 'logout', '', '', '', '5/29/2023 04:23 PM'),
(66, 4, 'https://www.facebook.com/logout.php?button_location=settings&button_name=logout', 'logout', '', '', '', '5/30/2023 10:00 AM'),
(67, 4, 'https://www.facebook.com/login/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjg1NDEyMDEzLCJjYWxsc2l0ZV9pZCI6MzgxMjI5MDc5NTc1OTQ2fQ%3D%3D', 'login', '', 'frte1775@gmail.com', '', '5/30/2023 10:00 AM'),
(68, 4, 'https://www.facebook.com/logout.php?button_location=settings&button_name=logout', 'logout', '', '', '', '5/30/2023 10:00 AM'),
(69, 4, 'https://en.wiktionary.org/w/index.php?title=Special:UserLogin&returnto=ogag', '', '', '', '', '5/30/2023 10:03 AM'),
(70, 4, 'https://en.wiktionary.org/w/index.php?title=Special:UserLogin&returnto=ogag', 'login', '', '', '', '5/30/2023 10:05 AM'),
(71, 4, 'https://en.wiktionary.org/w/index.php?title=Special:UserLogin&returnto=ogag', 'login', '', '', '', '5/30/2023 10:10 AM'),
(72, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/30/2023 10:36 AM'),
(73, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/30/2023 10:36 AM'),
(74, 4, 'https://10fastfingers.com/account/native_login', 'login', '', '', '', '5/30/2023 10:36 AM'),
(75, 4, 'https://iqtest.com/my-account/', 'login', 'outraprepasted61', '', '=qk@@2mk{nZGea<H', '5/30/2023 10:46 AM'),
(76, 6, 'https://celebritymensbarbershop.com/login', 'login', '', 'meowming999@gmail.com', ':Z1r:igUC}lT;T29', '6/1/2023 04:29 PM'),
(77, 6, 'https://celebritymensbarbershop.com/logout', 'logout', '', '', '', '6/1/2023 04:29 PM'),
(78, 1, 'http://localhost/Elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '6/1/2023 11:00 PM'),
(80, 7, 'https://iqtest.com/my-account/', 'login', 'paraproctitisven', '', '$7My0e%mdcoT$Mak', '6/2/2023 02:59 PM'),
(81, 7, 'https://10fastfingers.com/create-account', '', '', '', '', '6/2/2023 03:18 PM'),
(82, 7, 'https://en.wiktionary.org/w/index.php?title=Special:UserLogin&returnto=Wiktionary:Main+Page', 'login', '', '', '', '6/2/2023 03:21 PM'),
(83, 7, 'https://en.wiktionary.org/w/index.php?title=Special:UserLogin&returnto=Wiktionary:Main+Page', 'login', '', '', '', '6/2/2023 03:21 PM'),
(84, 7, 'https://en.wiktionary.org/w/index.php?title=Special:UserLogin&returnto=Wiktionary:Main+Page', 'login', '', '', '', '6/2/2023 03:21 PM'),
(85, 7, 'https://en.wiktionary.org/w/index.php?title=Special:UserLogin&returnto=Wiktionary:Main+Page', 'login', '', '', '', '6/2/2023 03:21 PM'),
(86, 1, 'http://localhost/elias/login/includes/login.inc.php', 'login', 'supahot', '', 'aaaaaa', '9/19/2023 07:05 PM'),
(87, 1, 'http://localhost/phpmyadmin/index.php?route=/export', '', '', '', '', '9/19/2023 10:47 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT '_defaultUser.png',
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `gender`, `headline`, `bio`, `profile_image`, `verified_at`, `created_at`, `updated_at`, `deleted_at`, `last_login_at`) VALUES
(1, 'supahot', 'supa@hot.com', '$2y$10$jhIOk4NVdBile/NwhAU9We/f0aoohx.cG9CizmIALRz0aCKJa5s6a', 'Supahot', 'Soverysupahot', 'm', 'Headline of a supa hot user', 'This is the bio of a supa hot user. Now i will say needless stuff to make this longer so this looks like a bio and not anything other than a bio.', '646fdfcb423492.25603186.jpg', '2023-05-24 04:29:48', '2023-05-24 04:29:48', '2023-09-19 11:05:37', NULL, '2023-09-19 11:05:37'),
(3, 'yurisher', 'yurisher99@gmail.com', '$2y$10$FZw2CyAJV7acZI2LPMpZi.lLyO7RdYSHNQtcRutTsVrSfIp40diye', '', '', NULL, '', '', '646ddb7277c984.17039220.jpg', NULL, '2023-05-24 09:40:02', '2023-06-05 03:58:28', NULL, '2023-06-05 03:58:28'),
(4, 'pedroP123', 'artrol69@gmail.com', '$2y$10$TkwK3PZsJKGq7kQ/yHqPO.iJ9Skcq44.myI0mOMpwjnNWzRDLxwNK', '', '', NULL, '', '', '646de13c71a5b4.13511625.jpeg', '2023-05-24 10:19:05', '2023-05-24 10:04:44', '2023-06-05 03:06:14', NULL, '2023-06-05 03:06:14'),
(6, 'tyson123', 'parkhallp4340@gmail.com', '$2y$10$7KSBxGpb5bzYAEFnT/Lu9.a5eCTQVgKEo2AZ/3XZ7FWZlfa2wiA9a', '', '', NULL, '', '', '64785550e18891.43851587.jpg', '2023-06-01 08:22:16', '2023-06-01 08:20:13', '2023-06-02 04:29:14', NULL, '2023-06-02 04:29:14'),
(7, 'user123', 'meowming999@gmail.com', '$2y$10$1y1ESnQkqdlJ.hCdsves8ucAN.CsZcHxUTYrpLL2PvkTIYzVVEHDW', '', '', NULL, '', '', '_defaultUser.png', '2023-06-02 06:50:45', '2023-06-02 06:49:13', '2023-06-08 07:02:28', NULL, '2023-06-08 07:02:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliases`
--
ALTER TABLE `aliases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_aliases` (`user_id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alias_history` (`alias_id`),
  ADD KEY `fk_user_history` (`user_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_logins` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`,`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliases`
--
ALTER TABLE `aliases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aliases`
--
ALTER TABLE `aliases`
  ADD CONSTRAINT `fk_user_aliases` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_alias_history` FOREIGN KEY (`alias_id`) REFERENCES `aliases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_history` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `fk_user_logins` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
