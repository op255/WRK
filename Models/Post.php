<?php

    namespace App\Models;

    use App\Repos\PostRepository;

    class Post extends Model {
        
        protected $text_content;
        protected $reply_to;
        protected $img_src;
        protected $parent;
        protected $replies;

        public function get() { return array(   'id' => $this->id,
                                                'text_content' => $this->text_content,
                                                'reply_to' => $this->reply_to,
                                                'img_src' => $this->img_src,
                                                'parent' => $this->parent,
                                                'replies' => $this->replies ); 
        }

        function __construct( $post ) {
            $this->id = $post['id'];
            $this->text_content = $post['text_content'];
            $this->reply_to = $post['reply_to'];
            $this->img_src = $post['img_src'];
            $this->parent = $post['parent'];

            $repo = new PostRepository();
            $this->replies = $repo->getReplies($this->id);
        }
    }
?>