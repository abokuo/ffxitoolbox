<?php
//引入 app/showdarta.php 檔案使用 showdata 類別
//引入 include/ffxitoolbox_menu.php 列印頁面表頭

    require_once("include/ffxitoolbox_menu.php");
    require_once("app/showdata.php");

    ffxitoolbox_menu("合成配方一覽：裁縫");
    $obj = new showdata;
    $obj->print_recipe_data("裁縫","素人");
    $obj->print_recipe_data("裁縫","見習");
    $obj->print_recipe_data("裁縫","徒弟");
    $obj->print_recipe_data("裁縫","下級");
    $obj->print_recipe_data("裁縫","名取");
    $obj->print_recipe_data("裁縫","目録");
    $obj->print_recipe_data("裁縫","印可");
    $obj->print_recipe_data("裁縫","高弟");
    $obj->print_recipe_data("裁縫","皆伝");
    $obj->print_recipe_data("裁縫","師範");
    $obj->print_recipe_data("裁縫","高級");
    echo "<body>\n</html>";
?>