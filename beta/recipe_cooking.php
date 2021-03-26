<?php
//引入 output_recipe_data.php 檔案使用 print_recipe_header() 函式
//引入 output_recipe_data.php 檔案使用 print_recipe_data() 函式

    require_once("include/output_recipe_data.php");
    require_once("include/ffxitoolbox_menu.php");

    ffxitoolbox_menu("合成配方一覽：調理");
    
    $file = fopen("recipe/cooking_s10.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","素人");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s20.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","見習");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s30.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","徒弟");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s40.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","下級");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s50.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","名取");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s60.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","目録");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s70.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","印可");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s80.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","高弟");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s90.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","皆伝");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s100.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","師範");
    print_recipe_data($arr_synth_data);

    $file = fopen("recipe/cooking_s110.json","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_recipe_header("調理","高級");
    print_recipe_data($arr_synth_data);

    echo "<body>\n</html>";
?>