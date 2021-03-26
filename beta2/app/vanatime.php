<?php
// Time in Vana'diel(vanatime) by A-Bo Lee @ abo.tw
// 原始資料及圖片出處：えふえふじゅういち時間 JavaScript版 
//                                                Copyright (c) 2004 by koji27
//                                              http://www.koji27.com/soft/ft/
//定義運作變數：
//定義曜日名，順序：火土水風冰雷光闇
//定義月齡說明文字，順序：二十日月、二十六夜、新月、三日月、七日月、上弦の月、十日月、十三夜、満月、十六夜、居待月、下弦の月
$vara_weekdays = array("火","土","水","風","氷","雷","光","闇");
$vana_moon_phases = array("二十日月","二十六夜","新月","三日月","七日月","上弦の月","十日月","十三夜","満月","十六夜","居待月","下弦の月");

//定義 Vana'diel 起始時間：天晶曆 0934/08/04 18:00:00，換算成秒為單位。參考：壹日為 86400 秒，壹小時為 3600 秒。
//起始時間相對應的地球時間：西元 2003 年 12 月 1 日 1800 時 1 秒。
//定義 $earth_original_time_in_secs 為遊戲起始時間對應的地球時間換算成 UNIX 時間戳記後的經過秒數
//定義 $earth_now_in_secs 為當前時間換算成 UNIX 時間戳記後的經過秒數，
$vana_original_time_in_secs = 934 * (360 * 86400) + (8 - 1) * (30 * 86400) + (4 - 1) * 86400 + 18 * 3600;
$earth_original_time="2003-12-01 18:00:01";
$earth_original_time_in_secs = strtotime($earth_original_time);
$earth_now_in_secs = strtotime("now");

//定義 $vana_period_in_secs 為 $earth_now_in_secs 減 $earth_original_time_in_secs 後的差，
//補上一小時時差後再乘以 25，作為 Vana'diel 起始時間後的增加秒：Vana'diel 的時間經過速度是地球時間的 25 倍。
//備考：補上時差後可能需要斟酌加上 1-2 秒與遊戲中顯示的時間批配（是否就是之前 app 上的時差校正？）
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

//定義陣列變數：$vana_time，存放計算完後的 Vana'diel 時間資訊：年、月、日、時、分、秒、曜日順序、月齡順序、曜日文字、月齡文字
$vana_time = array('vana_year'=>$vana_year, 'vana_month'=>$vana_month, 'vana_day'=>$vana_day,
                    'vana_hour'=>$vana_hour, 'vana_minute'=>$vana_minute, 'vana_second'=>$vana_second,
                    'vana_weekday'=>$vana_weekday, 'vana_moon_phase'=>$vana_moon_phase,
                    'vana_weekdays'=>$vara_weekdays, 'vana_moon_phases'=>$vana_moon_phases);

//建立類別「vanatime」以及「vanaclock」、「vanaclock_mini」兩個方法，
//將 $vana_time 作為參數帶入後輸出結果。
//其他頁面如要引入時間資訊參考以下內容，方法一定要帶參數：
//require_once("../app/vanatime.php");
//$vana_object = new vanatime;
//$vana_object->vanaclock($vana_time); 

class vanatime{            
    public function vanaclock($vana_time){
        echo "<table border=\"0\">\n";
        echo "<tr valign=\"center\"><td>Vana'diel:<br />Earth:</td>";
        echo "<td>".$vana_time['vana_year']."/".$vana_time['vana_month']."/".$vana_time['vana_day']." ".$vana_time['vana_hour'].":".$vana_time['vana_minute'].":".$vana_time['vana_second']."<br />";
        echo date("Y/m/d H:i:s")."</td>"; 
        echo "<td>曜<br />日</td>";
        echo "<td><img src='vanaclock/w".$vana_time['vana_weekday'].".gif' alt='".$vana_time['vana_weekdays'][$vana_time['vana_weekday']]."曜日' title='".$vana_time['vana_weekdays'][$vana_time['vana_weekday']]."曜日' valign='middle'></td>\n";
        echo "<td>月<br />齡</td>";
        echo "<td><img src=\"vanaclock/m".$vana_time['vana_moon_phase'].".gif\" alt='".$vana_time['vana_moon_phases'][$vana_time['vana_moon_phase']]."' title='".$vana_time['vana_moon_phases'][$vana_time['vana_moon_phase']]."' valign='middle'></td>\n";
        echo "</tr></table>";
    }

