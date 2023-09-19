
--
-- Database: `eliasdb`
--

create schema eliasdb;
use eliasdb;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `first_name`, `last_name`, `gender`, `headline`, `bio`, `verified_at`, `created_at`) VALUES
('supahot', 'supa@hot.com', '$2y$10$jhIOk4NVdBile/NwhAU9We/f0aoohx.cG9CizmIALRz0aCKJa5s6a', 'Supahot', 'Soverysupahot', 'm', 'Headline of a supa hot user', 'This is the bio of a supa hot user. Now i will say needless stuff to make this longer so this looks like a bio and not anything other than a bio.', NOW(), NOW());

--
-- Indexes for table `auth_tokens`
--

ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`,`username`,`email`);

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;
COMMIT;

CREATE TABLE `aliases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_aliases` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE logins (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  url VARCHAR(255),
  status VARCHAR(10),
  created_at VARCHAR(30),
  
  CONSTRAINT `fk_user_logins` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE logins
ADD COLUMN password VARCHAR(255) AFTER email;


ALTER TABLE aliases
ADD COLUMN `phone` VARCHAR(15) AFTER `email`;



CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edit_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `old_url` varchar(255),
  `new_url` varchar(255),
  `old_password` varchar(255),
  `new_password` varchar(255),
  `old_email` varchar(255),
  `new_email` varchar(255),
  `old_phone` varchar(255),
  `new_phone` varchar(255),
  `old_username` varchar(255),
  `new_username` varchar(255),
  `old_firstname` varchar(255),
  `new_firstname` varchar(255),
  `old_middlename` varchar(255),
  `new_middlename` varchar(255),
  `old_lastname` varchar(255),
  `new_lastname` varchar(255),
  `old_birthdate` date,
  `new_birthdate` date,
  `old_address` varchar(255),
  `new_address` varchar(255),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_alias_history` FOREIGN KEY (`alias_id`) REFERENCES `aliases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_history` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

