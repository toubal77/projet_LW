<?php
  class Post {

    public $id;
    public $author;
    public $content;

   // public function __construct($id, $author, $content) {
    //  $this->id      = $id;
    //  $this->author  = $author;
    //  $this->content = $content;
   // }
   public function __construct() {

   }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM posts');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['author'], $post['content']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content']);
    }


        public function getId() {
          return $this->id;
      }
  
      public function setId($id) {
          $this->id = $id;
      }
  

      public function getAuthor() {
          return $this->author;
      }
  
      public function setAuthor($author) {
          $this->author = $author;
      }
  

      public function getContent() {
          return $this->content;
      }
  
      public function setContent($content) {
          $this->content = $content;
      }
  }

?>