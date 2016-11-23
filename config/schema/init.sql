CREATE TABLE users (
  id INTEGER PRIMARY KEY,
  id_card INTEGER NULL UNIQUE, -- studentcard mofo
  firstname VARCHAR(64) NOT NULL,
  lastname VARCHAR(64) NOT NULL,
  username VARCHAR(64) NOT NULL UNIQUE,
  password VARCHAR(64) NOT NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'user',
  email VARCHAR(64) NOT NULL
);

INSERT INTO users (id, id_card, firstname, lastname, username, password, role, email) VALUES (1,null,'Fati','CHEN','stardisblue','$2y$10$.207XH8lsBlrdCa9qw2YWeeMIEZvFFUuRw9D8P/CgHzcdpX.wG61.','admin','im@stardis.blue');

CREATE TABLE object_types (
  id VARCHAR(20) PRIMARY KEY
);

INSERT INTO object_types(id) VALUES ('game');
INSERT INTO object_types(id) VALUES ('book');

CREATE TABLE info_objects (
  id INTEGER PRIMARY KEY,
  object_type_id VARCHAR(20) DEFAULT ('book'),
  title VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL DEFAULT '',
  isbn INTEGER,
  price INTEGER,
  nsfw BOOLEAN DEFAULT FALSE,
  author VARCHAR(255) NOT NULL,

  FOREIGN KEY (object_type_id) REFERENCES object_types (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE item_states (
  id VARCHAR(20) PRIMARY KEY
);

INSERT INTO item_states(id) VALUES ('excellent');
INSERT INTO item_states(id) VALUES ('good');
INSERT INTO item_states(id) VALUES ('average');
INSERT INTO item_states(id) VALUES ('below average');
INSERT INTO item_states(id) VALUES ('bad');

CREATE TABLE objects (
  id INTEGER PRIMARY KEY,
  info_object_id INTEGER NOT NULL DEFAULT ('average'),
  user_id INTEGER NOT NULL,
  allow_borrow BOOLEAN NOT NULL DEFAULT FALSE,
  item_state_id VARCHAR(20) NOT NULL,

  FOREIGN KEY (info_object_id) REFERENCES info_objects (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (item_state_id) REFERENCES item_state (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE borrowed_status ( -- états des emprunts
  id VARCHAR(20) PRIMARY KEY
);

INSERT INTO item_states(id) VALUES ('borrowed');
INSERT INTO item_states(id) VALUES ('damaged');
INSERT INTO item_states(id) VALUES ('lost');
INSERT INTO item_states(id) VALUES ('lost and paid');

CREATE TABLE objects_users (-- livres empruntés
  object_id INTEGER,
  user_id INTEGER,
  date_begin DATE NOT NULL,
  date_end DATE NOT NULL,
  borrowed_status_id VARCHAR(20) NOT NULL DEFAULT ('borrowed'),

  PRIMARY KEY (object_id, user_id),
  FOREIGN KEY (object_id) REFERENCES objects (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (borrowed_status_id) REFERENCES borrowed_status (id) ON DELETE CASCADE ON UPDATE CASCADE
);
