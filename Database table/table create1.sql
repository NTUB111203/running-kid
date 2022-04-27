CREATE TABLE `category` (
  `c_no` int NOT NULL,
  `c_name` char(4) DEFAULT NULL,
  primary key (`c_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `members` (
  `m_id` int NOT NULL,
  `m_name` varchar(45) DEFAULT NULL,
  `identity` char(2) DEFAULT NULL,
  `gender` char(2) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mail` text,
  `password` varchar(30) DEFAULT NULL,
  `s_no` int DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;