-- phpMyAdmin SQL Dump
-- version 5.1.1
-- SQLINES DEMO *** admin.net/
--
-- Host: localhost
-- SQLINES DEMO *** Jan 07, 2023 at 07:50 AM
-- SQLINES DEMO *** 0.4.21-MariaDB
-- PHP Version: 7.4.24

/* SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; */
START TRANSACTION;
time_zone := "+00:00";


/* SQLINES DEMO *** ARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/* SQLINES DEMO *** ARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/* SQLINES DEMO *** LLATION_CONNECTION=@@COLLATION_CONNECTION */;
/* SQLINES DEMO *** tf8mb4 */;

--
-- Database: `phptest`
--

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `authors`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE authors (
  id int NOT NULL,
  AuthorName varchar(255) NOT NULL,
  CREATED_AT timestamp(0) NOT NULL DEFAULT current_timestamp()
) ;

--
-- SQLINES DEMO *** table `authors`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO authors (id, AuthorName, CREATED_AT) VALUES
(1, 'Pavel Vejinov', '2022-12-17 16:27:37'),
(2, 'Ivan Penev', '2022-12-17 16:27:37'),
(3, 'Tove', '2022-12-17 16:54:18'),
(4, 'Tove', '2022-12-17 16:55:10'),
(5, 'Isak Azimov', '2022-12-17 16:59:41'),
(6, 'Isak Azim', '2022-12-17 17:08:53');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `books`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE books (
  id int NOT NULL,
  bookname varchar(255) NOT NULL,
  authorid int NOT NULL
) ;

--
-- SQLINES DEMO *** table `books`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO books (id, bookname, authorid) VALUES
(1, 'Book1', 1),
(2, 'Book2', 1),
(3, 'Book3', 4),
(4, 'Book3', 4),
(5, 'End of spirit', 5),
(6, 'End of spirit', 5),
(7, 'Begin of spirit', 6);

--
-- SQLINES DEMO *** d tables
--

--
-- SQLINES DEMO ***  `authors`
--
ALTER TABLE authors
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  `books`
--
ALTER TABLE books
  ADD PRIMARY KEY (id),
  ADD KEY authorid (authorid);

--
-- SQLINES DEMO *** r dumped tables
--

--
-- SQLINES DEMO *** r table `authors`
--
ALTER TABLE authors
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- SQLINES DEMO *** r table `books`
--
ALTER TABLE books
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- SQLINES DEMO *** umped tables
--

--
-- SQLINES DEMO *** able `books`
--
ALTER TABLE books
  ADD CONSTRAINT books_ibfk_1 FOREIGN KEY (authorid) REFERENCES authors (id);
COMMIT;

/* SQLINES DEMO *** ER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/* SQLINES DEMO *** ER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/* SQLINES DEMO *** ON_CONNECTION=@OLD_COLLATION_CONNECTION */;
