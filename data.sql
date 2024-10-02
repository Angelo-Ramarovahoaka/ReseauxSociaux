USE RamaroFish;

DROP TABLE IF EXISTS reactionsPublications;
DROP TABLE IF EXISTS reactionsComments;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS publications;
DROP TABLE IF EXISTS password_resets;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,    
    sex VARCHAR(100) NOT NULL,
    profile_image VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE password_resets (
    token VARCHAR(64) NOT NULL PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    expires INT NOT NULL
);

CREATE TABLE publications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT,
    image VARCHAR(255),
    publication_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT,
    comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    publication_id INT,
    user_id INT,
    FOREIGN KEY(publication_id) REFERENCES publications(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE reactionsPublications (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    reaction VARCHAR(50),
    reaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    publication_id INT NOT NULL,
    user_id INT,
    FOREIGN KEY(publication_id) REFERENCES publications(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE reactionsComments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reaction VARCHAR(50),
    reaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    publication_id INT NOT NULL,
    comment_id INT NOT NULL,
    user_id INT,
    FOREIGN KEY(publication_id) REFERENCES publications(id),
    FOREIGN KEY(comment_id) REFERENCES comments(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);
