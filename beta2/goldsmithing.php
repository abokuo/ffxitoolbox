<?php
//引入 app/showdarta.php 檔案使用 showdata 類別
//引入 include/ffxitoolbox_menu.php 列印頁面表頭

    require_once("include/ffxitoolbox_menu.php");
    require_once("app/showdata.php");

    ffxitoolbox_menu("合成配方一覽：彫金");
    $obj = new showdata;
    $obj->print_recipe_data("彫金","素人");
    $obj->print_recipe_data("彫金","見習");
    $obj->print_recipe_data("彫金","徒弟");
    $obj->print_recipe_data("彫金","下級");
    $obj->print_recipe_data("彫金","名取");
    $obj->print_recipe_data("彫金","目録");
    $obj->print_recipe_data("彫金","印可");
    $obj->print_recipe_data("彫金","高弟");
    $obj->print_recipe_data("彫金","皆伝");
    $obj->print_recipe_data("彫金","師範");
    $obj->print_recipe_data("彫金","高級");
    echo "<body>\n</html>";
?>