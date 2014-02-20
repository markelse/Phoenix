CREATE TABLE IF NOT EXISTS `config` (
  `site_name` varchar(50) NOT NULL,
  `site_path` varchar(50) NOT NULL,
  `site_url` varchar(50) NOT NULL,
  PRIMARY KEY (`site_url`),
  KEY `site_name` (`site_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(3) NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
