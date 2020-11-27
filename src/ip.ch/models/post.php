<?php
    class Post extends Model {
        protected $id;
        protected $textContent;

        public function getId() { return $this->id; }
        public function getTextContent() {
            return $this->textContent;
        }

        function __construct($id) {
            // This part will use PostDB
            $this->id = $id;
            $this->textContent = 'This is text content of post #'.$this->id.'!';
        }
    }

    function uploadPosts($page) {
        return array(
            new Post(1),
            new Post(2),
            new Post(3),
            new Post(4),
            new Post(5),
            new Post(6)
        );
    }
?>