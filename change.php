<?php
    require('login.php');
?>

<script language="javascript" type="text/javascript">
    function clearText(field)
    {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
    }
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CMproperties</title>
        <meta name="keywords" content="cmproperties, casas, inmuebles, houses, property, sell, rent" />
        <meta name="description" content="Change" />

        <link href="templatemo_style.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div id="templatemo_header_wrapper">
            <div id="templatemo_header">

                <div class="cleaner"></div>     
            </div>
            <div class="cleaner"></div>
        </div> <!-- end of header -->
        <div class="cleaner"></div>
    </div>

    <div id="templatemo_wrapper">

        <div id="templatemo_content_top"></div>
        <div id="templatemo_content">
            <div id="templatemo_main_content2">


                <div class="search_result_holder">



                    <!-- *************************************************************************************************************************************************************- -->

                    <table align="center" cellspacing="10">

                        <?php

                            include 'connect.php';

                            mysql_select_db("cmproperties", $db);

                            $localidad = $_POST['localidad'];
                            $wc = $_POST['wc'];
                            $cat = $_POST['cat'];
                            $hab = $_POST['hab'];
                            $pmax = $_POST['precio_max'];


                            $query = mysql_query("SELECT * FROM `Casas`");


                            $house_counter = "0";

                            while ($row = mysql_fetch_array($query))
                            {
                                $reference = $row['ref'];
                                $query2 = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $reference . "' ORDER BY imgpath");
                                $row2 = mysql_fetch_array($query2);

                                if ($house_counter!=0 && $house_counter % 4 == 0){
                                    echo "</tr>";
                                echo "<tr>";
                                    echo "<td align='center' bgcolor='#ffffff' width='250px' height='305px' >";
                                        echo "<a href='modify.php?ref=" . $row['ref'] . "'> <img src='" . $row2['imgpath'] . "' width='95%' height='140px' alt='' style='margin: 0px 0px -38px 0px;' /></a></br>";
                                        if($row['sold']==1){
                                            echo "<b style='font-size: 35px; color: red;'>Sold</b><br><br>"; /* ********************************* SOLD LETTERS ********************************************** */
                                        } else if($row['reserved']==1){
                                            echo "<b style=font-size: 35px; color: red;'>Reserved</b><br><br>"; /* ********************************* RESERVED LETTERS ********************************************** */
                                        } else {
                                            echo "<p style='line-height: 28px;'><br></p>";
                                        }
                                        echo "Ref: <a style='line-height: 190%;' href='modify.php?ref=" . $row['ref'] . "'>" . $row['ref'] . "</a><result></br><b>" . $row['localidad'] . "</b></br><i>" . $row['zona'] . "</i></br><result style='font-size: 13px;' >" . $row['cat'] . "</br>" . $row['hab'] . " Bedrooms</result>" . "</br></result><precio_result>" . $row['precio'] . "€</precio_result></br>";
                                        echo "</td>";
                                    //echo "</tr>";
                                $house_counter ++;
                            }else{
                                echo "<td align='center' bgcolor='#ffffff' width='250px' height='305px'>";
                                    echo "<a href='modify.php?ref=" . $row['ref'] . "'> <img src='" . $row2['imgpath'] . "' width='95%' height='140px' alt='' style='margin: 0px 0px -38px 0px;' /></a></br>";
                                    if($row['sold']==1){
                                        echo "<b style='font-size: 35px; color: red;'>Sold</b><br><br>"; /* ********************************* SOLD LETTERS ********************************************** */
                                    } else if($row['reserved']==1){
                                        echo "<b style=font-size: 35px; color: red;'>Reserved</b><br><br>"; /* ********************************* RESERVED LETTERS ********************************************** */
                                    } else {
                                        echo "<p style='line-height: 28px;'><br></p>";
                                    }
                                    echo "Ref: <a style='line-height: 190%;' href='modify.php?ref=" . $row['ref'] . "'>" . $row['ref'] . "</a><result></br><b>" . $row['localidad'] . "</b></br><i>" . $row['zona'] . "</i></br><result style='font-size: 13px;' >" . $row['cat'] . "</br>" . $row['hab'] . " Bedrooms</result>" . "</br></result><precio_result>" . $row['precio'] . "€</precio_result></br>";
                                    echo "</td>";
                                $house_counter ++;
                            }

                        }



                        mysql_close($db);


                    ?>

                </table>


                <!-- *************************************************************************************************************************************************************- -->

            </div>

        </div>


        <div class="cleaner"></div>
    </div>
    <div id="templatemo_content_bottom"></div>

    <div id="templatemo_footer">

        Copyright © 2048 <a href="#">CMproperties</a>

    </div> <!-- end of templatemo_footer -->

</div> <!-- end of wrapper -->
</body>
</html>

