DROP DATABASE IF EXISTS demodb;

CREATE DATABASE demodb;

GRANT ALL on demodb.* TO webuser@localhost IDENTIFIED BY 'password';

USE demodb;

DROP TABLE IF EXISTS tbl_categories;
CREATE TABLE tbl_categories (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	description VARCHAR(255)
);

INSERT INTO tbl_categories (name, description) VALUES ('Web Development', 'Books about Web Development');
INSERT INTO tbl_categories (name, description) VALUES ('Networking', 'Books about computer networking');
INSERT INTO tbl_categories (name, description) VALUES ('Math', 'Books about Mathematics');
INSERT INTO tbl_categories (name, description) VALUES ('Programming', 'Books about Computer Programming');

DROP TABLE IF EXISTS tbl_books;
CREATE TABLE tbl_books (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	isbn VARCHAR(17) NOT NULL,
	author VARCHAR(255) NOT NULL,
	description TEXT,
	price FLOAT(4,2),
        category_id INT NOT NULL
);

INSERT INTO tbl_books (title, isbn, author, description, price, category_id) 
	VALUES ('PHP In Action', '978-1932394757', 'Dagfinn Reiersol, Chris Shiflett, Marcus Baker', 'A very great book about PHP', 35.00, 1);
INSERT INTO tbl_books (title, isbn, author, description, price, category_id) 
	VALUES ('Spring In Action', '978-1935182351', 'Craig Walls', 'A very great book about the Spring Framework', 34.50, 1);
INSERT INTO tbl_books (title, isbn, author, description, price, category_id) 
	VALUES ('PHP and MySQL Web Development', '978-0672329166', 'Luke Welling, Laura Thomson', 'A very great book about PHP. It is an intermediary book.', 39.99, 1);
	