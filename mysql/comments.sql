CREATE TABLE `comments` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `title` varchar(100) NOT NULL,
 `comments` varchar(5000) NOT NULL,
 `commentdate` date NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4