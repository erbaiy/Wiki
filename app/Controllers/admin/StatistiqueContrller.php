<?php

namespace App\Controllers\admin;

use App\Models\admin\StatistiqueModel;

class StatistiqueContrller
{
    public function countTags()
    {
        $wiki = StatistiqueModel::countWiki();
        $tag = StatistiqueModel::countTag();
        $category = StatistiqueModel::countCategory();
        $wikiArchifier = StatistiqueModel::countwikiArchifier();
        $wikiNonArchifier = StatistiqueModel::countwikiNonArchifier();
        // $category = StatistiqueModel::countCategory();
        // dump($tag);
        // die();
        require('../view/admin/Dashboard.php');
    }
}
