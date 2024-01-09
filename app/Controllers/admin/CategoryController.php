<?php

namespace App\Controllers\admin;

use App\Models\admin\CategoryModel;

class CategoryController
{
    public function  selectData()
    {
        $object = new CategoryModel();

        $result = $object->selectData();
        // dump($result);


        require('../view/admin/home.php');
    }
    public function addCategory()
    {

        if (isset($_POST['submit'])) {

            $object = new CategoryModel();
            $object->addCategory($_POST['category']);

            $result = $object->addCategory($_POST['category']);
            if ($result) {
                header('location:/?route=selectData');
            }
        }
    }
    public function deleteCategory()
    {


        if (isset($_GET['id'])) {
            $object = new CategoryModel();
            $result = $object->deleteCategory($_GET['id']);
            if ($result) {
                header('location:/?route=selectData');
            }
        }
    }
    public function selectCategoryName()
    {


        if (isset($_GET['id'])) {
            $object = new CategoryModel();
            $x = $object->selectCategoryName($_GET['id']);
            if ($x) {
                echo 'select secess';
            } else {
                echo 'eroro';
            }
        }
    }
}
