<?php
function ffxitoolbox_menu($title){
    echo "<!DOCTYPE html>";
    echo "<html>\n";
    echo "<head>\n";
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
    echo "<title>" . $title . "</title>\n";
    echo "</head>\n";
    echo "<body>\n";
    echo "<a name=\"top\">";
    echo "<table border=\"1\" noshade>\n";
    echo "<tr>\n";
    echo "<td colspan=\"4\">";
    $vanaclock = <<<content
    <script src="vanaclock/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function(){
        setInterval(function(){
            $('#sample_vanaclock').load('vanaclock/sample_vanaclock.php')
        }, 1000);
    });
    </script>
    <div id="sample_vanaclock"></div>
    content;
    echo $vanaclock;
    echo "</td></tr>\n";
    echo "<tr>\n";
    echo "<td><a href=\"index.php\">網站首頁</a></td>\n";
    echo "<td><a href=\"guild_time.php\">工會時間表</a></td>\n";
    echo "<td><a href=\"food_effect_list.php\">食物效果一覽</a></td>\n";
    echo "<td><a href=\"discompose.php\">分解配方一覽</a></td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td><a href=\"recipe_woodworking.php\">合成配方：木工</a></td>\n";
    echo "<td><a href=\"recipe_smithing.php\">合成配方：鍛冶</a></td>\n";
    echo "<td><a href=\"recipe_goldsmithing.php\">合成配方：彫金</a></td>\n";
    echo "<td><a href=\"recipe_clothcraft.php\">合成配方：裁縫</a></td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td><a href=\"recipe_leathercraft.php\">合成配方：革細工</a></td>\n";
    echo "<td><a href=\"recipe_bonecraft.php\">合成配方：骨細工</a></td>\n";
    echo "<td><a href=\"recipe_alchemy.php\">合成配方：錬金術</a></td>\n";
    echo "<td><a href=\"recipe_cooking.php\">合成配方：調理</a></td>\n";
    echo "</tr>\n";
    echo "<tr><td colspan=\"4\">";
    echo "<script async src=\"https://cse.google.com/cse.js?cx=006f3b1baba1a7f4d\"></script><div class=\"gcse-search\"></div>\n";
    echo "</td></tr>\n";
    echo "</table>\n<hr />\n";
}
?>