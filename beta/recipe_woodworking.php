<?php
//引入 output_synth_data.php 檔案使用 print_synth_data($data) 函式

    require_once("include/output_recipe_data.php");
    require_once("include/ffxitoolbox_menu.php");

    ffxitoolbox_menu("合成配方一覽：木工");

    $file = fopen("recipe/woodworking_s10.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","素人");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s20.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","見習");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s30.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","徒弟");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s40.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","下級");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s50.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","名取");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s60.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","目録");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s70.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","印可");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s80.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","高弟");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s90.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","皆伝");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s100.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","師範");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/woodworking_s110.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("木工","高級");
    print_recipe_data($arr_synth_data);

    echo "<body>\n</html>";
?>