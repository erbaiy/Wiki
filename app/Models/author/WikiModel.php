<?php

namespace App\Models\author;

use App\Models\Database;
use PDO;

class WikiModel
{
    public function selectWiki()
    {
        $db =  Database::connect();
        $query = $db->prepare("SELECT * FROM wiki LEFT JOIN category ON wiki.category_id = category.category_id LEFT JOIN users ON users.user_id = wiki.author_id LEFT JOIN wiki_tag ON wiki_tag.wiki_id = wiki.wiki_id LEFT JOIN tag ON tag.tag_id = wiki_tag.tag_id  WHERE date_delete is null limit 2");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);


        return $result;
    }

    // select all the wiki has the same author
    // start
    public function selectWikiForAuthor($id)
    {
        $db =  Database::connect();
        $query = $db->prepare('SELECT * FROM `wiki` WHERE author_id=?');
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // end 

    // select 
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

    public function selectLastId($user_id)
    {
        $db = Database::connect();
        $addtage = $db->prepare('SELECT * FROM `wiki` WHERE author_id=? ORDER BY `wiki`.`wiki_content` ASC LIMIT 1');
        $addtage->execute([$user_id]);

        return $addtage->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addWiki($wiki_title, $wiki_content, $date_create, $author_id, $category_id, $tag_id)
    {
        $db = Database::connect();
        $wiki_query = $db->prepare("INSERT INTO `wiki` (`wiki_title`, `wiki_content`, `date_create`, `author_id`, `category_id`) VALUES (?, ?, ?, ?, ?)");
        $wiki_result = $wiki_query->execute([$wiki_title, $wiki_content, $date_create, $author_id, $category_id]);
        $wiki_id = $db->lastInsertId();
        foreach ($tag_id as $tag) {
            $tag_query = $db->prepare("INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES (?, ?)");
            $tag_result = $tag_query->execute([$wiki_id, $tag]);
        }
        return 'ok';
    }

    // public function search($title)
    // {
    //     $db = Database::connect();
    //     $query = $db->prepare('SELECT * FROM wiki
    //                           LEFT JOIN category ON wiki.category_id = category.category_id
    //                           LEFT JOIN users ON users.user_id = wiki.author_id
    //                           WHERE wiki_title LIKE ? OR tag.tag_name LIKE ? OR category.name LIKE ?');
    //     $query->execute(['%' . $title . '%', '%' . $title . '%', '%' . $title . '%']);
    //     $result = $query->fetchAll();
    //     foreach($result as $item)
    //     {
    //        $query= $db->prepare("SELECT * FROM wiki_tag LEFT JOIN tag ON tag.tag_id = wiki_tag.tag_id WHERE wiki_tag.wiki_id = ?;");
    //        $query->execute([$item['wiki_id']]);
    //        $tags = $query->fetchAll(PDO::FETCH_ASSOC);
    //        $count = 0 ;
    //             foreach ($tags As $tag){
    //                 $item['tag']                     
    //             }



    //     }

    //     return $result;
    // }
    public function search($title)
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT * FROM wiki
                          LEFT JOIN category ON wiki.category_id = category.category_id
                          LEFT JOIN users ON users.user_id = wiki.author_id
                          WHERE wiki_title LIKE ?  OR category.name LIKE ? limit 10');
        $query->execute(['%' . $title . '%', '%' . $title . '%']);
        $result = $query->fetchAll();

        foreach ($result as &$item) {
            $query2 = $db->prepare("SELECT * FROM wiki_tag LEFT JOIN tag ON tag.tag_id = wiki_tag.tag_id WHERE wiki_tag.wiki_id = ?;");
            $query2->execute([$item['wiki_id']]);
            $tags = $query2->fetchAll(PDO::FETCH_ASSOC);
            $item['tags'] = $tags;
        }
        return $result;
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


    // public function updateWiki($wiki_title, $wiki_content, $category_id, $tag_id, $wiki_id)
    // {
    //     $db = Database::connect();
    //     $wiki_query = $db->prepare("UPDATE `wiki` SET `wiki_title` = ?, `wiki_content` = ?, `category_id` = ? WHERE wiki_id = ?");
    //     $wiki_result = $wiki_query->execute([$wiki_title, $wiki_content, $category_id, $wiki_id]);
    //     $tag_query = $db->prepare("INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES (?, ?)");
    //     $tag_result = $tag_query->execute([$wiki_id, $tag_id]);

    //     return 'ok';
    // }


    public function updateWiki($title, $content, $category, $tags, $wiki_id)
    {
        $db = Database::connect();
        $query = $db->prepare('UPDATE wiki set wiki_title=?,wiki_content=? ,category_id=? where wiki_id=?');
        $result = $query->execute([$title, $content, $category, $wiki_id]);
        if ($result) {
            $query2 = $db->prepare('DELETE FROM wiki_tag where wiki_id=? ');
            $delete = $query2->execute([$wiki_id]);
            if ($delete) {
                // dump($tags);
                // die();
                $count = 0;
                foreach ($tags as $tag)
                    $count += 1;
                $query3 = $db->prepare('INSERT into wiki_tag value(?,?)');
                $updt = $query3->execute([$wiki_id, $tag]);
                if ($updt) {
                    dump('work');
                } else {
                    dump('not workd');
                }
            }
        }
        dump($count);
    }
}
