<?php

namespace App\Models\author;

use App\Models\Database;
use PDO;

class WikiModel
{
    public function selectWiki()
    {
        $db =  Database::connect();
        // $query = $db->prepare('SELECT * FROM `wiki` WHERE author_id=?');
        // $query = $db->prepare("SELECT * FROM wiki INNER JOIN category ON wiki.category_id = category.category_id INNER JOIN users ON users.user_id = wiki.author_id INNER JOIN wiki_tag ON wiki_tag.wiki_id = wiki.wiki_id INNER JOIN tag ON tag.tag_id = wiki_tag.tag_id");
        $query = $db->prepare("SELECT * FROM wiki LEFT JOIN category ON wiki.category_id = category.category_id LEFT JOIN users ON users.user_id = wiki.author_id LEFT JOIN wiki_tag ON wiki_tag.wiki_id = wiki.wiki_id LEFT JOIN tag ON tag.tag_id = wiki_tag.tag_id");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // public function addWikiTag($tag_id)
    // {
    //     $db =  Database::connect();
    //     $query = $db->prepare('');
    //     $result =  $query->execute([$tag_id]);
    //     return $result;
    // }
    public function selectWikiForAuthor($id)
    {
        $db =  Database::connect();
        $query = $db->prepare('SELECT * FROM `wiki` WHERE author_id=?');
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function selectTags()
    {
        $db =  Database::connect();
        $query = $db->prepare('SELECT * FROM tag');
        $query->execute();
        $tags = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tags;
    }
    public function deleteWiki($id)
    {
        $db =  Database::connect();
        $query = $db->prepare('DELETE FROM wiki where wiki_id=?');
        $query->execute([$id]);
        return true;
    }
    public function selectCategory()
    {
        $db =  Database::connect();
        $query = $db->prepare('SELECT * FROM category');
        $query->execute();
        $category = $query->fetchAll(PDO::FETCH_ASSOC);
        return $category;
    }
    // public function addWiki($wiki_title, $wiki_content, $date_create, $author_id, $category_id, $tag_id)
    // {

    //     $db = Database::connect();
    //     $query = $db->prepare("INSERT INTO `wiki` (`wiki_title`, `wiki_content`, `date_create`, `author_id`, `category_id`) VALUES (?, ?, ?, ?, ?);
    //     INSERT INTO `wiki_tag`(tag_id) values(?);");
    //     $result = $query->execute([$wiki_title, $wiki_content, $date_create, $author_id, $category_id, $tag_id]);
    //     $db = null;
    //     return $result;
    // }

    //6-------------------------------------------------------------------

    public function selectLastId($user_id)
    {
        $db = Database::connect();
        $addtage = $db->prepare('SELECT * FROM `wiki` WHERE author_id=? ORDER BY `wiki`.`wiki_content` ASC LIMIT 1');
        $addtage->execute([$user_id]);

        return $addtage->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addWiki($wiki_title, $wiki_content, $date_create, $author_id, $category_id, $tag_id, $wiki_id)
    {
        $db = Database::connect();

        $wiki_query = $db->prepare("INSERT INTO `wiki` (`wiki_title`, `wiki_content`, `date_create`, `author_id`, `category_id`) VALUES (?, ?, ?, ?, ?)");
        $wiki_result = $wiki_query->execute([$wiki_title, $wiki_content, $date_create, $author_id, $category_id]);

        $wiki_id = $db->lastInsertId(); // Assuming `$wiki_id` is an auto-incremented column

        $tag_query = $db->prepare("INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES (?, ?)");
        $tag_result = $tag_query->execute([$wiki_id, $tag_id]);

        return 'ok';
    }

    public function search($title)
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT * FROM wiki WHERE wiki_title LIKE ?');
        $query->execute(['%' . $title . '%']);

        return $query->fetchAll();
    }



    public function selectWikiforUpdate($wiki_id, $user_id)
    {
        $db =  Database::connect();
        $query = $db->prepare("SELECT * FROM wiki LEFT JOIN category ON wiki.category_id = category.category_id LEFT JOIN users ON users.user_id = wiki.author_id LEFT JOIN wiki_tag ON wiki_tag.wiki_id = wiki.wiki_id LEFT JOIN tag ON tag.tag_id = wiki_tag.tag_id  WHERE wiki.wiki_id=? AND users.user_id=?
        ");

        $query->execute([$wiki_id, $user_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteTagsHas($wiki_id)
    {
        $db = Database::connect();
        $query = $db->prepare('DELETE FROM wiki_tag WHERE wiki_id = ?');
        $query->execute([$wiki_id]);
        return true;
    }


    public function updateWiki($wiki_title, $wiki_content, $category_id, $tag_id, $wiki_id)
    {
        $db = Database::connect();

        $wiki_query = $db->prepare("UPDATE `wiki` SET `wiki_title` = ?, `wiki_content` = ?, `category_id` = ? WHERE wiki_id = ?");
        $wiki_result = $wiki_query->execute([$wiki_title, $wiki_content, $category_id, $wiki_id]);


        echo "";
        dump([$wiki_title, $wiki_content, $category_id, $wiki_id]);

        echo '<br>';
        echo $tag_id;
        $tag_query = $db->prepare("INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES (?, ?)");
        $tag_result = $tag_query->execute([$wiki_id, $tag_id]);

        return 'ok';
    }

    // public function updateWiki($wiki_title, $wiki_content, $category_id, $tag_id, $wiki_id)
    // {
    //     $db = Database::connect();


    //     // $wiki_query = $db->prepare("UPDATE `wiki` SET `wiki_title` = ?, `wiki_content` = ?, `category_id` = ? WHERE wiki_id = ?");
    //     // $wiki_result = $wiki_query->execute([$wiki_title, $wiki_content, $category_id, $wiki_id]);


    //     $tag_query = $db->prepare("INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES (?, ?)");

    //     // echo "INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES (?, ?)";
    //     // // echo $wiki_id;

    //     // echo '<br>';
    //     // echo $tag_id;

    //     $tag_result = $tag_query->execute([$wiki_id, $tag_id]);

    //     return 'ok';
    // }

}
