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
        // dump($_SERVER['REQUEST_METHOD']);
        // die();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $name = $_GET['name'];
            $tags = new TagsModel();
            $response = $tags->updateTags($name, $id);
            // dump($);
            // die();
            if ($response) {
                header('location:?route=selectData');
                // header('Content-typ:application/json');
                // echo json_encode($response);
            } else {
                http_response_code(404);
            }

            // $response = array('
        }
    }
    public function addTags()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['tagName'];
            $tags = new TagsModel();
            $addTags = $tags->addTags($name);
            if ($addTags) {
                header('location:?route=selectData');
            } else {
                http_response_code(404);
            }

            // $response = array('
        }
    }
}
