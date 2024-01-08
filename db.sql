CREATE DATABASE Wiki;
USE Wiki;

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    password VARCHAR(255),
    email VARCHAR(255),
    role ENUM('admin', 'author')
);

CREATE TABLE category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description VARCHAR(255)
);

CREATE TABLE wiki (
    wiki_id INT PRIMARY KEY AUTO_INCREMENT,
    wiki_title VARCHAR(255),
    wiki_content VARCHAR(255),
    date_create DATE,
    date_delete DATE,
    author_id INT,
    category_id INT,
    FOREIGN KEY (author_id) REFERENCES users(user_id),
    FOREIGN KEY (category_id) REFERENCES category(category_id)
);

CREATE TABLE tag (
    tag_id INT PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(255)
);

CREATE TABLE wikiTag (
    wiki_id INT,
    tag_id INT,
    PRIMARY KEY (wiki_id, tag_id),
    FOREIGN KEY (wiki_id) REFERENCES wiki(wiki_id),
    FOREIGN KEY (tag_id) REFERENCES tag(tag_id)
);