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
    public function updateCategory()
    {

        if (isset($_POST['submit'])) {
            $tags = new TagsModel();
            dump($_POST['inpTag']);
            $tags->updateCategory($_POST['inpTag'], $_POST['Tagid']);
        }
    }
}
