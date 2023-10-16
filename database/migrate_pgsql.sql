-- IF postgres is installed, use it
CREATE TABLE IF NOT EXISTS users(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS words(
    id SERIAL PRIMARY KEY,
    content VARCHAR(255),
    tip VARCHAR(255),
    level INTEGER
);
-- If mysql is installed, use it

CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS words(
    id INT AUTO_INCREMENT PRIMARY KEY,
    content VARCHAR(255),
    tip VARCHAR(255),
    level INTEGER
);
