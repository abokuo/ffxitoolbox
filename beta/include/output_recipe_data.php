<?php
require_once("ffxitoolbox_menu.php");
//自定函式：print_recipe_header($guild,$skillrank)列印表格表頭及定義顯示的合成分解類型
function print_recipe_header($guild,$skillrank){

    //建立切換瀏覽區域的導覽條
    $quick_view = <<<content
    <a href="#s10">素人</a>&nbsp;&nbsp;
    <a href="#s20">見習</a>&nbsp;&nbsp;
    <a href="#s30">徒弟</a>&nbsp;&nbsp;
    <a href="#s40">下級</a>&nbsp;&nbsp;
    <a href="#s50">名取</a>&nbsp;&nbsp;
    <a href="#s60">目録</a>&nbsp;&nbsp;
    <a href="#s70">印可</a>&nbsp;&nbsp;
    <a href="#s80">高弟</a>&nbsp;&nbsp;
    <a href="#s90">皆伝</a>&nbsp;&nbsp;
    <a href="#s100">師範</a>&nbsp;&nbsp;
    <a href="#s110">高級</a>
    content;
    echo "<div class=\"nav_bar\">$quick_view</div><br />\n";
    switch ($skillrank){
        case "素人":
            echo "<a name=\"s10\"></a>\n";                
        break;
        case "見習" :
            echo "<a name=\"s20\"></a>\n";                
        break;
        case "徒弟" :
            echo "<a name=\"s30\"></a>\n";
        break;
        case "下級" :
            echo "<a name=\"s40\"></a>\n";
        break;
        case "名取" :
            echo "<a name=\"s50\"></a>\n";
        break;
        case "目録" :
            echo "<a name=\"s60\"></a>\n";
        break;
        case "印可" :
            echo "<a name=\"s70\"></a>\n";
        break;
        case "高弟" :
            echo "<a name=\"s80\"></a>\n";
        break;
        case "皆伝" :
            echo "<a name=\"s90\"></a>\n";
        break;
        case "師範" :
            echo "<a name=\"s100\"></a>\n";
        break;
        case "高級" :
            echo "<a name=\"s110\"></a>\n";
        break; 
        default:
            $file_recipe = $filename_guild."_".$filename_skillrank.".json";                
    }
        //建構表格：宣告表格定義及表頭
            echo "<table width=\"100%\" border=\"1\" cellpadding=\"0\">\n";
            echo "<tr valign=\"middle\"><td colspan=\"8\">";
            echo "<h2>$guild" . "：" . $skillrank . "</h2>";
            echo "</td></tr>\n";
            echo "<tr><th width=\"10%\">物品名</th><th width=\"9%\">合成技能</th><th width=\"12%\" colspan=\"2\">水晶 / 合成素材</th><th width=\"48%\">合成品說明</th><th width=\"11%\">HQ</th></tr>";
        }
    

