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
<meta http-equiv="Content-Type" content="text/html" />
<title>CMproperties - House</title>
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
</div>


<?php

$_SESSION['lang'] = $_GET['lang'];

?>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ /TRANSLATOR +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->



<!--//////***************************** CHOOSE ONE OF THE 3 PIROBOX STYLES**************************************** \\\\\\\-->
<link href="css_pirobox/white/style.css" media="screen" title="shadow" rel="stylesheet" type="text/css" />

<!--////// END  \\\\\\\-->

        <!-- Site JavaScript -->
        <script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.ennui.contentslider.js"></script>
        <script type="text/javascript">
            $(function() {
            $('#one').ContentSlider({
            width : '960px',
              height : '200px',
          speed : 400,
            easing : 'easeOutSine'
            });
            });
        </script>
        <script src="js/jquery.chili-2.2.js" type="text/javascript"></script>
        <script src="js/chili/recipes.js" type="text/javascript"></script>
<!--////// INCLUDE THE JS AND PIROBOX OPTION IN YOUR HEADER  \\\\\\\-->

<script type="text/javascript" src="js/piroBox.1_2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $().piroBox({
      my_speed: 600, //animation speed
      bg_alpha: 0.5, //background opacity
      radius: 4, //caption rounded corner
      scrollImage : true, // true == image follows the page, false == image remains in the same open position
      pirobox_next : 'piro_next', // Nav buttons -> piro_next == inside piroBox , piro_next_out == outside piroBox
      pirobox_prev : 'piro_prev',// Nav buttons -> piro_prev == inside piroBox , piro_prev_out == outside piroBox
      close_all : '.piro_overlay, .piro_close',// add class .piro_overlay(with comma)if you want overlay click close piroBox
      slideShow : '', // just delete slideshow between '' if you don't want it.
      slideSpeed : 4 //slideshow duration in seconds(3 to 6 Recommended)
  });
});
</script>
<!--//////********************************************** END *************************************************************\\\\\\\-->
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

</head>


<body onload="initialize()">

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
        <div id="site_title">
				<a href="index.php"><img src="images/logo.png" height="95px" width="245px" alt="logo" /><span><img src="images/properties.png" height="53px" width="223px" alt="properties" /></span></a>        </div> <!-- end of site_title -->
        <div id="templatemo_menu" class="notranslate">
            <ul>
                <li><a href="index.php?lang=<?php print($_SESSION['lang']); ?>">Home</a></li>
                <li><a href="search_result.php?lang=<?php print($_SESSION['lang']); ?>">For Sale</a></li>
                <li><a href="search_result_rent.php?lang=<?php print($_SESSION['lang']); ?>" class="current">For Rent</a></li>
<!--                 <li><a href="portfolio.html">Portfolio</a></li> -->
                <li><a href="contacto.php?lang=<?php print($_SESSION['lang']); ?>">Contact</a></li>
<!--                 <li class="last"><a href="contact.html">Contact</a></li> -->
            </ul>
            
<!--             <div id="search_box">
                <form action="#" method="post">
                    <input type="text" value="Search on this website" name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                  	<input type="submit" name="Search" value="" id="searchbutton" title="Search" />
                </form>
            </div> -->
            <div class="cleaner"></div>    	
        </div>
        <div class="cleaner"></div>
    </div> <!-- end of header -->
    <div class="cleaner"></div>
</div>
    
<div id="templatemo_wrapper">
<!--
    <div id="templatemo_flash">
   		<div id="piecemaker">
        	<p>This is a placeholder of 3D Flash Slider. Feel free to put in any alternative content here.</p>
        </div>
    </div>
  -->
    
    <div id="templatemo_content_top"></div>
    <div id="templatemo_content">
    	<div id="templatemo_main_content">
        
        	<div class="content_box">
                <!--<h1 align="center"><cmprop>Details</cmprop></h1>-->

              <p align="center" ><house_p>
<?php

include 'connect.php';

mysql_select_db("cmproperties", $db);

$referencia = $_GET['ref'];


$query = mysql_query("SELECT * FROM Rental WHERE `ref` LIKE '" . $referencia . "'");


