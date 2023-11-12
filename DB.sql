create DATABASE blog;
use blog;

DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
    userId INT UNSIGNED,
    id SERIAL PRIMARY KEY,
    title VARCHAR(255),
    body TEXT
) COMMENT = 'Записи блога';

DROP TABLE IF EXISTS comments;
CREATE TABLE comments (
    postId INT UNSIGNED,
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(40),
    body TEXT
) COMMENT = 'Комментарии к записям';
