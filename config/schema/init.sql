CREATE TABLE users (
  id        INTEGER PRIMARY KEY  AUTOINCREMENT,
  id_card   INTEGER     NULL, -- studentcard mofo
  firstname TEXT        NOT NULL,
  lastname  TEXT        NOT NULL,
  username  TEXT        NOT NULL,
  password  TEXT        NOT NULL,
  role      VARCHAR(20) NOT NULL DEFAULT 'user',
  email     TEXT        NOT NULL
);

CREATE TABLE info_books (
  id          INTEGER PRIMARY KEY   AUTOINCREMENT,
  title       VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL DEFAULT '',
  isbn        INTEGER,
  price       INTEGER,
  nsfw        BOOLEAN               DEFAULT FALSE,
  author      VARCHAR(255)
);

CREATE TABLE info_games (
  id          INTEGER PRIMARY KEY   AUTOINCREMENT,
  title       VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL DEFAULT '',
  isbn        INTEGER,
  price       INTEGER,
  nsfw        BOOLEAN               DEFAULT FALSE,
  author      VARCHAR(255) NOT NULL
);

CREATE TABLE books (
  id           INTEGER PRIMARY KEY AUTOINCREMENT,
  info_book_id INTEGER NOT NULL,
  user_id      INTEGER NOT NULL,
  allow_borrow BOOLEAN NOT NULL    DEFAULT FALSE,
  state        TEXT    NOT NULL    DEFAULT 'good',

  FOREIGN KEY (info_book_id) REFERENCES info_books (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

CREATE TABLE games (
  id           INTEGER PRIMARY KEY AUTOINCREMENT,
  info_game_id INT     NOT NULL,
  user_id      INT     NOT NULL, -- proprietaire
  allow_borrow BOOLEAN NOT NULL    DEFAULT FALSE,
  state        TEXT    NOT NULL    DEFAULT 'good',

  FOREIGN KEY (info_game_id) REFERENCES info_games (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

CREATE TABLE books_users (-- livres empruntés
  book_id    INTEGER,
  user_id    INTEGER,
  date_begin DATE        NOT NULL,
  date_end   DATE        NOT NULL,
  status     VARCHAR(20) NOT NULL,

  PRIMARY KEY (book_id, user_id),
  FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

CREATE TABLE games_users (-- jeux empruntés
  game_id    INTEGER,
  user_id    INTEGER,
  date_begin DATE        NOT NULL,
  date_end   DATE        NOT NULL,
  status     VARCHAR(20) NOT NULL,

  PRIMARY KEY (game_id, user_id),
  FOREIGN KEY (game_id) REFERENCES games (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);
