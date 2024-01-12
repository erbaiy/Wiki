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
            if ($data) {
                header('Location:../index.php');
            }
        }
    }

    public function selectWiki()
    {

        $objet = new WikiModel();
        $tags = $objet->selectTags();
        $wiki = $objet->selectWiki();
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
        $title = $_POST['wiki_title'];
        $content = $_POST['wiki_content'];
        $date_create = $_POST['date_create'];
        $author_id = $_POST['author_id'];
        $category_id = $_POST['category_id'];
        $tag_id = $_POST['tag_id'];
        if (isset($_POST['submit'])) {

            $addWiki = new WikiModel();
            $result = $addWiki->addWiki($title, $content, $date_create, $author_id, $category_id, $tag_id);


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
        // dump($_GET);
        // die();
        $search = new WikiModel();
        $result = $search->search($title);


        if ($result) {
            echo 'add secess';
        } else {
            echo 'add failed';
        }
    }
}
