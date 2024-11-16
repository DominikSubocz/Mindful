DROP DATABASE IF EXISTS mindful;
CREATE DATABASE mindful;

CREATE TABLE mindful.books (
  book_id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(128) NOT NULL,
  author VARCHAR(48) NOT NULL,
  tags TEXT,
  price DECIMAL(8, 2) NOT NULL,
  filename VARCHAR(64)
);

CREATE TABLE mindful.draftpost (
  draftPostId INT PRIMARY KEY,
  heading VARCHAR(128) NOT NULL,
  sub_heading VARCHAR(128),
  content LONGTEXT
);

INSERT INTO mindful.books (title, author, tags, price, filename) VALUES
("Complete Fairy Tales", "Hans Christian Andersen", "fairy tales, folklore, children's literature", 8.99, "fairy-tales.jpg"),
("Faust", "Johann Wolfgang von Goethe", "classic, tragedy, philosophy", 10.49, "faust.jpg"),
("Great Expectations", "Charles Dickens", "classic, novel, coming-of-age", 7.99, "great-expectations.jpg"),
("Gulliver's Travels", "Jonathan Swift", "satire, adventure, travel", 8.49, "gullivers-travels.jpg"),
("Hamlet", "William Shakespeare", "drama, tragedy, classic", 7.49, "hamlet.jpg"),
("History: A Novel", "Elsa Morante", "historical fiction, war, Italy", 9.99, "history.jpg"),
("Hunger", "Knut Hamsun", "novel, psychological, modernist", 6.99, "hunger.jpg"),
("Independent People", "Halldor Laxness", "Icelandic, novel, rural", 8.99, "independent-people.jpg"),
("Invisible Man", "Ralph Ellison", "novel, African American, social issues", 7.99, "invisible-man.jpg"),
("King Lear", "William Shakespeare", "drama, tragedy, classic", 8.99, "king-lear.jpg"),
("Leaves of Grass", "Walt Whitman", "poetry, American, transcendentalism", 8.49, "leaves-of-grass.jpg"),
("Love in the Time of Cholera", "Gabriel Garcia Marquez", "romance, magical realism, Latin American", 9.49, "love-in-the-time-of-cholera.jpg"),
("Medea", "Euripedes", "drama, tragedy, Greek", 6.99, "medea.jpg"),
("Memoirs of Hadrian", "Marguerite Yourcenar", "historical fiction, biography, Roman Empire", 7.99, "memoirs-of-hadrian.jpg"),
("Middlemarch", "George Eliot", "novel, classic, Victorian", 9.99, "middlemarch.jpg"),
("Midnight's Children", "Salman Rushdie", "novel, magical realism, Indian", 10.49, "midnights-children.jpg"),
("Moby Dick", "Herman Melville", "novel, adventure, sea", 8.49, "moby-dick.jpg"),
("Mrs Dalloway", "Virginia Woolf", "novel, modernist, stream of consciousness", 9.99, "mrs-dalloway.jpg"),
("Nineteen Eighty-Four", "George Orwell", "dystopian, political, novel", 8.99, "nineteen-eighty-four.jpg");


CREATE TABLE mindful.users (
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(32) UNIQUE NOT NULL,
  email VARCHAR(128) NOT NULL,
  password VARCHAR(60) NOT NULL,
  user_role VARCHAR(24) NOT NULL DEFAULT "Member"
);

CREATE TABLE mindful.postcodes (
  postcode VARCHAR(8) PRIMARY KEY,
  town VARCHAR(32) NOT NULL,
  county VARCHAR(32) NOT NULL
);

CREATE TABLE mindful.orders (
  order_id INT NOT NULL,
  book_id INT NOT NULL,
  user_id INT NOT NULL,
  quantity INT NOT NULL,
  order_date DATETIME NOT NULL,
  address_line VARCHAR(64) NOT NULL,
  postcode VARCHAR(8) NOT NULL,

  PRIMARY KEY(order_id, book_id, user_id),

  FOREIGN KEY (book_id) REFERENCES books(book_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (postcode) REFERENCES postcodes(postcode)
);

CREATE TABLE mindful.tags(
  tag_id INT NOT NULL AUTO_INCREMENT,
  tag_name VARCHAR(200) NOT NULL,
  PRIMARY KEY(tag_id)
);

INSERT INTO mindful.tags (tag_name) VALUES
("fairy tales"),
("folklore"),
("children's literature"),
("classic"),
("tragedy"),
("philosophy"),
("novel"),
("coming-of-age"),
("satire"),
("adventure"),
("travel"),
("drama"),
("tragedy"),
("classic"),
("historical fiction"),
("war"),
("Italy"),
("psychological"),
("modernist"),
("Icelandic"),
("rural"),
("african american"),
("social issues"),
("poetry"),
("American"),
("transcendentalism"),
("romance"),
("magical realism"),
("Latin American"),
("Greek"),
("historical fiction"),
("biography"),
("Roman Empire"),
("Victorian"),
("Indian"),
("sea"),
("stream of consciousness"),
("dystopian"),
("political");

UPDATE mindful.users
SET user_role = 'Admin'
WHERE user_id = 1;

