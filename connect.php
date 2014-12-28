<?php

        $server = "cmproperties.es";

        $db = mysql_connect($server, 'root', 'Minipipoku/1234', 'cmproperties');
        if (!$db){
                die ('Could not connect to Database $server' . mysql_error());
        }

?>
