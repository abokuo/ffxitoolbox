<?php
//引入檔案 output_recipe_data.php，以使用函式 print_recipe_data()
    require_once("./output_recipe_data.php");

//定義變數，接收從表單送出的資料
    $guild = $_POST["guild"];
    $skillrank = $_POST["skillrank"];
    $name = $_POST["name"];
    $skill = nl2br($_POST["skill"]);
    $special = $_POST["special"];
    $crystal = $_POST["crystal"];
    $material1 = $_POST["material1"];
    $material2 = $_POST["material2"];
    $material3 = $_POST["material3"];
    $material4 = $_POST["material4"];
    $material5 = $_POST["material5"];
    $material6 = $_POST["material6"];
    $material7 = $_POST["material7"];
    $material8 = $_POST["material8"];
    $HQ1 = $_POST["HQ1"];
    $HQ2 = $_POST["HQ2"];
    $HQ3 = $_POST["HQ3"];
    $type1 = $_POST["type1"];
    $item1 = nl2br($_POST["item1"]);
    $type2 = $_POST["type2"];
    $item2 = nl2br($_POST["item2"]);
    $type3 = $_POST["type3"];
    $item3 = nl2br($_POST["item3"]);
    $type4 = $_POST["type4"];
    $item4 = nl2br($_POST["item4"]);

//判斷表單輸入的工會種類及段位，組合出要開啟的合成配方檔名
    switch ($_POST["guild"]){
        case $_POST["guild"] = "木工" :
            $filename_guild = "woodworking";
            break;
        case $_POST["guild"] = "鍛冶" :
            $filename_guild = "smithing";
            break;
        case $_POST["guild"] = "彫金" :
            $filename_guild = "glodsmithing";
            break;
        case $_POST["guild"] = "裁縫" :
            $filename_guild = "clothcraft";
            break;
        case $_POST["guild"] = "革細工" :
            $filename_guild = "leathercraft";
            break;
        case $_POST["guild"] = "骨細工" :
            $filename_guild = "bonecraft";
            break;
        case $_POST["guild"] = "錬金術" :
            $filename_guild = "alchemy";
            break;
        case $_POST["guild"] = "調理" :
            $filename_guild = "cooking";
            break;
        case $_POST["guild"] = "獣人装備" :
            $filename_guild = "beastman";
            break;
        case $_POST["guild"] = "特殊装備" :
            $filename_guild = "special";
            break;
        case $_POST["guild"] = "合成装備(木工)" :
            $filename_guild = "discompose_woodworking";
            break;
        case $_POST["guild"] = "合成装備(鍛冶)" :
            $filename_guild = "discompose_smithing";
            break;
        case $_POST["guild"] = "合成装備(彫金)" :
            $filename_guild = "discompose_goldsmithing";
            break;
        case $_POST["guild"] = "合成装備(裁縫)" :
            $filename_guild = "discompose_clothcraft";
            break;
        case $_POST["guild"] = "合成装備(革細工)" :
            $filename_guild = "discompose_leathercraft";
            break;
        case $_POST["guild"] = "合成装備(骨細工)" :
            $filename_guild = "discompose_bonecraft";
            break;
        case $_POST["guild"] = "合成装備(錬金術)" :
            $filename_guild = "discompose_alchemy";
            break;
        case $_POST["guild"] = "?" :
            $filename_guild = "g_unknow";
            break;
        case $_POST["guild"] = "リアセンブル" :
            $filename_guild = "reassembling";
            break; 
        default:
            die();
    }

    switch ($_POST["skillrank"]){
        case $_POST["skillrank"] = "素人" :
            $filename_skillrank = "s10";
            break;
        case $_POST["skillrank"] = "見習" :
            $filename_skillrank = "s20";
            break;
        case $_POST["skillrank"] = "徒弟" :
            $filename_skillrank = "s30";
            break;
        case $_POST["skillrank"] = "下級職人" :
            $filename_skillrank = "s40";
            break;
        case $_POST["skillrank"] = "名取" :
            $filename_skillrank = "s50";
            break;
        case $_POST["skillrank"] = "目錄" :
            $filename_skillrank = "s60";
            break;
        case $_POST["skillrank"] = "印可" :
            $filename_skillrank = "s70";
            break;
        case $_POST["skillrank"] = "高第" :
            $filename_skillrank = "s80";
            break;
        case $_POST["skillrank"] = "皆伝" :
            $filename_skillrank = "s90";
            break;
        case $_POST["skillrank"] = "師範" :
            $filename_skillrank = "s100";
            break;
        case $_POST["skillrank"] = "高級職人" :
            $filename_skillrank = "s110";
            break;
        case $_POST["skillrank"] = "隠し" :
            $filename_skillrank = "hidden";
            break;
        case $_POST["skillrank"] = "?" :
            $filename_skillrank = "s_unknow";
            break;
        default:
            die();
    }
