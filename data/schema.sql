CREATE DATABASE IF NOT EXISTS `kontakte` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE `kontakte`;

CREATE TABLE `kontakte` (
  `kid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nachname` varchar(50) NOT NULL,
  `vorname` varchar(50) DEFAULT NULL,
  `strasse` varchar(100) DEFAULT NULL,
  `oid` smallint(6) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL
);

INSERT INTO `kontakte` (`kid`, `nachname`, `vorname`, `strasse`, `oid`, `email`, `tel`) VALUES
(1, 'Ritter', 'Krysten', 'Jonesweg 88', 1, 'jessica@kr.ch', '777 777 777'),
(2, 'Thurman', 'Uma', 'Killbillstr. 99', 3, 'uma@bill.ch', '444 444 447'),
(3, 'Jackson', 'Samuel', 'Pulpfictionweg 22', 2, 'sam@tarantel.ch', '666 666 666'),
(4, 'McKenzie', 'Ben', 'Gordonweg 55', 1, 'ben@gotham.ch', '555 555 555');

CREATE TABLE `orte` (
  `oid` int(11) PRIMARY KEY AUTO_INCREMENT,
  `plz` smallint(6) NOT NULL,
  `ort` varchar(50) NOT NULL
);

INSERT INTO `orte` (`oid`, `plz`, `ort`) VALUES
(1, 3000, 'Bern'),
(2, 2500, 'Biel'),
(3, 3400, 'Burgdorf'),
(4, 3600, 'Thun');
