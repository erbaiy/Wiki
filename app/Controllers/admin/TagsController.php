<?php

namespace App\Controllers\admin;

use App\Models\admin\TagsModel;

class TagsController
{
    public function getTags()
    {
        $tags = new TagsModel();
        $fetch = $tags->getTags();

        // $tagTable = [];
        if ($fetch) {

            header('Content-typ:application/json');
            echo json_encode($fetch);
        } else {
            echo 'eror';
        }
    }
    public function deleteTags()
    {

        if (isset($_GET['id'])) {
            $tags = new TagsModel();
            $tags->deleteTags($_GET['id']);
        }
    }
    public function updateTags()
    {
        echo 'work';
        dump($_POST['inpTag']);
        echo 'youness';
        // die();   
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            $tagId = $_POST["Tagid"];
            $tagName = $_POST["inpTag"];

            // die();


            $tags = new TagsModel();

            $tags->updateTags($_POST['inpTag'], $_POST['Tagid']);
        }
    }
}
