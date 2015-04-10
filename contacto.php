<?php
session_start();
include 'translator.php';
if ($_GET['lang']=='es') {
    //header("Content-Type: text/html; charset=ISO-8859-1");
    header("Content-Type: text/html; charset=UTF-8");
} else {
    header("Content-Type: text/html; charset=UTF-8");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html" />
        <meta name="google-translate-customization" content="f834267014ca7c94-fa3692548ecc1728-g752fbb026f2b6e43-13"></meta>
        <title>CMproperties - Contact</title>
        <meta name="keywords" content="cmproperties, casas, inmuebles, houses, property, sell, rent" />
        <meta name="description" content="CMproperties" />
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
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
    </head>



    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ TRANSLATOR +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<!--
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
-->




<div style="background-color: #FE8300;">

<div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,es,de,fr,sv,no,ru,nl,da,it,fi,', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false, gaTrack: true, gaId: 'UA-59156391-1'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>




<?php

$_SESSION['lang'] = $_GET['lang'];

?>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ /TRANSLATOR +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->



    <body>
        <div id="templatemo_header_wrapper">
            <div id="site_title" class="notranslate">
                <a href="index.php"><img name="cmproperties" src="images/logo.png" height="95px" width="245px" alt="cmproperties" /><span><img src="images/properties.png" height="53px" width="223px" alt="properties" /></span></a>        </div>
            <ul>
                <li class="notranslate"><a href="index.php?lang=<?php print($_SESSION['lang']); ?>">Home</a></li>
                <li class="notranslate"><a href="search_result.php?lang=<?php print($_SESSION['lang']); ?>">For Sale</a></li>
                <li class="notranslate"><a href="search_result_rent.php?lang=<?php print($_SESSION['lang']); ?>">For Rent</a></li>
                <li class="notranslate"><a href="contacto.php?lang=<?php print($_SESSION['lang']); ?>" class="current">Contact</a></li>
                <!--                 <li class="last"><a href="contact.html">Contact</a></li> -->
            </ul>

            <div class="cleaner"></div>     
        </div> <!-- end of header -->
    </div>

    <div id="templatemo_wrapper">


        <div class="container">
            <div id="content-slider">
                <div id="slider">  <!-- Slider container -->
                    <div id="mask">  <!-- Mask -->

                        <ul>
                            <li id="first" class="firstanimation">  <!-- ID for tooltip and class for animation -->
                            <a href="#"> <img src="sliding_photos/slider_01.jpg" alt="Cougar"/> </a>
                            <div class="tooltip"> <h1>Cougar</h1> </div>
                            </li>

                            <li id="second" class="secondanimation">
                            <a href="#"> <img src="sliding_photos/slider_02.jpg" alt="Lions"/> </a>
                            <div class="tooltip"> <h1>Lions</h1> </div>
                            </li>

                            <li id="third" class="thirdanimation">
                            <a href="#"> <img src="sliding_photos/slider_03.jpg" alt="Snowalker"/> </a>
                            <div class="tooltip"> <h1>Snowalker</h1> </div>
                            </li>

                            <li id="fourth" class="fourthanimation">
                            <a href="#"> <img src="sliding_photos/templatemo_940x360_04.jpg" alt="Howling"/> </a>
                            <div class="tooltip"> <h1>Howling</h1> </div>
                            </li>

                            <li id="fifth" class="fifthanimation">
                            <a href="#"> <img src="/uploads/T106/01%20playa%20la%20mata%202.jpg" alt="Sunbathing"/> </a>
                            <div class="tooltip"> <h1>Sunbathing</h1> </div>
                            </li>
                        </ul>

                    </div>  <!-- End Mask -->
                    <div class="progress-bar"></div>  <!-- Progress Bar -->
                </div>  <!-- End Slider Container -->
            </div>
        </div>



        <div id="templatemo_content">
            <div id="templatemo_main_content2">

                <div class="search_result_holder">


                    <div id="templatemo_content">
                        <div id="templatemo_main_content">
                            <br>
                            <br>


                            <div class="content_box">
                                <h1 align="center"><cmprop><?php echo Translate('Contact us',''); ?></cmprop></h1>



                                <!-- *******************************************************************************************************************- -->              
                                <p align="center"><contact_p>
                                <!--
                                Póngase en contacto con nosotros llamando </br> al <b>608 498 985</b> o enviando un email a <b>info@cmproperties.es</b>
                                <br>
                                <br>
                                -->

                                <?php echo Translate('Contact us calling',''); echo' <b>608 498 985</b> '; echo Translate('or sending us an email to',''); echo' <b>info@cmproperties.es</b>'; ?>
                                <br>
                                <br>
                                <b style="color: white;">
                                    Ctra. a San Miguel Km 1  -  03189 Orihuela Costa (Alicante)
                                    <br>
                                    <br>
                                    Calle Francisco Soribella Lopez 15-C  -  03183 Torrevieja (Alicante)
                                    <br>
                                    <br>
                                    <br>
                                </b>
                                </contact_p>
                                </p>

                                <!-- ******************************************************************************************************************** -->              

                            </div>

                        </div>

                        <div id="templatemo_sidebar">
                            <div class="image_wrapper image_fl"><img src="images/casa_02.jpg" alt="image" height="135px" width="155px" /></div>
                        </div>

                        <div class="cleaner"></div>
                    </div>
                    <div id="templatemo_content_bottom"></div>

                </div>
            </div>
        </div>
    </div> <!-- end of wrapper -->

    <div id="templatemo_footer">

        Copyright &copy; 2048 Cmapas

    </div> <!-- end of templatemo_footer -->

</body>
            </html>


