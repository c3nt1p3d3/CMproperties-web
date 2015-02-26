<?php
require('login.php');
?>




<?php

include 'connect.php';

mysql_select_db("cmproperties", $db);



$localidad = $_POST['localidad'];
$wc = $_POST['wc'];
$cat = $_POST['cat'];
$hab = $_POST['hab'];
$desc_eng = $_POST['desc_eng'];
$desc_es = $_POST['desc_es'];
$zona = $_POST['zona'];
$precio = $_POST['precio'];
$prov = $_POST['provincia'];
$ref = $_POST['ref'];
$titulo = $_POST['titulo'];
$map_search = $_POST['map_search'];
$parking = $_POST['parking'];
$colab = $_POST['colab'];

$sold = $_POST['sold'];
$reserved = $_POST['reserved'];

$comunidad = $_POST['comunidad'];
$ibi = $_POST['ibi'];
$m_const = $_POST['m_const'];
$m_parcela = $_POST['m_parcela'];
$year = $_POST['year'];
$reformado = $_POST['reformado'];
$heating = $_POST['heating'];
$pool = $_POST['pool'];




// ****************************** DELETE SOME IMAGES ************************************
$selected_img = $_POST['img_to_delete'];

if($selected_img){
	foreach ($selected_img as $value) {
		$images_to_delete .= $value;
		$images_to_delete .= ',';
	}
}

$delete_img = explode(",", $images_to_delete);

$no = count($delete_img);
$i = 0;


while ($i < $no) {
	system("rm ".$delete_img[$i]."");
	mysql_query("DELETE FROM CasasImages WHERE imgpath='".$delete_img[$i]."'");
	$i++;
}
// ****************************** /DELETE SOME IMAGES ************************************




$i = 0;
$j = 17;

while ($i <= $j){
	$i++;
	$caracteristicas .= $_POST['carac'.$i.''];
	/*if ($_POST['carac'.$i.''] != ""){
		$caracteristicas .= ",";
	}*/
	$caracteristicas .= ",";
}



// ************************************ ADD NEW PHOTOS ********************************************
$pathname = "uploads/" . $ref . "/";
mkdir($pathname);

foreach($_FILES["fileToUpload"]["error"] as $key => $error){
	if($error == UPLOAD_ERR_OK) {
		$img = $_FILES["fileToUpload"]["name"][$key];
		$imgpath = "uploads/". $ref . "/" . $img;
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], "uploads/" . $ref . "/" . $_FILES["fileToUpload"]["name"][$key]);
		mysql_query("INSERT INTO CasasImages (ref,imgpath) VALUES ('$ref','uploads/". $ref ."/" . mysql_real_escape_string($img) . "')");
			}
}

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $ref . "/" . $_FILES["fileToUpload"]["name"]);
// ************************************ /ADD NEW PHOTOS ********************************************






//mysql_query("UPDATE Casas SET localidad=".$localidad.",'$wc','$cat','$hab','$desc','$zona','$precio','$prov','$ref','$titulo','$caracteristicas')");

mysql_query("UPDATE Casas 
SET comunidad='$comunidad',ibi='$ibi',m_const='$m_const',m_parcela='$m_parcela',year='$year',reformado='$reformado',heating='$heating',pool='$pool',titulo='$titulo',caract='$caracteristicas',hab='$hab',wc='$wc',desc_eng='$desc_eng',desc_es='$desc_es',localidad='$localidad',cat='$cat',precio='$precio',zona='$zona',provincia='$prov',map_search='$map_search',sea_views='$sea_views',parking='$parking',sold='$sold',colab='$colab',reserved='$reserved' WHERE ref='$ref'");

?>



<script type="text/javascript">

function redirecting(){
    window.location = "change.php"
}
</script>



<html>
<body onLoad="setTimeout('redirecting()', 5000)">
<h1>
	UPDATED SUCCESFULLY!!!!!!</br></br>
	Automatically redirected in 5 seconds
</h1>
</body>
</html>

