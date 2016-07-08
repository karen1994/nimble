CREATE TABLE IF NOT EXISTS `comunidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

INSERT INTO `comunidad` (`id`, `com_id`, `nombre`) VALUES
(1, 1, 'Andalucía'),
(2, 2, 'Aragón'),
(3, 3, 'Principado de Asturias'),
(4, 4, 'Illes Balears'),
(5, 5, 'Canarias'),
(6, 6, 'Cantabria'),
(7, 7, 'Castilla - La Mancha'),
(8, 8, 'Castilla y León'),
(9, 9, 'Catalunya'),
(10, 10, 'Extremadura'),
(11, 11, 'Galicia'),
(12, 12, 'Comunidad de Madrid'),
(13, 13, 'Comunidad Foral de Navarra'),
(14, 14, 'País Vasco'),
(15, 15, 'Región de Murcia'),
(16, 16, 'La Rioja'),
(17, 17, 'Comunitat Valenciana'),
(18, 18, 'Ciudad de Ceuta'),
(19, 19, 'Ciudad de Melilla');