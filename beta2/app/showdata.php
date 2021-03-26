<?php
class showdata{
    //自定方法：print_recipe_data，用於將輸入的陣列資料輸出成表格顯示
    function print_recipe_data($guild,$skillrank){
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
    
        switch ($guild){
            case "木工":
                $guild = "woodworking";
                $guildname = "木工";
            break;
            case "鍛冶":
                $guild = "smithing";
                $guildname = "鍛冶";
            break;
            case "彫金":
                $guild = "goldsmithing";
                $guildname = "彫金";
            break;
            case "裁縫":
                $guild = "clothcraft";
                $guildname = "裁縫";
            break;
            case "革細工":
                $guild = "leathercraft";
                $guildname = "革細工";
            break;
            case "骨細工":
                $guild = "bonecraft";
                $guildname = "骨細工";
            break;
            case "錬金術":
                $guild = "alchemy";
                $guildname = "錬金術";
            break;
            case "調理":
                $guild = "cooking";
                $guildname = "調理";
            break;
            default:
        }

        switch ($skillrank){
            case "素人":
                $skillrank = "s10";
                $rankname = "素人";
            break;
            case "見習":
                $skillrank = "s20";
                $rankname = "見習";
            break;
            case "徒弟":
                $skillrank = "s30";
                $rankname = "徒弟";
            break;
            case "下級":
                $skillrank = "s40";
                $rankname = "下級";
            break;
            case "名取":
                $skillrank = "s50";
                $rankname = "名取";
            break;
            case "目録":
                $skillrank = "s60";
                $rankname = "目録";
            break;
            case "印可":
                $skillrank = "s70";
                $rankname = "印可";
            break;
            case "高弟":
                $skillrank = "s80";
                $rankname = "高弟";
            break;
            case "皆伝":
                $skillrank = "s90";
                $rankname = "皆伝";
            break;
            case "師範":
                $skillrank = "s100";
                $rankname = "師範";
            break;
            case "高級":
                $skillrank = "s110";
                $rankname = "高級";
            break; 
            default:
        }

        echo "<a name='".$skillrank."'></a>\n";
        echo "<table width=\"100%\" border=\"1\" cellpadding=\"0\">\n";
        echo "<tr valign=\"middle\"><td colspan=\"8\">";
        echo "<h2>$guildname" . "：" . $rankname . "</h2>";
        echo "</td></tr>\n";
        echo "<tr><th width=\"10%\">物品名</th><th width=\"9%\">合成技能</th><th width=\"12%\" colspan=\"2\">水晶 / 合成素材</th><th width=\"48%\">合成品說明</th><th width=\"11%\">HQ</th></tr>";

        $filename = "recipe/".$guild."_".$skillrank.".json";
        $file = fopen("$filename","rb");
        $arr_synth_data = json_decode(stream_get_contents($file),true);
        fclose($file);
    
        //將陣列各元素值依序指定到變數，為方便理解變數名與索引名相同
        foreach($arr_synth_data as $var){
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
        echo "<td ";
        //依照使用的水晶類型，使用不同儲存格底色
            switch($crystal){
                case "炎":
                    echo "bgcolor='#ffb8b8'";
                break;
                case "土":
                    echo "bgcolor='#ffe866'";
                break;    
                case "水":
                    echo "bgcolor='#b0e6ff'";
                break;    
                case "風":
                    echo "bgcolor='#66ff66'";
                break;    
                case "氷":
                    echo "bgcolor='#ffb8b8'";
                break;    
                case "雷":
                    echo "bgcolor='#ffc0ff'";
                break;    
                case "光":
                    echo "bgcolor='#f8ffff'";
                break;    
                case "闇":
                    echo "bgcolor='#d4d4d4'";
                break;    
                case "灼熱":
                    echo "bgcolor='#ffb8b8'";
                break;    
                case "凍結":
                    echo "bgcolor='#e0ffff'";
                break;    
                case "旋風":
                    echo "bgcolor='#66ff66'";
                break;    
                case "大地":
                    echo "bgcolor='#ffe866'";
                break;    
                case "稲妻":
                    echo "bgcolor='#ffc0ff'";
                break;    
                case "泉水":
                    echo "bgcolor='#b0e6ff'";
                break;    
                case "斜光":
                    echo "bgcolor='#f8ffff'";
                break;
                case "常闇":
                    echo "bgcolor='#d4d4d4'";
                break;
        //未定義水晶種類（如尚未確定）時則背底為白色
                default:
                    echo "bgcolor='#ffffff'";
            }
        echo " align='center'>";
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

    function print_recipe_data_m($guild,$skillrank){
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
    
        switch ($guild){
            case "木工":
                $guild = "woodworking";
                $guildname = "木工";
            break;
            case "鍛冶":
                $guild = "smithing";
                $guildname = "鍛冶";
            break;
            case "彫金":
                $guild = "goldsmithing";
                $guildname = "彫金";
            break;
            case "裁縫":
                $guild = "clothcraft";
                $guildname = "裁縫";
            break;
            case "革細工":
                $guild = "leathercraft";
                $guildname = "革細工";
            break;
            case "骨細工":
                $guild = "bonecraft";
                $guildname = "骨細工";
            break;
            case "錬金術":
                $guild = "alchemy";
                $guildname = "錬金術";
            break;
            case "調理":
                $guild = "cooking";
                $guildname = "調理";
            break;
            default:
        }

        switch ($skillrank){
            case "素人":
                $skillrank = "s10";
                $rankname = "素人";
            break;
            case "見習":
                $skillrank = "s20";
                $rankname = "見習";
            break;
            case "徒弟":
                $skillrank = "s30";
                $rankname = "徒弟";
            break;
            case "下級":
                $skillrank = "s40";
                $rankname = "下級";
            break;
            case "名取":
                $skillrank = "s50";
                $rankname = "名取";
            break;
            case "目録":
                $skillrank = "s60";
                $rankname = "目録";
            break;
            case "印可":
                $skillrank = "s70";
                $rankname = "印可";
            break;
            case "高弟":
                $skillrank = "s80";
                $rankname = "高弟";
            break;
            case "皆伝":
                $skillrank = "s90";
                $rankname = "皆伝";
            break;
            case "師範":
                $skillrank = "s100";
                $rankname = "師範";
            break;
            case "高級":
                $skillrank = "s110";
                $rankname = "高級";
            break; 
            default:
        }

        echo "<a name='".$skillrank."'></a>\n";
/*
        echo "<table width=\"100%\" border=\"1\" cellpadding=\"0\">\n";
        echo "<tr valign=\"middle\"><td colspan=\"8\">";
        echo "<h2>$guildname" . "：" . $rankname . "</h2>";
        echo "</td></tr>\n";
        echo "<tr><th width=\"10%\">物品名</th><th width=\"9%\">合成技能</th><th width=\"12%\" colspan=\"2\">水晶 / 合成素材</th><th width=\"48%\">合成品說明</th><th width=\"11%\">HQ</th></tr>";
*/
        $filename = "recipe/".$guild."_".$skillrank.".json";
        $file = fopen("$filename","rb");
        $arr_synth_data = json_decode(stream_get_contents($file),true);
        fclose($file);
    
        //將陣列各元素值依序指定到變數，為方便理解變數名與索引名相同
        foreach($arr_synth_data as $var){
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
        
        echo "<table width='100%' border='1' noshade>\n";
        echo "<tr>\n";
        echo "<td colspan='2'>$name</td></tr>\n";
        echo "<tr><td width='50%'>$skill";
        //配方如需要特殊合成則印出特殊合成內容，無則取消
        if($special != ''){echo "<br />".$special;}else{unset($special);}        
        echo "</td>";
        echo "<td width='50%' ";
        //依照使用的水晶類型，使用不同儲存格底色
                switch($crystal){
                    case "炎":
                        echo "bgcolor='#ffb8b8'";
                    break;
                    case "土":
                        echo "bgcolor='#ffe866'";
                    break;    
                    case "水":
                        echo "bgcolor='#b0e6ff'";
                    break;    
                    case "風":
                        echo "bgcolor='#66ff66'";
                    break;    
                    case "氷":
                        echo "bgcolor='#ffb8b8'";
                    break;    
                    case "雷":
                        echo "bgcolor='#ffc0ff'";
                    break;    
                    case "光":
                        echo "bgcolor='#f8ffff'";
                    break;    
                    case "闇":
                        echo "bgcolor='#d4d4d4'";
                    break;    
                    case "灼熱":
                        echo "bgcolor='#ffb8b8'";
                    break;    
                    case "凍結":
                        echo "bgcolor='#e0ffff'";
                    break;    
                    case "旋風":
                        echo "bgcolor='#66ff66'";
                    break;    
                    case "大地":
                        echo "bgcolor='#ffe866'";
                    break;    
                    case "稲妻":
                        echo "bgcolor='#ffc0ff'";
                    break;    
                    case "泉水":
                        echo "bgcolor='#b0e6ff'";
                    break;    
                    case "斜光":
                        echo "bgcolor='#f8ffff'";
                    break;
                    case "常闇":
                        echo "bgcolor='#d4d4d4'";
                    break;
        //未定義水晶種類（如尚未確定）時則背底為白色
                    default:
                        echo "bgcolor='#ffffff'";
                }
        echo " align='center'>";
        echo $crystal;
        echo "</td></tr>\n";
        echo "<tr><td>\n";
        //顯示合成素材，第二項開始到第八項開始判斷對應的變數是否內容為空，如為空則清除該變數
        echo "$material1";
                if($material2 != ''){echo "<br />".$material2;}else{unset($material2);}
                if($material3 != ''){echo "<br />".$material3;}else{unset($material3);}
                if($material4 != ''){echo "<br />".$material4;}else{unset($material4);}
                if($material5 != ''){echo "<br />".$material5;}else{unset($material5);}
                if($material6 != ''){echo "<br />".$material6;}else{unset($material6);}
                if($material7 != ''){echo "<br />".$material7;}else{unset($material7);}
                if($material8 != ''){echo "<br />".$material8;}else{unset($material8);}
        echo "</td>";
        echo "<td>HQ1:$HQ1<br />HQ2:$HQ2<br />HQ3:$HQ3<br /></td></tr>";
        echo"<tr><td colspan='2'>【".$type1."】"."<br />".$item1;
        //顯示合成品說明，檢查第二項開始至第四項的類型與項目文字是否為空，如為空則清除該變數
                if($type2 != ''){echo "<br />【".$type2."】";}else{unset($type2);}
                if($item2 != ''){echo "<br />".$item2;}else{unset($item2);}
                if($type3 != ''){echo "<br />【".$type3."】";}else{unset($type3);}
                if($item3 != ''){echo "<br />".$item3;}else{unset($item3);}
                if($type4 != ''){echo "<br />【".$type4."】";}else{unset($type4);}
                if($item4 != ''){echo "<br />".$item4;}else{unset($item4);}
        echo "</tr>\n</table><br />";
        }
        echo "<p align=\"right\"><a href=\"#top\">回頁首</a></p>\n";
    }


    //自定方法：print_discompose($discompose_type)，用於將輸入的分解參數帶入對應的分解類型 JSON 資料後輸出成表格顯示
        function print_discompose($discompose_type){

            switch ($discompose_type){
                case "獣人装備":
                    $discompose_type = "beastman";
                    $discompose_name = "獣人装備";
                    break;
                case "特殊装備":
                    $discompose_type = "special";
                    $discompose_name = "特殊装備";
                    break;
                case "分解物品(木工)":
                    $discompose_type = "discompose_woodworking";
                    $discompose_name = "分解物品(木工)";
                    break;
                case "分解物品(鍛冶)":
                    $discompose_type = "discompose_smithing";
                    $discompose_name = "分解物品(鍛冶)";
                    break;
                case "分解物品(彫金)":
                    $discompose_type = "discompose_goldsmithing";
                    $discompose_name = "分解物品(彫金)";
                    break;
                case "分解物品(裁縫)":
                    $discompose_type = "discompose_clothcraft";
                    $discompose_name = "分解物品(裁縫)";
                    break;
                case "分解物品(革細工)":
                    $discompose_type = "discompose_leathercraft";
                    $discompose_name = "分解物品(革細工)";
                    break;
                case "分解物品(骨細工)":
                    $discompose_type = "discompose_bonecraft";
                    $discompose_name = "分解物品(骨細工)";
                    break;
                case "分解物品(錬金術)":
                    $discompose_type = "discompose_alchemy";
                    $discompose_name = "分解物品(錬金術)";
                    break;
                case "?":
                    $discompose_type = "g_unknow";
                    $discompose_name = "待確認";
                    break;
                case "合成幻珠" :
                    $discompose_type = "reassembling";
                    $discompose_name = "合成幻珠";
                    break; 
                default:
            }

            $filename = "recipe/".$discompose_type.".json";
            $file = fopen("$filename","rb");
            $arr_synth_data = json_decode(stream_get_contents($file),true);
            fclose($file);
            //建立切換瀏覽區域的導覽條
            $navi_bar = <<<content
            <a href="#beastman">獣人装備</a>&nbsp;&nbsp;
            <a href="#special">特殊装備</a>&nbsp;&nbsp;
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
            //建構表格：宣告表格定義及表頭
            echo "<a name='".$discompose_type."'></a>";
            echo "<table width=\"100%\" border=\"1\" cellpadding=\"0\">\n";
            echo "<tr valign=\"middle\"><td colspan=\"8\">";
            echo "<h2>$discompose_name</h2>";
            echo "</td></tr>\n";
            echo "<tr><th width=\"12%\" colspan=\"2\">分解品名 / 水晶</th><th width=\"5%\">合成技能</th><th width=\"12%\">NQ</th><th width=\"12%\">HQ1</th><th width=\"12%\">HQ2</th><th width=\"12%\">HQ3</th><th>合成品說明</th></tr>";

    //將陣列各元素值依序指定到變數，為方便理解變數名與索引名相同
            foreach($arr_synth_data as $var){
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

    //自定函式：print_food_effect，用於將食物效果資料輸出
    function print_food_effect(){
        $file = fopen("recipe/food_result.json","rb");
        $food_result = json_decode(stream_get_contents($file),true);
        fclose($file);
        //建構表格：宣告表格定義及表頭
        echo "<table width=\"100%\" border=\"1\">\n";
        //將陣列各元素值依序指定到變數，為方便理解變數名與索引名相同
                foreach($food_result as $var){
                    $Name = $var['Name']; //名前
                    $Time = $var['Time']; //有効時間（秒）
                    $Class = $var['Class']; //類型
                    $Note = $var['Note']; //註記
                    $Regene = $var['Regene']; //リジェネ+
                    $Refresh = $var['Refresh']; //リフレシュ
                    $Regain = $var['Regain']; //リゲイン
                    $HPtotal = $var['HPtotal']; // (HP総回復量：)
                    $MPtotal = $var['MPtotal']; // (MP総回復量：)
                    $TPtotal = $var['TPtotal']; // (TP総回復量：)
                    $HP = $var['HP']; //HP+
                    $HPpercent = $var['HPpercent']; //HP+%
                    $HPmax = $var['HPmax']; //HP+最大
                    $MP = $var['MP']; //MP+
                    $MPpercent = $var['MPpercent']; //HP+%
                    $MPmax = $var['MPmax']; //MP+最大
                    $STR = $var['STR']; //STR
                    $DEX = $var['DEX']; //DEX
                    $VIT = $var['VIT']; //VIT
                    $AGI = $var['AGI']; //AGI
                    $INT = $var['INT']; //INT
                    $MND = $var['MND']; //MND
                    $CHR = $var['CHR']; //CHR
                    $ResistFire = $var['ResistFire']; //耐火
                    $ResistIce = $var['ResistIce']; //耐氷
                    $ResistWind = $var['ResistWind']; //耐風
                    $ResistEarth = $var['ResistEarth']; //耐土
                    $ResistLightning = $var['ResistLightning']; //耐雷
                    $ResistWater = $var['ResistWater']; //耐水
                    $ResistLight = $var['ResistLight']; //耐光
                    $ResistDark = $var['ResistDark']; //耐闇
                    $Accuracy = $var['Accuracy']; //命中+
                    $AccuracyPercent = $var['AccuracyPercent']; //命中+%
                    $AccuracyMax = $var['AccuracyMax']; //(命中+最大)
                    $RangedAccuracy = $var['RangedAccuracy']; //飛命
                    $Attack = $var['Attack']; //攻撃+
                    $AttackPercent = $var['AttackPercent']; //攻撃+%
                    $AttackMax = $var['AttackMax']; //(攻撃+最大)
                    $RangedAccuracyPercent = $var['RangedAccuracyPercent']; //飛命+%
                    $RangedAccuracyMax = $var['RangedAccuracyMax']; //(飛命+最大)
                    $RangedAttack = $var['RangedAttack']; //飛攻
                    $RangedAttackPercent = $var['RangedAttackPercent']; //飛攻+%
                    $RangedAttackMax = $var['RangedAttackMax']; //(飛攻+最大)
                    $MagicAccuracy = $var['MagicAccuracy']; //魔命
                    $MagicAccuracyPercent = $var['MagicAccuracyPercent']; //魔命+%
                    $MagicAccuracyMax = $var['MagicAccuracyMax']; //(魔命+最大)
                    $MagicAttack = $var['MagicAttack']; //魔攻
                    $MagicAttackPercent = $var['MagicAttackPercent']; //魔攻+%
                    $MagicAttackMax = $var['MagicAttackMax']; //(魔攻+最大)
                    $Evasion = $var['Evasion']; //回避
                    $EvasionPercent = $var['EvasionPercent']; //回避+%
                    $EvasionMax= $var['EvasionMax']; //(回避+最大)
                    $Defense = $var['Defense']; //防御
                    $DefensePercent = $var['DefensePercent']; //防御+%
                    $DefenseMax = $var['DefenseMax']; //(防御+最大)
                    $MagicEvasion = $var['MagicEvasion']; //魔回避
                    $MagicEvasionPercent = $var['MagicEvasionPercent']; //魔回避+%
                    $MagicEvasionMax = $var['MagicEvasionMax']; //(魔回避+最大)
                    $MagicDefense = $var['MagicDefense']; //魔防
                    $MagicDefensePercent = $var['MagicDefensePercent']; //魔防+%
                    $MagicDefenseMax = $var['MagicDefenseMax']; //(魔防+最大)
                    $Enmity = $var['Enmity']; //敵対心
                    $DA = $var['DA']; //ダブルアタック
                    $TA = $var['TA']; //トリプルアタック
                    $STP = $var['STP']; //ストアTP
                    $SubtleBlow = $var['SubtleBlow']; //モクシャ
                    $MB2 = $var['MB2']; //マジックバーストダメージII
                    $FCpercent = $var['FCpercent']; //ファストキャスト
                    $Counter = $var['Counter']; //カウンター
                    $Plantoid = $var['Plantoid']; //プラントイドキラー
                    $Beast = $var['Beast']; //ビーストキラー
                    $Arcana = $var['Arcana']; //アルカナキラー
                    $Aqan = $var['Aquan']; //アクアンキラー
                    $Demon = $var['Demon']; //デーモンキラー
                    $Undead = $var['Undead']; //アンデッドキラー
                    $Lizard = $var['Lizard']; //リザードキラー
                    $Vermin = $var['Vermin']; //ヴァーミンキラー
                    $Dragon = $var['Dragon']; //ドラゴンキラー
                    $Amorph = $var['Amorph']; //アモルフキラー
                    $Bird = $var['Bird']; //バードキラー
                    $Slow = $var['Slow']; //レジストスロウ
                    $Sleep = $var['Sleep']; //レジストスリープ
                    $Silence = $var['Silence']; //レジストサイレス
                    $Stun = $var['Stun']; //レジストスタン
                    $Virus = $var['Virus']; //レジストウィルス
                    $Poison = $var['Poison']; //レジストポイズン
                    $Blind = $var['Blind']; //レジストブライン
                    $Paralyze = $var['Paralyze']; //レジストパライズ
                    $Petrify = $var['Petrify']; //レジストペトリ
                    $Curse = $var['Curse']; //レジストカーズ
                    $Amnesia = $var['Amnesia']; //レジストアムネジア
                    $HHP = $var['HHP']; //ヒーリングHP
                    $HMP = $var['HMP']; //ヒーリングMP
                    $SynthesisSuccessRate = $var['SynthesisSuccessRate']; //合成成功率
                    $SyntheticSkillIncreaseRate = $var['SyntheticSkillIncreaseRate']; //合成スキル上昇率
                    $SyntheticMaterialLossRate = $var['SyntheticMaterialLossRate']; //合成素材消失率
                    $HQSuccessRate = $var['HQSuccessRate']; //ハイクォリティー成功率
                    $BattleSkillIncreaseRate = $var['BattleSkillIncreaseRate']; //戦闘スキル上昇率
                    $MagicSkillIncreaseRate = $var['MagicSkillIncreaseRate']; //魔法スキル上昇率
                    $FishingSkillIncreaseRate = $var['FishingSkillIncreaseRate']; //釣りスキル上昇率
        //整理食物效果說明：如無該效果則不顯示
                    $msg = '';
                    if($HP != ''){if($HP < 0){$msg .= "HP".$HP."&nbsp;";}else{$msg .= "HP"."+".$HP."&nbsp;";}}else{unset($HP);}
                    if($HPpercent != '' && $HPmax != ''){$msg .= "HP"."+".$HPpercent."%(最大".$HPmax.")&nbsp;";}else{unset($HPpercent,$HPmax);}
                    if($MP != ''){if($MP < 0){$msg .= "MP".$MP."&nbsp;";}else{$msg .= "MP"."+".$MP."&nbsp;";}}else{unset($MP);}
                    if($MPpercent != '' && $MPmax != ''){$msg .= "MP"."+".$MPpercent."%(最大".$MPmax.")&nbsp;";}else{unset($MPpercent,$MPmax);}
                    if($STR != ''){if($STR < 0){$msg .= "STR".$STR."&nbsp;";}else{$msg .= "STR"."+".$STR."&nbsp;";}}else{unset($STR);}
                    if($DEX != ''){if($DEX < 0){$msg .= "DEX".$DEX."&nbsp;";}else{$msg .= "DEX"."+".$DEX."&nbsp;";}}else{unset($DEX);}
                    if($VIT != ''){if($VIT < 0){$msg .= "VIT".$VIT."&nbsp;";}else{$msg .= "VIT"."+".$VIT."&nbsp;";}}else{unset($VIT);}
                    if($AGI != ''){if($AGI < 0){$msg .= "AGI".$AGI."&nbsp;";}else{$msg .= "AGI"."+".$AGI."&nbsp;";}}else{unset($AGI);}
                    if($INT != ''){if($INT < 0){$msg .= "INT".$INT."&nbsp;";}else{$msg .= "INT"."+".$INT."&nbsp;";}}else{unset($INT);}
                    if($MND != ''){if($MND < 0){$msg .= "MND".$MND."&nbsp;";}else{$msg .= "MND"."+".$MND."&nbsp;";}}else{unset($MND);}
                    if($ResistFire != ''){$msg .= "耐火+".$ResistFire."&nbsp;";}else{unset($ResistFire);}
                    if($ResistIce != ''){$msg .= "耐氷+".$ResistIce."&nbsp;";}else{unset($ResistIce);}
                    if($ResistWind != ''){$msg .= "耐風+".$ResistWind."&nbsp;";}else{unset($ResistWind);}
                    if($ResistEarth != ''){$msg .= "耐土+".$ResistEarth."&nbsp;";}else{unset($ResistEarth);}
                    if($ResistLightning != ''){$msg .= "耐雷".$ResistLightning."&nbsp;";}else{unset($ResistLightning);}
                    if($ResistWater != ''){$msg .= "耐水+".$ResistWater."&nbsp;";}else{unset($ResistWater);}
                    if($ResistLight != ''){$msg .= "耐光+".$ResistLight."&nbsp;";}else{unset($ResistLight);}
                    if($ResistDark != ''){$msg .= "耐闇+".$ResistDark."&nbsp;";}else{unset($ResistDark);}
                    if($Accuracy != ''){$msg .= "命中"."+".$Accuracy."&nbsp;";}else{unset($Accuracy);}
                    if($AccuracyPercent != '' && $AccuracyMax != ''){$msg .= "命中"."+".$AccuracyPercent."%(最大".$AccuracyMax.")&nbsp;";}else{unset($AccuracyPercent,$AccuracyMax);}
                    if($Attack != ''){$msg .= "攻撃"."+".$Attack."&nbsp;";}else{unset($Attack);}
                    if($AttackPercent != '' && $AttackMax != ''){$msg .= "攻撃"."+".$AttackPercent."%(最大".$AttackMax.")&nbsp;";}else{unset($AttackPercent,$AttackMax);}
                    if($RangedAccuracy != ''){$msg .= "飛命"."+".$RangedAccuracy."&nbsp;";}else{unset($RangedAccuracy);}
                    if($RangedAccuracyPercent != '' && $RangedAccuracyMax != ''){$msg .= "飛命"."+".$RangedAccuracyPercent."%(最大".$RangedAccuracyMax.")&nbsp;";}else{unset($RangedAccuracyPercent,$RangedAccuracyMax);}
                    if($RangedAttack != ''){$msg .= "飛攻"."+".$RangedAttack."&nbsp;";}else{unset($RangedAttack);}
                    if($RangedAttackPercent != '' && $RangedAttackMax != ''){$msg .= "飛攻"."+".$RangedAttackPercent."%(最大".$RangedAttackMax.")&nbsp;";}else{unset($RangedAttackPercent,$RangedAttackMax);}
                    if($MagicAccuracy != ''){$msg .= "魔命"."+".$MagicAccuracy."&nbsp;";}else{unset($MagicAccuracy);}
                    if($MagicAccuracyPercent != '' && $MagicAccuracyMax != ''){$msg .= "魔命"."+".$MagicAccuracyPercent."%(最大".$MagicAccuracyMax.")&nbsp;";}else{unset($MagicAccuracyPercent,$MagicAccuracyMax);}
                    if($MagicAttack != ''){$msg .= "魔攻"."+".$MagicAttack."&nbsp;";}else{unset($MagicAttack);}
                    if($MagicAttackPercent != '' && $MagicAttackMax != ''){$msg .= "魔攻"."+".$MagicAttackPercent."%(最大".$MagicAttackMax.")&nbsp;";}else{unset($MagicAttackPercent,$MagicAttackMax);}
                    if($Evasion != ''){if($Evasion < 0){$msg .= "回避".$Evasion."&nbsp;";}else{$msg .= "回避"."+".$Evasion."&nbsp;";}}else{unset($Evasion);}
                    if($EvasionPercent != '' && $EvasionMax != ''){$msg .= "回避"."+".$EvasionPercent."%(最大".$EvasionMax.")&nbsp;";}else{unset($EvasionPercent,$EvasionMax);}
                    if($Defense != ''){if($Defense < 0){$msg .= "防御".$Defense."&nbsp;";}else{$msg .= "防御"."+".$Defense."&nbsp;";}}else{unset($Defense);}
                    if($DefensePercent != '' && $DefenseMax != ''){$msg .= "防御"."+".$DefensePercent."%(最大".$DefenseMax.")&nbsp;";}else{unset($DefensePercent,$DefenseMax);}
                    if($MagicEvasion != ''){$msg .= "魔回避"."+".$MagicEvasion."&nbsp;";}else{unset($MagicEvasion);}
                    if($MagicEvasionPercent != '' && $MagicEvasionMax != ''){$msg .= "魔回避"."+".$MagicEvasionPercent."%(最大".$MagicEvasionMax.")&nbsp;";}else{unset($MagicEvasionPercent,$MagicEvasionMax);}
                    if($MagicDefense != ''){$msg .= "魔防"."+".$MagicDefense."&nbsp;";}else{unset($MagicDefense);}
                    if($MagicDefensePercent != '' && $MagicDefenseMax != ''){$msg .= "魔防"."+".$MagicDefensePercent."%(最大".$MagicDefenseMax.")&nbsp;";}else{unset($MagicDefensePercent,$MagicDefenseMax);}
                    if($Regene != ''){if($Regene < 0){$msg .= "リジェネ".$Regene.")&nbsp;";}else{$msg .= "リジェネ"."+".$Regene."&nbsp;";}}else{unset($Regene);}
                    if($HPtotal != ''){$msg .= "(HP総回復量：".$HPtotal.")&nbsp;";}else{unset($HPtotal);}
                    if($Refresh != ''){{$msg .= "リフレシュ"."+".$Refresh."&nbsp;";}}else{unset($Refresh);}
                    if($MPtotal != ''){$msg .= "(MP総回復量：".$MPtotal.")&nbsp;";}else{unset($MPtotal);}
                    if($Regain != ''){{$msg .= "リゲイン"."+".$Regain."&nbsp;";}}else{unset($Regain);}
                    if($TPtotal != ''){$msg .= "(TP総回復量：".$TPtotal.")&nbsp;";}else{unset($TPtotal);}
                    if($Enmity != ''){if($Enmity < 0){$msg .= "敵対心".$Enmity.")&nbsp;";}else{$msg .= "敵対心"."+".$Enmity."&nbsp;";}}else{unset($Enmity);}
                    if($DA != ''){$msg .= "ダブルアタック+".$DA."%&nbsp;";}else{unset($DA);}
                    if($TA != ''){$msg .= "トリプルアタック+".$TA."%&nbsp;";}else{unset($TA);}
                    if($STP != ''){$msg .= "ストアTP+".$STP."&nbsp;";}else{unset($STP);}
                    if($SubtleBlow != ''){$msg .= "モクシャ+".$SubtleBlow."&nbsp;";}else{unset($SubtleBlow);}
                    if($MB2 != ''){$msg .= "マジックバーストダメージII+".$MB2."&nbsp;";}else{unset($MB2);}
                    if($FCpercent != ''){$msg .= "ファストキャスト+".$FCpercent."%&nbsp;";}else{unset($FCpercent);}
                    if($Counter != ''){$msg .= "カウンター+".$Counter."%&nbsp;";}else{unset($Counter);}
                    if($Plantoid != ''){$msg .= "プラントイドキラー+".$Plantoid."&nbsp;";}else{unset($Plantoid);}
                    if($Beast != ''){$msg .= "ビーストキラー+".$Beast."&nbsp;";}else{unset($Beast);}
                    if($Arcana != ''){$msg .= "アルカナキラー+".$Arcana."&nbsp;";}else{unset($Arcana);}
                    if($Aqan != ''){$msg .= "アクアンキラー+".$Aqan."&nbsp;";}else{unset($Aqan);}
                    if($Demon != ''){$msg .= "デーモンキラー+".$Demon."&nbsp;";}else{unset($Demon);}
                    if($Undead != ''){$msg .= "アンデッドキラー+".$Undead."&nbsp;";}else{unset($Undead);}
                    if($Lizard != ''){$msg .= "リザードキラー+".$Lizard."&nbsp;";}else{unset($Lizard);}
                    if($Vermin != ''){$msg .= "ヴァーミンキラー+".$Vermin."&nbsp;";}else{unset($Vermin);}
                    if($Dragon != ''){$msg .= "ドラゴンキラー+".$Dragon."&nbsp;";}else{unset($Dragon);}
                    if($Amorph != ''){$msg .= "アモルフキラー+".$Amorph."&nbsp;";}else{unset($Amorph);}
                    if($Bird != ''){$msg .= "バードキラー+".$Bird."&nbsp;";}else{unset($Bird);}
                    if($Slow != ''){$msg .= "レジストスロウ+".$Slow."&nbsp;";}else{unset($Slow);}
                    if($Sleep != ''){if($Sleep < 0){$msg .= "レジストスリープ".$Sleep.")&nbsp;";}else{$msg .= "レジストスリープ"."+".$Sleep."&nbsp;";}}else{unset($Sleep);}
                    if($Silence != ''){$msg .= "レジストサイレス+".$Silence."&nbsp;";}else{unset($Silence);}
                    if($Stun != ''){$msg .= "レジストスタン+".$Stun."&nbsp;";}else{unset($Stun);}
                    if($Virus != ''){$msg .= "レジストウィルス+".$Virus."&nbsp;";}else{unset($Virus);}
                    if($Poison != ''){$msg .= "レジストポイズン+".$Poison."&nbsp;";}else{unset($Poison);}
                    if($Blind != ''){$msg .= "レジストブライン+".$Blind."&nbsp;";}else{unset($Blind);}
                    if($Paralyze != ''){$msg .= "レジストパライズ+".$Paralyze."&nbsp;";}else{unset($Paralyze);}
                    if($Petrify != ''){$msg .= "レジストペトリ+".$Petrify."&nbsp;";}else{unset($Petrify);}
                    if($Curse != ''){$msg .= "レジストカーズ+".$Curse."&nbsp;";}else{unset($Curse);}
                    if($Amnesia != ''){$msg .= "レジストアムネジア+".$Amnesia."&nbsp;";}else{unset($Amnesia);}
                    if($HHP != ''){$msg .= "ヒーリングHP+".$HHP."&nbsp;";}else{unset($HHP);}
                    if($HMP != ''){$msg .= "ヒーリングMP+".$HMP."&nbsp;";}else{unset($HMP);}
                    if($SynthesisSuccessRate != ''){$msg .= "合成成功率+".$SynthesisSuccessRate."%&nbsp;";}else{unset($SynthesisSuccessRate);}
                    if($SyntheticSkillIncreaseRate != ''){$msg .= "合成スキル上昇率+".$SyntheticSkillIncreaseRate."%&nbsp;";}else{unset($SyntheticSkillIncreaseRate);}
                    if($SyntheticMaterialLossRate != ''){$msg .= "合成素材消失率".$SyntheticMaterialLossRate."%&nbsp;";}else{unset($SyntheticMaterialLossRate);}
                    if($HQSuccessRate != ''){$msg .= "ハイクォリティー成功率+".$HQSuccessRate."&nbsp;";}else{unset($HQSuccessRate);}
                    if($BattleSkillIncreaseRate != ''){$msg .= "戦闘スキル上昇率x".$BattleSkillIncreaseRate."%&nbsp;";}else{unset($BattleSkillIncreaseRate);}
                    if($MagicSkillIncreaseRate != ''){$msg .= "魔法スキル上昇率x".$MagicSkillIncreaseRate."%&nbsp;";}else{unset($MagicSkillIncreaseRate);}
                    if($FishingSkillIncreaseRate != ''){$msg .= "釣りスキル上昇率+".$FishingSkillIncreaseRate."&nbsp;";}else{unset($FishingSkillIncreaseRate);}
                    if($Time != ''){$msg .= $Time."&nbsp;";}else{unset($Time);}
        
        //開始顯示食物效果資料
                echo "<tr valign=\"middle\">";
                echo "<td width=\"170\">$Name</td>";
                echo "<td>";
        //依照陣列元素有無決定是否顯示
                echo "【" . $Class . "】";
                if($Note != ''){echo $Note;}else{unset($Note);} 
                echo "<br />";
                echo $msg;
                echo "</td>";
                echo "</tr>\n";
                }

        echo "</table>\n<p align=\"right\"><a href=\"#top\">回頁首</a></p>\n";
    }
        
}
?>