$row = mysql_fetch_array($query);
$reference = $row['ref'];


if($row['sold']==1){
  echo "<p id='sold_res'>".Translate("Sold",'')."</p><br>";
} else if($row['reserved']==1){
  echo "<p id='sold_res'>".Translate("Reserved", '')."</p><br>";
}


echo "<b style='border-radius: 9px; letter-spacing: 1px; font-style: italic; line-height: 23px; font-size: 21px; '>" . Translate($row['titulo'],'') . "</b><b style='line-height:27px; '></br></br></b>";


$precio_mes = $row['precio_mes'];

echo "<precio> &nbsp".Translate('Price','').": <b>";
echo "" . $precio_mes . " &euro; </b>&nbsp &nbsp</precio></br>";
echo "</br></br>";




echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";
echo Translate("Location",'').": <b>";
echo $row['localidad'] . "</b></br>";
echo "</p></br>";


echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";
echo Translate("Area",'').": <b>";
echo $row['zona'] . "</b></br></p>";
echo "</br>";


if ($row['hab'] == 1){
  $bed = "bedroom";
} else {
  $bed = "bedrooms";
}
echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";
echo $row['hab'] . " " . Translate($bed,'') . "</br>";
echo "</p></br>";


if ($row['wc'] == 1){
  $bath = "bathroom";
} else {
  $bath = "bathrooms";
}
echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";
echo $row['wc'] . " " . Translate($bath,'') .  "</br>";
echo "</p></br>";

echo "<br><br>";

/* ********************************************************************************************* */
$carac = $row['caract'];
$wtf = explode(",", $carac);
$c_count = 0;
while ($c_count < 2){
  $caracteristicas = $row['caract'];
  echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";
  echo Translate($wtf[$c_count],'');
  echo "</p>";
  $c_count++;
  if ($wtf[$c_count] != ""){
    echo "</br>";
  }
}
echo "<br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Swimmingpool",'').": ".Translate($row['pool'],'')."</p><br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Built area",'').": ".Translate($row['m_const'],'')."m2</p><br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Plot area",'').": ".Translate($row['m_parcela'],'')."m2</p><br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Parking",'').": ".Translate($row['parking'],'')."</p><br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Community fee",'').": ".Translate($row['comunidad'],'')."&euro;" . Translate("per year",'') . " per year</p><br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Taxes",'').": ".Translate($row['ibi'],'')."&euro;" . Translate("per year",'') . " </p><br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Build year",'').": ".Translate($row['year'],'')."</p><br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Refurbished",'').": ".Translate($row['reformado'],'')."</p><br>";

echo "<p align='left' style='border-radius: 9px; letter-spacing: 1px; font-weight: bold; font-size: 16px; background-color: #eeeeee; color: black; padding: 0 10px; line-height: 18px; margin: 0 53px'>";

echo Translate("Air conditioning / Heating",'').": ".Translate($row['heating'],'')."</p><br>";

echo "</br></br>";

/* ******************************************************************************************** */
// if ($_GET['lang']=='es'){
//   echo "<p style='border-radius: 9px; background-color: #eeeeee; margin: 0 53px;padding: 10px; font-size: 14px; color: black; '>";
//   echo $row['desc_spa'] . "</p></br></br>";
// } else {
  echo "<p style='border-radius: 9px; background-color: #eeeeee; margin: 0 53px;padding: 10px; font-size: 14px; color: black; '>";
  echo Translate_desc($row['desc_eng'],'') . "</p></br></br></br>";
//}

?>


<!-- *********************************************** <GOOGLE MAPS> ***************************************************************************************** -->

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCpXZcKzbEKdYgp3MtlU7mQ0sVgx4cRx8Q&sensor=false">
</script>

<?php
$map_search = $row['map_search'];
?>


<script>

// var geocoder;
// var map;

// function initialize (){
//   geocoder = new google.maps.Geocoder();
//   var latlng = new google.maps.LatLng(42.095287, -79.3185139);
//   var myOptions = {zoom: 14,center: latlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
//   map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
//   codeAddress();
// }


