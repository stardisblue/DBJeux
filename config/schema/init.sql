CREATE TABLE users (
  id        INTEGER PRIMARY KEY,
  id_card   INTEGER     NULL UNIQUE, -- studentcard mofo
  firstname VARCHAR(64) NOT NULL,
  lastname  VARCHAR(64) NOT NULL,
  username  VARCHAR(64) NOT NULL UNIQUE,
  password  VARCHAR(64) NOT NULL,
  role      VARCHAR(20) NOT NULL DEFAULT 'user',
  email     VARCHAR(64) NOT NULL
);

INSERT INTO users (id, id_card, firstname, lastname, username, password, role, email) VALUES
  (1, NULL, 'Fati', 'CHEN', 'stardisblue', '$2y$10$.207XH8lsBlrdCa9qw2YWeeMIEZvFFUuRw9D8P/CgHzcdpX.wG61.', 'admin',
   'im@stardis.blue');

CREATE TABLE thing_types (
  id   INTEGER PRIMARY KEY,
  name VARCHAR(20) UNIQUE
);

INSERT INTO thing_types (name) VALUES ('game');
INSERT INTO thing_types (name) VALUES ('book');

CREATE TABLE info_things (
  id             INTEGER PRIMARY KEY,
  thing_type_id INTEGER      NOT NULL,
  title          VARCHAR(255) NOT NULL,
  description    VARCHAR(255) NOT NULL DEFAULT '',
  isbn           INTEGER,
  price          INTEGER,
  nsfw           BOOLEAN               DEFAULT FALSE,
  author         VARCHAR(255) NOT NULL,

  FOREIGN KEY (thing_type_id) REFERENCES thing_types (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE item_states (
  id   INTEGER PRIMARY KEY,
  name VARCHAR(20) UNIQUE
);

INSERT INTO item_states (name) VALUES ('excellent');
INSERT INTO item_states (name) VALUES ('good');
INSERT INTO item_states (name) VALUES ('average');
INSERT INTO item_states (name) VALUES ('below average');
INSERT INTO item_states (name) VALUES ('bad');

CREATE TABLE things (
  id             INTEGER PRIMARY KEY,
  info_thing_id INTEGER NOT NULL DEFAULT ('average'),
  user_id        INTEGER NOT NULL,
  allow_borrow   BOOLEAN NOT NULL DEFAULT FALSE,
  item_state_id  INTEGER NOT NULL,

  FOREIGN KEY (info_thing_id) REFERENCES info_things (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (item_state_id) REFERENCES item_states (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE borrowed_status (-- états des emprunts
  id   INTEGER PRIMARY KEY,
  name VARCHAR(20) UNIQUE
);

INSERT INTO borrowed_status (name) VALUES ('borrowed');
INSERT INTO borrowed_status (name) VALUES ('damaged');
INSERT INTO borrowed_status (name) VALUES ('lost');
INSERT INTO borrowed_status (name) VALUES ('lost and paid');

CREATE TABLE things_users (-- livres empruntés
  thing_id          INTEGER,
  user_id            INTEGER,
  date_begin         DATE    NOT NULL,
  date_end           DATE    NOT NULL,
  borrowed_status_id INTEGER NOT NULL,

  PRIMARY KEY (thing_id, user_id),
  FOREIGN KEY (thing_id) REFERENCES things (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (borrowed_status_id) REFERENCES borrowed_status (id) ON DELETE CASCADE ON UPDATE CASCADE
);
