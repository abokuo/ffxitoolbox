<?php

    require_once("include/output_food_effect.php");
    require_once("include/ffxitoolbox_menu.php");

    ffxitoolbox_menu("食物效果一覽");
    $file = fopen("recipe/food_result.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    //建構表格：宣告表格定義及表頭
    echo "<table width=\"100%\" border=\"1\">\n";
    print_food_effect($arr_synth_data);
    echo "</table>\n<p align=\"right\"><a href=\"#top\">回頁首</a></p>\n";
?>