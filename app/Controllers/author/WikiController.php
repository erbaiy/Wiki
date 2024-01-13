<?php

namespace App\Controllers\author;

use App\Models\author\WikiModel;

class WikiController
{
    public function deleteWiki()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $objet = new WikiModel();
            $data = $objet->deleteWiki($id);
            // dump($data);
            // die();
            if ($data) {
                header('Location:?route=author');
            } else {
                echo 'the wiki does"nt deleted';
            }
        }
    }

    public function selectWiki()
    {

        $objet = new WikiModel();
        $tags = $objet->selectTags();
        dump($_SESSION['user_id']);
        $wiki = $objet->selectWikiForAuthor($_SESSION['user_id']);
        $category = $objet->selectCategory();

        require('../view/author/author.php');
    }
    public function WikiHome()
    {

        $objet = new WikiModel();

        $wiki = $objet->selectWiki();
        // dump($wiki);
        // die();

        require('../view/index.php');
    }



    public function addWiki()
    {
        $wiki_title = $_POST['wiki_title'];
        $wiki_content = $_POST['wiki_content'];
        $date_create = $_POST['date_create'];
        $author_id = $_POST['author_id'];
        $category_id = $_POST['category_id'];
        $tag_id = $_POST['tag_id'];


        if (isset($_POST['submit'])) {


            $addWiki = new WikiModel();
            $lastID = $addWiki->selectLastId($_SESSION['user_id']);
            // dump($lastID);
            // die();
            foreach ($lastID as $x) {
                // dump($x['wiki_id']);
                $wiki_id = $x['wiki_id'];
                // dump($wiki_id);
            };

            // dump($addWiki->selectLastId($_SESSION['user_id']));
            $result = $addWiki->addWiki($wiki_title, $wiki_content, $date_create, $author_id, $category_id, $tag_id, $wiki_id);
            // dump($result);
            // die();




            if ($result) {
                echo 'add secess';
            } else {
                echo 'add failed';
            }
        }
    }

    public function search()
    {
        $title = $_GET['inp'];

        $search = new WikiModel();
        $result = $search->search($title);

        dump($result);
        // die();
        if ($result) {
            echo '';
        } else {
            echo 'add failed';
        }
    }

    public function selectWikiforUpdate()
    {
        $id = $_GET['id'];


        $user_id = $_SESSION['user_id'];
        $objet = new WikiModel();
        $data = $objet->selectWikiforUpdate($id, $user_id);
        $category = $objet->selectCategory();
        $tags = $objet->selectTags();

        foreach ($data as $row) {
            // dump($id);
        }
        // dump($data);
        require('../view/author/updateWiki.php');
    }



    public function updatWiki()
    {
        $wiki_title = $_POST['wiki_title'];
        $wiki_content = $_POST['wiki_content'];


        $category_id = $_POST['category_id'];
        $tag_id = $_POST['tag_id'];
        $wiki_id = $_POST['wiki_id'];


        if (isset($_POST['submit'])) {
            // echo 'youens';
            // dump($_POST['wiki_id']);
            // die();


            $objet = new WikiModel();
            $objet->deleteTagsHas($wiki_id);

            $objet->updateWiki($wiki_title, $wiki_content, $category_id, $tag_id, $wiki_id);
            // dump($lastID);
            // die();

        }
    }
}
