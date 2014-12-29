<?php
    session_start();
    include 'translator.php';
    if ($_GET['lang']=='es') {
        header("Content-Type: text/html; charset=ISO-8859-1");
    } else {
        header("Content-Type: text/html; charset=UTF-8");
    }

    /********************************************************************************************************************************************************************************************************/
    $qs = http_build_query($_GET, '', '&amp;'); /* This creates the link with all the information in the $_GET necessary for the pagination to work ******************************************************/

    if(strlen($qs)<"12"){
        $qs="";
    }
    /********************************************************************************************************************************************************************************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <link rel="shortcut icon" href="images/logo.ico" />
        <meta http-equiv="Content-Type" content="text/html" />
        <title>CMproperties - Search Result</title>
        <meta name="keywords" content="cmproperties, casas, inmuebles, houses, property, sell, rent" />
        <meta name="description" content="CMproperties" />
        <meta name="google-translate-customization" content="f834267014ca7c94-fa3692548ecc1728-g752fbb026f2b6e43-13"></meta>
        <link href="stylesheet_v2.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/swfobject.js"></script>
        <script type="text/javascript">

            var flashvars = {};
            flashvars.cssSource = "piecemaker.css";
            flashvars.xmlSource = "photo_list.xml";

            var params = {};
            params.play = "true";
            params.menu = "false";
            params.scale = "showall";
            params.wmode = "transparent";
            params.allowfullscreen = "true";
            params.allowscriptaccess = "always";
            params.allownetworking = "all";

            swfobject.embedSWF('piecemaker.swf', 'piecemaker', '940', '420', '10', null, flashvars,    
            params, null);

        </script>
        <script language="javascript" type="text/javascript">
            function clearText(field)
            {
                    if (field.defaultValue == field.value) field.value = '';
                    else if (field.value == '') field.value = field.defaultValue;
            }
        </script>
    </head>



    <!--
    <?php
        $ypos = $_COOKIE["ypos"]; //gets the Y position from the COOKIES
    ?>
    -->


    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ TRANSLATOR +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <div id="translate_element2">

        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=en" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/english.png"></a>
        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=no" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/norwegian.png"></a>
        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=sv" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/swedish.png"></a>
        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=fi" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/finland.jpg"></a>
        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=ru" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/russian.png"></a>
        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=de" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/german.png"></a>
        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=zh-CN" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/chinese.jpg"></a>
        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=fr" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/french.jpeg"></a>
        <a href="<?php print($_SERVER['PHP_SELF']."?".$qs); ?>&lang=es" style="display:inline; border:none;" ><img style="height:26px; width:38px;" src="images/flags/spanish.png"></a>
        <!-- <p align="center"><?php echo Translate('Choose your language',''); ?></p> -->
    </div>

    <?php

        $_SESSION['lang'] = $_GET['lang'];

    ?>


    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ /TRANSLATOR +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->




    <!-- *************************************************************************************************************************************************************- -->


    <?php
        echo "<body onScroll=\"document.cookie='ypos=' + window.pageYOffset\" onLoad='window.scrollTo(0,$ypos)'>"; // puts the Y position from COOKIES on the body tag
        ?>



        <div id="templatemo_header_wrapper">
            <div id="site_title" class="notranslate">
                <a href="index.php"><img name="cmproperties" src="images/logo.png" height="95px" width="245px" alt="cmproperties" /><span><img src="images/properties.png" height="53px" width="223px" alt="properties" /></span></a>        </div>
            <ul>
                <li><a href="index.php?lang=<?php print($_SESSION['lang']); ?>">Home</a></li>
                <li><a href="search_result.php?lang=<?php print($_SESSION['lang']); ?>" class="current">For Sale</a></li>
                <li><a href="search_result_rent.php?lang=<?php print($_SESSION['lang']); ?>">For Rent</a></li>
                <li><a href="contacto.php?lang=<?php print($_SESSION['lang']); ?>">Contact</a></li>
                <!--                 <li class="last"><a href="contact.html">Contact</a></li> -->
            </ul>

            <div class="cleaner"></div>     
        </div> <!-- end of header -->
    </div>

    <div id="templatemo_wrapper">

        <div id="templatemo_content">

            <div id="templatemo_main_content2">

                <div class="search_result_holder">



                    <!-- START OF THE SEARCH FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->


                    <form id="data_form" action="search_result.php?<?php print($qs); ?>" method="get">

                        <b>
                            <?php print(Translate('Location:','')); ?><select id="localidad" name="localidad" class="search">
                                <option value="%" <?php echo($_GET['localidad'] == "%" ? ' selected="selected"' : null) ?> >Any</option>
                                <option value="Torrevieja" <?php echo($_GET['localidad'] == "Torrevieja" ? ' selected="selected"' : null) ?> >Torrevieja</option>
                                <option value="Guardamar" <?php echo($_GET['localidad'] == "Guardamar" ? ' selected="selected"' : null) ?> >Guardamar</option>
                                <option value="Orihuela Costa" <?php echo($_GET['localidad'] == "Orihuela Costa" ? ' selected="selected"' : null) ?> >Orihuela Costa</option>
                                <option value="Pilar de la Horadada" <?php echo($_GET['localidad'] == "Pilar de la Horadada" ? ' selected="selected"' : null) ?> >Pilar de la Horadada</option>
                                <option value="San Javier" <?php echo($_GET['localidad'] == "San Javier" ? ' selected="selected"' : null) ?> >San Javier</option>
                                <option value="San Miguel de Salinas" <?php echo($_GET['localidad'] == "San Miguel de Salinas" ? ' selected="selected"' : null) ?> >San Miguel de Salinas</option>
                                <option value="Los Alcazares" <?php echo($_GET['localidad'] == "Los Alcazares" ? ' selected="selected"' : null) ?> >Los Alcazares</option>
                                <option value="Mil Palmeras" <?php echo($_GET['localidad'] == "Mil Palmeras" ? ' selected="selected"' : null) ?> >Mil Palmeras</option>
                                <option value="Pinar de Campoverde" <?php echo($_GET['localidad'] == "Pinar de Campoverde" ? ' selected="selected"' : null) ?> >Pinar de Campoverde</option>
                                <option value="Torrepacheco" <?php echo($_GET['localidad'] == "Torrepacheco" ? ' selected="selected"' : null) ?> >Torrepacheco</option>
                                <option value="Dehesa de Campoamor" <?php echo($_GET['localidad'] == "Dehesa de Campoamor" ? ' selected="selected"' : null) ?> >Dehesa de Campoamor</option>
                            </select>

                            <?php print(Translate('Area:','')); ?>
                            <input id="zona" type="text" name="zona" value="<?php echo $_GET['zona'] ?>" class="search">

                            <?php print(Translate('Type:','')); ?>
                            <select id="cat" name="cat" class="search">
                                <option value="%" <?php echo($_GET['cat'] == "%" ? ' selected="selected"' : null) ?> >Any</option>
                                <option value="Apartment" <?php echo($_GET['cat'] == "Apartment" ? ' selected="selected"' : null) ?> >Apartment</option>
                                <option value="Bungalow" <?php echo($_GET['cat'] == "Bungalow" ? ' selected="selected"' : null) ?> >Bungalow</option>
                                <option value="Town house" <?php echo($_GET['cat'] == "Town house" ? ' selected="selected"' : null) ?> >Town house</option>
                                <option value="Duplex" <?php echo($_GET['cat'] == "Duplex" ? ' selected="selected"' : null) ?> >Duplex</option>
                                <option value="Villa" <?php echo($_GET['cat'] == "Villa" ? ' selected="selected"' : null) ?> >Villa</option>
                                <option value="Finca" <?php echo($_GET['cat'] == "Finca" ? ' selected="selected"' : null) ?> >Finca</option>
                                <option value="Plot" <?php echo($_GET['cat'] == "Plot" ? ' selected="selected"' : null) ?> >Plot</option>
                            </select>

                            <?php print(Translate('Bedrooms:','')); ?>
                            <select id="hab" name="hab" class="search">
                                <option value="%" <?php echo($_GET['hab'] == "%" ? ' selected="selected"' : null) ?> >Any</option>
                                <option value="1" <?php echo($_GET['hab'] == "1" ? ' selected="selected"' : null) ?> >1</option>
                                <option value="2" <?php echo($_GET['hab'] == "2" ? ' selected="selected"' : null) ?> >2</option>
                                <option value="3" <?php echo($_GET['hab'] == "3" ? ' selected="selected"' : null) ?> >3</option>
                                <option value="4" <?php echo($_GET['hab'] == "4" ? ' selected="selected"' : null) ?> >4</option>
                                <option value="5" <?php echo($_GET['hab'] == "5" ? ' selected="selected"' : null) ?> >5</option>
                                <option value="6" <?php echo($_GET['hab'] == "6" ? ' selected="selected"' : null) ?> >6</option>
                                <option value="7" <?php echo($_GET['hab'] == "7" ? ' selected="selected"' : null) ?> >7</option>
                            </select>

                            <?php print(Translate('Bathrooms:','')); ?>
                            <select id="wc" name="wc" class="search">
                                <option value="%" <?php echo($_GET['wc'] == "%" ? ' selected="selected"' : null) ?> >Any</option>
                                <option value="1" <?php echo($_GET['wc'] == "1" ? ' selected="selected"' : null) ?> >1</option>
                                <option value="2" <?php echo($_GET['wc'] == "2" ? ' selected="selected"' : null) ?> >2</option>
                                <option value="3" <?php echo($_GET['wc'] == "3" ? ' selected="selected"' : null) ?> >3</option>
                                <option value="4" <?php echo($_GET['wc'] == "4" ? ' selected="selected"' : null) ?> >4</option>
                            </select>



                            <input name="lang" value="<?php print($_GET['lang']); ?>" type="hidden">



                            <br>
                            <br>

                            <?php print(Translate('Order by:','')); ?>
                            <select id="order_by" name="order_by" class="search">
                                <option value="precio ASC" <?php echo($_GET['order_by'] == "precio ASC" ? ' selected="selected"' : null) ?> >Price asc</option>
                                <option value="precio DESC" <?php echo($_GET['order_by'] == "precio DESC" ? ' selected="selected"' : null) ?> >Price desc</option>
                                <option value="wc" <?php echo($_GET['order_by'] == "wc" ? ' selected="selected"' : null) ?> >Bathrooms</option>
                                <option value="hab" <?php echo($_GET['order_by'] == "hab" ? ' selected="selected"' : null) ?> >Bedrooms</option>
                            </select>

                            <!--
                            <?php print(Translate('Max','')); ?>&nbsp&euro; :
                            <input type="text" id="precio_max" name="precio_max" style="width: 5em; " class="search">
                            -->



                            <!--
                            <script>
                                $(function() {
                                        $( "#slider-range" ).slider({
                                                range: true,
                                                min: 0,
                                                max: 500,
                                                values: [ 75, 300 ],
                                                slide: function( event, ui ) {
                                                        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                                                    }
                                            });
                                            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                                            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
                                    });
                                </script>
                                <label for="amount">Price range:</label>
                                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                <div id="slider-range"></div>



                                <output name=o1>1.000</output>€ - <output name=o2>1000000</output>€
                                <input id="price_range" type=range min=0 max=1000000 value=50000 step=10000 oninput="o1.value = valueLow + ':00'; o2.value = valueHigh + ':00'">

                                <?php print(Translate('Reference:','')); ?>
                                <input type="text" id="ref" name="ref" value="<?php echo $_GET['ref'] ?>" class="search">

                                -->

                            </b>

                            </br>
                            </br>
                            <div id="search_button">
                                <input type="submit" value="<?php print(Translate('Search','')); ?>">
                            </div>
                        </form>



                        <!-- END OF THE SEARCH FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

                        </br>




                        <!-- *************************************************************************************************************************************************************- -->

                        <table align="center" cellspacing="10">

                            <tr>

                                <?php



                                    // ***************************************************************** PAGINATION **********************************************************************************

                                    $pageno = $_GET['pageno'];

                                    if (!(isset($pageno))){
                                        $pageno = 1;
                                    }

                                    // No of results on each page
                                    $resultsno = 20;

                                    //$max = ($pageno - 1) * $resultsno . ',' . $resultsno;
                                    $max = ($pageno - 1) * $resultsno . ',' . $resultsno;

                                    // ***************************************************************** PAGINATION **********************************************************************************



                                    include 'connect.php';

                                    mysql_select_db("cmproperties", $db);

                                    if ($_GET['localidad'] == ""){
                                        $localidad = "%";
                                    }else{
                                        $localidad = $_GET['localidad'];
                                    }

                                    if ($_GET['zona'] == ""){
                                        $zona = "%";
                                    }else{
                                        $zona = $_GET['zona'];
                                    }

                                    if ($_GET['wc'] == ""){
                                        $wc = "%";
                                    }else{
                                        $wc = $_GET['wc'];
                                    }

                                    if ($_GET['cat'] == ""){
                                        $cat = "%";
                                    }else{
                                        $cat = $_GET['cat'];
                                    }

                                    if ($_GET['hab'] == ""){
                                        $hab = "%";
                                    }else{
                                        $hab = $_GET['hab'];
                                    }

                                    if ($_GET['ref'] == ""){
                                        $ref = "%";
                                    }else{
                                        $ref = $_GET['ref'];
                                    }

                                    if ($_GET['sea_views'] == ""){
                                        $sea_views = "%";
                                    }else{
                                        $sea_views = $_GET['sea_views'];
                                    }


                                    $pmax = $_GET['precio_max'];



                                    if ($_GET['order_by'] == ""){
                                        $order_by = "precio ASC";
                                    }else{
                                        $order_by = $_GET['order_by'];
                                    }


                                    if ($pmax == ""){
                                        $query = mysql_query("SELECT * FROM `Casas` WHERE `localidad` LIKE '" . $localidad . "' AND `hab` LIKE '" . $hab . "' AND `sea_views` LIKE '" . $sea_views . "'AND `zona` LIKE '" . $zona . "' AND `wc` LIKE '" . $wc . "' AND `cat` LIKE '" . $cat . "' AND `ref` LIKE '" . $ref . "' ORDER BY " . $order_by . " limit " . $max . "");
                                    } else {
                                        $query = mysql_query("SELECT * FROM `Casas` WHERE `localidad` LIKE '" . $localidad . "' AND `hab` LIKE '" . $hab . "' AND `sea_views` LIKE '" . $sea_views . "'AND `zona` LIKE '" . $zona . "' AND `wc` LIKE '" . $wc . "' AND `cat` LIKE '" . $cat . "'  AND `precio` < '" . $pmax . "' AND `ref` LIKE '" . $ref . "' ORDER BY " . $order_by . " limit " . $max . "");
                                    }


                                    $house_counter = "0";

                                    while ($row = mysql_fetch_array($query))
                                    {
                                        $reference = $row['ref'];
                                        $query2 = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $reference . "' ORDER BY imgpath LIMIT 1");
                                        $row2 = mysql_fetch_array($query2);

                                        $price = substr_replace($row['precio'], '.', strlen($row['precio'])-3, 0);


                                        if ($house_counter!=0 && $house_counter % 4 == 0){
                                            echo "</tr>";
                                        echo "<tr>";
                                            echo "<td id='search_result_cell' >";
                                                echo "<a href='house.php?ref=" . $row['ref'] . "&lang=". $_SESSION['lang'] ."'> <img src='" . $row2['imgpath'] . "' alt='' id='image_result_cell' /></a></br>";
                                                if($row['sold']==1){
                                                    echo "<b id='sold_res'>".Translate("Sold",'')."&nbsp</b><br>"; /* ********************************* SOLD LETTERS ********************************************** */
                                                } else if($row['reserved']==1){
                                                    echo "<b id='sold_res'>".Translate("Reserved",'')."&nbsp</b><br>"; /* ********************************* RESERVED LETTERS ********************************************** */
                                                } else {
                                                    echo "<p style='line-height: 28px;'><br></p>";
                                                }
                                                echo "Ref: <a style='line-height: 190%;' href='house.php?ref=" . $row['ref'] . "'>" . $row['ref'] . "</a><result></br><b>" . $row['localidad'] . "</b></br><i>" . $row['zona'] . "</i></br><result style='font-size: 13px;' >" . $row['cat'] . "</br>" . $row['hab'] . " Bed - " . $row['wc'] . " Bath</result>" . "</br></result><precio_result>" . $price . "&euro;</precio_result></br>";
                                                echo "</td>";
                                            //echo "</tr>";
                                        $house_counter ++;
                                    }else{
                                        echo "<td id='search_result_cell'>";
                                            echo "<a href='house.php?ref=" . $row['ref'] . "&lang=". $_SESSION['lang'] ."'> <img src='" . $row2['imgpath'] . "' alt='' id='image_result_cell' /></a></br>";
                                            if($row['sold']==1){
                                                echo "<b id='sold_res'>".Translate("Sold",'')."</b><br>"; /* ********************************* SOLD LETTERS ********************************************** */
                                            } else if($row['reserved']==1){
                                                echo "<b id='sold_res'>".Translate("Reserved",'')."</b><br>"; /* ********************************* RESERVED LETTERS ********************************************** */
                                            } else {
                                                echo "<p style='line-height: 28px;'><br></p>";
                                            }
                                            echo "Ref: <a style='line-height: 190%;' href='house.php?ref=" . $row['ref'] . "'>" . $row['ref'] . "</a><result></br><b>" . $row['localidad'] . "</b></br><i>" . $row['zona'] . "</i></br><result>" . $row['cat'] . "</br>" . $row['hab'] . " Bed - " . $row['wc'] . " Bath</result>" . "</br></result><precio_result>" . $price . "&euro;</precio_result></br>";
                                            echo "</td>";
                                        $house_counter ++;
                                    }

                                }



                                // ***************************************************************** How many houses there are with the restrictions given ******************************************************

                                $data = mysql_query("SELECT localidad, precio, ref, hab, wc, cat, sold, reserved FROM `Casas` WHERE `localidad` LIKE '" . $localidad . "' AND `hab` LIKE '" . $hab . "'AND `zona` LIKE '" . $zona . "' AND `wc` LIKE '" . $wc . "' AND `sea_views` LIKE '" . $sea_views . "' AND `cat` LIKE '" . $cat ."' AND `ref` LIKE '" . $ref . "' ORDER BY " . $order_by . "");


                                $rows = mysql_num_rows($data);



                                mysql_close($db);



                                // Calculate the number of last page
                                if($rows % $resultsno == 0){
                                    $correction = 0;
                                }else{
                                    $correction = 1;
                                }

                                $last = intval($rows/$resultsno)+intval($correction);

                                if ($pageno > $last){
                                    $pageno = 1;
                                } elseif ($pageno > $last){
                                    $pageno = $last;
                                }


                            ?>



                        </table>


                        <!-- *************************************************************************************************************************************************************- -->
                        <br><br>
                        <p align="center">

                        <!-- The links created below have a href pointing to the direction wanted, all the search parameters arein the url itself thanks to $qs (SEE HEADER) -->


                        <?php

                            echo "-Page <a style='font-style: italic;'>".$pageno."</a> of <a style='font-weight: bold;'>".$last."</a>-<br>";

                            if ($pageno == 1){
                                }else{
                                    echo " <a style='font-size: 14px; color: black; background-color: #cccccc;' href='{$_SERVER['PHP_SELF']}?".$qs."&pageno=1'><<-</a> ";

                                    echo " ";

                                    $previous = $pageno-1;

                                    echo " <a style='font-size: 14px; color: black; background-color: #cccccc;' href='{$_SERVER['PHP_SELF']}?".$qs."&pageno=$previous'><-</a> ";

                                } 
                                //just a spacer
                                echo "&nbsp";
                                echo "&nbsp";


                                // While loop to display all the possibilities, to jump to whatever page you wish
                                $counter = 1;
                                while($counter<=$last){
                                    if ($counter == $pageno){
                                        //Display marked in some way
                                        echo " <a style='font-size: 15px; color: black; font-weight: bold; background-color: #dddddd;' href='{$_SERVER['PHP_SELF']}?".$qs."&pageno=$counter'>&nbsp$counter&nbsp</a> ";
                                    }else{
                                        //Display normal number
                                        echo " <a style='font-size: 14px; color: black; background-color: #cccccc;' href='{$_SERVER['PHP_SELF']}?".$qs."&pageno=$counter'>&nbsp$counter&nbsp</a> ";
                                    }
                                    $counter++;
                                    echo "<a style='font-size: 5px;'>&nbsp</a>";
                                }



                                //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
                                echo "&nbsp";
                                echo "&nbsp";
                                if ($pageno == $last){
                                    }else{
                                        $next = $pageno+1;

                                        echo " <a style='font-size: 14px; color: black; background-color: #cccccc;' href='{$_SERVER['PHP_SELF']}?".$qs."&pageno=$next'>-></a> ";

                                        echo " ";

                                        echo " <a style='font-size: 14px; color: black; background-color: #cccccc;' href='{$_SERVER['PHP_SELF']}?".$qs."&pageno=$last'>->></a> ";

                                    }


                                ?>

                            </form>

                            </p>
                            <!-- *************************************************************************************************************************************************************- -->











                        </div>

                    </div>


                    <div class="cleaner"></div>
                </div>
                <div id="templatemo_content_bottom"></div>
            </div> <!-- end of wrapper -->

            <div id="templatemo_footer">

                Copyright &copy; 2048 CMproperties

            </div> <!-- end of templatemo_footer -->

        </body>
    </html>

