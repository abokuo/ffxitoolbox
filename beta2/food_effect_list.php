<?php
    require_once("app/showdata.php");
    require_once("include/ffxitoolbox_menu.php");

    ffxitoolbox_menu("食物效果一覽");
    $obj = new showdata;
    $obj->print_food_effect();
?>