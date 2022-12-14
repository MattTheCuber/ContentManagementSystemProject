CREATE TABLE `products` (
 `ProductId` int(11) NOT NULL AUTO_INCREMENT,
 `Name` varchar(100) NOT NULL,
 `Description` text NOT NULL,
 `Price` decimal(10,0) NOT NULL,
 `Quantity` int(11) NOT NULL,
 `Image` varchar(100) NOT NULL,
 `SpecialOffer` tinyint(1) NOT NULL DEFAULT 0,
 PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4