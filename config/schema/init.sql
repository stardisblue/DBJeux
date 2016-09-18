CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  id_card INTEGER null, -- studentcard mofo
  firstname text not null,
  lastname text not null,
  username text not null,
  password text not null,
  email text not null
);

CREATE TABLE info_books (
  id     INTEGER PRIMARY KEY AUTOINCREMENT,
  title  VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL DEFAULT "",
  isbn   INTEGER          NULL,
  price  INTEGER          NULL,
  nsfw   BOOLEAN         DEFAULT FALSE,
  author VARCHAR(255)
);

CREATE TABLE info_games (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  title VARCHAR(255) not null,
  description VARCHAR(255) not null DEFAULT "",
  isbn int,
  price int,
  nsfw BOOLEAN DEFAULT FALSE,
  author VARCHAR(255) not null
);

CREATE TABLE books (
  id           INTEGER PRIMARY KEY  AUTOINCREMENT,
  info_book_id INTEGER     NOT NULL,
  user_id      INTEGER     NOT NULL,
  allow_borrow BOOLEAN NOT NULL DEFAULT FALSE,

  FOREIGN KEY (info_book_id) REFERENCES info_books (id),
  FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE games (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  info_game_id int not null,
  user_id int not null, -- proprietaire
  allow_borrow BOOLEAN not null DEFAULT FALSE,

  FOREIGN KEY (info_game_id) REFERENCES info_games (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

CREATE TABLE books_users (-- livres empruntés
  book_id    INTEGER,
  user_id    INTEGER,
  date_begin DATE NOT NULL,
  date_end   DATE NOT NULL,

  PRIMARY KEY (book_id, user_id),
  FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

CREATE TABLE games_users (-- jeux empruntés
  game_id    INTEGER,
  user_id    INTEGER,
  date_begin DATE NOT NULL,
  date_end   DATE NOT NULL,
  PRIMARY KEY (game_id, user_id),
  FOREIGN KEY (game_id) REFERENCES games (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);
