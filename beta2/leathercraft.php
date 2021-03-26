<?php
//引入 app/showdarta.php 檔案使用 showdata 類別
//引入 include/ffxitoolbox_menu.php 列印頁面表頭

    require_once("include/ffxitoolbox_menu.php");
    require_once("app/showdata.php");

    ffxitoolbox_menu("合成配方一覽：革細工");
    $obj = new showdata;
    $obj->print_recipe_data("革細工","素人");
    $obj->print_recipe_data("革細工","見習");
    $obj->print_recipe_data("革細工","徒弟");
    $obj->print_recipe_data("革細工","下級");
    $obj->print_recipe_data("革細工","名取");
    $obj->print_recipe_data("革細工","目録");
    $obj->print_recipe_data("革細工","印可");
    $obj->print_recipe_data("革細工","高弟");
    $obj->print_recipe_data("革細工","皆伝");
    $obj->print_recipe_data("革細工","師範");
    $obj->print_recipe_data("革細工","高級");
    echo "<body>\n</html>";
?>