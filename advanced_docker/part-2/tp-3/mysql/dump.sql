-- Création de la base de données 'library' s'elle n'existe pas
CREATE DATABASE IF NOT EXISTS library;
USE library;

-- Création de la table USER
CREATE TABLE IF NOT EXISTS USER (
  id INT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  registration_date DATE
);

-- Création de la table BOOK
CREATE TABLE IF NOT EXISTS BOOK (
  id INT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  author VARCHAR(50) NOT NULL,
  publication_year INT,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES USER(id)
);

-- Exemplaires de la table USER
INSERT INTO USER (username, email, registration_date)
SELECT * FROM (
  SELECT 'JohnDoe', 'john@example.com', '2022-01-15' UNION ALL
  SELECT 'JaneSmith', 'jane@example.com', '2021-11-30' UNION ALL
  SELECT 'BobJohnson', 'bob@example.com', '2022-03-05'
) AS temp
WHERE NOT EXISTS (SELECT 1 FROM USER);

-- Exemplaires de la table BOOK
INSERT INTO BOOK (title, author, publication_year, user_id)
SELECT * FROM (
  SELECT 'The Great Gatsby', 'F. Scott Fitzgerald', 1925, 1 UNION ALL
  SELECT 'To Kill a Mockingbird', 'Harper Lee', 1960, 2 UNION ALL
  SELECT '1984', 'George Orwell', 1949, 1 UNION ALL
  SELECT 'Pride and Prejudice', 'Jane Austen', 1813, 2 UNION ALL
  SELECT 'The Catcher in the Rye', 'J.D. Salinger', 1951, 3
) AS temp
WHERE NOT EXISTS (SELECT 1 FROM BOOK);

GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' IDENTIFIED BY 'admin' WITH GRANT OPTION;
FLUSH PRIVILEGES;
