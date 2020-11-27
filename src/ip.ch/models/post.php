<?php
    class Post extends Model {
        protected $id;

        public function getId() { return $this->id; }

        function __construct($id) {
            $this->id = $id;
        }
    }
?>