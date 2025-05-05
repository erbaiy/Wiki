<?php

namespace App\Controllers\author;

use App\Models\author\WikiModel;
use App\Models\Database;

class WikiController
{
    // this conction for delete wikis
    public function deleteWiki()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $objet = new WikiModel();
            $data = $objet->deleteWiki($id); // here you give the function the id of wiki you wanna delelte
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
        $id = $_SESSION['user_id'];

        if (!$id) {
            require('../view/login.php');
            exit();
        } else {
            $wiki = $objet->selectWikiForAuthor($_SESSION['user_id']);
            $category = $objet->selectCategory();
            require('../view/author/author.php');
        }
    }
    public function WikiHome()
    {
        // $objet = new WikiModel();
        // $wiki = $objet->selectWiki();
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
            // $lastID = $addWiki->selectLastId($_SESSION['user_id']);
            // dump($lastID);
            // die();
            // foreach ($lastID as $x) {
            // dump($x['wiki_id']);
            // $wiki_id = $x['wiki_id'];
            // dump($wiki_id);
            // };

            // dump($addWiki->selectLastId($_SESSION['user_id']));
            $result = $addWiki->addWiki($wiki_title, $wiki_content, $date_create, $author_id, $category_id, $tag_id);
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
        foreach ($result as $col) {
?>
            <article class="postcard light yellow">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://picsum.photos/300/300" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h3 class="postcard__title yellow"><a href="#"><?php echo $col["wiki_title"] ?></a></h3>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"><?php echo $col["date_create"] ?></i>
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><?php echo $col["wiki_content"] ?></div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>created by::<?php echo $col["username"] ?></li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>category:<?php echo $col["name"] ?></li>

                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>tags:<?php
                                                                                    foreach ($col['tags'] as $x) {
                                                                                        echo $x['tag_name'] . '<br>';
                                                                                    }
                                                                                    ?></li>

                    </ul>
                </div>
            </article>
<?php }
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
        }

        require('../view/author/updateWiki.php');
    }
    public function updatWiki()
    {
        $wiki_title = $_POST['wiki_title'];
        $wiki_content = $_POST['wiki_content'];


        $category_id = $_POST['category_id'];
        $tag_id = $_POST['tags'];
        $wiki_id = $_POST['wiki_id'];
        if (isset($_POST['submit'])) {
            $objet = new WikiModel();
            $objet->deleteTagsHas($wiki_id);
            $objet->updateWiki($wiki_title, $wiki_content, $category_id, $tag_id, $wiki_id);
        }
    }
}
