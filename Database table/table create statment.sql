CREATE TABLE `members` (
  `m_id` int NOT NULL,
  `m_name` varchar(45) DEFAULT NULL,
  `identity` char(2) NOT NULL,
  `gender` char(2) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mail` text,
  `password` varchar(30) DEFAULT NULL,
  `s_no` int DEFAULT NULL,
  `class` int DEFAULT NULL,
  `enrollment` int DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `category` (
  `c_no` int NOT NULL,
  `c_name` char(4) DEFAULT NULL,
  primary key (`c_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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


CREATE TABLE `class` (
  `class_no` int NOT NULL,
  `semester` char(10) NOT NULL,
  `grade` int,
  `class` int,
  PRIMARY KEY (`class_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `student_class` (
  `sc_no` int NOT NULL,
  `m_id` int NOT NULL,
  `grade1` int,
  `grade2` int,
  `grade3` int,
  `grade4` int,
  `grade5` int,
  `grade6` int,
  PRIMARY KEY (`sc_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `question` (
  `q_no` int NOT NULL,
  `content` text NOT NULL,
  `items` text,
  `answer` int,
  `difficulty` char(5),
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `answer` (
  `a_no` int NOT NULL,
  `answer_content` text NOT NULL,
  PRIMARY KEY (`a_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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