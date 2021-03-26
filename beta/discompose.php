<?php

    require_once("include/output_discompose.php");
    require_once("include/ffxitoolbox_menu.php");

    ffxitoolbox_menu("分解配方一覽");
    $file = fopen("recipe/beastman.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解：獣人装備");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/special.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解：特殊装備");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/discompose_woodworking.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解物品(木工)");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/discompose_smithing.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解物品(鍛冶)");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/discompose_goldsmithing.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解物品(彫金)");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/discompose_clothcraft.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解物品(裁縫)");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/discompose_leathercraft.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解物品(革細工)");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/discompose_bonecraft.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解物品(骨細工)");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/discompose_alchemy.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解物品(錬金術)");
    print_discompose($arr_synth_data);

    $file = fopen("recipe/reassembling.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_discompose_header("分解：合成幻珠");
    print_discompose($arr_synth_data);
?>