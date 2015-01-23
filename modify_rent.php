<?php
require('login.php');
?>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
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
      scrollImage : false, // true == image follows the page, false == image remains in the same open position
      pirobox_next : 'piro_next', // Nav buttons -> piro_next == inside piroBox , piro_next_out == outside piroBox
      pirobox_prev : 'piro_prev',// Nav buttons -> piro_prev == inside piroBox , piro_prev_out == outside piroBox
      close_all : '.piro_close',// add class .piro_overlay(with comma)if you want overlay click close piroBox
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




<meta name="description" content="CMproperties" />

<?php

include 'connect.php';

mysql_select_db("cmproperties", $db);


$referencia = $_GET['ref'];
/* ********************************************************************* QUERIES ****************************************************** */

$query = mysql_query("SELECT * FROM `Rental` WHERE `ref` LIKE '" . $referencia . "'");
$row = mysql_fetch_array($query);


$query2 = mysql_query("SELECT * FROM `RentalImages` WHERE `ref` LIKE '" . $referencia . "'");
$row2 = mysql_fetch_array($query2);

/* ********************************************************************** CARACTERISTICA STRING TO ARRAY ************************************************************* */

$carac = $row['caract'];

$wtf = explode(",", $carac);

/* ********************************************************************** /CARACTERISTICA STRING TO ARRAY ************************************************************* */


echo '<div style="width: 500px; float: right; width: 500px; margin: 10px 10px 10px 10px; "><p align="center">';
echo '***************** Images already uploaded ********************';

$query2 = mysql_query("SELECT * FROM `RentalImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath");
$query3 = mysql_query("SELECT * FROM `RentalImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 1, 50");
$query_first_only = mysql_query("SELECT * FROM `RentalImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 1");

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
    echo "<a href='" . $row3['imgpath'] . "' class='pirobox_gall' title='Photo " . $counter . "'><img style='margin: 2px 2px 2px 2px; border: 2px solid white;' src='" . $row3['imgpath'] . "' width='31%' height='25%' alt='Image Not Found' ></a>";
    }
  }

  echo '</div></p>'
 

?>

<html>
<style type="text/css">
        #tb {height:100px; width:200px; }
    </style>

<form enctype="multipart/form-data" method="post" action="edit_rent.php">

Titulo:</br><textarea rows="2" cols="80" name="titulo" /><?php echo $row['titulo'] ?></textarea></br></br>

Localidad:<select name="localidad" class="search">
<option value="Torrevieja" <?php echo($row['localidad'] == "Torrevieja" ? ' selected="selected"' : null) ?> >Torrevieja</option>
<option value="Orihuela Costa" <?php echo($row['localidad'] == "Orihuela Costa" ? ' selected="selected"' : null) ?> >Orihuela Costa</option>
<option value="Pilar de la Horadada" <?php echo($row['localidad'] == "Pilar de la Horadada" ? ' selected="selected"' : null) ?> >Pilar de la Horadada</option>
<option value="San Javier" <?php echo($row['localidad'] == "San Javier" ? ' selected="selected"' : null) ?> >San Javier</option>
<option value="Los Alcazares" <?php echo($row['localidad'] == "Los Alcazares" ? ' selected="selected"' : null) ?> >Los Alcazares</option>
<option value="Mil Palmeras" <?php echo($row['localidad'] == "Mil Palmeras" ? ' selected="selected"' : null) ?> >Mil Palmeras</option>
<option value="Pinar de Campoverde" <?php echo($row['localidad'] == "Pinar de Campoverde" ? ' selected="selected"' : null) ?> >Pinar de Campoverde</option>
<option value="Torrepacheco" <?php echo($row['localidad'] == "Torrepacheco" ? ' selected="selected"' : null) ?> >Torrepacheco</option>
<option value="Dehesa de Campoamor" <?php echo($row['localidad'] == "Dehesa de Campoamor" ? ' selected="selected"' : null) ?> >Dehesa de Campoamor</option>
</select>
<br/><br/>

Precio:<input type="text" name="precio" value="<?php echo $row['precio'] ?>"/></br></br>

Zona:<input type="text" name="zona" value="<?php echo $row['zona'] ?>"/></br></br>

Provincia:<input type="text" name="provincia" value="<?php echo $row['provincia'] ?>"/></br></br>

Busqueda en el mapa:<input type="text" name="map_search" id="map_search" cols="53" value="<?php echo $row['map_search'] ?>"/></br></br>

