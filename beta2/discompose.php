<?php
    require_once("include/ffxitoolbox_menu.php");
    require_once("app/showdata.php");

    ffxitoolbox_menu("分解配方一覽");
    $obj = new showdata;
    $obj->print_discompose("獣人装備");
    $obj->print_discompose("特殊装備");
    $obj->print_discompose("分解物品(木工)");
    $obj->print_discompose("分解物品(鍛冶)");
    $obj->print_discompose("分解物品(彫金)");
    $obj->print_discompose("分解物品(裁縫)");
    $obj->print_discompose("分解物品(革細工)");
    $obj->print_discompose("分解物品(骨細工)");
    $obj->print_discompose("分解物品(錬金術)");
    $obj->print_discompose("合成幻珠");
    echo "</body></html>";
?>