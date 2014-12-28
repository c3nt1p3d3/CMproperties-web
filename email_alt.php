<?php
session_start();
include 'translator.php';
header("Content-Type: text/html; charset=UTF-8");
//header("Content-Type: text/html; charset=ISO-8859-1");

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//---------------------------------------------------------------CONNECTION-------------------------------------------------------------------------
include 'connect.php';

mysql_select_db("db435736022", $db);

//---------------------------------------------------------------/CONNECTION-------------------------------------------------------------------------
$referencia = $_GET['ref'];
//---------------------------------------------------------------DATA FETCH 1------------------------------------------------------------------------

$query = mysql_query("SELECT * FROM `Casas` WHERE `ref` LIKE '" . $referencia . "'");

$row = mysql_fetch_array($query);

$localidad = $row['localidad'];
$wc = $row['wc'];
$cat = $row['cat'];
$hab = $row['hab'];
$desc_eng = $row['desc_eng'];
$zona = $row['zona'];
$precio = $row['precio'];
$prov = $row['provincia'];
$ref = $row['ref'];
$titulo = $row['titulo'];
$carac = $row['caract'];
$carac_array = explode(",", $carac);


$price = substr_replace($row['precio'], '.', strlen($row['precio'])-3, 0);

//---------------------------------------------------------------/DATA FETCH 1-------------------------------------------------------------------------
//---------------------------------------------------------------DATA FETCH 2-------------------------------------------------------------------------

$query2 = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath");
$query_first = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 1");
$query_second = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 1,2");
$query_third = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 2,3");
$query_fourth = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 3,4");
$query_fifth = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 4,5");
$query_sixth = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 5,6");
$query_seventh = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 6,7");
$query_eighth = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 7,8");

$row_first = mysql_fetch_array($query_first);
$row_second = mysql_fetch_array($query_second);
$row_third = mysql_fetch_array($query_third);
$row_fourth = mysql_fetch_array($query_fourth);
$row_fifth = mysql_fetch_array($query_fifth);
$row_sixth = mysql_fetch_array($query_sixth);
$row_seventh = mysql_fetch_array($query_seventh);
$row_eighth = mysql_fetch_array($query_eighth);

$img_1 = $row_first['imgpath'];
$img_2 = $row_second['imgpath'];
$img_3 = $row_third['imgpath'];
$img_4 = $row_fourth['imgpath'];
$img_5 = $row_fifth['imgpath'];
$img_6 = $row_sixth['imgpath'];
$img_7 = $row_seventh['imgpath'];
$img_8 = $row_eighth['imgpath'];

$titulo = str_replace("<br>", '', $titulo);
$titulo = str_replace("<br/>", '', $titulo);
$titulo = str_replace("</br>", '', $titulo);
$titulo = str_replace("<BR>", '', $titulo);
$titulo = str_replace("<BR>", '', $titulo);
$titulo = str_replace("</BR>", '', $titulo);
$titulo = str_replace("<BR/>", '', $titulo);

//---------------------------------------------------------------/DATA FETCH 2-------------------------------------------------------------------------

//---------------------------------------------------------------Final Data----------------------------------------------------------------------------

$datos ="C/ Francisco Soribella Lopez
Torrevieja 03183
608 498 985
Tel-Fax: 965 32 18 92
info@cmproperties.es";

// *********************************
$address_1 = "C/ Francisco Soribella Lopez";
$address_2 = "Torrevieja 03183";
$movil = "608 498 985";
$telf = "Tel-Fax: 965 32 18 92";
$web = "www.cmproperties.es";
$mail = "info@cmproperties.es";
// *********************************

$inmoreal = "Inmobiliaria - Real Estate";

$url_btn = "http://www.cmproperties.es/house.php?ref=".$ref;

//---------------------------------------------------------------/Final Data----------------------------------------------------------------------------





?>



<div style="text-align: center; background-color: #ffffff;">
<!-- ****************************************************** Header ****************************************************** -->




  <div style="background-color: #fe320c; width: 100%; margin-top: 10px; text-align: center; padding-bottom: 15px; padding-top: 5px; font-size: 18px; font-weight: bold; height: 72px;" >
    <div style="text-align: center; margin-left: 25px; margin-top: -15px; float: left;">
      <br>
      <img width="135px" height="48px" alt="logo" src="http://www.cmproperties.es/images/logo.png" >
      <img width="155" height="28px" alt="properties" src="http://www.cmproperties.es/images/properties.png">
      <br>
      <?php print($inmoreal); ?>
    </div>
    <a style="font-size: 31px; box-shadow: none; text-decoration: none; color: white; line-height: 9px;">
      <br>
      Tel: <?php print($movil); ?>
    </a>
    <p style="font-size: 23px; line-height: 15px; color: white; font-weight: bold; text-align: right; float: right; margin-right: 20px; margin-top: -12px;" >
      <?php print($web); ?>
      <br>
      <br>
      <?php print($mail); ?>
      <br>
      <br>
      Tel. y Fax: 965 35 18 92
    </p>
    <a style="font-size: 19px; box-shadow: none; text-decoration: none; color: black; line-height: 12px;">
    <br>
    <br>
    <br>
    <i>Ctra. a San Miguel, Km 1 - La Regia</i>
    </a>
  </div>

