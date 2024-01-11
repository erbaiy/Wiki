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
                // dump($_POST['category']);
                // die();
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

        $object = new CategoryModel();
        $x = $object->selectCategoryName(2);
        // dump($x);
        // die();

        if (isset($_GET['id'])) {

            $object = new CategoryModel();
            $x = $object->selectCategoryName($_GET['id']);
            // dump($x);
            // die();


            if ($x) {
                echo 'select secess';
            } else {
                echo 'eroro';
            }
            require('../view/admin/home.php');
        }
    }
    public function updateCategory()
    {


        if (isset($_POST['save'])) {
            $object = new CategoryModel();

            $update = $object->updateCategory($_POST['inpCategory'], $_POST['categoryid']);
            if ($update) {
                echo  'younse';
                // dump($_POST['inpCategory']);
                header('location:/?route=selectData');
                // echo 'update secess';
                // dump($_POST['Categoryid']);
                // die();
            } else {
                echo "error";
            }



            // require('../view/admin/home.php');
        }
    }
}