Caracteristica 1:<input type="text" name="carac1" value="<?php echo $wtf[0] ?>"/></br>
Caracteristica 2:<input type="text" name="carac2" value="<?php echo $wtf[1] ?>"/></br>
Caracteristica 3:<input type="text" name="carac3" value="<?php echo $wtf[2] ?>"/></br>
Caracteristica 4:<input type="text" name="carac4" value="<?php echo $wtf[3] ?>"/></br>

<br><br>

Gasto de Comunidad: <input type="text" value="<?php echo $row['comunidad'] ?>" name="comunidad" /><br><br>

IBI (SUMA): <input type="text" value="<?php echo $row['ibi'] ?>" name="ibi" /><br><br>

m2 construidos: <input type="text" value="<?php echo $row['m_const'] ?>" name="m_const" /><br><br>

m2 parcela: <input type="text" value="<?php echo $row['m_parcela'] ?>" name="m_parcela" /><br><br>

Year contruccion: <input type="text" value="<?php echo $row['year'] ?>" name="year" /><br><br>

Reformado: <input type="text" value="<?php echo $row['reformado'] ?>" name="reformado" /><br><br>

A/C & Heating: <input type="text" value="<?php echo $row['heating'] ?>" name="heating" /><br><br>

Piscina: <input type="text" value="<?php echo $row['pool'] ?>" name="pool" /><br><br>

Parking: <input type="text" value="<?php echo $row['parking'] ?>" name="parking" /><br><br>




Sea views: <input type="checkbox" name="sea_views" value="1" style="width:1em!important;" <?php echo($row['sea_views'] == "1" ? ' checked="checked"' : null) ?> >

<br><br>

Parking: <input type="checkbox" name="parking" value="1" style="width:1em!important;" <?php echo($row['sea_views'] == "1" ? ' checked="checked"' : null) ?> >

<br><br>

Sold: <input type="checkbox" name="sold" value="1" style="width:1em!important;" <?php echo($row['sold'] == "1" ? ' checked="checked"' : null) ?> >

<br><br>

Reserved: <input type="checkbox" name="reserved" value="1" style="width:1em!important;" <?php echo($row['reserved'] == "1" ? ' checked="checked"' : null) ?> >

<br><br>

Descripcion:</br><textarea rows="10" cols="80" name="desc_eng" /><?php echo $row['desc_eng'] ?></textarea></br></br>

Colaborador <input type="checkbox" name="colab" value="1" style="width:1em!important;" <?php echo($row['colab'] == "1" ? ' checked="checked"' : null) ?> >
<br><br>

Referencia:<input type="text" name="ref" value="<?php echo $row['ref'] ?>"/></br></br>

ID:<input type="text" name="id" value="<?php echo $row['id'] ?>" readonly/></br></br>

Tipo de Vivienda:
<select name="cat">
<option value="Apartment" <?php echo($row['cat'] == "Apartment" ? ' selected="selected"' : null) ?> >Apartment</option>
<option value="Penthouse" <?php echo($row['cat'] == "Penthouse" ? ' selected="selected"' : null) ?> >Penthouse</option>
<option value="Studio" <?php echo($row['cat'] == "Studio" ? ' selected="selected"' : null) ?> >Studio</option>
<option value="Bungalow" <?php echo($row['cat'] == "Bungalow" ? ' selected="selected"' : null) ?> >Bungalow</option>
<option value="Town house" <?php echo($row['cat'] == "Town house" ? ' selected="selected"' : null) ?> >Town house</option>
<option value="Duplex" <?php echo($row['cat'] == "Duplex" ? ' selected="selected"' : null) ?> >Duplex</option>
<option value="Villa" <?php echo($row['cat'] == "Villa" ? ' selected="selected"' : null) ?> >Villa</option>
<option value="Finca" <?php echo($row['cat'] == "Finca" ? ' selected="selected"' : null) ?> >Finca</option>
<option value="Plot" <?php echo($row['cat'] == "Plot" ? ' selected="selected"' : null) ?> >Plot</option>
</select></br></br>

Habitaciones:
<select name="hab">
<option value="0" <?php echo($row['hab'] == "0" ? ' selected="selected"' : null) ?> >0</option>
<option value="1" <?php echo($row['hab'] == "1" ? ' selected="selected"' : null) ?> >1</option>
<option value="2" <?php echo($row['hab'] == "2" ? ' selected="selected"' : null) ?> >2</option>
<option value="3" <?php echo($row['hab'] == "3" ? ' selected="selected"' : null) ?> >3</option>
<option value="4" <?php echo($row['hab'] == "4" ? ' selected="selected"' : null) ?> >4</option>
<option value="5" <?php echo($row['hab'] == "5" ? ' selected="selected"' : null) ?> >5</option>
<option value="6" <?php echo($row['hab'] == "6" ? ' selected="selected"' : null) ?> >6</option>
<option value="7" <?php echo($row['hab'] == "7" ? ' selected="selected"' : null) ?> >7</option>
</select></br></br>

