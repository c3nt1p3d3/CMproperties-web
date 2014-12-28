<?php

    session_start();
    include 'translator.php';
    header("Content-Type: text/html; charset=UTF-8");


    include "fpdf17/fpdf.php";
    require('fpdf17/rounded_rect.php');



//    $pdf = new PDF('L', 'in', array(685,380));
    $pdf = new PDF('L', 'mm', array(685,380));

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
    $pool = $row['pool'];
    $m_const = $row['m_const'];
    $m_parcela = $row['m_parcela'];
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


    $logo_bed = "images/icons/bed6.png";


    $phone = "images/phone-icon.png";

    $datos ="C/ Francisco Soribella Lopez
    Torrevieja 03183
    608 498 985
    Tel-Fax: 965 32 18 92
    info@cmproperties.es";

    // *********************************
    $direccion = "C/ Francisco Soribella Lopez";
    $direccion_2 = "Torrevieja 03183";
    $movil = "608 498 985";
    $tel = "Tel-Fax 965 32 18 92";
    $mail = "info@cmproperties.es";
    $web = "www.cmproperties.es";
    // *********************************

    $inmoreal = "Inmobiliaria - Real Estate";
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    // $pdf -> SetAutoPageBreak(0,5); //to unset auto page break and set page margin to 10mm

    //---------------------------------------------------------------DATA PRINT 1-------------------------------------------------------------------------
    // ************************** Titutlo ******************

    $pdf->AddFont('BOOKOSB','','BOOKOSB.php');

    $pdf -> SetFont('arial', 'B', 44);

    $pdf->SetFillColor(254,77,12);

    //$pdf -> SetFillColor(64,150,238);

    $pdf -> Rect(0,0,685,380,'F');

    $pdf->SetFillColor(254,77,12);

    $pdf->RoundedRect(5, 5, 200, 22, 0, 'F');

    $pdf -> Image($logo,10,10,53,22);
    $pdf -> Image($properties,64,19,69,18);

    $pdf -> SetFont('arial', '', 23);

    $pdf -> SetTextColor(255,255,255);

    $pdf -> Text(37,43,'Ref:'.$ref);

    $pdf -> SetFont('arial', 'BI', 65);

    $pdf -> SetTextColor(15,15,95);

    $pdf -> SetY(20);

    $pdf -> MultiCell(685,16,$cat.' - '.$localidad,0,C,0);

    $pdf -> SetTextColor(255,255,255);


    $pdf -> SetXY(515,10);
    $pdf -> Cell(155,35,$price.$pdf -> SetFont('arial', 'B', 75).$euro = "".chr(128).$pdf -> Write(0, $euro),0,R,0);


    // ************************** Caracteristicas ******************
    $pdf -> SetTextColor(255,255,255);

    
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

    if ($pool==0){
        $pool="no";
    }


    $pdf -> SetTextColor(0,0,0);

    // ************************** IMAGES ******************

    $pdf -> SetXY(10,50);

    $pdf -> SetDrawColor(255,255,255);
    $pdf -> SetLineWidth(1.2);

    $pdf -> Image($img_1,10,50,425,255);

    $pdf -> Cell(425,255,'',1,0,C);




//    $pdf -> Cell(95,80,$pdf -> Image($img_2,105,53,95,80),1,1,C);
//    $pdf -> Cell(95,80,$pdf -> Image($img_3,10,133,95,80),1,0,C);
//    $pdf -> Cell(95,80,$pdf -> Image($img_4,105,133,95,80),1,0,C);

    $pdf -> SetLineWidth(1.2);
    $pdf -> SetDrawColor(255,255,255);


    $pdf -> Image($img_2,545,50,125,85);
    $pdf -> SetXY(545,50);
    $pdf -> Cell(125,85,'',1,L,0);

    $pdf -> Image($img_3,545,135,125,85);
    $pdf -> SetXY(545,135);
    $pdf -> Cell(125,85,'',1,L,0);

    $pdf -> Image($img_4,545,220,125,85);
    $pdf -> SetXY(545,220);
    $pdf -> Cell(125,85,'',1,L,0);




    // ************************** Descripcion ******************

    $pdf -> SetDrawColor(255,255,255);
    $pdf -> SetFillColor(255,255,255);
    $pdf -> SetLineWidth(1.2);

    $pdf -> SetXY(10,315); // COORDENADAS PARA MARCO

    $pdf -> MultiCell(320,44,'',1,L,1);

    $pdf -> Image('images/flags/english.png',15,325,15,10);

    $pdf -> SetXY(35,318);

    $pdf -> SetFont('arial', '', 24);

    $pdf -> SetTextColor(0,0,0);

    $pdf -> MultiCell(290,10,$desc_eng,0,L,0);

    $desc_spa = Translate_desc($desc_eng,'');


    $pdf -> SetXY(355,315); // COORDENADAS PARA MARCO

    $pdf -> MultiCell(320,44,'',1,L,1);

    $pdf -> Image('images/flags/spanish.png',360,325,15,10);

    $pdf -> SetXY(380,318);

    $pdf -> MultiCell(290,10,$desc_spa,0,L,0);


    $pdf -> SetTextColor(10,10,105);
    $pdf -> SetTextColor(0,0,0);

    $pdf -> SetFillColor(255,255,255);

    $pdf -> SetFont('arial', 'BI', 30);

    $pdf -> SetXY(450,80);
    $pdf -> MultiCell(80,14,$hab,1,C,1);

    $pdf -> SetXY(450,120);
    $pdf -> MultiCell(80,14,$wc,1,C,1);

    $pdf -> SetXY(450,160);
    $pdf -> MultiCell(80,14,'Pool: '.$pool,1,C,1);

    $pdf -> SetXY(450,200);
    $pdf -> MultiCell(80,14,'Built: '.$m_const.' m2',1,C,1);


    $pdf -> SetXY(450,240);

    if ($m_parcela == 0){
        $m_parcela = "--";
    }

    $pdf -> MultiCell(80,14,'Plot: '.$m_parcela.' m2',1,C,1);



    $pdf -> output();

    //---------------------------------------------------------------/DATA PRINT 1-------------------------------------------------------------------------


?>
