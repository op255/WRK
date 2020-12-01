<?php

    namespace App\Models;


    class Post extends Model {
        protected $textContent;

        public function getTextContent() {
            return $this->textContent;
        }

        function __construct(int $id = 0) {
            // This part will use PostDB
            $this->id = $id;
            $this->textContent = 'This is text content of post #'.$this->id.'!';
        }

        function uploadPosts($page) {
            return array(
                new Post(1),
                new Post(2),
                new Post(3),
                new Post(4),
                new Post(5),
                new Post(6),
                new Post(7),
                new Post(8),
                new Post(9),
                new Post(10)
            );
        }
    }
?>