//自定函式：print_recipe_data，用於將輸入的陣列資料輸出成表格顯示
    function print_recipe_data($data){
//將陣列各元素值依序指定到變數，為方便理解變數名與索引名相同
        foreach($data as $var){
            $guild = $var['guild'];
            $skillrank = $var['skillrank'];
            $name = $var['name'];
            $skill = $var['skill'];
            $special = $var['special'];
            $crystal = $var['crystal'];
            $material1 = $var['material1'];
            $material2 = $var['material2'];
            $material3 = $var['material3'];
            $material4 = $var['material4'];
            $material5 = $var['material5'];
            $material6 = $var['material6'];
            $material7 = $var['material7'];
            $material8 = $var['material8'];
            $HQ1 = $var['HQ1'];
            $HQ2 = $var['HQ2'];
            $HQ3 = $var['HQ3'];
            $type1 = $var['type1'];
            $item1 = $var['item1'];
            $type2 = $var['type2'];
            $item2 = $var['item2'];
            $type3 = $var['type3'];
            $item3 = $var['item3'];
            $type4 = $var['type4'];
            $item4 = $var['item4'];

        echo "<tr>";
        echo "<td><a name=\"$name\">$name</a></td><td>$skill";
        //配方如需要特殊合成則印出特殊合成內容，無則取消
        if($special != ''){echo "<br />".$special;}else{unset($special);}        
        echo "</td>";
//依照使用的水晶類型，使用不同儲存格底色
                switch($crystal){
                    case "炎":
                        echo "<td bgcolor=\"#ffb8b8\" align=\"center\">";
                    break;
                    case "土":
                        echo "<td bgcolor=\"#ffe866\" align=\"center\">";
                    break;    
                    case "水":
                        echo "<td bgcolor=\"#b0e6ff\" align=\"center\">";
                    break;    
                    case "風":
                        echo "<td bgcolor=\"#66ff66\" align=\"center\">";
                    break;    
                    case "氷":
                        echo "<td bgcolor=\"#ffb8b8\" align=\"center\">";
                    break;    
                    case "雷":
                        echo "<td bgcolor=\"#ffc0ff\" align=\"center\">";
                    break;    
                    case "光":
                        echo "<td bgcolor=\"#f8ffff\" align=\"center\">";
                    break;    
                    case "闇":
                        echo "<td bgcolor=\"#d4d4d4\" align=\"center\">";
                    break;    
                    case "灼熱":
                        echo "<td bgcolor=\"#ffb8b8\" align=\"center\">";
                    break;    
                    case "凍結":
                        echo "<td bgcolor=\"#e0ffff\" align=\"center\">";
                    break;    
                    case "旋風":
                        echo "<td bgcolor=\"#66ff66\" align=\"center\">";
                    break;    
                    case "大地":
                        echo "<td bgcolor=\"#ffe866\" align=\"center\">";
                    break;    
                    case "稲妻":
                        echo "<td bgcolor=\"#ffc0ff\" align=\"center\">";
                    break;    
                    case "泉水":
                        echo "<td bgcolor=\"#b0e6ff\" align=\"center\">";
                    break;    
                    case "斜光":
                        echo "<td bgcolor=\"#f8ffff\" align=\"center\">";
                    break;
                    case "常闇":
                        echo "<td bgcolor=\"#d4d4d4\" align=\"center\">";
                    break;
//未定義水晶種類（如尚未確定）時則背底為白色
                    default:
                        echo "<td bgcolor=\"#ffffff\" align=\"center\">";
                }
        echo $crystal;
        echo "</td>";
//顯示合成素材，第二項開始到第八項開始判斷對應的變數是否內容為空，如為空則清除該變數
        echo "<td>$material1";
                if($material2 != ''){echo "<br />".$material2;}else{unset($material2);}
                if($material3 != ''){echo "<br />".$material3;}else{unset($material3);}
                if($material4 != ''){echo "<br />".$material4;}else{unset($material4);}
                if($material5 != ''){echo "<br />".$material5;}else{unset($material5);}
                if($material6 != ''){echo "<br />".$material6;}else{unset($material6);}
                if($material7 != ''){echo "<br />".$material7;}else{unset($material7);}
                if($material8 != ''){echo "<br />".$material8;}else{unset($material8);}
        echo"</td><td>【".$type1."】"."<br />".$item1;
//顯示合成品說明，檢查第二項開始至第四項的類型與項目文字是否為空，如為空則清除該變數
                if($type2 != ''){echo "<br />【".$type2."】";}else{unset($type2);}
                if($item2 != ''){echo "<br />".$item2;}else{unset($item2);}
                if($type3 != ''){echo "<br />【".$type3."】";}else{unset($type3);}
                if($item3 != ''){echo "<br />".$item3;}else{unset($item3);}
                if($type4 != ''){echo "<br />【".$type4."】";}else{unset($type4);}
                if($item4 != ''){echo "<br />".$item4;}else{unset($item4);}
        echo "</td><td>HQ1:$HQ1<br />HQ2:$HQ2<br />HQ3:$HQ3<br /></td>";
        echo "</tr>\n";
        }
        echo "</table>\n<p align=\"right\"><a href=\"#top\">回頁首</a></p>\n";
    }
//以上為函式內容

?>