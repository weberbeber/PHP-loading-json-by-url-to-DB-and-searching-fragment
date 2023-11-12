<?php
    require_once 'Connection.php';
    require_once 'Parser.php';

    $posts = new Parser('https://jsonplaceholder.typicode.com/posts');
    $comments = new Parser('https://jsonplaceholder.typicode.com/comments');

    $connection = new Connection('localhost', 'root', '', 'blog');
    $connection->connOpening();

    $posts->parseAndLoadPosts($connection->connection);
    $comments->parseAndLoadComments($connection->connection);

    echo 'Загружено ' . $posts->count . ' записей и ' . $comments->count . ' комментариев';

    $connection->connClosing();
    