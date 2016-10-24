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
  id            INTEGER PRIMARY KEY AUTOINCREMENT,
  info_book_id  INTEGER NOT NULL,
  user_id       INTEGER NOT NULL,
  allow_borrow  BOOLEAN NOT NULL    DEFAULT FALSE,
  item_state_id INTEGER NOT NULL,

  FOREIGN KEY (info_book_id) REFERENCES info_books (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (item_state_id) REFERENCES item_state (id) ON DELETE CASCADE
);

CREATE TABLE games (
  id           INTEGER PRIMARY KEY AUTOINCREMENT,
  info_game_id  INTEGER NOT NULL,
  user_id       INTEGER NOT NULL, -- proprietaire
  allow_borrow  BOOLEAN NOT NULL    DEFAULT FALSE,
  item_state_id INTEGER NOT NULL,

  FOREIGN KEY (info_game_id) REFERENCES info_games (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (item_state_id) REFERENCES item_state (id) ON DELETE CASCADE
);

CREATE TABLE item_state (
  id INTEGER PRIMARY KEY,
  state VARCHAR(50) NOT NULL
)

CREATE TABLE books_users (-- livres empruntés
  book_id    INTEGER,
  user_id    INTEGER,
  date_begin DATE        NOT NULL,
  date_end   DATE        NOT NULL,
  borrowed_status_id     VARCHAR(20) NOT NULL,

  PRIMARY KEY (book_id, user_id),
  FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (borrowed_status_id) REFERENCES borrowed_status (id) ON DELETE CASCADE
);

CREATE TABLE games_users (-- jeux empruntes
  game_id    INTEGER,
  user_id    INTEGER,
  date_begin DATE        NOT NULL,
  date_end   DATE        NOT NULL,
  borrowed_status_id     INTEGER NOT NULL,

  PRIMARY KEY (game_id, user_id),
  FOREIGN KEY (game_id) REFERENCES games (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (borrowed_status_id) REFERENCES borrowed_status (id) ON DELETE CASCADE
);

CREATE TABLE borrowed_status ( -- états des emprunts
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  status VARCHAR(50) NOT NULL
)
