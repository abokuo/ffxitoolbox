<?php
// Vana'diel clock by A-Bo Lee abo.tw
// 原始資料及圖片出處：えふえふじゅういち時間 JavaScript版 
//                                                Copyright (c) 2004 by koji27
//                                              http://www.koji27.com/soft/ft/
    function vanaclock_mini(){
    $vana_week_icons = array("w0.gif", "w1.gif", "w2.gif", "w3.gif", "w4.gif", "w5.gif","w6.gif", "w7.gif");
    $vara_weekdays = array("火","土","水","風","氷","雷","光","闇");
    $vana_moon_icons = array("m0.gif", "m1.gif", "m2.gif", "m3.gif", "m4.gif", "m5.gif","m6.gif", "m7.gif", "m8.gif", "m9.gif", "m10.gif", "m11.gif");
    $vana_moon_phases = array("二十日月","二十六夜","新月","三日月","七日月","上弦の月","十日月","十三夜","満月","十六夜","居待月","下弦の月");

    $vana_original_time_in_secs = 934 * (360 * 86400) + (8 - 1) * (30 * 86400) + (4 - 1) * 86400 + 18 * 3600;
    $earth_original_time="2003-12-01 18:00:01";
    $earth_original_time_in_secs = strtotime($earth_original_time);
    $earth_now_in_secs = strtotime("now");

    $vana_period_in_secs =  ($earth_now_in_secs - $earth_original_time_in_secs + 3600 +1) * 25;

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
 
    global $vana_time;
    $vana_time = array('vana_yr'=>$vana_year, 'vana_mon'=>$vana_month, 'vana_day'=>$vana_day,
                        'vana_hr'=>$vana_hour, 'vana_min'=>$vana_minute, 'vana_sec'=>$vana_second);
//輸出內容，圖片引路徑法依 AJAX 呼叫調整。
//Todo：再以 CSS 語法美化呈現
    echo "<table border='0' cellpaddding='0' cellspacing='0'>\n";
    echo "<tr align=\"center\"><td colspan=\"2\"><span style=\"font-size: 60px;\">".$vana_time['vana_yr']."/".$vana_time['vana_mon']."/".$vana_time['vana_day']."</span></td></tr>\n";
    echo "<tr align=\"center\"><td colspan=\"2\"><span style=\"font-size: 74px;\">".$vana_time['vana_hr'].":".$vana_time['vana_min'].":".$vana_time['vana_sec']."</span></td></tr>\n";
    echo "<tr align=\"center\">";
    echo "<td><span style=\"font-size: 40px;\">".$vara_weekdays[$vana_weekday]."曜日</span></td>\n";
    echo "<td><span style=\"font-size: 40px;\">".$vana_moon_phases[$vana_moon_phase]."</span></td>\n";
    echo "</tr></table>";
}

//呼叫函式，顯示作業結果。
    vanaclock_mini();

?>