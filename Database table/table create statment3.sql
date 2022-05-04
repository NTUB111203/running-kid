CREATE TABLE `score` (
  `m_id` int NOT NULL,
  `datetime` datetime NOT NULL,
  `score` int,
  `c_no` int,
  PRIMARY KEY (`m_id`,`datetime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `coin` (
  `m_id` int NOT NULL,
  `datetime` datetime NOT NULL,
  `coin` int,
  `c_no` int,
  PRIMARY KEY (`m_id`,`datetime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `group` (
  `g_no` int NOT NULL,
  `startTime` datetime NOT NULL,
  `mem1` int,
  `mem2` int,
  `mem3` int,
  `mem4` int,
  `mem5` int,
  `endTime` datetime NOT NULL,
  PRIMARY KEY (`g_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;