<?php
    function vana_time(){

    $vana_original_time_in_secs = 934 * (360 * 86400) + (8 - 1) * (30 * 86400) + (4 - 1) * 86400 + 18 * 3600;
    $earth_original_time="2003-12-01 18:00:01";
    $earth_original_time_in_secs = strtotime($earth_original_time);
    $earth_now_in_secs = strtotime("now");

    $vana_period_in_secs =  ($earth_now_in_secs - $earth_original_time_in_secs + 3600 ) * 25;

    $vana_now = $vana_original_time_in_secs + $vana_period_in_secs;
    $vana_weekday = floor($vana_now / 86400) % 8;
    $vana_moon_phase = floor(($vana_now + 86400 * 2) / (86400 * 7)) % 12;

    $vana_year = floor($vana_now / (360 * 86400));
        $vana_now = $vana_now % (360 * 86400);
    $vana_month = floor($vana_now / (30 * 86400)) + 1;
    if ($vana_month < 10){$vana_month = "0".$vana_month;}else{$vana_month = $vana_month;}
        $vana_now = $vana_now % (30 * 86400);
    $vana_day = floor(($vana_now / 86400)) + 1;
    if ($vana_day < 10){$vana_day = "0".$vana_day;}else{$vana_day = $vana_day;}
        $vana_now = $vana_now % 86400;
    $vana_hour = floor(($vana_now / 3600));
    if ($vana_hour < 10){$vana_hour = "0".$vana_hour;}else{$vana_hour = $vana_hour;}
        $vana_now = $vana_now % 3600;
    $vana_minute = floor(($vana_now / 60));
    if ($vana_minute < 10){$vana_minute = "0".$vana_minute;}else{$vana_minute = $vana_minute;}
        $vana_now = $vana_now % 60;
    $vana_second = $vana_now;
    if ($vana_second < 10){$vana_second = "0".$vana_second;}else{$vana_second = $vana_second;}
//定義全域變數：$vana_time，做為計算完後的 Vana'diel 時間陣列
    global $vana_time;
    $vana_time = array('vana_yr'=>$vana_year, 'vana_mon'=>$vana_month, 'vana_day'=>$vana_day,
                        'vana_hr'=>$vana_hour, 'vana_min'=>$vana_minute, 'vana_sec'=>$vana_second);
//定義 $vana_now_in_sec：以秒為單位定義當前 Vana 時間
//以及定義以秒為單位的工會營業時間（開店、打烊）、飛空艇航班資訊（到港、起飛）等資訊，作為時間表依據

    $vana_now_in_sec = $vana_time['vana_hr'] * 3600 + $vana_time['vana_min'] * 60 + $vana_time['vana_sec'];

//定義工會時間表顯示資訊
    echo "<table border='1' noshade>\n";
    echo "<tr align='center'><th>木工</th><th>鍛冶</th><th>彫金</th><th>裁縫</th></tr>\n";
    echo "<tr><td>北サンドリア (E-3)<br />";

    $woodworking_open_sec = 6 * 3600;
    $woodworking_close_sec = 21 * 3600;
    $woodworking_open_carpenter = 5 * 3600;
    $woodworking_close_carpenter = 22 * 3600;

    switch ($vana_now_in_sec){
        //當前時間位於營業時間內的情況
                case $vana_now_in_sec > $woodworking_open_sec && $vana_now_in_sec < $woodworking_close_sec:
                    $woodworking_eta_sec_total = ($woodworking_close_sec - $vana_now_in_sec) / 25;
        //特殊定義：當遊戲時間為 00:00 時的處理
                    if($woodworking_eta_sec_total == 3024){
                        $woodworking_eta_sec_total = 864;
                        $woodworking_eta_min = floor($woodworking_eta_sec_total / 60);
                        $woodworking_eta_sec = $woodworking_eta_sec_total % 60;
                        if ($woodworking_eta_min < 10){$woodworking_eta_min = "0".$woodworking_eta_min;}else{$woodworking_eta_min = $woodworking_eta_min;}
                        if ($woodworking_eta_sec < 10){$woodworking_eta_sec = "0".$woodworking_eta_sec;}else{$woodworking_eta_sec = $woodworking_eta_sec;}
                        echo "<font color=\"red\">店休</font>&nbsp;".$woodworking_eta_min.":".$woodworking_eta_sec."<br />";        
                    }else{
        //營業時間內的剩餘時間顯示
                        $woodworking_eta_min = floor($woodworking_eta_sec_total / 60);
                        $woodworking_eta_sec = $woodworking_eta_sec_total % 60;
                        if($woodworking_eta_min < 10){$woodworking_eta_min = "0".$woodworking_eta_min;}else{$woodworking_eta_min = $woodworking_eta_min;}
                        if($woodworking_eta_sec < 10){$woodworking_eta_sec = "0".$woodworking_eta_sec;}else{$woodworking_eta_sec = $woodworking_eta_sec;}
                        echo "<font color=\"green\">營業</font>&nbsp;".$woodworking_eta_min.":".$woodworking_eta_sec."<br />";    
                    }
                break;
        
        //當前時間位於打烊時間，但未跨日時的情況
                case $vana_now_in_sec > $woodworking_close_sec:
                    $woodworking_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
                    $woodworking_eta_min = floor($woodworking_eta_sec_total / 60);
                    $woodworking_eta_sec = $woodworking_eta_sec_total % 60;
                    if ($woodworking_eta_min < 10){$woodworking_eta_min = "0".$woodworking_eta_min;}else{$woodworking_eta_min = $woodworking_eta_min;}
                    if ($woodworking_eta_sec < 10){$woodworking_eta_sec = "0".$woodworking_eta_sec;}else{$woodworking_eta_sec = $woodworking_eta_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$woodworking_eta_min.":".$woodworking_eta_sec."<br />";
                break;
        
        //當前時間位於打烊時間，已跨日但未達開店時間的情況
                case $vana_now_in_sec < $woodworking_open_sec:
                    $woodworking_eta_sec_total = ($woodworking_open_sec - $vana_now_in_sec) / 25;
                    $woodworking_eta_min = floor($woodworking_eta_sec_total / 60);
                    $woodworking_eta_sec = $woodworking_eta_sec_total % 60;
                    if ($woodworking_eta_min < 10){$woodworking_eta_min = "0".$woodworking_eta_min;}else{$woodworking_eta_min = $woodworking_eta_min;}
                    if ($woodworking_eta_sec < 10){$woodworking_eta_sec = "0".$woodworking_eta_sec;}else{$woodworking_eta_sec = $woodworking_eta_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$woodworking_eta_min.":".$woodworking_eta_sec."<br />";
                break;
                default: 
    }

    echo "ギルド桟橋北桟橋 (H-8)<br />";
    switch ($vana_now_in_sec){
        //當前時間位於營業時間內的情況
                case $vana_now_in_sec > $woodworking_open_carpenter && $vana_now_in_sec < $woodworking_close_carpenter:
                    $woodworking_eta_sec_total = ($woodworking_close_carpenter - $vana_now_in_sec) / 25;
        //特殊定義：當遊戲時間為 00:00 時的處理
                    if($woodworking_eta_sec_total == 3168){
                        $woodworking_eta_sec_total = 720;
                        $woodworking_eta_min = floor($woodworking_eta_sec_total / 60);
                        $woodworking_eta_sec = $woodworking_eta_sec_total % 60;
                        if ($woodworking_eta_min < 10){$woodworking_eta_min = "0".$woodworking_eta_min;}else{$woodworking_eta_min = $woodworking_eta_min;}
                        if ($woodworking_eta_sec < 10){$woodworking_eta_sec = "0".$woodworking_eta_sec;}else{$woodworking_eta_sec = $woodworking_eta_sec;}
                        echo "<font color=\"red\">店休</font>&nbsp;".$woodworking_eta_min.":".$woodworking_eta_sec."<br />";        
                    }else{
        //營業時間內的剩餘時間顯示
                        $woodworking_eta_min = floor($woodworking_eta_sec_total / 60);
                        $woodworking_eta_sec = $woodworking_eta_sec_total % 60;
                        if($woodworking_eta_min < 10){$woodworking_eta_min = "0".$woodworking_eta_min;}else{$woodworking_eta_min = $woodworking_eta_min;}
                        if($woodworking_eta_sec < 10){$woodworking_eta_sec = "0".$woodworking_eta_sec;}else{$woodworking_eta_sec = $woodworking_eta_sec;}
                        echo "<font color=\"green\">營業</font>&nbsp;".$woodworking_eta_min.":".$woodworking_eta_sec."<br />";    
                    }
                break;
        
        //當前時間位於打烊時間，但未跨日時的情況
                case $vana_now_in_sec > $woodworking_close_carpenter:
                    $woodworking_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
                    $woodworking_eta_min = floor($woodworking_eta_sec_total / 60);
                    $woodworking_eta_sec = $woodworking_eta_sec_total % 60;
                    if ($woodworking_eta_min < 10){$woodworking_eta_min = "0".$woodworking_eta_min;}else{$woodworking_eta_min = $woodworking_eta_min;}
                    if ($woodworking_eta_sec < 10){$woodworking_eta_sec = "0".$woodworking_eta_sec;}else{$woodworking_eta_sec = $woodworking_eta_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$woodworking_eta_min.":".$woodworking_eta_sec."<br />";
                break;
        
        //當前時間位於打烊時間，已跨日但未達開店時間的情況
                case $vana_now_in_sec < $woodworking_open_carpenter:
                    $woodworking_eta_sec_total = ($woodworking_open_carpenter - $vana_now_in_sec) / 25;
                    $woodworking_eta_min = floor($woodworking_eta_sec_total / 60);
                    $woodworking_eta_sec = $woodworking_eta_sec_total % 60;
                    if ($woodworking_eta_min < 10){$woodworking_eta_min = "0".$woodworking_eta_min;}else{$woodworking_eta_min = $woodworking_eta_min;}
                    if ($woodworking_eta_sec < 10){$woodworking_eta_sec = "0".$woodworking_eta_sec;}else{$woodworking_eta_sec = $woodworking_eta_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$woodworking_eta_min.":".$woodworking_eta_sec."<br />";
                break;
                default: 
    }
    echo "</td>";

    $smith_open_sec = 8 * 3600;
    $smith_close_sec = 23 * 3600;

    echo "<td>北サンドリア (E-5)<br />";

    switch ($vana_now_in_sec){
//當前時間位於營業時間內的情況
        case $vana_now_in_sec > $smith_open_sec && $vana_now_in_sec < $smith_close_sec:
            $smith_eta_sec_total = ($smith_close_sec - $vana_now_in_sec) / 25;
//特殊定義：當遊戲時間為 00:00 時的處理
            if($smith_eta_sec_total == 3312){
                $smith_eta_sec_total = 1152;
                $smith_eta_min = floor($smith_eta_sec_total / 60);
                $smith_eta_sec = $smith_eta_sec_total % 60;
                if ($smith_eta_min < 10){$smith_eta_min = "0".$smith_eta_min;}else{$smith_eta_min = $smith_eta_min;}
                if ($smith_eta_sec < 10){$smith_eta_sec = "0".$smith_eta_sec;}else{$smith_eta_sec = $smith_eta_sec;}
                echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
                echo "大工房1F (E-9)<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
                echo "マウラ (F-9)<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
                echo "アルザビ (H-9)<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";        
            }else{
//營業時間內的剩餘時間顯示
                $smith_eta_min = floor($smith_eta_sec_total / 60);
                $smith_eta_sec = $smith_eta_sec_total % 60;
                if($smith_eta_min < 10){$smith_eta_min = "0".$smith_eta_min;}else{$smith_eta_min = $smith_eta_min;}
                if($smith_eta_sec < 10){$smith_eta_sec = "0".$smith_eta_sec;}else{$smith_eta_sec = $smith_eta_sec;}
                echo "<font color=\"green\">營業</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
                echo "大工房1F (E-9)<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
                echo "マウラ (F-9)<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
                echo "アルザビ (H-9)<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
    
            }
        break;

//當前時間位於打烊時間，但未跨日時的情況
        case $vana_now_in_sec > $smith_close_sec:
            $smith_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
            $smith_eta_min = floor($smith_eta_sec_total / 60);
            $smith_eta_sec = $smith_eta_sec_total % 60;
            if ($smith_eta_min < 10){$smith_eta_min = "0".$smith_eta_min;}else{$smith_eta_min = $smith_eta_min;}
            if ($smith_eta_sec < 10){$smith_eta_sec = "0".$smith_eta_sec;}else{$smith_eta_sec = $smith_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
            echo "大工房1F (E-9)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
            echo "マウラ (F-9)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
            echo "アルザビ (H-9)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
        break;

//當前時間位於打烊時間，已跨日但未達開店時間的情況
        case $vana_now_in_sec < $smith_open_sec:
            $smith_eta_sec_total = ($smith_open_sec - $vana_now_in_sec) / 25;
            $smith_eta_min = floor($smith_eta_sec_total / 60);
            $smith_eta_sec = $smith_eta_sec_total % 60;
            if ($smith_eta_min < 10){$smith_eta_min = "0".$smith_eta_min;}else{$smith_eta_min = $smith_eta_min;}
            if ($smith_eta_sec < 10){$smith_eta_sec = "0".$smith_eta_sec;}else{$smith_eta_sec = $smith_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
            echo "大工房1F (E-9)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
            echo "マウラ (F-9)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
            echo "アルザビ (H-9)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$smith_eta_min.":".$smith_eta_sec."<br />";
        break;
        default: 
        }
    echo "</td>";
    
    $goldsmith_open_sec = 8 * 3600;
    $goldsmith_close_sec = 23 * 3600;

    echo "<td>バストゥーク商業區 (H-8)<br />";

    switch ($vana_now_in_sec){
//當前時間位於營業時間內的情況
        case $vana_now_in_sec > $goldsmith_open_sec && $vana_now_in_sec < $goldsmith_close_sec:
            $goldsmith_eta_sec_total = ($goldsmith_close_sec - $vana_now_in_sec) / 25;
//特殊定義：當遊戲時間為 00:00 時的處理
            if($goldsmith_eta_sec_total == 3312){
                $goldsmith_eta_sec_total = 1152;
                $goldsmith_eta_min = floor($goldsmith_eta_sec_total / 60);
                $goldsmith_eta_sec = $goldsmith_eta_sec_total % 60;
                if ($goldsmith_eta_min < 10){$goldsmith_eta_min = "0".$goldsmith_eta_min;}else{$goldsmith_eta_min = $goldsmith_eta_min;}
                if ($goldsmith_eta_sec < 10){$goldsmith_eta_sec = "0".$goldsmith_eta_sec;}else{$goldsmith_eta_sec = $goldsmith_eta_sec;}
                echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
                echo "マウラ (G-8)<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
                echo "アルザビ (J-10)<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
            }else{
//營業時間內的剩餘時間顯示
                $goldsmith_eta_min = floor($goldsmith_eta_sec_total / 60);
                $goldsmith_eta_sec = $goldsmith_eta_sec_total % 60;
                if($goldsmith_eta_min < 10){$goldsmith_eta_min = "0".$goldsmith_eta_min;}else{$goldsmith_eta_min = $goldsmith_eta_min;}
                if($goldsmith_eta_sec < 10){$goldsmith_eta_sec = "0".$goldsmith_eta_sec;}else{$goldsmith_eta_sec = $goldsmith_eta_sec;}
                echo "<font color=\"green\">營業</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
                echo "マウラ (G-8)<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
                echo "アルザビ (J-10)<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
            }
        break;

//當前時間位於打烊時間，但未跨日時的情況
        case $vana_now_in_sec > $goldsmith_close_sec:
            $goldsmith_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
            $goldsmith_eta_min = floor($goldsmith_eta_sec_total / 60);
            $goldsmith_eta_sec = $goldsmith_eta_sec_total % 60;
            if ($goldsmith_eta_min < 10){$goldsmith_eta_min = "0".$goldsmith_eta_min;}else{$goldsmith_eta_min = $goldsmith_eta_min;}
            if ($goldsmith_eta_sec < 10){$goldsmith_eta_sec = "0".$goldsmith_eta_sec;}else{$goldsmith_eta_sec = $goldsmith_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
            echo "マウラ (G-8)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
            echo "アルザビ (J-10)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
        break;

//當前時間位於打烊時間，已跨日但未達開店時間的情況
        case $vana_now_in_sec < $goldsmith_open_sec:
            $goldsmith_eta_sec_total = ($goldsmith_open_sec - $vana_now_in_sec) / 25;
            $goldsmith_eta_min = floor($goldsmith_eta_sec_total / 60);
            $goldsmith_eta_sec = $goldsmith_eta_sec_total % 60;
            if ($goldsmith_eta_min < 10){$goldsmith_eta_min = "0".$goldsmith_eta_min;}else{$goldsmith_eta_min = $goldsmith_eta_min;}
            if ($goldsmith_eta_sec < 10){$goldsmith_eta_sec = "0".$goldsmith_eta_sec;}else{$goldsmith_eta_sec = $goldsmith_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
            echo "マウラ (G-8)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
            echo "アルザビ (J-10)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$goldsmith_eta_min.":".$goldsmith_eta_sec."<br />";
        break;
        default: 
        }
    echo "</td>";
    echo "<td>ウィスタス森の区 (F-12)<br />";

    $clothcraft_open_sec = 6 * 3600;
    $clothcraft_close_sec = 21 * 3600;
    
    switch ($vana_now_in_sec){
        //當前時間位於營業時間內的情況
                case $vana_now_in_sec > $clothcraft_open_sec && $vana_now_in_sec < $clothcraft_close_sec:
                    $clothcraft_eta_sec_total = ($clothcraft_close_sec - $vana_now_in_sec) / 25;
        //特殊定義：當遊戲時間為 00:00 時的處理
                    if($clothcraft_eta_sec_total == 3024){
                        $clothcraft_eta_sec_total = 864;
                        $clothcraft_eta_min = floor($clothcraft_eta_sec_total / 60);
                        $clothcraft_eta_sec = $clothcraft_eta_sec_total % 60;
                        if ($clothcraft_eta_min < 10){$clothcraft_eta_min = "0".$clothcraft_eta_min;}else{$clothcraft_eta_min = $clothcraft_eta_min;}
                        if ($clothcraft_eta_sec < 10){$clothcraft_eta_sec = "0".$clothcraft_eta_sec;}else{$clothcraft_eta_sec = $clothcraft_eta_sec;}
                        echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                        echo "セルビナ (H-9)<br />";
                        echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                        echo "アルザビ (J-10)<br />";
                        echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";

                    }else{
        //營業時間內的剩餘時間顯示
                        $clothcraft_eta_min = floor($clothcraft_eta_sec_total / 60);
                        $clothcraft_eta_sec = $clothcraft_eta_sec_total % 60;
                        if($clothcraft_eta_min < 10){$clothcraft_eta_min = "0".$clothcraft_eta_min;}else{$clothcraft_eta_min = $clothcraft_eta_min;}
                        if($clothcraft_eta_sec < 10){$clothcraft_eta_sec = "0".$clothcraft_eta_sec;}else{$clothcraft_eta_sec = $clothcraft_eta_sec;}
                        echo "<font color=\"green\">營業</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                        echo "セルビナ (H-9)<br />";
                        echo "<font color=\"green\">營業</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                        echo "アルザビ (J-10)<br />";
                        echo "<font color=\"green\">營業</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                    }
                break;
        
        //當前時間位於打烊時間，但未跨日時的情況
                case $vana_now_in_sec > $clothcraft_close_sec:
                    $clothcraft_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
                    $clothcraft_eta_min = floor($clothcraft_eta_sec_total / 60);
                    $clothcraft_eta_sec = $clothcraft_eta_sec_total % 60;
                    if ($clothcraft_eta_min < 10){$clothcraft_eta_min = "0".$clothcraft_eta_min;}else{$clothcraft_eta_min = $clothcraft_eta_min;}
                    if ($clothcraft_eta_sec < 10){$clothcraft_eta_sec = "0".$clothcraft_eta_sec;}else{$clothcraft_eta_sec = $clothcraft_eta_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                    echo "セルビナ (H-9)<br />";
                    echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                    echo "アルザビ (J-10)<br />";
                    echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                break;
        
        //當前時間位於打烊時間，已跨日但未達開店時間的情況
                case $vana_now_in_sec < $clothcraft_open_sec:
                    $clothcraft_eta_sec_total = ($clothcraft_open_sec - $vana_now_in_sec) / 25;
                    $clothcraft_eta_min = floor($clothcraft_eta_sec_total / 60);
                    $clothcraft_eta_sec = $clothcraft_eta_sec_total % 60;
                    if ($clothcraft_eta_min < 10){$clothcraft_eta_min = "0".$clothcraft_eta_min;}else{$clothcraft_eta_min = $clothcraft_eta_min;}
                    if ($clothcraft_eta_sec < 10){$clothcraft_eta_sec = "0".$clothcraft_eta_sec;}else{$clothcraft_eta_sec = $clothcraft_eta_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                    echo "セルビナ (H-9)<br />";
                    echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                    echo "アルザビ (J-10)<br />";
                    echo "<font color=\"red\">店休</font>&nbsp;".$clothcraft_eta_min.":".$clothcraft_eta_sec."<br />";
                break;
                default: 
    }


    echo"</td></tr>";
    echo "<tr align='center'><th>革細工</th><th>骨細工</th><th>錬金術</th><th>調理</th></tr>\n";
    echo "<tr><td>南サンドリア (D-8)<br />";
    
    $leathercraft_open_sec = 3 * 3600;
    $leathercraft_close_sec = 18 * 3600;
    
    switch ($vana_now_in_sec){
        //當前時間位於營業時間內的情況
                case $vana_now_in_sec > $leathercraft_open_sec && $vana_now_in_sec < $leathercraft_close_sec:
                    $leathercraft_eta_sec_total = ($leathercraft_close_sec - $vana_now_in_sec) / 25;
        //特殊定義：當遊戲時間為 00:00 時的處理
                    if($leathercraft_eta_sec_total == 2592){
                        $leathercraft_eta_sec_total = 432;
                        $leathercraft_eta_min = floor($leathercraft_eta_sec_total / 60);
                        $leathercraft_eta_sec = $leathercraft_eta_sec_total % 60;
                        if ($leathercraft_eta_min < 10){$leathercraft_eta_min = "0".$leathercraft_eta_min;}else{$leathercraft_eta_min = $leathercraft_eta_min;}
                        if ($leathercraft_eta_sec < 10){$leathercraft_eta_sec = "0".$leathercraft_eta_sec;}else{$leathercraft_eta_sec = $leathercraft_eta_sec;}
                        echo "<font color=\"red\">店休</font>&nbsp;".$leathercraft_eta_min.":".$leathercraft_eta_sec."<br />";

                    }else{
        //營業時間內的剩餘時間顯示
                        $leathercraft_eta_min = floor($leathercraft_eta_sec_total / 60);
                        $leathercraft_eta_sec = $leathercraft_eta_sec_total % 60;
                        if($leathercraft_eta_min < 10){$leathercraft_eta_min = "0".$leathercraft_eta_min;}else{$leathercraft_eta_min = $leathercraft_eta_min;}
                        if($leathercraft_eta_sec < 10){$leathercraft_eta_sec = "0".$leathercraft_eta_sec;}else{$leathercraft_eta_sec = $leathercraft_eta_sec;}
                        echo "<font color=\"green\">營業</font>&nbsp;".$leathercraft_eta_min.":".$leathercraft_eta_sec."<br />";
                    }
                break;
        
        //當前時間位於打烊時間，但未跨日時的情況
                case $vana_now_in_sec > $leathercraft_close_sec:
                    $leathercraft_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
                    $leathercraft_eta_min = floor($leathercraft_eta_sec_total / 60);
                    $leathercraft_eta_sec = $leathercraft_eta_sec_total % 60;
                    if ($leathercraft_eta_min < 10){$leathercraft_eta_min = "0".$leathercraft_eta_min;}else{$leathercraft_eta_min = $leathercraft_eta_min;}
                    if ($leathercraft_eta_sec < 10){$leathercraft_eta_sec = "0".$leathercraft_eta_sec;}else{$leathercraft_eta_sec = $leathercraft_eta_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$leathercraft_eta_min.":".$leathercraft_eta_sec."<br />";
                break;
        
        //當前時間位於打烊時間，已跨日但未達開店時間的情況
                case $vana_now_in_sec < $leathercraft_open_sec:
                    $leathercraft_eta_sec_total = ($leathercraft_open_sec - $vana_now_in_sec) / 25;
                    $leathercraft_eta_min = floor($leathercraft_eta_sec_total / 60);
                    $leathercraft_eta_sec = $leathercraft_eta_sec_total % 60;
                    if ($leathercraft_eta_min < 10){$leathercraft_eta_min = "0".$leathercraft_eta_min;}else{$leathercraft_eta_min = $leathercraft_eta_min;}
                    if ($leathercraft_eta_sec < 10){$leathercraft_eta_sec = "0".$leathercraft_eta_sec;}else{$leathercraft_eta_sec = $leathercraft_eta_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$leathercraft_eta_min.":".$leathercraft_eta_sec."<br />";
                break;
                default: 
    }
    echo "</td>";
    
    $bonecraft_open_sec = 8 * 3600;
    $bonecraft_close_sec = 23 * 3600;

    echo "<td>ウィスタス森の区 (H-12)<br />";

    switch ($vana_now_in_sec){
//當前時間位於營業時間內的情況
        case $vana_now_in_sec > $bonecraft_open_sec && $vana_now_in_sec < $bonecraft_close_sec:
            $bonecraft_eta_sec_total = ($bonecraft_close_sec - $vana_now_in_sec) / 25;
//特殊定義：當遊戲時間為 00:00 時的處理
            if($bonecraft_eta_sec_total == 3312){
                $bonecraft_eta_sec_total = 1152;
                $bonecraft_eta_min = floor($bonecraft_eta_sec_total / 60);
                $bonecraft_eta_sec = $bonecraft_eta_sec_total % 60;
                if ($bonecraft_eta_min < 10){$bonecraft_eta_min = "0".$bonecraft_eta_min;}else{$bonecraft_eta_min = $bonecraft_eta_min;}
                if ($bonecraft_eta_sec < 10){$bonecraft_eta_sec = "0".$bonecraft_eta_sec;}else{$bonecraft_eta_sec = $bonecraft_eta_sec;}
                echo "<font color=\"red\">店休</font>&nbsp;".$bonecraft_eta_min.":".$bonecraft_eta_sec."<br />";
            }else{
//營業時間內的剩餘時間顯示
                $bonecraft_eta_min = floor($bonecraft_eta_sec_total / 60);
                $bonecraft_eta_sec = $bonecraft_eta_sec_total % 60;
                if($bonecraft_eta_min < 10){$bonecraft_eta_min = "0".$bonecraft_eta_min;}else{$bonecraft_eta_min = $bonecraft_eta_min;}
                if($bonecraft_eta_sec < 10){$bonecraft_eta_sec = "0".$bonecraft_eta_sec;}else{$bonecraft_eta_sec = $bonecraft_eta_sec;}
                echo "<font color=\"green\">營業</font>&nbsp;".$bonecraft_eta_min.":".$bonecraft_eta_sec."<br />";
            }
        break;

//當前時間位於打烊時間，但未跨日時的情況
        case $vana_now_in_sec > $bonecraft_close_sec:
            $bonecraft_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
            $bonecraft_eta_min = floor($bonecraft_eta_sec_total / 60);
            $bonecraft_eta_sec = $bonecraft_eta_sec_total % 60;
            if ($bonecraft_eta_min < 10){$bonecraft_eta_min = "0".$bonecraft_eta_min;}else{$bonecraft_eta_min = $bonecraft_eta_min;}
            if ($bonecraft_eta_sec < 10){$bonecraft_eta_sec = "0".$bonecraft_eta_sec;}else{$bonecraft_eta_sec = $bonecraft_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$bonecraft_eta_min.":".$bonecraft_eta_sec."<br />";
        break;

//當前時間位於打烊時間，已跨日但未達開店時間的情況
        case $vana_now_in_sec < $bonecraft_open_sec:
            $bonecraft_eta_sec_total = ($bonecraft_open_sec - $vana_now_in_sec) / 25;
            $bonecraft_eta_min = floor($bonecraft_eta_sec_total / 60);
            $bonecraft_eta_sec = $bonecraft_eta_sec_total % 60;
            if ($bonecraft_eta_min < 10){$bonecraft_eta_min = "0".$bonecraft_eta_min;}else{$bonecraft_eta_min = $bonecraft_eta_min;}
            if ($bonecraft_eta_sec < 10){$bonecraft_eta_sec = "0".$bonecraft_eta_sec;}else{$bonecraft_eta_sec = $bonecraft_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$bonecraft_eta_min.":".$bonecraft_eta_sec."<br />";
        break;
        default: 
        }
    echo "</td>";

    $alchemy_open_sec = 8 * 3600;
    $alchemy_close_sec = 23 * 3600;

    echo "<td>バストゥーク鉱山区 (K-7)<br />";

    switch ($vana_now_in_sec){
//當前時間位於營業時間內的情況
        case $vana_now_in_sec > $alchemy_open_sec && $vana_now_in_sec < $alchemy_close_sec:
            $alchemy_eta_sec_total = ($alchemy_close_sec - $vana_now_in_sec) / 25;
//特殊定義：當遊戲時間為 00:00 時的處理
            if($alchemy_eta_sec_total == 3312){
                $alchemy_eta_sec_total = 1152;
                $alchemy_eta_min = floor($alchemy_eta_sec_total / 60);
                $alchemy_eta_sec = $alchemy_eta_sec_total % 60;
                if ($alchemy_eta_min < 10){$alchemy_eta_min = "0".$alchemy_eta_min;}else{$alchemy_eta_min = $alchemy_eta_min;}
                if ($alchemy_eta_sec < 10){$alchemy_eta_sec = "0".$alchemy_eta_sec;}else{$alchemy_eta_sec = $alchemy_eta_sec;}
                echo "<font color=\"red\">店休</font>&nbsp;".$alchemy_eta_min.":".$alchemy_eta_sec."<br />";
                echo "アトルガン白門 (G-5)<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$alchemy_eta_min.":".$alchemy_eta_sec."<br />";
            }else{
//營業時間內的剩餘時間顯示
                $alchemy_eta_min = floor($alchemy_eta_sec_total / 60);
                $alchemy_eta_sec = $alchemy_eta_sec_total % 60;
                if($alchemy_eta_min < 10){$alchemy_eta_min = "0".$alchemy_eta_min;}else{$alchemy_eta_min = $alchemy_eta_min;}
                if($alchemy_eta_sec < 10){$alchemy_eta_sec = "0".$alchemy_eta_sec;}else{$alchemy_eta_sec = $alchemy_eta_sec;}
                echo "<font color=\"green\">營業</font>&nbsp;".$alchemy_eta_min.":".$alchemy_eta_sec."<br />";
                echo "アトルガン白門 (G-5)<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$alchemy_eta_min.":".$alchemy_eta_sec."<br />";    
            }
        break;

//當前時間位於打烊時間，但未跨日時的情況
        case $vana_now_in_sec > $alchemy_close_sec:
            $alchemy_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
            $alchemy_eta_min = floor($alchemy_eta_sec_total / 60);
            $alchemy_eta_sec = $alchemy_eta_sec_total % 60;
            if ($alchemy_eta_min < 10){$alchemy_eta_min = "0".$alchemy_eta_min;}else{$alchemy_eta_min = $alchemy_eta_min;}
            if ($alchemy_eta_sec < 10){$alchemy_eta_sec = "0".$alchemy_eta_sec;}else{$alchemy_eta_sec = $alchemy_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$alchemy_eta_min.":".$alchemy_eta_sec."<br />";
            echo "アトルガン白門 (G-5)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$alchemy_eta_min.":".$alchemy_eta_sec."<br />";
        break;

//當前時間位於打烊時間，已跨日但未達開店時間的情況
        case $vana_now_in_sec < $alchemy_open_sec:
            $alchemy_eta_sec_total = ($alchemy_open_sec - $vana_now_in_sec) / 25;
            $alchemy_eta_min = floor($alchemy_eta_sec_total / 60);
            $alchemy_eta_sec = $alchemy_eta_sec_total % 60;
            if ($alchemy_eta_min < 10){$alchemy_eta_min = "0".$alchemy_eta_min;}else{$alchemy_eta_min = $alchemy_eta_min;}
            if ($alchemy_eta_sec < 10){$alchemy_eta_sec = "0".$alchemy_eta_sec;}else{$alchemy_eta_sec = $alchemy_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$alchemy_eta_min.":".$alchemy_eta_sec."<br />";
            echo "アトルガン白門 (G-5)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$alchemy_eta_min.":".$alchemy_eta_sec."<br />";
        break;
        default: 
        }
    echo "</td>";

    $cooking_open_sec = 5 * 3600;
    $cooking_close_sec = 20 * 3600;

    echo "<td>ウィスタス水の区 (E-8)<br />";

    switch ($vana_now_in_sec){
//當前時間位於營業時間內的情況
        case $vana_now_in_sec > $cooking_open_sec && $vana_now_in_sec < $cooking_close_sec:
            $cooking_eta_sec_total = ($cooking_close_sec - $vana_now_in_sec) / 25;
//特殊定義：當遊戲時間為 00:00 時的處理
            if($cooking_eta_sec_total == 2880){
                $cooking_eta_sec_total = 720;
                $cooking_eta_min = floor($cooking_eta_sec_total / 60);
                $cooking_eta_sec = $cooking_eta_sec_total % 60;
                if ($cooking_eta_min < 10){$cooking_eta_min = "0".$cooking_eta_min;}else{$cooking_eta_min = $cooking_eta_min;}
                if ($cooking_eta_sec < 10){$cooking_eta_sec = "0".$cooking_eta_sec;}else{$cooking_eta_sec = $cooking_eta_sec;}
                echo "<font color=\"red\">店休</font>&nbsp;".$cooking_eta_min.":".$cooking_eta_sec."<br />";
            }else{
//營業時間內的剩餘時間顯示
                $cooking_eta_min = floor($cooking_eta_sec_total / 60);
                $cooking_eta_sec = $cooking_eta_sec_total % 60;
                if($cooking_eta_min < 10){$cooking_eta_min = "0".$cooking_eta_min;}else{$cooking_eta_min = $cooking_eta_min;}
                if($cooking_eta_sec < 10){$cooking_eta_sec = "0".$cooking_eta_sec;}else{$cooking_eta_sec = $cooking_eta_sec;}
                echo "<font color=\"green\">營業</font>&nbsp;".$cooking_eta_min.":".$cooking_eta_sec."<br />";
            }
        break;

//當前時間位於打烊時間，但未跨日時的情況
        case $vana_now_in_sec > $cooking_close_sec:
            $cooking_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
            $cooking_eta_min = floor($cooking_eta_sec_total / 60);
            $cooking_eta_sec = $cooking_eta_sec_total % 60;
            if ($cooking_eta_min < 10){$cooking_eta_min = "0".$cooking_eta_min;}else{$cooking_eta_min = $cooking_eta_min;}
            if ($cooking_eta_sec < 10){$cooking_eta_sec = "0".$cooking_eta_sec;}else{$cooking_eta_sec = $cooking_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$cooking_eta_min.":".$cooking_eta_sec."<br />";
        break;

//當前時間位於打烊時間，已跨日但未達開店時間的情況
        case $vana_now_in_sec < $cooking_open_sec:
            $cooking_eta_sec_total = ($cooking_open_sec - $vana_now_in_sec) / 25;
            $cooking_eta_min = floor($cooking_eta_sec_total / 60);
            $cooking_eta_sec = $cooking_eta_sec_total % 60;
            if ($cooking_eta_min < 10){$cooking_eta_min = "0".$cooking_eta_min;}else{$cooking_eta_min = $cooking_eta_min;}
            if ($cooking_eta_sec < 10){$cooking_eta_sec = "0".$cooking_eta_sec;}else{$cooking_eta_sec = $cooking_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$cooking_eta_min.":".$cooking_eta_sec."<br />";
        break;
        default: 
        }
    echo "</td>";
    echo "</tr>";

    echo "<tr align='center'><th colspan='4'>漁師</th></tr>\n";
//同ビビキー湾、アトルガン白門店休時間
    $ship_open_sec = 1 * 3600;
    $fishing_open_sec = 3 * 3600;
    $fishing_close_sec = 18 * 3600;
//同ビビキー湾、アトルガン白門開店時間
    $ship_close_sec = 23 * 3600;
    echo "<td>ウィスタス港 (C-8)<br />";

    switch ($vana_now_in_sec){
//當前時間位於營業時間內的情況
        case $vana_now_in_sec > $fishing_open_sec && $vana_now_in_sec < $fishing_close_sec:
            $fishing_eta_sec_total = ($fishing_close_sec - $vana_now_in_sec) / 25;
//特殊定義：當遊戲時間為 00:00 時的處理
            if($fishing_eta_sec_total == 2592){
                $fishing_eta_sec_total = 432;
                $fishing_eta_min = floor($fishing_eta_sec_total / 60);
                $fishing_eta_sec = $fishing_eta_sec_total % 60;
                if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
                if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
                echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
                echo "セルビナ (H-9)<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";

            }else{
//營業時間內的剩餘時間顯示
                $fishing_eta_min = floor($fishing_eta_sec_total / 60);
                $fishing_eta_sec = $fishing_eta_sec_total % 60;
                if($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
                if($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
                echo "<font color=\"green\">營業</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
                echo "セルビナ (H-9)<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            }
        break;
//當前時間位於打烊時間，但未跨日時的情況
        case $vana_now_in_sec > $fishing_close_sec:
            $fishing_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
            $fishing_eta_min = floor($fishing_eta_sec_total / 60);
            $fishing_eta_sec = $fishing_eta_sec_total % 60;
            if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
            if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            echo "セルビナ (H-9)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
        break;
//當前時間位於打烊時間，已跨日但未達開店時間的情況
        case $vana_now_in_sec < $fishing_open_sec:
            $fishing_eta_sec_total = ($fishing_open_sec - $vana_now_in_sec) / 25;
            $fishing_eta_min = floor($fishing_eta_sec_total / 60);
            $fishing_eta_sec = $fishing_eta_sec_total % 60;
            if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
            if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            echo "セルビナ (H-9)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
        break;
        default: 
        }
    echo "</td>";

    echo "<td>ビビキー湾 (H-7)<br />";

    switch ($vana_now_in_sec){
//當前時間位於營業時間內的情況
        case $vana_now_in_sec > $ship_open_sec && $vana_now_in_sec < $fishing_close_sec:
            $fishing_eta_sec_total = ($fishing_close_sec - $vana_now_in_sec) / 25;
//特殊定義：當遊戲時間為 00:00 時的處理
            if($fishing_eta_sec_total == 2592){
                $fishing_eta_sec_total = 144;
                $fishing_eta_min = floor($fishing_eta_sec_total / 60);
                $fishing_eta_sec = $fishing_eta_sec_total % 60;
                if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
                if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
                echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
                echo "アトルガン白門 (H-11)<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            }else{
//營業時間內的剩餘時間顯示
                $fishing_eta_min = floor($fishing_eta_sec_total / 60);
                $fishing_eta_sec = $fishing_eta_sec_total % 60;
                if($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
                if($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
                echo "<font color=\"green\">營業</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
                echo "アトルガン白門 (H-11)<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            }
        break;

//當前時間位於打烊時間，但未跨日時的情況
        case $vana_now_in_sec > $fishing_close_sec:
            $fishing_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
            $fishing_eta_min = floor($fishing_eta_sec_total / 60);
            $fishing_eta_sec = $fishing_eta_sec_total % 60;
            if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
            if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            echo "アトルガン白門 (H-11)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
        break;

//當前時間位於打烊時間，已跨日但未達開店時間的情況
        case $vana_now_in_sec < $ship_open_sec:
            $fishing_eta_sec_total = ($ship_open_sec - $vana_now_in_sec) / 25;
            $fishing_eta_min = floor($fishing_eta_sec_total / 60);
            $fishing_eta_sec = $fishing_eta_sec_total % 60;
            if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
            if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            echo "アトルガン白門 (H-11)<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
        break;

        default: 
        }
    echo "</td>";
    echo "<td>機船航路<br />";

    switch ($vana_now_in_sec){
//當前時間位於營業時間內的情況
        case $vana_now_in_sec > $ship_open_sec && $vana_now_in_sec < $ship_close_sec:
            $fishing_eta_sec_total = ($ship_close_sec - $vana_now_in_sec) / 25;
//特殊定義：當遊戲時間為 00:00 時的處理
            if($fishing_eta_sec_total == 3312){
                $fishing_eta_sec_total = 144;
                $fishing_eta_min = floor($fishing_eta_sec_total / 60);
                $fishing_eta_sec = $fishing_eta_sec_total % 60;
                if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
                if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
                echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
                echo "外洋航路<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
                echo "銀海航路<br />";
                echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            }else{
//營業時間內的剩餘時間顯示
                $fishing_eta_min = floor($fishing_eta_sec_total / 60);
                $fishing_eta_sec = $fishing_eta_sec_total % 60;
                if($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
                if($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
                echo "<font color=\"green\">營業</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
                echo "外洋航路<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
                echo "銀海航路<br />";
                echo "<font color=\"green\">營業</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            }
        break;
//當前時間位於打烊時間，但未跨日時的情況
        case $vana_now_in_sec > $ship_close_sec:
            $fishing_eta_sec_total = (86400 - $vana_now_in_sec + 28800) / 25;
            $fishing_eta_min = floor($fishing_eta_sec_total / 60);
            $fishing_eta_sec = $fishing_eta_sec_total % 60;
            if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
            if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            echo "外洋航路<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            echo "銀海航路<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
    break;
//當前時間位於打烊時間，已跨日但未達開店時間的情況
        case $vana_now_in_sec < $ship_open_sec:
            $fishing_eta_sec_total = ($fishing_open_sec - $vana_now_in_sec) / 25;
            $fishing_eta_min = floor($fishing_eta_sec_total / 60);
            $fishing_eta_sec = $fishing_eta_sec_total % 60;
            if ($fishing_eta_min < 10){$fishing_eta_min = "0".$fishing_eta_min;}else{$fishing_eta_min = $fishing_eta_min;}
            if ($fishing_eta_sec < 10){$fishing_eta_sec = "0".$fishing_eta_sec;}else{$fishing_eta_sec = $fishing_eta_sec;}
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            echo "外洋航路<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
            echo "銀海航路<br />";
            echo "<font color=\"red\">店休</font>&nbsp;".$fishing_eta_min.":".$fishing_eta_sec."<br />";
    break;
        default: 
        }
    echo "</td>";

    echo "<td>&nbsp;</td></tr>";
    echo "</table>";

}
//呼叫函式，顯示作業結果。
    vana_time();
    
?>