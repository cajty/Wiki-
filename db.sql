
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(30),
    isAdmin BOOLEAN
) engine = innodb;

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30)
) engine = innodb;

CREATE TABLE wikis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    content VARCHAR(15535),
    visibility BOOLEAN,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users (id),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories (id)
) engine = innodb;

CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30)
) engine = innodb;

CREATE TABLE wikiTags (
    wiki_id INT,
    FOREIGN KEY (wiki_id) REFERENCES wikis (id),
    tag_id INT,
    FOREIGN KEY (tag_id) REFERENCES tags (id)
) engine = innodb;