Banos:
<select name="wc">
<option value="1" <?php echo($row['wc'] == "1" ? ' selected="selected"' : null) ?> >1</option>
<option value="2" <?php echo($row['wc'] == "2" ? ' selected="selected"' : null) ?> >2</option>
<option value="3" <?php echo($row['wc'] == "3" ? ' selected="selected"' : null) ?> >3</option>
<option value="4" <?php echo($row['wc'] == "4" ? ' selected="selected"' : null) ?> >4</option>
<option value="5" <?php echo($row['wc'] == "5" ? ' selected="selected"' : null) ?> >5</option>
<option value="6" <?php echo($row['wc'] == "6" ? ' selected="selected"' : null) ?> >6</option>
</select></br></br>


</br></br></br></br>






SELECT IMAGES TO DELETE IF ANY

</br></br>

<?php

$query2 = mysql_query("SELECT * FROM `RentalImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath");
$query3 = mysql_query("SELECT * FROM `RentalImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 1, 50");
$query_first_only = mysql_query("SELECT * FROM `RentalImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 1");

$img_count = 0;
while ($row2 = mysql_fetch_array($query2))
{
	while ($row_first = mysql_fetch_array($query_first_only))
    {
		$img_count++;
		list(,,$img_name) = explode('/', $row2['imgpath'], 4);
		echo "<input type='checkbox' name='img_to_delete[]' id='img_to_delete[]' value='".$row2['imgpath']."' /> ".$img_name;
		echo "</br>";
	}
	while ($row3 = mysql_fetch_array($query3))
	{
		$img_count++;
		list(,,$img_name) = explode('/', $row3['imgpath'], 4);
		echo "<input type='checkbox' name='img_to_delete[]' id='img_to_delete[]' value='".$row3['imgpath']."' /> ".$img_name;
		echo "</br>";
	}
}


?>

</br></br></br></br>



Images to ADD: <input type="file" name="fileToUpload[]" multiple="" /></br></br>


<input type="submit" name="edit" value="edit">


</form>





<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
//<![CDATA[
// Latitude and Longitude math routines are from: http://www.fcc.gov/mb/audio/bickel/DDDMMSS-decimal.html

var map = null;
var latsgn = 1;
var lgsgn = 1;
var marker = null;
var posset = 0;
var ls='';
var lm='';
var ld='';
var lgs='';
var lgm='';
var lgd='';
var mrks = {mvcMarkers: new google.maps.MVCArray()};
var iw;
var drag=false;

