<?php
    require('login.php');
?>



<?php

    set_time_limit(0);


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
    $nueva = $_POST['nueva'];
    $banco = $_POST['banco'];

    //$sold = $_POST['sold'];
    //$reserved = $_POST['reserved'];

    $comunidad = $_POST['comunidad'];
    $ibi = $_POST['ibi'];
    $m_const = $_POST['m_const'];
    $m_parcela = $_POST['m_parcela'];
    $year = $_POST['year'];
    $reformado = $_POST['reformado'];
    $heating = $_POST['heating'];
    $pool = $_POST['pool'];


    if ($ref == ""){
        echo "PUT A REFERENCE!!!!!!!!!!! OR IT WONT WORK!!!! </br></br> =) </br></br>***********************************************
        </br></br>***********************************************</br></br>***********************************************
        </br></br>***********************************************</br></br>***********************************************
        </br></br>***********************************************</br></br>***********************************************
        </br></br>***********************************************</br></br>***********************************************
        </br></br>***********************************************</br></br>***********************************************
        </br></br>***********************************************</br></br>
        Will automatically go back in 5 seconds, all you wrote has dissapeared.";
    ?>

    <script type="text/javascript">

        function redirectingfail(){
                window.location = "create.php"
        }
    </script>


    <html>
        <body onLoad="setTimeout('redirectingfail()', 5000)">
        </body>
    </html>


    <?php
    } else {


        $i = 0;
        $j = 3;

        while ($i <= $j){
            $i++;
            $caracteristicas .= $_POST['carac'.$i.''];
            /*if ($_POST['carac'.$i.''] != ""){
                $caracteristicas .= ",";
            }*/
            $caracteristicas .= ",";
        }

        //------------------------------------------------------------------------

        $pathname = "uploads/" . $ref . "/";

        mkdir($pathname);

        foreach($_FILES["fileToUpload"]["error"] as $key => $error){
            if($error == UPLOAD_ERR_OK) {
                $original_img = $_FILES["fileToUpload"]["name"];
                $img = $_FILES["fileToUpload"]["name"][$key];
                $imgpath = "uploads/". $ref . "/" . $img;

                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], "uploads/" . $ref . "/" . $_FILES["fileToUpload"]["name"][$key]);
                // imagecopyresized($imgpath, $_FILES["fileToUpload"]["tmp_name"], 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
                // exec("convert $original_img -thumbnail $dst_wx$dst_h $imgpath");
                mysql_query("INSERT INTO CasasImages (ref,imgpath) VALUES ('$ref','uploads/". $ref ."/" . mysql_real_escape_string($img) . "')");
            }
        }

        mysql_query("INSERT INTO Casas (localidad,wc,cat,hab,desc_eng,desc_es,zona,precio,provincia,ref,titulo,caract,map_search,parking,comunidad,ibi,m_const,m_parcela,year,reformado,heating,pool,colab,nueva,banco) VALUES ('$localidad','$wc','$cat','$hab','$desc_eng','$desc_es','$zona','$precio','$prov','$ref','$titulo','$caracteristicas','$map_search','$parking','$comunidad','$ibi','$m_const','$m_parcela','$year','$reformado','$heating','$pool','$colab','$nueva','$banco')");



        //--------------------------------------------------------------------------------------------------------------

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $ref . "/" . $_FILES["fileToUpload"]["name"]);











        /*
        // this tells the browser to render jpg image
        header('content-type: image/jpeg');

        // getting the image name from GET variable
        $image = ;

        // creating png image of watermark
        $watermark = imagecreatefrompng('watermark.png');  

        // getting dimensions of watermark image
        $watermark_width = imagesx($watermark); 
        $watermark_height = imagesy($watermark); 

        // creting jpg from original image
        $image_path = "uploads/" . $ref . "/acer_kb.JPG";
        echo $image_path;
        $image = imagecreatefromjpeg($image_path);
        //something went wrong
        if ($image === false) {
            return false;
        }
        // getting the dimensions of original image
        $size = getimagesize($image_path); 
        // placing the watermark 5px from bottom and right
        $dest_x = $size[0] - $watermark_width - 5; 
        $dest_y = $size[1] - $watermark_height - 5;
        // blending the images together
        imagealphablending($image, true);
        imagealphablending($watermark, true);
        // creating the new image
        imagecopy($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);
        imagejpeg($image); 
        // destroying and freeing memory
        imagedestroy($image); 
        imagedestroy($watermark);  
        */






    ?>

    <script type="text/javascript">

        function redirecting(){
                window.location = "index.php"
        }
    </script>



    <html>
        <body onLoad="setTimeout('redirecting()', 5000)">
            <h1>
                CREATED SUCCESFULLY!!!!!!</br></br>
                automatically redirected to index page in 5 seconds
            </h1>
        </body>
    </html>

    <?php

    }
    mysql_close($db);

    set_time_limit(30);

?>