// function codeAddress() {
//   var sAddress = "<?php echo $map_search; ?>";
//   geocoder.geocode( { 'address': sAddress}, function(results, status) {
//   if (status == google.maps.GeocoderStatus.OK) {
//       map.setCenter(results[0].geometry.location);
//       var marker = new google.maps.Marker({
//         map: map,
//         position: results[0].geometry.location
//       });

//       var circle = new google.maps.Circle({
//                     map: map,
//                     radius: 450,
//                     fillColor: '#ec7014',
//                     fillOpacity: 0.25,
//                     strokeWeight: 0
//                 });
//       circle.bindTo('center', marker, 'position');
//   }
//   else{
//     //alert("Geocode was not successful for the following reason: " + status);
//   }
// });

// }

</script>


<script>

var geocoder;
var map;

function initialize (){
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(<?php echo $map_search; ?>);
  var myOptions = {zoom: 15,center: latlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
  map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
  var marker = new google.maps.Marker({
        map: map,
        position: latlng
      });

      var circle = new google.maps.Circle({
                    map: map,
                    // radius: 450,
                    fillColor: '#ec7014',
                    fillOpacity: 0.25,
                    strokeWeight: 0
                });
      circle.bindTo('center', marker, 'position');
}

</script>









<div id="map_canvas" style="width: 425;height: 350px;align: left;"></div>


<!-- *********************************************** </GOOGLE MAPS> ***************************************************************************************** -->



<br/>
<br/>
  
<script>
var ref = '<?php print($referencia); ?>';
var url_pdf = '/pdfview.php?ref=';
var url_email = '/email.php?ref=';

var pdf_url = url_pdf+ref+"&lang=es";
var email_url = url_email+ref+"&lang=es";

</script>

<p align="center">
<button style="width: 5em; border-radius: 4px; font-size: 14px; font-weight: bold; letter-spacing: 2px;" onclick="window.open( pdf_url ); return false;" id="PDF" >PDF</button>
<button style="width: 5em; border-radius: 4px; font-size: 14px; font-weight: bold; letter-spacing: 2px;" onclick="window.open( email_url ); return false;" id="Email" >Email</button>
</p>


<?php


echo "</house_p></p></div>";
      
        
echo '<div id="templatemo_sidebar" class="notranslate" ><p align="center">';


echo "<p align='center' style='font-size: 19px; font-style: bold; font-color: solid black; '><b>Ref: </b>";
echo $row['ref'] . "</p></br>";


$query2 = mysql_query("SELECT imgpath FROM `RentalImages` WHERE `ref` LIKE '" . $reference . "' ORDER BY imgpath");
$query3 = mysql_query("SELECT imgpath FROM `RentalImages` WHERE `ref` LIKE '" . $reference . "' ORDER BY imgpath LIMIT 1, 50");
$query_first_only = mysql_query("SELECT imgpath FROM `RentalImages` WHERE `ref` LIKE '" . $reference . "' ORDER BY imgpath LIMIT 1");
$counter = "0";
while ($row2 = mysql_fetch_array($query2))
  {
  while ($row_first = mysql_fetch_array($query_first_only))
    {
    $counter ++;
    echo "<a href='" .$row_first['imgpath'] . "' class='pirobox_gall' title='Photo " . $counter . "'><img style='border: 3px solid white;' src='" . $row_first['imgpath'] . "' width='95%' height='100%' alt='Image Not Found' /></a>";
    echo "</br></br>";
    }
  while ($row3 = mysql_fetch_array($query3))
    {
    $counter ++;
    echo "<a href='" . $row3['imgpath'] . "' class='pirobox_gall' title='Photo " . $counter . "'><img style='margin: 2px 2px 2px 2px; border: 2px solid white;' src='" . $row3['imgpath'] . "' width='31%' height='31%' alt='Image Not Found' ></a>";
    }
  }

mysql_close($db);

?>

</p>
        </div>
        </div>
        
        <div class="cleaner"></div>
    </div>
    <div id="templatemo_content_bottom"></div>
    
    <div id="templatemo_footer">

        Copyright &copy; 2048 <a href="#">CMproperties</a>
    
    </div> <!-- end of templatemo_footer -->
     
</div> <!-- end of wrapper -->
</body>
</html>

