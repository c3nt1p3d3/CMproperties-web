<html>
<title>SpainHouses XML CREATOR 0.2</title>
</html>

<?php

require('login.php');
include 'translator.php';

/* Follow the guide for each type of property */
/* Check with the options for each one on the last page of the manual */

$xml = new DomDocument("1.0", "UTF-8");


/* THESE ARE THE REFERENCES TO EXPORT TO XML FORMAT ------------------------------------------- */

//$ref_list = $_POST['myInputs'];
$refs = count($_POST['ref_spainhouses']);

/* THESE ARE THE REFERENCES TO EXPORT TO XML FORMAT ------------------------------------------- */



/* COUNT THE NUMBER OF HOUSES TO INPUT */


/* KYERO XML */

$root = $xml->createElement("root");
$root = $xml->appendChild($root);

$kyero = $xml->createElement("kyero");
$kyero = $root->appendChild($kyero);

$feed_version = $xml->createElement("feed_version","3");
$feed_version = $kyero->appendChild($feed_version);

/* NOW WE MAKE A FOR LOOP, 1 LOOP PER HOUSE */

for($i=0;$i<$refs;$i++){

    /* THIS IS WHERE WE PICK THE REF FROM THE LIST */
    $referencia = $_POST['ref_spainhouses'][$i];

    /* HERE SHOULD GO THE CODE TO GRAB THE RIGHT REF FROM MYSQL */
    include 'connect.php';

    mysql_select_db("cmproperties", $db);

    $query = mysql_query("SELECT localidad, precio, hab, desc_eng, cat, provincia, wc, zona, ref, titulo, caract, parking, sold, reserved, comunidad, ibi, m_const, m_parcela, year, reformado, heating, pool, map_search, sea_views, colab FROM `Casas` WHERE `ref` LIKE '" . $referencia . "'");

    $row = mysql_fetch_array($query);

    /* NOW SETTING THE DATA TO THE VARIABLES */

    $localidad = $row['localidad'];
    $cat = $row['cat'];
    $desc_en = $row['desc_eng'];
    $zona = $row['zona'];
    $prov = $row['provincia'];
    $titulo = $row['titulo'];
    $colab = $row['colab'];

    $sold = $row['sold'];

//    if($sold==1){
//        continue;
//    }

    if($ref=="P512"){
        continue;
    }


    //$reserved = $row['reserved'];

    $price = $row['precio'];
    $pool = $row['pool'];
    $mconst = $row['m_const'];
    $m_parcela = $row['m_parcela'];
    $bed = $row['hab'];
    $wc = $row['wc'];
    $parking = $row['parking'];
    $comunidad = $row['comunidad'];
    $ibi = $row['ibi'];
    $year = $row['year'];
    $reformado = $row['reformado'];
    $heating = $row['heating'];

    $caract = $row['caract'];
    $carac = explode(",",$caract);

    $map_search = $row['map_search'];
    $lat_lon = explode(",",$map_search);
    $lat = $lat_lon[0];
    $lon = $lat_lon[1];

    $url_es = "http://www.cmproperties.es/house.php?ref=".$referencia."lang=es";
    $url_en = "http://www.cmproperties.es/house.php?ref=".$referencia."lang=en";
    $url_de = "http://www.cmproperties.es/house.php?ref=".$referencia."lang=de";
    $url_fr = "http://www.cmproperties.es/house.php?ref=".$referencia."lang=fr";

    //    $desc_es = Translate_desc_defined($desc_en,'en_to_es');
    $desc_de = Translate_desc_defined($desc_en,'en_to_de');
    $desc_fr = Translate_desc_defined($desc_en,'en_to_fr');

    if(!isset($newbuild)){
        $newbuild = 0;
    }

    /* END OF DATABASE SHIZZLE */

    /* Date Manipulating */
    $fecha_0 = date('Y-m-d H:i:s');
    $fecha_1 = date('Y-m-d H:i:s', strtotime('-3 hour -13 min +13 sec', strtotime($fecha_0)));
    $fecha_2 = date('Y-m-d H:i:s', strtotime('-1 day +30 min', strtotime($fecha_1)));
    $fecha_3 = date('Y-m-d H:i:s', strtotime('-1 hour', strtotime($fecha_2)));
    $fecha_4 = date('Y-m-d H:i:s', strtotime('-2 day +9 hour', strtotime($fecha_1)));
    $fecha_5 = date('Y-m-d H:i:s', strtotime('-30 min', strtotime($fecha_1)));
    $fecha_6 = date('Y-m-d H:i:s', strtotime('-10 min -2 hour', strtotime($fecha_2)));
    $fecha_7 = date('Y-m-d H:i:s', strtotime('-1 sec', strtotime($fecha_0)));
    $fecha_8 = date('Y-m-d H:i:s', strtotime('-2 day +1 hour -20 sec', strtotime($fecha_1)));
    $fecha_9 = date('Y-m-d H:i:s', strtotime('-3 hour', strtotime($fecha_1)));
    $fecha_10 = date('Y-m-d H:i:s', strtotime('-21 min', strtotime($fecha_1)));
    $fecha_11 = date('Y-m-d H:i:s', strtotime('-31 sec', strtotime($fecha_0)));

    $fecha_array = array($fecha_0,$fecha_1,$fecha_2,$fecha_3,$fecha_4,$fecha_5,$fecha_6,$fecha_7,$fecha_8,$fecha_9,$fecha_10,$fecha_11);

    $j = $i%11;
    echo $j."<br>".$fecha_array[$j]."<br>";

    /* THIS IS WHERE THE XML REALLY STARTS */

    $property = $xml->createElement("property");
    $property = $root->appendChild($property);

    $id = $xml->createElement("id",$referencia);
    $id = $property->appendChild($id);

    $date = $xml->createElement("date",$fecha_0);
    $date = $property->appendChild($date);

    $reference = $xml->createElement("ref",$referencia);
    $reference = $property->appendChild($reference);

    $precio = $xml->createElement("price",$price);
    $precio = $property->appendChild($precio);

    $currency = $xml->createElement("currency","EUR");
    $currency = $property->appendChild($currency);

    $price_freq = $xml->createElement("price_freq","sale");
    $price_freq = $property->appendChild($price_freq);

    $part_ownership = $xml->createElement("part_ownership","0");
    $part_ownership = $property->appendChild($part_ownership);

    $leasehold = $xml->createElement("leasehold","0");
    $leasehold = $property->appendChild($leasehold);

    $new_build = $xml->createElement("new_build",$newbuild);
    $new_build = $property->appendChild($new_build);

    $type = $xml->createElement("type",$cat);
    $type = $property->appendChild($type);

    $town = $xml->createElement("town",$localidad);
    $town = $property->appendChild($town);

    $province = $xml->createElement("province",$prov);
    $province = $property->appendChild($province);

    $location = $xml->createElement("location");
    $location = $property->appendChild($location);

    $latitude = $xml->createElement("latitude",$lat);
    $latitude = $location->appendChild($latitude);

    $longitude = $xml->createElement("longitude",$lon);
    $longitude = $location->appendChild($longitude);

    $location_detail = $xml->createElement("location_detail",$zona);
    $location_detail = $property->appendChild($location_detail);

    $beds = $xml->createElement("beds",$bed);
    $beds = $property->appendChild($beds);

    $baths = $xml->createElement("baths",$wc);
    $baths = $property->appendChild($baths);

    $swpool = $xml->createElement("pool",$pool);
    $swpool = $property->appendChild($swpool);

    $surface_area = $xml->createElement("surface_area");
    $surface_area = $property->appendChild($surface_area);

    $built = $xml->createElement("built",$mconst);
    $built = $surface_area->appendChild($built);

    $plot = $xml->createElement("plot",$m_parcela);
    $plot = $surface_area->appendChild($plot);

    $energy_rating = $xml->createElement("energy_rating");
    $energy_rating = $property->appendChild($energy_rating);

    $consumption = $xml->createElement("consumption","A");
    $consumption = $energy_rating->appendChild($consumption);

    $emissions = $xml->createElement("emissions","A");
    $emissions = $energy_rating->appendChild($emissions);

    $url = $xml->createElement("url");
    $url = $property->appendChild($url);

    $es = $xml->createElement("es",$url_es);
    $es = $url->appendChild($es);

    $en = $xml->createElement("en",$url_en);
    $en = $url->appendChild($en);

    $de = $xml->createElement("de",$url_de);
    $de = $url->appendChild($de);

    $fr = $xml->createElement("fr",$url_fr);
    $fr = $url->appendChild($fr);

    $desc = $xml->createElement("desc");
    $desc = $property->appendChild($desc);

/*
    $es = $xml->createElement("es",$desc_es);
    $es = $desc->appendChild($es);
*/

    $en = $xml->createElement("en",utf8_encode($desc_en));
    $en = $desc->appendChild($en);

    $de = $xml->createElement("de",$desc_de);
    $de = $desc->appendChild($de);

    $fr = $xml->createElement("fr",$desc_fr);
    $fr = $desc->appendChild($fr);

    $features = $xml->createElement("features");
    $features = $property->appendChild($features);

    // COUNTER FOR THE NUMBER OF FEATURES
    for($f_count=0;$f_count<4;$f_count++){

        $feature = $xml->createElement("feature",$carac[$f_count]);
        $feature = $features->appendChild($feature);

    }

    $notes = $xml->createElement("notes","This is a space for notes (optional)");
    $notes = $property->appendChild($notes);

    $images = $xml->createElement("images");
    $images = $property->appendChild($images);

    /* COUNT THE NUMBER OF IMAGES THERE ARE */

    $query_img = mysql_query("SELECT imgpath FROM `CasasImages` WHERE ref LIKE '" . $referencia . "' ORDER BY imgpath");

    $img_counter = 1;

    /* NOW PRINT THE LINES WITH THE IMAGES */

    while($row_img = mysql_fetch_array($query_img)){

        $image = $xml->createElement("image");
        $image_id = $xml->createAttribute("id");
        $image_id->value = $img_counter;
        $image->appendChild($image_id);
        $image = $images->appendChild($image);

        $url = $xml->createElement("url","http://www.cmproperties.es/".$row_img['imgpath']);
        $url = $image->appendChild($url);

        $img_counter++;
    }

    echo $referencia." has been exported succesfully<br>";

    /* THIS IS WHERE THE XML ENDS */



    /* TO OUTPUT IT TO A FILE */
    $xml->preserveWhiteSpace = false;
    $xml->FormatOutput = true;
    $string_value = $xml->saveXML();

//$h = fopen('XMLexports/kyero/kyero.xml','w+');
//fwrite($h, $string_value);
//fclose($h);

    $xml->save("XMLexports/kyero/spainhouses.xml");
    //$xml->save("kyero.xml");
}

?>
