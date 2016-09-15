CREATE TABLE info_books (
  id     INT PRIMARY KEY AUTOINCREMENT,
  title  VARCHAR(255) NOT NULL,
  isbn   INT          NULL,
  price  INT          NULL,
  nsfw   BOOLEAN         DEFAULT FALSE,
  author VARCHAR(255)
);

CREATE TABLE books (
  id           INT PRIMARY KEY  AUTOINCREMENT,
  info_book_id INT     NOT NULL,
  user_id      INT     NOT NULL,
  allow_borrow BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE users (
  id INT PRIMARY KEY, -- student card motherfocker
  firstname text not null,
  lastname text not null,
  username text not null,
  password text not null,
  email text not null

);

CREATE TABLE info_games (
  id INT PRIMARY KEY AUTOINCREMENT
);

CREATE TABLE games (
  id INT PRIMARY KEY AUTOINCREMENT
);

CREATE TABLE books_users (-- livres empruntés
  book_id    INT,
  user_id    INT,
  date_begin DATE NOT NULL,
  date_end   DATE NOT NULL,
  PRIMARY KEY (book_id, user_id),
  FOREIGN KEY (book_id) REFERENCES books (id),
  FOREIGN KEY (user_id) REFERENCES users (id)
);