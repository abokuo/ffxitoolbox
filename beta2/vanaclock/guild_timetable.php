<?php
require_once("../app/vanatime.php");
echo "<table border='1' noshade>\n";
echo "<tr align='center'><th>木工</th><th>鍛冶</th><th>彫金</th><th>裁縫</th></tr>\n";
echo "<tr><td>";
//木工
$guild_timetable = new vanatime;

echo "北サンドリア (E-3)<br />";$guild_timetable->guild_time($vana_time,6,21);
echo "ギルド桟橋北桟橋 (H-8)<br />";$guild_timetable->guild_time($vana_time,5,22);
echo "</td>\n<td>";
//鍛冶
echo "北サンドリア (E-5)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "大工房1F (E-9)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "マウラ (F-9)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "アルザビ (H-9)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "</td>\n<td>";
//彫金
echo "バストゥーク商業區 (H-8)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "マウラ (G-8)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "アルザビ (J-10)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "</td>\n<td>";
//裁縫
echo "ウィスタス森之區 (F-12)<br />";$guild_timetable->guild_time($vana_time,6,21);
echo "セルビナ (H-9)<br />";$guild_timetable->guild_time($vana_time,6,21);
echo "アルザビ (J-10)<br />";$guild_timetable->guild_time($vana_time,6,21);
echo "</td>\n</tr>";

echo "<tr align='center'><th>革細工</th><th>骨細工</th><th>錬金術</th><th>調理</th></tr>\n";
//革細工
echo "<tr><td>";
echo "南サンドリア (D-8)<br />";$guild_timetable->guild_time($vana_time,3,18);
echo "</td>\n<td>";
//骨細工
echo "ウィスタス森の区 (H-12)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "</td>\n<td>";
//錬金術
echo "バストゥーク鉱山区 (K-7)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "アトルガン白門　(G-5)<br />";$guild_timetable->guild_time($vana_time,8,23);
echo "</td>\n<td>";
//調理
echo "ウィスタス水の区 (E-8)<br />";$guild_timetable->guild_time($vana_time,5,20);
echo "</td>\n</tr>";
//漁師
echo "<tr align='center'><th colspan='4'>漁師</th></tr>\n";
echo "<tr><td>";
echo "ウィスタス港 (C-8)<br />";$guild_timetable->guild_time($vana_time,3,18);
echo "セルビナ (H-9)<br />";$guild_timetable->guild_time($vana_time,3,18);
echo "</td>\n<td>";
echo "ビビキー湾 (H-7)<br />";$guild_timetable->guild_time($vana_time,1,18);
echo "アトルガン白門 (H-11)<br />";$guild_timetable->guild_time($vana_time,1,18);
echo "</td>\n<td>";
echo "機船航路<br />";$guild_timetable->guild_time($vana_time,1,23);
echo "外洋航路<br />";$guild_timetable->guild_time($vana_time,1,23);
echo "銀海航路<br />";$guild_timetable->guild_time($vana_time,1,23);
echo "</td><td>&nbsp;</td></tr>";
echo "</table>"; 

?>