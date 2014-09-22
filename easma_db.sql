-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2014 at 06:06 ÖS
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `easma`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE IF NOT EXISTS `cv` (
`id` int(11) NOT NULL,
  `title` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `title`, `description`, `keywords`, `content`) VALUES(1, 'CV (24.11.2014)', 'cv', 'cv', '<div id="lipsum">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ipsum urna, rutrum quis neque id, gravida lacinia turpis. Donec porttitor mollis nisl ut scelerisque. Nunc vel consequat elit. Quisque fermentum elit in pharetra molestie. Nunc interdum dui dui, ut malesuada odio porttitor sed. Morbi nec dui bibendum, dictum lacus eu, elementum nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mi risus, ornare vel gravida vel, pulvinar id diam. Morbi enim purus, imperdiet nec imperdiet sed, scelerisque nec eros. Morbi eu dapibus erat, vel iaculis felis. Nunc porttitor erat quis molestie malesuada. Nunc ornare odio at ligula euismod, pellentesque cursus arcu tincidunt. Nam finibus ante tristique, venenatis leo luctus, dapibus nisi. Etiam suscipit justo a sem volutpat feugiat.</p>\r\n\r\n<p>Praesent varius vehicula molestie. Praesent imperdiet congue enim, in sagittis mi vulputate in. Nullam efficitur auctor odio non vehicula. Aliquam metus sapien, sodales a libero in, efficitur suscipit metus. Nulla mollis pellentesque nibh, vitae dignissim nisl mollis sed. Nunc turpis tellus, elementum eu maximus eu, tristique eu enim. Quisque vel mattis tellus. Aenean nibh mauris, tempus finibus eros eget, porta posuere urna. Nam sit amet vulputate libero. Nullam mollis felis vel diam placerat molestie. Mauris ante elit, pretium quis urna et, consectetur interdum enim.</p>\r\n\r\n<p>Duis pulvinar, sapien ac accumsan dapibus, ante odio pulvinar lectus, non tempor quam ligula et felis. Etiam id sem tellus. Nunc sed est nec elit ultricies dictum. Maecenas ac semper ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas finibus arcu porta euismod mattis. Sed hendrerit odio eget nulla convallis, ac elementum nulla sagittis. Vestibulum euismod nisl in pretium ullamcorper. Proin hendrerit, nisi non iaculis condimentum, elit arcu fringilla velit, vel tristique eros diam id arcu. Suspendisse euismod eget risus eget luctus. Fusce a facilisis libero. Nam egestas tristique accumsan.</p>\r\n\r\n<p>In eget urna ut dui vehicula commodo sit amet a ligula. Proin malesuada neque non fringilla faucibus. Aenean dictum sed metus quis rhoncus. Ut lobortis sed quam quis luctus. Proin lobortis, mauris in varius sodales, risus lacus faucibus libero, at fermentum orci risus pulvinar arcu. Mauris lacinia turpis sed dui scelerisque, eget mattis mauris tempus. Suspendisse hendrerit bibendum augue non rutrum.</p>\r\n\r\n<p>Suspendisse sed leo a lacus pulvinar blandit vitae et justo. Quisque ac ipsum ipsum. Donec tempor diam et fermentum aliquam. Integer metus est, pulvinar at interdum at, molestie sit amet risus. Aliquam semper sed tortor ac consequat. Phasellus vel libero faucibus, molestie neque imperdiet, finibus quam. Etiam placerat tellus in nisl egestas semper.</p>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE IF NOT EXISTS `general` (
`id` int(11) NOT NULL,
  `title` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `footer_text` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `title`, `description`, `keywords`, `facebook`, `twitter`, `content`, `footer_text`) VALUES(1, 'Hello World', 'wep developer coding programing hello world', 'web developer,coding,programing,php,python,mysql,cms,application', 'http://www.facebook.com/tcnyalcin', 'https://twitter.com/cnyalcin', 'Merhaba kısaca yukarıdaki başlıklarla size kendimi tanıtmaya &ccedil;alışacağım. Bir coder ile tanıştığımda en &ccedil;ok merak ettiğim şeyler &quot;Hanigi işletim sistemini kullandığı&quot;, &quot;Paylaştığı yazılımlar&quot; ve &quot;Tercih ettiği ideler&quot; &#39;dir.<br />\r\n<br />\r\nBu y&uuml;zden men&uuml; başlıklarını bu şekilde belirledim.<br />\r\n<br />\r\n<strong>IDE:</strong> Bu başlıkta size kullanıyor olduğum ve tavsiye edebileceğim yazılım geliştirme programlarından bahsedeceğim.<br />\r\n<br />\r\n<strong>Products:</strong> Bu başlıkta ise github (<a href="https://github.com/cyweb">https://github.com/cyweb</a>) &uuml;zerinden opensource paylaştığım scriptleri tanıtacağım.<br />\r\n<br />\r\n<strong>OS:</strong> Ve son olarak bu başlıkta size tercih ettiğim işletim sistemini ve sebebini a&ccedil;ıklamaya &ccedil;alışacağım.<br />\r\n<br />\r\nKısaca beni tanımak istiyorsanız, yukarıdaki başlıkları kullanabilirsiniz. Ziyaret ettiğiniz i&ccedil;in teşekk&uuml;r ederim.', 'info [at] cnyalcin.com');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE IF NOT EXISTS `os` (
`id` int(11) NOT NULL,
  `title` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`id`, `title`, `description`, `keywords`, `content`) VALUES(1, 'Linux Debian', 'os', 'os', '<div id="lipsum">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ipsum urna, rutrum quis neque id, gravida lacinia turpis. Donec porttitor mollis nisl ut scelerisque. Nunc vel consequat elit. Quisque fermentum elit in pharetra molestie. Nunc interdum dui dui, ut malesuada odio porttitor sed. Morbi nec dui bibendum, dictum lacus eu, elementum nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mi risus, ornare vel gravida vel, pulvinar id diam. Morbi enim purus, imperdiet nec imperdiet sed, scelerisque nec eros. Morbi eu dapibus erat, vel iaculis felis. Nunc porttitor erat quis molestie malesuada. Nunc ornare odio at ligula euismod, pellentesque cursus arcu tincidunt. Nam finibus ante tristique, venenatis leo luctus, dapibus nisi. Etiam suscipit justo a sem volutpat feugiat.</p>\r\n\r\n<p>Praesent varius vehicula molestie. Praesent imperdiet congue enim, in sagittis mi vulputate in. Nullam efficitur auctor odio non vehicula. Aliquam metus sapien, sodales a libero in, efficitur suscipit metus. Nulla mollis pellentesque nibh, vitae dignissim nisl mollis sed. Nunc turpis tellus, elementum eu maximus eu, tristique eu enim. Quisque vel mattis tellus. Aenean nibh mauris, tempus finibus eros eget, porta posuere urna. Nam sit amet vulputate libero. Nullam mollis felis vel diam placerat molestie. Mauris ante elit, pretium quis urna et, consectetur interdum enim.</p>\r\n\r\n<p>Duis pulvinar, sapien ac accumsan dapibus, ante odio pulvinar lectus, non tempor quam ligula et felis. Etiam id sem tellus. Nunc sed est nec elit ultricies dictum. Maecenas ac semper ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas finibus arcu porta euismod mattis. Sed hendrerit odio eget nulla convallis, ac elementum nulla sagittis. Vestibulum euismod nisl in pretium ullamcorper. Proin hendrerit, nisi non iaculis condimentum, elit arcu fringilla velit, vel tristique eros diam id arcu. Suspendisse euismod eget risus eget luctus. Fusce a facilisis libero. Nam egestas tristique accumsan.</p>\r\n\r\n<p>In eget urna ut dui vehicula commodo sit amet a ligula. Proin malesuada neque non fringilla faucibus. Aenean dictum sed metus quis rhoncus. Ut lobortis sed quam quis luctus. Proin lobortis, mauris in varius sodales, risus lacus faucibus libero, at fermentum orci risus pulvinar arcu. Mauris lacinia turpis sed dui scelerisque, eget mattis mauris tempus. Suspendisse hendrerit bibendum augue non rutrum.</p>\r\n\r\n<p>Suspendisse sed leo a lacus pulvinar blandit vitae et justo. Quisque ac ipsum ipsum. Donec tempor diam et fermentum aliquam. Integer metus est, pulvinar at interdum at, molestie sit amet risus. Aliquam semper sed tortor ac consequat. Phasellus vel libero faucibus, molestie neque imperdiet, finibus quam. Etiam placerat tellus in nisl egestas semper.</p>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
`id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `record_id` int(11) NOT NULL,
  `orderby` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `photo`, `table_name`, `record_id`, `orderby`) VALUES(1, '21-09-2014-49114263-logo.jpg', 'general', 1, 'main');
INSERT INTO `photo` (`id`, `photo`, `table_name`, `record_id`, `orderby`) VALUES(10, '21-09-2014-14114263-sublime-text-2-icon.png', 'ide', 1, 'main');
INSERT INTO `photo` (`id`, `photo`, `table_name`, `record_id`, `orderby`) VALUES(11, '21-09-2014-17114263-hammer.jpeg', 'products', 1, 'main');
INSERT INTO `photo` (`id`, `photo`, `table_name`, `record_id`, `orderby`) VALUES(12, '21-09-2014-45114263-Screenshot from 2014-09-21 04:21:18.png', 'products', 2, 'main');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `title` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `keywords`, `content`) VALUES(1, 'Hammer DDos Script', 'Python ddos testing script', 'ddos,testing,python,python3,script,hammer,hammer down', 'Ddos saldırısı dediğimizde aklımıza bir &ccedil;ok y&ouml;ntem gelir ve keşfedilmeyede devam ediliyor. <span style="background-color:transparent; color:black; font-family:arial; font-size:13px">NTP saldırıları gibi...</span><br />\r\n<br />\r\nBu script serverdaki gireceğimiz portu kullanan uygulamaya &ouml;rn:apache,ngix vb. uygulamaları aşırı istek g&ouml;nderir ve portu meşgul ederken serverın kaynağından da &ccedil;almaya &ccedil;alışır. Aşırı isteklere dayanamayan server kısa s&uuml;re i&ccedil;inde down olur.<br />\r\n<br />\r\n<br />\r\n&nbsp;<iframe frameborder="0" height="333" src="//www.youtube.com/embed/HVbRUhX2EPo" width="495"></iframe>');
INSERT INTO `products` (`id`, `title`, `description`, `keywords`, `content`) VALUES(2, 'Easma Cms Version 1.0', 'easma', 'easma', '<p>Duis pulvinar, sapien ac accumsan dapibus, ante odio pulvinar lectus, non tempor quam ligula et felis. Etiam id sem tellus. Nunc sed est nec elit ultricies dictum. Maecenas ac semper ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas finibus arcu porta euismod mattis. Sed hendrerit odio eget nulla convallis, ac elementum nulla sagittis. Vestibulum euismod nisl in pretium ullamcorper. Proin hendrerit, nisi non iaculis condimentum, elit arcu fringilla velit, vel tristique eros diam id arcu. Suspendisse euismod eget risus eget luctus. Fusce a facilisis libero. Nam egestas tristique accumsan.</p>\r\n\r\n<p>In eget urna ut dui vehicula commodo sit amet a ligula. Proin malesuada neque non fringilla faucibus. Aenean dictum sed metus quis rhoncus. Ut lobortis sed quam quis luctus. Proin lobortis, mauris in varius sodales, risus lacus faucibus libero, at fermentum orci risus pulvinar arcu. Mauris lacinia turpis sed dui scelerisque, eget mattis mauris tempus. Suspendisse hendrerit bibendum augue non rutrum.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ide`
--

CREATE TABLE IF NOT EXISTS `ide` (
`id` int(11) NOT NULL,
  `title` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ide`
--

INSERT INTO `ide` (`id`, `title`, `description`, `keywords`, `content`) VALUES(1, 'Sublime Text', 'ide', 'ide', '<div id="lipsum">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ipsum urna, rutrum quis neque id, gravida lacinia turpis. Donec porttitor mollis nisl ut scelerisque. Nunc vel consequat elit. Quisque fermentum elit in pharetra molestie. Nunc interdum dui dui, ut malesuada odio porttitor sed. Morbi nec dui bibendum, dictum lacus eu, elementum nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mi risus, ornare vel gravida vel, pulvinar id diam. Morbi enim purus, imperdiet nec imperdiet sed, scelerisque nec eros. Morbi eu dapibus erat, vel iaculis felis. Nunc porttitor erat quis molestie malesuada. Nunc ornare odio at ligula euismod, pellentesque cursus arcu tincidunt. Nam finibus ante tristique, venenatis leo luctus, dapibus nisi. Etiam suscipit justo a sem volutpat feugiat.</p>\r\n\r\n<p>Praesent varius vehicula molestie. Praesent imperdiet congue enim, in sagittis mi vulputate in. Nullam efficitur auctor odio non vehicula. Aliquam metus sapien, sodales a libero in, efficitur suscipit metus. Nulla mollis pellentesque nibh, vitae dignissim nisl mollis sed. Nunc turpis tellus, elementum eu maximus eu, tristique eu enim. Quisque vel mattis tellus. Aenean nibh mauris, tempus finibus eros eget, porta posuere urna. Nam sit amet vulputate libero. Nullam mollis felis vel diam placerat molestie. Mauris ante elit, pretium quis urna et, consectetur interdum enim.</p>\r\n\r\n<p>Duis pulvinar, sapien ac accumsan dapibus, ante odio pulvinar lectus, non tempor quam ligula et felis. Etiam id sem tellus. Nunc sed est nec elit ultricies dictum. Maecenas ac semper ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas finibus arcu porta euismod mattis. Sed hendrerit odio eget nulla convallis, ac elementum nulla sagittis. Vestibulum euismod nisl in pretium ullamcorper. Proin hendrerit, nisi non iaculis condimentum, elit arcu fringilla velit, vel tristique eros diam id arcu. Suspendisse euismod eget risus eget luctus. Fusce a facilisis libero. Nam egestas tristique accumsan.</p>\r\n\r\n<p>In eget urna ut dui vehicula commodo sit amet a ligula. Proin malesuada neque non fringilla faucibus. Aenean dictum sed metus quis rhoncus. Ut lobortis sed quam quis luctus. Proin lobortis, mauris in varius sodales, risus lacus faucibus libero, at fermentum orci risus pulvinar arcu. Mauris lacinia turpis sed dui scelerisque, eget mattis mauris tempus. Suspendisse hendrerit bibendum augue non rutrum.</p>\r\n\r\n<p>Suspendisse sed leo a lacus pulvinar blandit vitae et justo. Quisque ac ipsum ipsum. Donec tempor diam et fermentum aliquam. Integer metus est, pulvinar at interdum at, molestie sit amet risus. Aliquam semper sed tortor ac consequat. Phasellus vel libero faucibus, molestie neque imperdiet, finibus quam. Etiam placerat tellus in nisl egestas semper.</p>\r\n</div>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ide`
--
ALTER TABLE `ide`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ide`
--
ALTER TABLE `ide`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