function xz() {
ll = new google.maps.LatLng(20.0, -10.0);
zoom=2;
var mO = {
scaleControl:true,
zoom:zoom,
zoomControl:true,
zoomControlOptions: {style:google.maps.ZoomControlStyle.LARGE},
center: ll,
disableDoubleClickZoom:true,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
map = new google.maps.Map(document.getElementById("map"), mO);
map.setTilt(0);
map.panTo(ll);
marker = new google.maps.Marker({position:ll,map:map,draggable:true,title:'Marker is Draggable'});   

google.maps.event.addListener(marker, 'click', function(mll) {
gC(mll.latLng);
var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><p>Latitude - Longitude:<br />" + String(mll.latLng.toUrlValue()) + "<br /><br />Lat: " + ls +  "&#176; " + lm +  "&#39; "  + ld + "&#34;<br />Long: " + lgs +  "&#176; " + lgm +  "&#39; " + lgd + "&#34;</p></div>";
iw = new google.maps.InfoWindow({content:html});
iw.open(map,marker);
});
google.maps.event.addListener(marker, 'dragstart', function() {if (iw){iw.close();}});

google.maps.event.addListener(marker, 'dragend', function(event) {
posset = 1;
if (map.getZoom() < 10){map.setZoom(10);}
map.setCenter(event.latLng);
computepos(event.latLng);
drag=true;
setTimeout(function(){drag=false;},250);
});

google.maps.event.addListener(map, 'click', function(event) {
if (drag){return;}
posset = 1;
fc(event.latLng) ;
if (map.getZoom() < 10){map.setZoom(10);}
map.panTo(event.latLng);
computepos(event.latLng);
});

}

function computepos (point)
{
var latA = Math.abs(Math.round(point.lat() * 1000000.));
var lonA = Math.abs(Math.round(point.lng() * 1000000.));
if(point.lat() < 0)
{
  var ls = '-' + Math.floor((latA / 1000000)).toString();
}
else
{
  var ls = Math.floor((latA / 1000000)).toString();
}
var lm = Math.floor(((latA/1000000) - Math.floor(latA/1000000)) * 60).toString();
var ld = ( Math.floor(((((latA/1000000) - Math.floor(latA/1000000)) * 60) - Math.floor(((latA/1000000) - Math.floor(latA/1000000)) * 60)) * 100000) *60/100000 ).toString();
if(point.lng() < 0)
{
  var lgs = '-' + Math.floor((lonA / 1000000)).toString();
}
else
{
  var lgs = Math.floor((lonA / 1000000)).toString();
}
var lgm = Math.floor(((lonA/1000000) - Math.floor(lonA/1000000)) * 60).toString();
var lgd = ( Math.floor(((((lonA/1000000) - Math.floor(lonA/1000000)) * 60) - Math.floor(((lonA/1000000) - Math.floor(lonA/1000000)) * 60)) * 100000) *60/100000 ).toString();
document.getElementById("map_search").value=point.lat().toFixed(6)+", "+point.lng().toFixed(6);
document.getElementById("latboxm").value=ls;
document.getElementById("latboxmd").value=lm;
document.getElementById("latboxms").value=ld;
document.getElementById("lonbox").value=point.lng().toFixed(6);
document.getElementById("lonboxm").value=lgs;
document.getElementById("lonboxmd").value=lgm;
document.getElementById("lonboxms").value=lgd;
}


function showLatLong(latitude, longitude) {
if (isNaN(latitude)) {alert(' Latitude must be a number. e.g. Use +/- instead of N/S'); return false;}
if (isNaN(longitude)) {alert(' Longitude must be a number.  e.g. Use +/- instead of E/W'); return false;}

latitude1 = Math.abs( Math.round(latitude * 1000000.));
if(latitude1 > (90 * 1000000)) { alert(' Latitude must be between -90 to 90. ');  document.getElementById("latbox1").value=''; return;}
longitude1 = Math.abs( Math.round(longitude * 1000000.));
if(longitude1 > (180 * 1000000)) { alert(' Longitude must be between -180 to 180. ');  document.getElementById("lonbox1").value='';  return;}

var point = new google.maps.LatLng(latitude,longitude);
posset = 1;
if (map.getZoom() < 7){map.setZoom(7);}else{}
map.setMapTypeId(google.maps.MapTypeId.HYBRID);
map.setCenter(point);
fc(point);
computepos(point);
}


function streetview()
{
if (posset == 0)
{
  alert("Position Not Set.  Please click on the spot on the map to set the street view point.");
  return;
}

var point = map.getCenter();
var t1 = String(point);
t1 = t1.replace(/[() ]+/g,"");
var str = "http://www.satelliteview.co/?e=" + t1 + ":0:Latitude-Longitude Point:sv:0";
var popup = window.open(str, "llwindow");
popup.focus();
}

function googleearth()
{
if (posset == 0)
{
  alert("Position Not Set.  Please click on the spot on the map to set the Google Earth map point.");
  return;
}
var point = map.getCenter();
var gearth_str = "/?r=googleearth&mt=Latitude-Longitude Point&ml=" + point.lat() + "&mg=" + point.lng();
var popup = window.open(gearth_str, "llwindow");
popup.focus();
}

function pictures()
{
if (posset == 0)
{
  alert("Position Not Set.  Please click on the spot on the map to set the photograph point.");
  return;
}
var point = map.getCenter();
var pictures_str = "http://www.picturepastime.com?r=pictures&mt=Latitude-Longitude Point&ml=" + point.lat() + "&mg=" + point.lng();
var popup = window.open(pictures_str, "llwindow");
popup.focus();
}

function lotsize()
{
if (posset == 0)
{
  alert("Position Not Set.  Please click on the spot on the map to set the lot size map point.");
  return;
}
var point = map.getCenter();
var t1 = String(point);
t1 = t1.replace(/[() ]+/g,"");
var lotsize_str = "http://www.satelliteview.co/?e=" + t1 + ":0:Latitude-Longitude Point:measure:0";
var popup = window.open(lotsize_str, "llwindow");
popup.focus();
}

function getaddress()
{
if (posset == 0)
{
  alert("Position Not Set.  Please click on the spot on the map to set the get address map point.");
  return;
}
var point = map.getCenter();
var t1 = String(point);
t1 = t1.replace(/[() ]+/g,"");
var getaddr_str = "http://www.satelliteview.co/?e=" + t1 + ":0:Latitude-Longitude Point:map:0";
var popup = window.open(getaddr_str, "llwindow");
popup.focus();
}

function fc(point)
{
gC(point);
var html= "<div style='color:#000;background-color:#fff;padding:3px;width:150px;'><p>Latitude - Longitude:<br />" + String(point.toUrlValue()) + "<br /><br />Lat: " + ls +  "&#176; " + lm +  "&#39; "  + ld + "&#34;<br />Long: " + lgs +  "&#176; " + lgm +  "&#39; " + lgd + "&#34;</p></div>";
var iw = new google.maps.InfoWindow({content:html});
var marker = new google.maps.Marker({position:point,map:map,icon:'/i/blue-dot.png',draggable:true});
mrks.mvcMarkers.push(marker);
google.maps.event.addListener(marker, 'click', function(event) {
gC(event.latLng);
var html= "<div style='color:#000;background-color:#fff;padding:3px;width:150px;'><p>Latitude - Longitude:<br />" + String(event.latLng.toUrlValue()) + "<br /><br />Lat: " + ls +  "&#176; " + lm +  "&#39; "  + ld + "&#34;<br />Long: " + lgs +  "&#176; " + lgm +  "&#39; " + lgd + "&#34;</p></div>";
var iw = new google.maps.InfoWindow({content:html});
iw.open(map,marker);
computepos(event.latLng);
});
}


function gC(ll){
var latA = Math.abs(Math.round(ll.lat() * 1000000.));
var lonA = Math.abs(Math.round(ll.lng() * 1000000.));
if(ll.lat() < 0)
{
  var tls = '-' + Math.floor((latA / 1000000)).toString();
}
else
{
  var tls = Math.floor((latA / 1000000)).toString();
}
var tlm = Math.floor(((latA/1000000) - Math.floor(latA/1000000)) * 60).toString();
var tld = ( Math.floor(((((latA/1000000) - Math.floor(latA/1000000)) * 60) - Math.floor(((latA/1000000) - Math.floor(latA/1000000)) * 60)) * 100000) *60/100000 ).toString();
ls = tls.toString();
lm = tlm.toString();
ld = tld.toString();

if(ll.lng() < 0)
{
  var tlgs = '-' + Math.floor((lonA / 1000000)).toString();
}
else
{
  var tlgs = Math.floor((lonA / 1000000)).toString();
}
var tlgm = Math.floor(((lonA/1000000) - Math.floor(lonA/1000000)) * 60).toString();
var tlgd = ( Math.floor(((((lonA/1000000) - Math.floor(lonA/1000000)) * 60) - Math.floor(((lonA/1000000) - Math.floor(lonA/1000000)) * 60)) * 100000) *60/100000 ).toString();
lgs = tlgs.toString();
lgm = tlgm.toString();
lgd = tlgd.toString();
}

function reset() {
mrks.mvcMarkers.forEach(function(elem, index) {elem.setMap(null);});
mrks.mvcMarkers.clear();
document.getElementById("map_search").value='';
document.getElementById("latboxm").value='';
document.getElementById("latboxmd").value='';
document.getElementById("latboxms").value='';
document.getElementById("lonbox").value='';
document.getElementById("lonboxm").value='';
document.getElementById("lonboxmd").value='';
document.getElementById("lonboxms").value='';
marker.setPosition(map.getCenter());
}

function reset1() {
marker.setPosition(map.getCenter());
computepos (map.getCenter());
}

//]]>
</script>

<body onload="xz()">
<center>

<div id="h0"></div>
<div id="o">

<div id="content">
<table cellpadding="4" cellspacing="0" width="100%">
<tr valign="top">
<td class="cs" width="100%">

<h1>Latitude and Longitude of a Point</h1>
<div id="wrapper" style="margin:5px"><div id="map" style="width: 800px; height: 450px"></div></div>
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<td width="50%" valign="top">
<center><input type="button" value="Clear / Reset" id="reset" onclick="reset()">&nbsp;&nbsp;<input type="button" value="Center Red Marker" id="reset1" onclick="reset1()"></center>
</td>

</tr>
</table>
</table>
</td>








</br></br></br></br>
</br></br></br></br>
</br></br></br></br>
</br></br></br></br>















**************************************** DELETE *****************************************

<form enctype="multipart/form-data" method="post" action="delete_rent.php">

Referencia:<input type="text" name="reference" value="<?php echo $row['ref'] ?>" readonly/></br></br>
ARE YOU SURE?:<input type="text" name="sure" value="no"/></br></br>

<input type="submit" name="delete" value="delete">

</form>






















</html>

<?php
mysql_close($db);
?>
