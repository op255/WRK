<?php

    namespace App\Models;

    class Post extends Model {
        
        protected $text_content;
        protected $reply_to;
        protected $img_src;
        protected $parent;
        protected $replies = [];

        public function getContent() { 
            return array(   'id' => $this->id,
                            'text_content' => $this->text_content,
                            'reply_to' => $this->reply_to,
                            'img_src' => $this->img_src,
                            'parent' => $this->parent,
                            'replies' => $this->replies 
                        ); 
        }

        function __construct( $post, $replies=[] ) {

            $this->id = $post['id'];
            $this->text_content = $post['text_content'];
            $this->reply_to = $post['reply_to'];
            $this->img_src = $post['img_src'];
            $this->parent = $post['parent'];
            foreach ($replies as &$post)
                array_push($this->replies, $post->getContent());
        }
    }
?>