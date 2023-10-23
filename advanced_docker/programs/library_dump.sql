-- Création de la base de données 'library' s'elle n'existe pas
CREATE DATABASE IF NOT EXISTS library;
USE library;

DROP TABLE IF EXISTS BOOK;
DROP TABLE IF EXISTS USER;


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
INSERT INTO USER (id, username, email, registration_date)
VALUES
  (1, 'JohnDoe', 'john@example.com', '2022-01-15'),
  (2, 'JaneSmith', 'jane@example.com', '2021-11-30'),
  (3, 'BobJohnson', 'bob@example.com', '2022-03-05');

-- Exemplaires de la table BOOK
INSERT INTO BOOK (id, title, author, publication_year, user_id)
VALUES
  (1, 'The Great Gatsby', 'F. Scott Fitzgerald', 1925, 1),
  (2, 'To Kill a Mockingbird', 'Harper Lee', 1960, 2),
  (3, '1984', 'George Orwell', 1949, 1),
  (4, 'Pride and Prejudice', 'Jane Austen', 1813, 2),
  (5, 'The Catcher in the Rye', 'J.D. Salinger', 1951, 3);
