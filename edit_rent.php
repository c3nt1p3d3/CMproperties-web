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
    $zona = $_POST['zona'];
    //$precio = $_POST['precio'];
    $prov = $_POST['provincia'];
    $ref = $_POST['ref'];
    $titulo = $_POST['titulo'];
    $map_search = $_POST['map_search'];
    $parking = $_POST['parking'];
    $colab = $_POST['colab'];

    $m_const = $_POST['m_const'];
    $m_parcela = $_POST['m_parcela'];
    $year = $_POST['year'];
    $reformado = $_POST['reformado'];
    $heating = $_POST['heating'];
    $pool = $_POST['pool'];
    $modalidad = $_POST['modalidad'];
    $mes_dispon = $_POST['mes_dispon[]'];
    $pm = $_POST['pm[]'];
    $pq1 = $_POST['pq1[]'];
    $pq2 = $_POST['pq2[]'];




    for($i=0;$i<12;$i++){
        if($_POST['mes_dispon'][$i] == ""){
            break;
        }
        if($i!=0){
            $tramalarga = $tramalarga.",";
        }
        $tramalarga = $tramalarga.$_POST['mes_dispon'][$i];
        $tramalarga = $tramalarga.",".$_POST['pm'][$i];
        $tramalarga = $tramalarga.",".$_POST['pq1'][$i];
        $tramalarga = $tramalarga.",".$_POST['pq2'][$i];
    }

    echo $tramlarga;
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";


    $precios = $tramalarga;





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
	mysql_query("DELETE FROM RentalImages WHERE imgpath='".$delete_img[$i]."'");
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
		mysql_query("INSERT INTO RentalImages (ref,imgpath) VALUES ('$ref','uploads/". $ref ."/" . mysql_real_escape_string($img) . "')");
			}
}

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $ref . "/" . $_FILES["fileToUpload"]["name"]);
// ************************************ /ADD NEW PHOTOS ********************************************






mysql_query("UPDATE Rental SET localidad='$localidad',wc='$wc',cat='$cat',hab='$hab',desc_eng='$desc_eng',zona='$zona',price='$precios',provincia='$prov',ref='$ref',titulo='$titulo',caract='$caracteristicas',map_search='$map_search',parking='$parking',mconst='$m_const',m_parcela='$m_parcela',year='$year',reformado='$reformado',heating='$heating',pool='$pool',colab='$colab',modalidad='$modalidad' WHERE ref='$ref'");
?>



<script type="text/javascript">

function redirecting(){
    window.location = "change_rent.php"
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

