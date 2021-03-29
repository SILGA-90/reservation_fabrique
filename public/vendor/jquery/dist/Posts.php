<?php

class Posts
{

    public $id;
    public $title;
    public $sentence;
    public $content;
    public $date;
    public $user;
    public $category;


    //   Posts constructor.


    function __construct($id)
    {

        global $db;

        $id = str_secur($id);

        $reqPost = $db->prepare('
                SELECT p.*, us.firstname, us.lastname, c.name AS category
                FROM posts p 
                INNER JOIN users us ON us.id = p.user_id
                INNER JOIN categories c ON c.id = p.category_id
                WHERE p.id = ?
            ');
        $reqPost->execute([$id]);
        $data = $reqPost->fetch();

        $this->id = $id;
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->sentence = $data['sentence'];
        $this->date = $data['date'];
        $this->user = $data['firstname'] . ' ' . $data['lastname'];
        $this->category = $data['category'];
    }


    //  Envoie toutes les publications


    static function getAllPosts()
    {

        global $db;

        $reqPosts = $db->query('
            SELECT p.*, us.firstname, us.lastname, c.name AS category
            FROM posts p 
            INNER JOIN users us ON us.id = p.user_id
            INNER JOIN categories c ON c.id = p.category_id
            ORDER BY id DESC
            LIMIT 0,5
            ');
        return $reqPosts->fetchAll();
    }


    //   Envoie toutes les dernières publications


    static function getLastPost($category = null)
    {

        global $db;

        if ($category == null) {
            $reqPost = $db->prepare('
                    SELECT p.*, us.firstname, us.lastname, c.name AS category
                    FROM posts p 
                    INNER JOIN users us ON us.id = p.user_id
                    INNER JOIN categories c ON c.id = p.category_id
                    ORDER BY id DESC
                    
                ');
            $reqPost->execute([]);
        } else {
            $reqPost = $db->prepare('
                    SELECT p.*, us.firstname, us.lastname, c.name AS category
                    FROM posts p 
                    INNER JOIN users us ON us.id = p.user_id
                    INNER JOIN categories c ON c.id = p.category_id
                    WHERE c.id = ?
                    ORDER BY id DESC
                    LIMIT 7
                ');
            $reqPost->execute([str_secur($category)]);
        }

        return $reqPost->fetch();
    }

    //   Envoie toutes les publications par catégorie

    static function getPostsBy($id)
    {
        global $db;

        $reqPostBy = $db->prepare('
            SELECT p.*, us.firstname, us.lastname, c.name AS category
            FROM posts p 
            INNER JOIN users us ON us.id = p.user_id
            INNER JOIN categories c ON c.id = p.category_id
            WHERE c.id = ?
            ORDER BY id DESC
           
            ');

        $reqPostBy->execute([$id]);
        return $reqPostBy->fetchAll();
       
        
       
    }


    //   Envoie UNE publication


    static function getOnePost($category)
    {

        global $db;

        $reqPost = $db->prepare('
            SELECT p.*, us.firstname, us.lastname, c.name AS category
            FROM posts p 
            INNER JOIN users us ON us.id = p.user_id
            INNER JOIN categories c ON c.id = p.category_id
            WHERE p.id = ?
            ORDER BY id DESC
            LIMIT 1
            ');

        $reqPost->execute([str_secur($category)]);
        return $reqPost->fetch();
    }

    static function Insert_Data($data)
    {
        global $db;

        $reqPost = $db->prepare("INSERT INTO posts(title, content, user_id, category_id) VALUES (?, ?,?,?)");
        $reqPost->execute($data);
        return $reqPost;
    }
}
