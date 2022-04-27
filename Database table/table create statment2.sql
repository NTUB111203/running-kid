CREATE TABLE `knowledge` (
  `k_no` int NOT NULL,
  `city` char(8) DEFAULT NULL,
  `content` text,
  `difficulty` char(2) DEFAULT NULL,
  PRIMARY KEY (`k_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `record` (
  `r_no` int NOT NULL,
  `m_id` char(8) DEFAULT NULL,
  `r_datetime` datetime DEFAULT NULL,
  `distance` double DEFAULT NULL,
  `c_no` int DEFAULT NULL,
  PRIMARY KEY (`r_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `school` (
  `s_no` int NOT NULL,
  `s_name` varchar(20) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`s_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
