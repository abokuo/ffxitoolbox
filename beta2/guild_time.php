<?php
require_once("include/ffxitoolbox_menu.php");
ffxitoolbox_menu("工會商店時間表");
?>
        <script>
            $(document).ready(function(){
                setInterval(function(){
                    $('#guild_timetable').load('vanaclock/guild_timetable.php')
                }, 500);
            });
        </script>
    </head>
    <body>
        <div id="guild_timetable"></div>
    </body>
</html>
