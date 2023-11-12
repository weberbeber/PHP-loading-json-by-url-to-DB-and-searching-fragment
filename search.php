<?php
    require_once 'Connection.php';
    
    function search($query) 
    { 
        $query = trim($query); 
        $query = htmlspecialchars($query);

        $sql = "SELECT posts.title, comments.name, comments.body 
                FROM posts JOIN comments
                ON posts.id = comments.postId
                WHERE LOCATE('$query', comments.body) > 0;";

        return $sql;
    }

    if (!empty($_POST['query'])) { 
        $connection = new Connection('localhost', 'root', '', 'blog');
        $connection->connOpening();

        $search_result = search($_POST['query']); 

        $result = mysqli_query($connection->connection, $search_result);
        if($result) {
            while ($rowData = $result->fetch_assoc()) {
                echo 'Заголовок записи: ' . $rowData['title'] . '<br>';
                echo 'Имя: ' . $rowData['name'] . '<br>';
                echo 'Комментарий: ' . $rowData['body'] . '<br><br>';
            }
        } else {
            echo "Ошибка: " . mysqli_error($connection->connection);
        }

        $connection->connClosing();
    }