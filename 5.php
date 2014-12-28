
<!DOCTYPE html
  PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="author" content="Unknown" ><meta name="description" content="Un sitio web para la edición de sitios"><title>Compra-venta - CM</title><link rel="stylesheet" type="text/css" media="all" href="main.css"><link rel="stylesheet" type="text/css" media="all" href="colorschemes/colorscheme1/colorscheme.css"><link rel="stylesheet" type="text/css" media="all" href="style.css"><script type="text/javascript" src="live_tinc.js"></script></head><body id="main_body"><div id="container"><div id="header"><div id="logo"><a href="index.php"></a></div><div id="text_caption">CMproperty</div><div id="key_visual">&nbsp;</div></div><div id="main_nav_container"><ul id="main_nav_list"><li><a class="main_nav_active_item" href="index.php"><span class="main_nav_active_item_text">Home</span></a></li><li><a class="main_nav_item" href="search.php"><span class="main_nav_item_text">Compra-venta</span></a></li><li><a class="main_nav_item" href="3.php"><span class="main_nav_item_text">Alquiler</span></a></li><li><a class="main_nav_item" href="contacto.php"><span class="main_nav_item_text"></span>Contacto</a></li></ul></div><div id="main_container">
   <div id="left_column_container"><div class="sub_nav_container"></div></div>
   <div id="sub_container2">
   <div class="content" id="content_container">
   <p>
   
   <?php

include 'connect.php';

mysql_select_db("db435736022", $db);

$localidad = $_POST['localidad'];
$wc = $_POST['wc'];
$cat = $_POST['cat'];
$hab = $_POST['hab'];

$query = mysql_query("SELECT * FROM `Casas` WHERE `localidad` LIKE '" . $localidad . "' AND `hab` LIKE '" . $hab . "' AND `wc` LIKE '" . $wc . "' AND `cat` LIKE '" . $cat . "'");

echo '<table border="1">';
echo '<tr align="middle" valign="middle">';
echo "<td>id</td><td>Localidad</td><td>Zona</td><td>Precio</td><td>Habitaciones</td><td>Banos</td><td>Descripcion</td><td>Imagenes</td></tr>";

while ($row = mysql_fetch_array($query))
	{
	echo '<tr align="middle" valign="middle">';
	echo "<td>" . $row['id'] . "</td><td>" . $row['localidad'] . "</td><td>" . $row['zona'] . "</td><td>" . $row['precio'] . "</td><td>" . $row['hab'] . "</td><td>" . $row['wc'] . "</td><td>" . $row['descripcion'] . "</td><td> <img src=" . $row['imgpath'] . " width='100%' height='100%' alt='' /></td>";
	echo "</tr><br />";
	}

echo "</table>";


mysql_close($db);


?>

</p>
</div></div></div><div id="footer"><div id="footer_text">CM</div></div></div><div id="extra_div1"><span></span></div><div id="extra_div2"><span></span></div><div id="extra_div3"><span></span></div><div id="extra_div4"><span></span></div><div id="extra_div5"><span></span></div><div id="extra_div6"><span></span></div><div id="extra_div7"><span></span></div><div id="extra_div8"><span></span></div><div id="extra_div9"><span></span></div><div id="extra_div10"><span></span></div><div id="extra_div11"><span></span></div><div id="extra_div12"><span></span></div><!-- wfxbuild / 1.0 / layout2-1 / 2012-10-21 12:53:28 CEST--></body></html>