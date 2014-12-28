<?php

    session_start();
    include 'translator.php';
    header("Content-Type: text/html; charset=UTF-8");


    include "fpdf17/fpdf.php";
    require('fpdf17/rounded_rect.php');



    $pdf = new PDF();

    $pdf -> AddPage();

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    //---------------------------------------------------------------CONNECTION-------------------------------------------------------------------------
    include 'connect.php';

    mysql_select_db("cmproperties", $db);

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
    $wtf = explode(",", $carac);

    $price = substr_replace($row['precio'], '.', strlen($row['precio'])-3, 0);

    //---------------------------------------------------------------/DATA FETCH 1-------------------------------------------------------------------------
    //---------------------------------------------------------------DATA FETCH 2-------------------------------------------------------------------------

    $query2 = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath");
    $query_first = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 1");
    $query_second = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 1,2");
    $query_third = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 2,3");
    $query_fourth = mysql_query("SELECT * FROM `CasasImages` WHERE `ref` LIKE '" . $referencia . "' ORDER BY imgpath LIMIT 3,4");

    $row_first = mysql_fetch_array($query_first);
    $row_second = mysql_fetch_array($query_second);
    $row_third = mysql_fetch_array($query_third);
    $row_fourth = mysql_fetch_array($query_fourth);

    $img_1 = $row_first['imgpath'];
    $img_2 = $row_second['imgpath'];
    $img_3 = $row_third['imgpath'];
    $img_4 = $row_fourth['imgpath'];

    $titulo = str_replace("<br>", '', $titulo);
    $titulo = str_replace("<br/>", '', $titulo);
    $titulo = str_replace("</br>", '', $titulo);
    $titulo = str_replace("<BR>", '', $titulo);
    $titulo = str_replace("<BR>", '', $titulo);
    $titulo = str_replace("</BR>", '', $titulo);
    $titulo = str_replace("<BR/>", '', $titulo);

    //---------------------------------------------------------------/DATA FETCH 2-------------------------------------------------------------------------

    $logo = "images/logo.png";

    $properties = "images/properties.png";

    $phone = "images/phone-icon.png";

    $datos ="C/ Francisco Soribella Lopez
    Torrevieja 03183
    608 498 985
    Tel-Fax: 965 32 18 92
    info@cmproperties.es";

    // *********************************
    $datos_1 = "C/ Francisco Soribella Lopez";
    $datos_2 = "Torrevieja 03183";
    $datos_3 = "608 498 985";
    $datos_4 = "Tel-Fax 965 32 18 92";
    $datos_5 = "info@cmproperties.es";
    // *********************************

    $inmoreal = "Inmobiliaria - Real Estate";
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    // $pdf -> SetAutoPageBreak(0,5); //to unset auto page break and set page margin to 10mm

    //---------------------------------------------------------------DATA PRINT 1-------------------------------------------------------------------------
    // ************************** Titutlo ******************

    $pdf->AddFont('BOOKOSB','','BOOKOSB.php');

    $pdf -> SetFont('arial', 'B', 14);

    $pdf->SetFillColor(254,77,12);

    //$pdf -> SetFillColor(64,150,238);

    $pdf -> Rect(5,20,200,198,'F');

    $pdf->SetFillColor(254,77,12);

    $pdf->RoundedRect(5, 5, 200, 22, 0, 'F');

    $pdf -> Image($logo,8,8,35,15);

    $pdf -> Image($properties,45,16,35,9);




    $pdf -> SetTextColor(255,255,255);

    $pdf -> SetFont('arial', 'BI', 26);

    $pdf -> Ln(8);

    // $pdf -> Cell(190,10,$titulo.'      '.$price.$pdf -> SetFont('arial', 'B', 16).$euro = "".chr(128).$pdf -> Write(0, $euro),0,1,R);

    // $pdf -> MultiCell(105,9,$titulo,0,C,0);
    $pdf -> MultiCell(155,31,$titulo,0,C,0);



    $pdf -> SetFont('arial', '', 17);

    $pdf -> SetTextColor(0,0,65);

    $pdf -> Text(170,36,'Ref: '.$ref);


    $pdf -> SetTextColor(255,255,255);
    // $pdf -> Multicell(50,30,$price.$pdf -> SetFont('arial', 'B', 18).$euro = "".chr(128).$pdf -> Write(0, $euro),0,R,0);


    if($precio >= 100000){
        $pdf -> Text(142,20,$price.$pdf -> SetFont('arial', 'B', 40).$euro = "".chr(128).$pdf -> Write(0, $euro));
    }else{
        $pdf -> Text(150,20,$price.$pdf -> SetFont('arial', 'B', 40).$euro = "".chr(128).$pdf -> Write(0, $euro));
    }


    // ************************** Caracteristicas ******************
    $pdf -> SetTextColor(255,255,255);

    $pdf -> SetFont('arial', 'B', 19);


    $y_coord1 = $pdf -> GetY();

    if($y_coord1<28){
        $diff = 28-$y_coord1;
        $pdf -> Ln($diff);
    } else if($y_coord1>28){
        $diff = $y_coord1-28;
        $pdf -> Ln(-$diff);
    }


    if ($hab<=1){
        $hab .= " bedroom";
    } else if ($hab>1){
        $hab .= " bedrooms";
    }

    if ($wc<=1){
        $wc .= " bathroom";
    } else if ($wc>1){
        $wc .= " bathrooms";
    }


    $pdf -> Ln(12);

    // $pdf -> Cell(190,10,$cat.'  '.$hab.' '. $wc.' - '.$zona,0,1,C);

    $pdf -> SetFont('arial', 'B', 15);

    // $pdf -> Cell(25,10,'',0,0,C);
    $pdf -> Cell(63,10,$hab,0,0,L);

    $pdf -> Cell(64,10,$wtf[0],0,0,C);

    $pdf -> Cell(63,10,$wtf[1],0,0,R);

    $pdf -> Ln(7);

    $pdf -> Cell(63,10,$wc,0,0,L);

    $pdf -> Cell(64,10,$wtf[2],0,0,C);

    $pdf -> Cell(63,10,$wtf[3],0,0,R);

    $pdf -> SetTextColor(0,0,0);

    // ************************** IMAGES ******************
    $pdf -> SetDrawColor(255,255,255);
    $pdf -> SetLineWidth(1);

    $pdf -> Ln(11);




    $pdf -> SetX(5);
    $pdf -> Cell(100,80,$pdf -> Image($img_1,5,58,100,80),1,0,C);
    $pdf -> Cell(100,80,$pdf -> Image($img_2,105,58,100,80),1,1,C);

    $pdf -> SetX(5);
    $pdf -> Cell(100,80,$pdf -> Image($img_3,5,138,100,80),1,0,C);
    $pdf -> Cell(100,80,$pdf -> Image($img_4,105,138,100,80),1,0,C);
    $pdf -> Ln(83);

    $pdf -> SetLineWidth(0);
    $pdf -> SetDrawColor(0,0,0);
    // ************************** Descripcion ******************

    $pdf -> SetFont('arial', '', 11.5);

    $pdf -> Ln(4);

    $pdf -> Cell(12,6,' ',0,0,R);

    $pdf -> Image('images/flags/english.png',5,222,15,10);

    $pdf -> MultiCell(180,6,$desc_eng,0,L,0);

    $desc_spa = Translate_desc($desc_eng,'');

    $pdf -> SetFont('arial', 'I', 11.5);

    $y_coord = $pdf -> GetY();

    if($y_coord<247){
        $diff = 247-$y_coord;
        $pdf -> Ln($diff);
    } else if($y_coord>247){
        $diff = $y_coord-247;
        $pdf -> Ln(-$diff);
    }

    $pdf -> Cell(12,6,' ',0,0,R);

    $pdf -> Image('images/flags/spanish.png',5,249,15,10);

    $pdf -> MultiCell(180,6,$desc_spa,0,L,0);

    $pdf -> Ln(3);

    // ************************************** DATOS *****************************

    $pdf -> Ln(25);

    $pdf -> SetFont('arial', 'B', 17);

    $pdf -> Ln(-25);

    $pdf->SetFillColor(254,77,12);

    $pdf->RoundedRect(5, 272, 200, 20, 0, 'F');

    //$pdf -> MultiCell(190,6,$datos,0,R,0);

    // $pdf -> Text(132,270,$datos_1);
    // $pdf -> Text(160,275,$datos_2);

    $pdf -> SetTextColor(255,255,255);


// TELEPHONE

    $pdf -> Image($phone,120,275,14,14);

    $pdf -> SetFont('arial', 'B', 32);

    $pdf -> Text(136,286,$datos_3);





// EMAIL AND WEB

    $pdf -> SetFont('arial', 'B', 17);

    $pdf -> Text(15,280,$datos_5);

    $pdf -> SetFont('arial', 'B', 17);

    $pdf -> Text(15,288,"www.cmproperties.es");





    $pdf -> Ln(-10);

    $pdf -> SetTextColor(49,49,49);

    $pdf -> SetFont('arial', 'B', 10);

    //$pdf -> Cell(92,6,$inmoreal,0,2,C);
    //$pdf -> Text(15,290,$inmoreal);

    // ************************** Output ******************

    $pdf -> output();

    //---------------------------------------------------------------/DATA PRINT 1-------------------------------------------------------------------------


?>
