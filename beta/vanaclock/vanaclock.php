<?php
// Vana'diel clock by A-Bo Lee abo.tw
// 原始資料及圖片出處：えふえふじゅういち時間 JavaScript版 
//                                                Copyright (c) 2004 by koji27
//                                              http://www.koji27.com/soft/ft/
//定義運作函式
    function vanaclock(){
//定義曜日圖示及曜日名，順序：火土水風冰雷光闇
//定義月齡圖示，順序：二十日月、二十六夜、新月、三日月、七日月、上弦の月、十日月、十三夜、満月、十六夜、居待月、下弦の月
//定義月齡說明文字，順序：二十日月、二十六夜、新月、三日月、七日月、上弦の月、十日月、十三夜、満月、十六夜、居待月、下弦の月

    $vana_week_icons = array("w0.gif", "w1.gif", "w2.gif", "w3.gif", "w4.gif", "w5.gif",
                             "w6.gif", "w7.gif");
    $vara_weekdays = array("火","土","水","風","氷","雷","光","闇");
    $vana_moon_icons = array("m0.gif", "m1.gif", "m2.gif", "m3.gif", "m4.gif", "m5.gif",
                             "m6.gif", "m7.gif", "m8.gif", "m9.gif", "m10.gif", "m11.gif");
    $vana_moon_phases = array("二十日月","二十六夜","新月","三日月","七日月","上弦の月","十日月",
                                "十三夜","満月","十六夜","居待月","下弦の月");

//定義 Vana'diel 起始時間：天晶曆 0934/08/04 18:00:00，換算成秒為單位。參考：壹日為 86400 秒，壹小時為 3600 秒。
//定義起始時間相對應的地球時間：西元 2003 年 12 月 1 日 1800 時 1 秒。
//定義 $earth_original_time_in_secs 為遊戲起始時間對應的地球時間換算成 UNIX 時間戳記後的經過秒數
//定義 $earth_now_in_secs 為當前時間換算成 UNIX 時間戳記後的經過秒數，

    $vana_original_time_in_secs = 934 * (360 * 86400) + (8 - 1) * (30 * 86400) + (4 - 1) * 86400 + 18 * 3600;
    $earth_original_time="2003-12-01 18:00:01";
    $earth_original_time_in_secs = strtotime($earth_original_time);
    $earth_now_in_secs = strtotime("now");

//定義 $vana_period_in_secs 為 $earth_now_in_secs 減 $earth_original_time_in_secs 後的差，
//補上一小時時差後再乘以 25，作為 Vana'diel 起始時間後的增加秒。
   
    $vana_period_in_secs =  ($earth_now_in_secs - $earth_original_time_in_secs + 3600 ) * 25;

//Vana'diel 當前時間 ＝ Vana'diel 起始時間 + $vana_period_in_secs。
//定義 $vana_now 為 Vana'diel 當前時間，單位為秒
//定義 $vana_weekday 為 Vana'diel 曜日，為當前 Vana 時間除以 8（一週為八個曜日）後的餘數為當前曜日
//定義 $vana_moon_phase 為 Vana'diel 當前時間的月齡，計算方式按照原作者資料為當前 Vana'diel 時間
//加二日後除以一週秒數，之後的結果除以 12 後取餘數（計算依據待査）。

    $vana_now = $vana_original_time_in_secs + $vana_period_in_secs;
    $vana_weekday = floor($vana_now / 86400) % 8;
    $vana_moon_phase = floor(($vana_now + 86400 * 2) / (86400 * 7)) % 12;

//定義 $vana_year 為當前 Vana'diel 年份，依據為 $vana_now 除以每年秒數後無條件捨去小數位後的數字
//將 $vana_now 除以每年秒數後的餘數指定回 $vana_now，繼續後面的月計算
//定義 $vana_month 為當前 Vana'diel 月份，依據為 $vana_now 除以每月秒數後無條件捨去小數位後的數字，
//因起始月為「一」月不是「零」月，所以後面要補一，底下日數部分也是同樣作法。
//如果月份數小於十則前面補「0」讓排列統一為二位數，底下 日、時、分、秒比照作業。

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
//輸出內容，圖片引路徑法依 AJAX 呼叫調整。
//Todo：再以 CSS 語法美化呈現
    echo "<table border=\"0\">\n";
    echo "<tr valign=\"center\"><td>Vana'diel:<br />Earth:</td>";
    echo "<td>".$vana_time['vana_yr']."/".$vana_time['vana_mon']."/".$vana_time['vana_day']." ".$vana_time['vana_hr'].":".$vana_time['vana_min'].":".$vana_time['vana_sec']."<br />";
    echo date("Y/m/d H:i:s")."</td>"; 
    echo "<td>曜<br />日</td>";
    echo "<td><img src=\"vanaclock/w".$vana_weekday.".gif\" alt=\"".$vara_weekdays[$vana_weekday]."曜日\" title=\"".$vara_weekdays[$vana_weekday]."曜日\" valign=\"middle\"></td>\n";
    echo "<td>月<br />齡</td>";
    echo "<td><img src=\"vanaclock/m".$vana_moon_phase.".gif\" alt=\"$vana_moon_phases[$vana_moon_phase]\" title=\"$vana_moon_phases[$vana_moon_phase]\" valign=\"middle\"></td>\n";
    echo "</tr></table>";
}

//呼叫函式，顯示作業結果。
    vanaclock();

?>