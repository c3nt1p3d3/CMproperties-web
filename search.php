<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMproperties - Search</title>
<meta name="keywords" content="cmproperties, casas, inmuebles, houses, property, sell, rent" />
<meta name="description" content="CMproperties" />
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
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>
<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
        <div id="site_title">
				<a href="index.php"><img src="images/logo.png" height="95px" width="245px" alt="logo" /><span><prop>properties</prop></span></a>        </div> <!-- end of site_title -->
        <div id="templatemo_menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="search_result.php" class="current">Search</a></li>
<!--                 <li><a href="portfolio.html">Portfolio</a></li> -->
                <li><a href="contacto.php">Contact</a></li>
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

    <div id="templatemo_flash">
   		<div id="piecemaker">
        	<p>This is a placeholder of 3D Flash Slider. Feel free to put in any alternative content here.</p>
        </div>
    </div> <!-- end of flash -->
    
    <div id="templatemo_content_top"></div>
    <div id="templatemo_content">
    	<div id="templatemo_main_content">
        
        	<div class="content_box">
                <h1 align="center"><cmprop>Search</cmprop></h1>



<!-- ****************************************************************************************************************************** -->              
              <p align="center"><div id="custom_form">
  
  
   <form action="search_result.php" method="post">
<b>
Localidad:<select name="localidad" class="search">
<option value="%">Any</option>
<option value="Torrevieja">Torrevieja</option>
<option value="Orihuela Costa">Orihuela Costa</option>
<option value="Pilar de la Horadada">Pilar de la Horadada</option>
<option value="San Javier">San Javier</option>
<option value="Los Alcazares">Los Alcazares</option>
<option value="Mil Palmeras">Mil Palmeras</option>
<option value="Pinar de Campoverde">Pinar de Campoverde</option>
<option value="Torrepacheco">Torrepacheco</option>
<option value="Dehesa de Campoamor">Dehesa de Campoamor</option>
</select>

<br/>
<br/>
Zone:
<input type="text" name="zona" value="<?php echo $_POST['zona'] ?>" class="search">

<br/>
<br/>
Tipo de Vivienda:
<select name="cat" class="search">
<option value="%">Any</option>
<option value="Apartment">Apartment</option>
<option value="Penthouse">Penthouse</option>
<option value="Studio">Studio</option>
<option value="Bungalow">Bungalow</option>
<option value="Town house">Town house</option>
<option value="Duplex">Duplex</option>
<option value="Villa">Villa</option>
<option value="Finca">Finca</option>
<option value="Plot">Plot</option>
</select>
<br/>
<br/>
Habitaciones:
<select name="hab" class="search">
<option value="%">Any</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
<br/>
<br/>
Banos:
<select name="wc" class="search">
<option value="%">Any</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
<br/>
<br/>

Precio Max:
<input type="text" name="precio_max" class="search">

<br/>
<br/>

</b>
<input type="submit" value="Search" style="font-size: 14px; width: 8em; font-weight: bold;">
</form>
</div>
</p>

<!-- ********************************************************************************************************************************* -->              

			</div>
            
        </div>
        
        <div id="templatemo_sidebar">
                  <div class="image_wrapper image_fr"><img src="images/casa_01.jpg" alt="casa_01" /></div>
<!--         
        	<div id="news_box">
                
                <h2>Latest Updates</h2>
                        
                <ul>
                	<li>
                        <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                        <p>You may validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow">CSS</a> for this page. Maecenas tellus erat, dictum vel semper, dapibus ac elit.</p>
                    </li>
                    
                    <li>
                        <h6><a href="#">Nunc porttitor feugiat elit</a></h6>
                        <p>Nunc porttitor feugiat elit, ac tristique turpis condimentum in. Sed eleifend odio eget massa venenatis elementum.</p>
                    </li>
                    
                    <li class="last">
                        <h6><a href="#">Pellentesque mauris ligula</a></h6>
                        <p>Integer tempus consectetur risus, id congue justo fringilla vel. Curabitur vestibulum vulputate consectetur. </p>
                    </li>
                    
                </ul>
                <div class="btn_more"><a href="#"><span>+</span> View All Posts</a></div>
                <div class="cleaner"></div>     
            </div>
            
            <div class="sidebar_box">
            	<h2>Testimonial</h2>
                <blockquote>
                    <p align="justify">Quisque sit amet adipiscing libero. Donec et tellus vitae velit pharetra lobortis. Ut commodo, nulla eu pellentesque mollis, odio ante condimentum augue, eget facilisis dui magna ut ligula.</p>
                    
                    <cite>David - <span><a href="portfolio.html">Marketing Specialist</a></span></cite>
                </blockquote>
            </div>
 -->            
        </div>
        
        <div class="cleaner"></div>
    </div>
    <div id="templatemo_content_bottom"></div>
    
    <div id="templatemo_footer">

        Copyright © 2048 <a href="#">CMproperties</a>
    
    </div> <!-- end of templatemo_footer -->
     
</div> <!-- end of wrapper -->
</body>
</html>