//種類是分解類型的配方（獸人裝備、特殊裝備等）檔案名稱省略段位
    switch ($_POST["guild"]){
        case $_POST["guild"] = "獣人装備" :
            $filename_guild = "beastman";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "特殊装備" :
            $filename_guild = "special";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "合成装備(木工)" :
            $filename_guild = "discompose_woodworking";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "合成装備(鍛冶)" :
            $filename_guild = "discompose_smithing";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "合成装備(彫金)" :
            $filename_guild = "discompose_goldsmithing";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "合成装備(裁縫)" :
            $filename_guild = "discompose_clothcraft";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "合成装備(革細工)" :
            $filename_guild = "discompose_leathercraft";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "合成装備(骨細工)" :
            $filename_guild = "discompose_bonecraft";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "合成装備(錬金術)" :
            $filename_guild = "discompose_alchemy";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "?" :
            $filename_guild = "g_unknow";
            $file_recipe = $filename_guild.".json";
            break;
        case $_POST["guild"] = "リアセンブル" :
            $filename_guild = "reassembling";
            $file_recipe = $filename_guild.".json";
            break; 
        default:
            $file_recipe = $filename_guild."_".$filename_skillrank.".json";
    }
//從表單接收到的資料轉成陣列資料
//定義結合式陣列 $get_recipe_from_form，將變數值指定給陣列元素
    $get_recipe_from_form['guild'] = $guild;
    $get_recipe_from_form['skillrank'] = $skillrank;
    $get_recipe_from_form['name'] = $name;
    $get_recipe_from_form['skill'] = $skill;
    $get_recipe_from_form['special'] = $special;
    $get_recipe_from_form['crystal'] = $crystal;
    $get_recipe_from_form['material1'] = $material1;
    $get_recipe_from_form['material2'] = $material2;
    $get_recipe_from_form['material3'] = $material3;
    $get_recipe_from_form['material4'] = $material4;
    $get_recipe_from_form['material5'] = $material5;
    $get_recipe_from_form['material6'] = $material6;
    $get_recipe_from_form['material7'] = $material7;
    $get_recipe_from_form['material8'] = $material8;
    $get_recipe_from_form['HQ1'] = $HQ1;
    $get_recipe_from_form['HQ2'] = $HQ2;
    $get_recipe_from_form['HQ3'] = $HQ3;
    $get_recipe_from_form['type1'] = $type1;
    $get_recipe_from_form['item1'] = $item1;
    $get_recipe_from_form['type2'] = $type2;
    $get_recipe_from_form['item2'] = $item2;
    $get_recipe_from_form['type3'] = $type3;
    $get_recipe_from_form['item3'] = $item3;
    $get_recipe_from_form['type4'] = $type4;
    $get_recipe_from_form['item4'] = $item4;

//依照表格填入的工會種類及段位，決定開啟的 JSON 格式配方檔案
//將檔案旗標指向倒數 2 byte，此時位於最後一筆 json 記錄的最後方：「}」之右
    $file = fopen("recipe/$file_recipe","r+b");
    fseek($file,-2,SEEK_END);

//將 $get_recipe_from_form 陣列編碼為 JSON 格式，加上 JSON_UNESCAPED_UNICODE 參數保護中日韓文字。
//於前方加上「,」、跳行(\n)及定位(\t)跳脫字元，作為新增資料準備；後方加上跳行跳脫字元及「]」，作為 JSON 檔案結尾。
//上述內容完成後將資料寫入檔案，關檔。
    $json_strings = ",\n\t".json_encode($get_recipe_from_form,JSON_UNESCAPED_UNICODE)."\n]";
//如果是尚未有配方資料的 JSON 檔案則改用下行。
//    $json_strings = "\t".json_encode($get_recipe_from_form,JSON_UNESCAPED_UNICODE)."\n]";
    fwrite($file,$json_strings);
    fclose($file);

//配方檔案寫入後的檢閱：讀取檔案做為資源，將 JSON 格式轉換為 PHP 陣列後指定給 $arr_synth_data 變數後關檔
//以 print_recipe_data() 函式列印 $arr_synth_data 陣列
    $file = fopen("recipe/$file_recipe","rb");
    $arr_synth_data = json_decode(stream_get_contents($file),true);
    fclose($file);
    print_synth_data($arr_synth_data);

?>