    public function vanaclock_mini($vana_time){
        echo "<table border='0' cellpaddding='0' cellspacing='0'>\n";
        echo "<tr align=\"center\"><td colspan=\"2\" bgcolor='red'><span style=\"font-size: 60px; color: #FFF;\">".$vana_time['vana_year']."/".$vana_time['vana_month']."/".$vana_time['vana_day']."</span></td></tr>\n";
        echo "<tr align=\"center\"><td colspan=\"2\" bgcolor='navy'><span style=\"font-size: 74px; color: #FFF;\">".$vana_time['vana_hour'].":".$vana_time['vana_minute'].":".$vana_time['vana_second']."</span></td></tr>\n";
        echo "<tr align='center' bgcolor='green'>";
        echo "<td><span style=\"font-size: 40px; color: #FFF;\">".$vana_time['vana_weekdays'][$vana_time['vana_weekday']]."曜日</span></td>\n";
        echo "<td><span style=\"font-size: 40px; color: #FFF;\">".$vana_time['vana_moon_phases'][$vana_time['vana_moon_phase']]."</span></td>\n";
        echo "</tr></table>";
    }

    public function guild_time($vana_time,$opentime,$closetime){
        $vana_now_in_sec = $vana_time['vana_hour'] * 3600 + $vana_time['vana_minute'] * 60 + $$vana_time['vana_second'];
        $opentime_secs = $opentime * 3600;
        $closetime_secs = $closetime * 3600;

        switch ($vana_now_in_sec){
        //當前時間位於營業時間內的情況
                case $vana_now_in_sec > $opentime_secs && $vana_now_in_sec < $closetime_secs:
                    $eta_seconds = $closetime_secs - $vana_now_in_sec;
                    $eta_earth_secs = $eta_seconds / 25;
        //特殊定義：當遊戲時間為 00:00 時的處理
                    if($eta_seconds == $closetime_secs){
                        $eta_seconds = $opentime_secs;
                        $eta_earth_secs = $eta_seconds / 25;
                        $eta_earth_min = floor($eta_earth_secs / 60);
                        $eta_earth_sec = $eta_earth_secs % 60;
                        if ($eta_earth_min < 10){$eta_earth_min = "0".$eta_earth_min;}else{$eta_earth_min = $eta_earth_min;}
                        if ($eta_earth_sec < 10){$eta_earth_sec = "0".$eta_earth_sec;}else{$eta_earth_sec = $eta_earth_sec;}
                        echo "<font color=\"red\">店休</font>&nbsp;".$eta_earth_min.":".$eta_earth_sec."<br />";        
                    }else{
        //營業時間內的剩餘時間顯示
                        $eta_earth_min = floor($eta_earth_secs / 60);
                        $eta_earth_sec = $eta_earth_secs % 60;
                        if ($eta_earth_min < 10){$eta_earth_min = "0".$eta_earth_min;}else{$eta_earth_min = $eta_earth_min;}
                        if ($eta_earth_sec < 10){$eta_earth_sec = "0".$eta_earth_sec;}else{$eta_earth_sec = $eta_earth_sec;}
                        echo "<font color=\"green\">營業</font>&nbsp;".$eta_earth_min.":".$eta_earth_sec."<br />";        
                    }
                break;
        
        //當前時間位於打烊時間，但未跨日時的情況
                case $vana_now_in_sec > $opentime_secs:
                    $eta_seconds = 86400 - $vana_now_in_sec + 28800;
                    $eta_earth_secs = $eta_seconds / 25;
                    $eta_earth_min = floor($eta_earth_secs / 60);
                    $eta_earth_sec = $eta_earth_secs % 60;
                    if ($eta_earth_min < 10){$eta_earth_min = "0".$eta_earth_min;}else{$eta_earth_min = $eta_earth_min;}
                    if ($eta_earth_sec < 10){$eta_earth_sec = "0".$eta_earth_sec;}else{$eta_earth_sec = $eta_earth_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$eta_earth_min.":".$eta_earth_sec."<br />";        
                break;
        
        //當前時間位於打烊時間，已跨日但未達開店時間的情況
                case $vana_now_in_sec < $closetime_secs:
                    $eta_seconds = $opentime_secs - $vana_now_in_sec;
                    $eta_earth_secs = $eta_seconds / 25;
                    $eta_earth_min = floor($eta_earth_secs / 60);
                    $eta_earth_sec = $eta_earth_secs % 60;
                    if ($eta_earth_min < 10){$eta_earth_min = "0".$eta_earth_min;}else{$eta_earth_min = $eta_earth_min;}
                    if ($eta_earth_sec < 10){$eta_earth_sec = "0".$eta_earth_sec;}else{$eta_earth_sec = $eta_earth_sec;}
                    echo "<font color=\"red\">店休</font>&nbsp;".$eta_earth_min.":".$eta_earth_sec."<br />";        
                break;
                default: 
        }
    }

    
}

?>