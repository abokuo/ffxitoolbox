<?php
//require_once("ffxitoolbox_menu.php");
//自定函式：print_discompose_header($discompose_type)列印表格表頭及定義顯示的合成分解類型
    function print_discompose_header($discompose_type){
//建立切換瀏覽區域的導覽條
        $navi_bar = <<<content
        <a href="#beastman">分解：獣人装備</a>&nbsp;&nbsp;
        <a href="#special\">分解：特殊装備</a>&nbsp;&nbsp;
        <a href="#discompose_woodworking">分解物品(木工)</a>&nbsp;&nbsp;
        <a href="#discompose_smithing">分解物品(鍛冶)</a>&nbsp;&nbsp;
        <a href="#discompose_goldsmithing">分解物品(彫金)</a>&nbsp;&nbsp;
        <a href="#discompose_clothcraft">分解物品(裁縫)</a>&nbsp;&nbsp;
        <a href="#discompose_leathercraft">分解物品(革細工)</a>&nbsp;&nbsp;
        <a href="#discompose_bone">分解物品(骨細工)</a>&nbsp;&nbsp;
        <a href="#discompose_alchemy">分解物品(錬金術)</a>&nbsp;&nbsp;
        <a href="#reassembling">分解：合成幻珠</a>
        content;
        echo "<div class=\"nav_bar\">$navi_bar</div><br />\n";
        switch ($discompose_type){
            case "分解：獣人装備":
                echo "<a name=\"beastman\"></a>\n";                
                break;
            case "分解：特殊装備" :
                echo "<a name=\"special\"></a>\n";                
                break;
            case "分解物品(木工)" :
                echo "<a name=\"discompose_woodworking\"></a>\n";
                break;
            case "分解物品(鍛冶)" :
                echo "<a name=\"discompose_smithing\"></a>\n";
                break;
            case "分解物品(彫金)" :
                echo "<a name=\"discompose_goldsmithing\"></a>\n";
                break;
            case "分解物品(裁縫)" :
                echo "<a name=\"discompose_clothcraft\"></a>\n";
                break;
            case "分解物品(革細工)" :
                echo "<a name=\"discompose_leathercraft\"></a>\n";
                break;
            case "分解物品(骨細工)" :
                echo "<a name=\"discompose_bonecraft\"></a>\n";
                break;
            case "分解物品(錬金術)" :
                echo "<a name=\"discompose_alchemy\"></a>\n";
                break;
            case "?" :
                echo "<a name=\"g_unknow\"></a>\n";
                break;
            case "分解：合成幻珠" :
                echo "<a name=\"reassembling\"></a>\n";
                break; 
            default:
                $file_recipe = $filename_guild."_".$filename_skillrank.".json";                
        }
    //建構表格：宣告表格定義及表頭
        echo "<table width=\"100%\" border=\"1\" cellpadding=\"0\">\n";
        echo "<tr valign=\"middle\"><td colspan=\"8\">";
        echo "<h2>$discompose_type</h2>";
        echo "</td></tr>\n";
        echo "<tr><th width=\"12%\" colspan=\"2\">分解品名 / 水晶</th><th width=\"5%\">合成技能</th><th width=\"12%\">NQ</th><th width=\"12%\">HQ1</th><th width=\"12%\">HQ2</th><th width=\"12%\">HQ3</th><th>合成品說明</th></tr>";
    }

//自定函式：print_recipe_data，用於將輸入的陣列資料輸出成表格顯示
    function print_discompose($data){
//將陣列各元素值依序指定到變數，為方便理解變數名與索引名相同
        foreach($data as $var){
            $i = 1;
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
            
//開始顯示分解配方資料
        echo "<tr valign=\"middle\">";
        echo "<td>$material1</td>";
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
        echo "<td align=\"center\">$skill</td><td>$name</td><td>$HQ1</td><td>$HQ2</td><td>$HQ3</td>";
        echo"<td>【".$type1."】"."<br />".$item1;
//顯示合成品說明，檢查第二項開始至第四項的類型與項目文字是否為空，如為空則清除該變數
                if($type2 != ''){echo "<br />【".$type2."】";}else{unset($type2);}
                if($item2 != ''){echo "<br />".$item2;}else{unset($item2);}
                if($type3 != ''){echo "<br />【".$type3."】";}else{unset($type3);}
                if($item3 != ''){echo "<br />".$item3;}else{unset($item3);}
                if($type4 != ''){echo "<br />【".$type4."】";}else{unset($type4);}
                if($item4 != ''){echo "<br />".$item4;}else{unset($item4);}
        echo "</td>";
        echo "</tr>\n";
    }
    echo "</table>\n<p align=\"right\"><a href=\"#top\">回頁首</a></p>\n";
}
?>