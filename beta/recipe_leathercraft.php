<?php
//引入 output_recipe_data.php 檔案使用 print_recipe_header() 函式
//引入 output_recipe_data.php 檔案使用 print_recipe_data() 函式

    require_once("include/output_recipe_data.php");
    require_once("include/ffxitoolbox_menu.php");

    ffxitoolbox_menu("合成配方一覽：革細工");

    $file = fopen("recipe/leathercraft_s10.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","素人");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s20.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","見習");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s30.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","徒弟");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s40.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","下級");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s50.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","名取");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s60.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","目録");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s70.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","印可");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s80.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","高弟");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s90.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","皆伝");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s100.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","師範");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/leathercraft_s110.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("革細工","高級");
    print_recipe_data($arr_synth_data);

    echo "<body>\n</html>";
?>