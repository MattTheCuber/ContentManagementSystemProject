CREATE TABLE `employees` (
 `EmployeeId` int(11) NOT NULL AUTO_INCREMENT,
 `Name` varchar(100) NOT NULL,
 `Title` varchar(50) NOT NULL,
 `Department` varchar(50) NOT NULL,
 `JoinedDate` date NOT NULL,
 `Image` varchar(100) DEFAULT NULL,
 PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4