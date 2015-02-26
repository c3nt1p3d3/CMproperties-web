<?php

    require('login.php');
    include 'translator.php';

?>

<html>

    <title> XML Select </title>

    <head>

        <script src="http://code.jquery.com/jquery-latest.js"></script>

        <script language="JavaScript">
            // Function that selects and deselects all the references in the Spainhouses form
            function toggle_spainhouses(source){
                    checkboxes = document.getElementsByName('ref_spainhouses[]');
                    for(var i=0, n=checkboxes.length; i<n; i++){
                            checkboxes[i].checked = source.checked;
                    }
            }

            // Function that selects and deselects all the references in the Kyero form
            function toggle_kyero(source){
                    checkboxes = document.getElementsByName('ref_kyero[]');
                    for(var i=0, n=checkboxes.length; i<n; i++){
                            checkboxes[i].checked = source.checked;
                    }
            }


            // Function that selects and deselects all the references in the Yaencontre form
            function toggle_yaencontre(source){
                    checkboxes = document.getElementsByName('ref_yaencontre[]');
                    for(var i=0, n=checkboxes.length; i<n; i++){
                            checkboxes[i].checked = source.checked;
                    }
            }


        </script>



        <?php

            $doc_sp = new DOMDocument(1.0);
            $doc_sp->load('XMLexports/kyero/spainhouses.xml');
            $properties_sp = $doc_sp->getElementsByTagName("property");
            $ref_array_sp = array();
            foreach($properties_sp as $property_sp)
            {
                $refs_sp = $property_sp->getElementsByTagName("id");
                $ref_sp = $refs_sp->item(0)->nodeValue;
                //                echo "<b>Ref: ";
                    //                echo "$ref_</b>";
                array_push($ref_array_sp, $ref_sp);
            }
            //            print_r($ref_array);



            $doc_k = new DOMDocument(1.0);
            $doc_k->load('XMLexports/kyero/kyero.xml');
            $properties_k = $doc_k->getElementsByTagName("property");
            $ref_array_k = array();
            foreach($properties_k as $property_k)
            {
                $refs_k = $property_k->getElementsByTagName("id");
                $ref_k = $refs_k->item(0)->nodeValue;
                array_push($ref_array_k, $ref_k);
            }



            $doc_y = new DOMDocument(1.0);
            $doc_y->load('XMLexports/yaencontre/yaencontre.xml');
            $properties_y = $doc_y->getElementsByTagName("property");
            $ref_array_y = array();
            foreach($properties_y as $property_y)
            {
                $refs_y = $property_y->getElementsByTagName("id");
                $ref_y = $refs_y->item(0)->nodeValue;
                array_push($ref_array_y, $ref_y);
            }




        ?>




    </head>




    <body>

        <form method="post" action="xmlcreateSpainHouses.php" id="form_spainhouses">

            <div id="main">

                <input type="checkbox" onClick="toggle_spainhouses(this)" /> Select All<br><br>

                <div id='column' style='width:150px;float:left;'>

                    <?php

                        include 'connect.php';

                        mysql_select_db("cmproperties", $db);

                        $query = mysql_query("SELECT * FROM `Casas` ORDER BY ref");

                        $counter = 0;


                        while ($row = mysql_fetch_array($query)){
                            $reference = $row['ref'];
                            if($row['sold']==0){
                                if(in_array($reference, $ref_array_sp)){
                                    echo '<input type="checkbox" value="'.$reference.'" checked="checked" name="ref_spainhouses[]" onclick="countCheckboxes()" style="width:1em!important;">'.$reference.'</input>';
                                } else {
                                    echo '<input type="checkbox" value="'.$reference.'" name="ref_spainhouses[]" onclick="countCheckboxes()" style="width:1em!important;">'.$reference.'</input>';
                                }
                                $counter++;
                                echo "<br>";
                            }
                            // This is to make 3 columns of references, otherwise we would have to scroll
                            if(($counter%19)==0){
                                echo "</div><div id='column' style='width:150;float:left;'>";
                            }
                        }

                    ?>

                </div>

            </div>

            <div id="checked_count">
                count
            </div>

            <div>
                <input type="submit" value="Create SpainHouses" />
            </form>




            <script language="JavaScript">

                var SpainHouses_checked = "counter not working atm";
                //                var SpainHouses_checked = $('input[type="checkbox"]:checked').length;
                function countCheckboxes () {
                        var form = document.getElementById('form_spainhouses');
                        var SpainHouses_checked = 0;
                        for(var n=0; n<form.length; n++) {
                                if(form[n].name == 'ref_spainhouses[]' && form[n].checked){
                                        SpainHouses_checked++;
                                }
                        }
                        document.getElementById('checked_count').innerHTML = SpainHouses_checked;
                }
                window.onload = countCheckboxes;


            </script>



            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <b> -------------------------------------------------------------------------------------------------------------------------- </b>
            <br><br>

            <!-- KYERO XML CREATOR -->

            <form method="post" action="xmlcreateKyero.php" id="form_kyero">
                <div id="main">

                    <input type="checkbox" onClick="toggle_kyero(this)" /> Select All<br><br>

                    <div id='column' style='width:150px;float:left;'>

                        <?php

                            include 'connect.php';

                            mysql_select_db("cmproperties", $db);

                            $query = mysql_query("SELECT * FROM `Casas` ORDER BY ref");

                            $counter = 0;

                            while ($row = mysql_fetch_array($query)){
                                $reference = $row['ref'];
                                if($row['sold']==0){
                                    if(in_array($reference, $ref_array_k)){
                                        echo '<input type="checkbox" value="'.$reference.'" checked="checked" name="ref_kyero[]" style="width:1em!important;">'.$reference.'</input>';
                                    } else {
                                        echo '<input type="checkbox" value="'.$reference.'" name="ref_kyero[]" style="width:1em!important;">'.$reference.'</input>';
                                    }
                                    $counter++;
                                    echo "<br>";
                                }
                                // This is to make 3 columns of references, otherwise we would have to scroll
                                if(($counter%19)==0){
                                    echo "</div><div id='column' style='width:150;float:left;'>";
                                }
                            }

                        ?>

                    </div>

                </div>


                <input type="submit" value="Create Kyero" />
            </form>


            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <b> -------------------------------------------------------------------------------------------------------------------------- </b>
            <br><br>



            <!-- YAENCONTRE XML CREATOR -->

            <form method="post" action="xmlcreateYaecontre.php" id="form_yaencontre">
                <div id="main">

                    <input type="checkbox" onClick="toggle_yaencontre(this)" /> Select All<br><br>

                    <div id='column' style='width:150px;float:left;'>

                        <?php

                            include 'connect.php';

                            mysql_select_db("cmproperties", $db);

                            $query = mysql_query("SELECT * FROM `Casas` ORDER BY ref");

                            $counter = 0;

                            while ($row = mysql_fetch_array($query)){
                                $reference = $row['ref'];
                                if($row['sold']==0){
                                    if(in_array($reference, $ref_array_k)){
                                        echo '<input type="checkbox" value="'.$reference.'" checked="checked" name="ref_yaencontre[]" style="width:1em!important;">'.$reference.'</input>';
                                    } else {
                                        echo '<input type="checkbox" value="'.$reference.'" name="ref_yaencontre[]" style="width:1em!important;">'.$reference.'</input>';
                                    }
                                    $counter++;
                                    echo "<br>";
                                }
                                // This is to make 3 columns of references, otherwise we would have to scroll
                                if(($counter%19)==0){
                                    echo "</div><div id='column' style='width:150;float:left;'>";
                                }
                            }

                        ?>

                    </div>

                </div>


                <input type="submit" value="Create Yaencontre" />
            </form>




        </div>

    </body>

</html>


<?php
    mysql_close($db);
?>
