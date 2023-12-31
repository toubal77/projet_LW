-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 30 déc. 2023 à 12:10
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `composant`;
DROP TABLE IF EXISTS `illustrations`;
DROP TABLE IF EXISTS `users`;


CREATE TABLE `composant` (
  `idComposant` int(11) NOT NULL,
  `idIllustration` int(11) NOT NULL,
  `composant` varchar(255) NOT NULL DEFAULT 'Composant',
  `vecteur_x` int(11) NOT NULL,
  `vecteur_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


CREATE TABLE `illustrations` (
  `idIllustration` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `langueParDefaut` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


CREATE TABLE `users` (
  `idUtilisateurs` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`idUtilisateurs`, `nom`, `role`, `email`, `mot_de_passe`) VALUES
(11, 'admin', 'admin', 'admin@gmail.com', 'admin');

ALTER TABLE `composant`
  ADD PRIMARY KEY (`idComposant`);


ALTER TABLE `illustrations`
  ADD PRIMARY KEY (`idIllustration`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`idUtilisateurs`);

ALTER TABLE `composant`
  MODIFY `idComposant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;


ALTER TABLE `illustrations`
  MODIFY `idIllustration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

ALTER TABLE `users`
  MODIFY `idUtilisateurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;