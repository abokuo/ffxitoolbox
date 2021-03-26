<?php
require_once("include/ffxitoolbox_menu.php");

ffxitoolbox_menu("工會時間表");
?>
        <script src="vanaclock/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                setInterval(function(){
                    $('#vana_time').load('vanaclock/vana_time.php')
                }, 1000);
            });
        </script>
    </head>
    <body>
        <div id="vana_time"></div>
    </body>
</html>