</div>









  <div style="background-color: #fe320c; width: 100%; margin-bottom: 5px; margin-top: 5px; padding-top: 3px; text-align: center;">
    <div style="text-align: right;">

      <br>
      <a style="font-size: 45px; color: white; font-weight: bold; line-height: 40px; float: right; margin-right: 15px;" >
        <?php print($price); ?>&euro;
      </a>
    </div>

    <div style="text-align: center; margin-left: 25px; float: left;" >
            <a style="color: white; text-decoration: none; font-weight: bold; font-size: 19px; float: center" ><a style="  background-color: #fe320c; border-radius: 5px; font-size: 23px; color: white; text-decoration: none; box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5); box-shadow:; font-weight: bold; font-style: italic;" href="http://www.cmproperties.es/house.php?ref=<?php print($ref) ?>&lang=es">REF: <?php print($ref); ?></a>  <img src="http://www.cmproperties.es/images/hand_pointer.png" height="25px" width="30px"></a> 
    </div>    

      <a style="font-size: 35px; font-weight: bold; color: white;">
        <?php print($titulo); ?>
      </a>
      <br>
      <br>

  </div>
<!-- ****************************************************** /Header ****************************************************** -->
<!-- ****************************************************** IMG ****************************************************** -->
<!--  <div style="text-align: center; width: 100%; overflow: none;">

    <img src="http://www.cmproperties.es/<?php print($img_1); ?>" width="100%" height="auto">

  </div>
-->
<!-- ****************************************************** /IMG ****************************************************** -->
<!-- ****************************************************** Second Title ****************************************************** -->

  <div style="background-color: #4096ee; padding: 10px;" >

    <div style="text-align : center; padding: 15px;" >

      <p style="font-size: 25px; color: white; font-weight: bold; font-style: italic">
        <class><?php print($cat); ?>&nbsp·&nbsp<?php print($hab); ?> bed /&nbsp<?php print($wc); ?> bath ·&nbsp<?php print($zona); ?></class>

        <br>
        <br>

        <?php
        $i = 0;
        if (isset($carac_array)) {
          $carac_array_count = count($carac_array);
        }

        while ($carac_array[$i]!="" && $i<$carac_array_count) {
          echo "&nbsp ·".$carac_array[$i]."&nbsp";
          $i++;
        }
        ?>
      </p>

  </div>

  </div>
<!-- ****************************************************** /Second Title ****************************************************** -->
<!-- ****************************************************** /Second IMG ****************************************************** -->

  <div style="text-align: center; width: 100%; overflow: none; background-color: #4096ee;">
    <img src="http://www.cmproperties.es/<?php print($img_1); ?>" width="45%" height="auto" style="margin:5px;">
    <img src="http://www.cmproperties.es/<?php print($img_2); ?>" width="45%" height="auto" style="margin:5px;">
    <img src="http://www.cmproperties.es/<?php print($img_3); ?>" width="45%" height="auto" style="margin:5px;">
    <img src="http://www.cmproperties.es/<?php print($img_4); ?>" width="45%" height="auto" style="margin:5px;">
    <img src="http://www.cmproperties.es/<?php print($img_5); ?>" width="45%" height="auto" style="margin:5px;">
    
<?php
    if(isset($img_6)){
        echo '<img src="http://www.cmproperties.es/'.$img_6.'" width="45%" height="auto" style="margin:5px;">';
    }
    if(isset($img_7)){
        echo '<img src="http://www.cmproperties.es/'.$img_7.'" width="45%" height="auto" style="margin:5px;">';
    }
    if(isset($img_8)){
        echo '<img src="http://www.cmproperties.es/'.$img_8.'" width="45%" height="auto" style="margin:5px;">';
    }
?>

  </div>

  <div style="padding: 10px; text-align: left;" >

    <br>

    <img src="http://www.cmproperties.es/images/flags/spanish.png" width="60px" height="40px" style="float: left; margin: 10px;">
    <p style="font-size: 23px; font-weight: bold;">

    <?php
    // Remove the € and substitute it for something we can understand in the email
    $desc_eng = str_replace('€','&euro;',$desc_eng);
    $desc_eng = str_replace('ñ','&ntilde;',$desc_eng);
    $desc_eng = str_replace('º','&ordm;',$desc_eng);
    $desc_spa = Translate($desc_eng,'');
    print($desc_spa); ?>
    </p>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <img src="http://www.cmproperties.es/images/flags/english.png" width="60px" height="40px" style="float: left; margin: 10px;">
    <p style="font-size: 23px; font-weight: bold;">
      <?php print($desc_eng); ?>
    </p>

    <br>
    <br>
    <br>
    <br>

  </div>












<?php

/* -------------------------------------------------------------------------------------- Copied Source code to paste to add to Email ---------------------------------------------------------------------------*/

$source_code = '';

?>
