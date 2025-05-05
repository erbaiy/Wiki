<?php

namespace App\Controllers\admin;

use App\Models\admin\ArchifeModel;

class ArchifeController
{
    public function selectArchifier()
    {
        $objet = new ArchifeModel();
        $fetch = $objet->selectArchifier();

        require('../view/admin/archif.php');
    }
    public function archifier()
    {
        $objet = new ArchifeModel();
        $arch = $objet->archifier($_GET['id']);
        if ($arch) {
            header('location:?route=archife');
        } else {
            echo 'eroor';
        }
    }
}
