<?php

    namespace App\Models;

    class Post extends Model {
        protected $text_content;
        protected $reply_to;
        protected $img_src;
        protected $parent;

        public function getTextContent() { return $this->textContent; }
        public function getReplyTo() { return $this->reply_to; }
        public function getImgSrc() { return $this->img_src; }
        public function getParent() { return $this->parent; }

        function __construct(   $id, 
                                $text_contenet, 
                                $reply_to = 0, 
                                $img_src = "",
                                $parent = 0) 
        {

            $this->id = $id;
            $this->textContent = $this->text_content;
            $this->reply_to = $reply_to;
            $this->img_src = $img_src;
            $this->parent = $parent;
        }
    }
?>