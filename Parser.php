<?php
    class Parser
    {
        /** @
         * Свойства 2х json файлов
         *  
         */
        public $postId;
        public $userId;
        public $id;
        public $name;
        public $email;
        public $title;
        public $body;

        public $count = 0;

        public $url;
        private $json;

        function __construct($url)
        {
            $this->url = $url;

            $this->json = file_get_contents($url);
            $this->json = json_decode($this->json, true); 
        }

        function parseAndLoadPosts($conn)
        {
            foreach ($this->json as $key => $value) {
                $this->userId = $value['userId'];
                $this->id = $value['id'];
                $this->title = $value['title'];
                $this->body = $value['body'];

                $sql = "INSERT INTO posts (userId, id, title, body) VALUES 
                ('$this->userId', DEFAULT, '$this->title', '$this->body')";
        
                if(mysqli_query($conn, $sql)) {
                    $this->count++;
                } else {
                    echo "Ошибка: " . mysqli_error($conn);
                }
            }
        }

        function parseAndLoadComments($conn)
        {
            foreach ($this->json as $key => $value) {
                $this->postId = $value['postId'];
                $this->id = $value['id'];
                $this->name = $value['name'];
                $this->email = $value['email'];
                $this->body = $value['body'];

                $sql = "INSERT INTO comments (postId, id, name, email, body) VALUES 
                ('$this->postId', DEFAULT, '$this->name', '$this->email', '$this->body')";
    
                if(mysqli_query($conn, $sql)) {
                    $this->count++;
                } else {
                    echo "Ошибка: " . mysqli_error($conn);
                }
            }
        }
    }
